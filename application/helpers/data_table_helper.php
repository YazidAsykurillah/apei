<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('get_datatables_js')){

	function get_datatables_js(){
		$js = array(
			'assets/js/datatables/jquery.dataTables.min.js',
			'assets/js/datatables/dataTables.bootstrap.js',
			'assets/js/datatables/dataTables.buttons.min.js',
			'assets/js/datatables/buttons.bootstrap.min.js',
			'assets/js/datatables/jszip.min.js',
			'assets/js/datatables/pdfmake.min.js',
			'assets/js/datatables/vfs_fonts.js',
			'assets/js/datatables/buttons.html5.min.js',
			'assets/js/datatables/buttons.print.min.js',
			'assets/js/datatables/dataTables.fixedHeader.min.js',
			'assets/js/datatables/dataTables.keyTable.min.js',
			'assets/js/datatables/dataTables.responsive.min.js',
			'assets/js/datatables/responsive.bootstrap.min.js',
			'assets/js/datatables/dataTables.scroller.min.js',
			'assets/js/datatables/dataTables.select.min.js',
			'assets/js/pace/pace.min.js'
		);
		return $js;
	}

}