<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Crud_m extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    //check fillable field
    public $fillable = array();
    //set table default name;
    public $table = '';
    //atur primary key di tabel yang digunakan
    public $primary_key = 'id';
    public $searchable = array();
    public $select2fields = array( 'id' => 'id', 'text' => 'nama' );

    public function setTableName( $tableName ) {
        $this->table = $tableName;
    }

    //--- Insert
    function insert( $data, $show_last_id = false ) {
        //$s = date( 'Y-m-d H:i:s', time() );
        //$data['created'] = $s;
        $auth = $this->session->userdata( 'auth' );
        //$data['createdby'] = $auth['id'];
        $result = $this->db->insert( $this->table, $data );
        if ( false == $result ) {
            $err = $this->db->error();
            $result = $err['code'] . "<br>" . $err['message'];
        }
        //echo $this->db_last_query();
        return $result;
    }

    //--- Update
    function update( $dataUpdate, $where ) {
        $user_session = $this->session->userdata( 'auth' );
        $dataUpdate['updatedby'] = $user_session['id'];
        $result = $this->db->update( $this->table, $dataUpdate, $where );
        if ( false == $result ) {
            $err = $this->db->error();
            $result = $err['code'] . "<br>" . $err['message'];
        }
        return $result;
    }

    //--- Delete
    public function delete( $col, $where ) {
        $this->db->where_in( $col, $where );
        $result = $this->db->delete( $this->table );
        if ( false == $result ) {
            $err = $this->db->error();
            $result = $err['code'] . "<br>" . $err['message'];
        }
        return $result;
    }

    //--- Output JSON    
    function outputToJson( $whatToOutput, $stringOrArray = 'array' ) {
        $this->output->set_content_type( 'application/json' );
        if ( $stringOrArray == 'array' ) {
            $this->output->set_output( json_encode( $whatToOutput ) );
        } else {
            $this->output->set_output( $whatToOutput );
        }
    }

    //--- Get Datatables v10
    function getDataTableV10( $where = array() ) {
        $postData = $this->input->post();
        $index = 0;
        $select = array();
        $searchable = array();
        $orderable = array();
        foreach ( $postData['columns'] as $key => $columns ) {
            if ( strlen( $columns['data'] ) ) {
                if ( $columns['data'] == "#" )
                    continue;
                $select[] = $columns['data'];
                if ( $columns['orderable'] == "true" ) {
                    $orderable[$key] = $columns['data'];
                }
                if ( $columns['searchable'] == "true" ) {
                    $searchable[$key]['column'] = $columns['data'];
                    $searchable[$key]['query'] = $columns['search']['value'];
                }
            }
        };
        $this->db->select( 'count(*) as nrow' );
        $total = $this->db->get( $this->table )->first_row();
        $this->db->start_cache();
        $arrOrLike = array();
        foreach ( $searchable as $whatToSearch ) {
            if ( strlen( $whatToSearch['query'] ) > 0 ) {
                $qu = $whatToSearch['column'] . " LIKE '%" . $whatToSearch['query'] . "%'";
                $this->db->where( $qu );
            } else {
                $arrOrLike[] = $whatToSearch['column'] . " LIKE '%" . $postData['search']['value'] . "%'";
            }
        }
        if ( !empty( $arrOrLike ) ) {
            $this->db->where( '(' . implode( ' OR ', $arrOrLike ) . ')' );
        }
        //--- ADDITIONAL WHERE 
        if ( !empty( $where ) ) {
            foreach ( $where as $k => $v ) {
                $s = $v['sql'];
                $f = $v['field'];
                $d = $v['data'];
                $this->db->$s( $f, $d );
                //$this->db->$v['sql']( $v['field'], $v['data'] );
            }
        };
        $this->db->stop_cache();
        $select = array_unique( $select );
        $select = count( $select ) > 0 ? implode( ',', $select ) : '*';
        $this->db->select( $select );
        $this->db->limit( $postData['length'], $postData['start'] );
        foreach ( $postData['order'] as $orderBy ) {
            $this->db->order_by( $orderable[$orderBy['column']], $orderBy['dir'] );
        }
        $get = $this->db->get( $this->table );
//        echo $this->db->last_query();exit;
        $result = $get->result_array();
        //var_dump($result);exit;
        $start = $postData['start']; // Penomeran
        $start++;
        foreach ( $result as $key => $val ) {
            $result[$key]['#'] = (string) $start;
            $start++;
        }
        $this->db->select( 'count(*) AS num_row' );
        $totalFiltered = $this->db->get( $this->table )->first_row();
        return array( 'draw' => $postData['draw'],
            'data' => $result,
            'recordsFiltered' => $totalFiltered->num_row,
            'recordsTotal' => $total->nrow,
        );
    }

    function exportDataTable( $where = array(), $exportfield = array() ) {
        $limitexport = $this->db->select( 'opvalue' )->get_where( 'options', array( 'opkey' => 'limitexport' ) )->row();
        $je = $this->input->post();
        $postData = json_decode( $je['exparams'], true );
        $index = 0;
        $select = array();
        $searchable = array();
        $orderable = array();
        foreach ( $postData['columns'] as $key => $columns ) {
            if ( strlen( $columns['data'] ) ) {
                if ( $columns['data'] == "#" )
                    continue;
                $select[] = $columns['data'];
                if ( $columns['orderable'] == "true" ) {
                    $orderable[$key] = $columns['data'];
                }
                if ( $columns['searchable'] == "true" ) {
                    $searchable[$key]['column'] = $columns['data'];
                    $searchable[$key]['query'] = $columns['search']['value'];
                }
            }
        };
        $this->db->select( 'count(*) as nrow' );
        $total = $this->db->get( $this->table )->first_row();
        $this->db->start_cache();
        $arrOrLike = array();
        foreach ( $searchable as $whatToSearch ) {
            if ( strlen( $whatToSearch['query'] ) > 0 ) {
                $qu = $whatToSearch['column'] . " LIKE '%" . $whatToSearch['query'] . "%'";
                $this->db->where( $qu );
            } else {
                $arrOrLike[] = $whatToSearch['column'] . " LIKE '%" . $postData['search']['value'] . "%'";
            }
        }
        if ( !empty( $arrOrLike ) ) {
            $this->db->where( '(' . implode( ' OR ', $arrOrLike ) . ')' );
        }
        //--- ADDITIONAL WHERE 
        if ( !empty( $where ) ) {
            foreach ( $where as $k => $v ) {
                $this->db->$v['sql']( $v['field'], $v['data'] );
            }
        };
        $this->db->stop_cache();
        $select = count( $exportfield ) > 0 ? $exportfield : $select;
        $select = array_unique( $select );
        $select = count( $select ) > 0 ? implode( ',', $select ) : '*';
        $this->db->select( $select );
        $this->db->limit( $limitexport->opvalue );
        foreach ( $postData['order'] as $orderBy ) {
            $this->db->order_by( $orderable[$orderBy['column']], $orderBy['dir'] );
        }
        $get = $this->db->get( $this->table );
        //echo $this->db->last_query();exit;
        return $get;
    }

    function getById( $id ) {
        $this->db->where( $this->primary_key, $id );
        $get = $this->db->get( $this->table );
        return $get->row_array();
    }

    //ini hanya akan mengambil data dari 1 tabel aja
    //jangan berfikir untuk memodifikasi agar bisa lebih lagi
    public function getFrom1Table(
    $select = '*', $where = array(), $limit = false, $start = 0, $order = false ) {
        $this->db->select( $select, false );
        if ( count( $where ) > 0 ) {
            $this->db->where( $where );
        }
        if ( is_int( $limit ) ) {
            $this->db->limit( $limit, $start );
        }
        if ( is_array( $order ) && count( $order ) == 2 ) {
            $this->db->order_by( $order[0], $order[1] );
        }
        $get = $this->db->get( $this->table );
        return $get->result_array();
    }

    function getSelect2Data( $where = array(), $addwhere = array() ) {
        $postData = $this->input->post();
        $this->db->where( $where, false );
        $this->db->select( $this->select2fields['id'] . ' as id' );
        $this->db->select( $this->select2fields['text'] . ' as text', false );
        if ( isset( $postData['action'] ) && $postData['action'] == 'initSelection' ) {
            $getByID = $this->getById( $postData['id'] );
            $data = new stdClass();
            if ( count( $getByID ) > 0 ) {
                $data->id = $postData['id'];
                $data->text = $getByID['text'];
            } else {
                $data->id = '';
                $data->text = '';
            }
            echo '[' . json_encode( $data ) . ']';
            exit;
        }
        $this->db->limit( $postData['limit'] );
        $last = end( $this->searchable );
        $sql = "(";
        foreach ( $this->searchable as $field ) {
            $sql .=  $field . " LIKE '%" . $postData['q'] . "%'";
            if ( $field != $last ) {
                $sql .= " OR ";
            }
        };
        $sql .= ")";
        $this->db->where( $sql );
        //--- ADDITIONAL WHERE 
        if ( !empty( $addwhere ) ) {
            foreach ( $addwhere as $k => $v ) {
                $this->db->$v['sql']( $v['field'], $v['data'] );
            }
        };
        $get = $this->db->get( $this->table );
//        var_dump($this->db->last_query()); exit;
        return $get->result_array();
    }

    function getSelect2psi( $select, $search, $where = array(), $addwhere = array() ) {
        $arrsearch = array();
        $postData = $this->input->post();
        $this->db->select( $select );
        $last = end( $search );
        $sql = "(";
        foreach ( $search as $val ) {
            $sql .=  $val . " LIKE '%" . $postData['q'] . "%'";
            if ( $val != $last ) {
                $sql .= " OR ";
            }
        };
        $sql .= ")";
        $this->db->where( $sql );
        $this->db->limit( $postData['limit'] );
        if ( isset( $postData['action'] ) && $postData['action'] == 'initSelection' ) {
            $getByID = $this->getById( $postData['id'] );
            $data = new stdClass();
            if ( count( $getByID ) > 0 ) {
                $data->id = $postData['id'];
                $data->text = $getByID['text'];
            } else {
                $data->id = '';
                $data->text = '';
            }
            echo '[' . json_encode( $data ) . ']';
            exit;
        }
        //--- ADDITIONAL WHERE 
        if ( !empty( $addwhere ) ) {
            foreach ( $addwhere as $k => $v ) {
                $this->db->$v['sql']( $v['field'], $v['data'] );
            }
        };
        return $this->db->get_where( $this->table, $where )->result_array();
    }

    function exportexcel( $query, $fname ) {
        if ( !$query )
            return false;
        $this->load->library( 'excel' );
        $this->excel->getProperties()->setTitle( "export" )->setDescription( "none" );
        $this->excel->setActiveSheetIndex( 0 );

        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ( $fields as $field ) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow( $col, 1, $field );
            $col++;
        }

        // Fetching the table data
        $row = 2;
        foreach ( $query->result_array() as $data ) {
            $col = 0;
            foreach ( $fields as $field ) {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow( $col, $row, $data[$field] );
                $col++;
            }

            $row++;
        }
        $this->excel->setActiveSheetIndex( 0 );

        // Sending headers to force the user to download the file
        header( 'Content-Type: application/vnd.ms-excel' );
        header( 'Content-Disposition: attachment;filename="' . $fname . '.xls"' );
        header( 'Cache-Control: max-age=0' );
        $objWriter = PHPExcel_IOFactory::createWriter( $this->excel, 'Excel5' );
        $objWriter->save( 'php://output' );
    }

    function importexcel( $fname ) {
        $this->load->library( 'excel' );
        try {
            $inputFileType = PHPExcel_IOFactory::identify( $fname );
            $objReader = PHPExcel_IOFactory::createReader( $inputFileType );
            $objReader->setReadDataOnly( true );
            $objPHPExcel = $objReader->load( $fname );
        } catch ( Exception $e ) {
            return $e->getMessage();
        }
        $sheet = $objPHPExcel->getSheet( 0 );
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $headingsArray = $sheet->rangeToArray( 'A1:' . $highestColumn . '1' );
        $h = $headingsArray[0];
        for ( $row = 2; $row <= $highestRow; $row++ ) {
            $rowData = $sheet->rangeToArray( 'A' . $row . ':' . $highestColumn . $row );
            foreach ( $h as $key => $val ) {
                $r[$val] = $rowData[0][$key];
            }
            $dt[] = $r;
        }
        return $dt;
    }

    function getBrickRecord( $jobid = null ) {
        $h = $this->db->select( 'accountbrick_id,recordaccess' )->get_where( 'recordaccess', array( 'jobposition_id' => $jobid ) )->result_array();
        return $h;
    }

    function _getMR( $stid, $dmid ) {
        $mr = $this->_queryMR( $stid, $dmid );
        if ( $mr[0]['peoplemgrtype'] !== NULL ) {
            $mr = $this->_getMR( $stid, $mr[0]['user_id'] );
        }
        return $mr;
    }

    function _queryMR( $structure_id, $dmid ) {
        $mr = $this->db->select( 'user_id,peoplemgrtype' )->get_where( 'v_structure', array( 'structure_id' => $structure_id, 'directmanager_id' => $dmid ) )->result_array();
        return $mr;
    }

    function _getAccBrick( $period, $userid ) {
        $period = substr( $period, 0, 7 );
        $stid = $this->db->select( 'id' )->like( 'period', $period )->get( 'structure' )->row();
        $mr = $this->_getMR( $stid->id, $userid );
        foreach ( $mr as $val ) {
            $mrid[] = (int) $val['user_id'];
        }
        $mrid = implode( ',', $mrid );
        $sql = "SELECT DISTINCT accountbrick_id FROM recordaccess WHERE jobposition_id IN 
                (SELECT jobposition_id FROM users WHERE id IN ($mrid)) ";
        $q = $this->db->query( $sql )->result_array();
        foreach ( $q as $val ) {
            $accbrick[] = $val['accountbrick_id'];
        }
        return $accbrick;
    }

}
