$('#description').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['link','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 300,
});
$('#start_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true
});
$('#end_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true
});


$('#form-certification-wizard').bootstrapWizard();

var selected = [];
var tableAssesors = $('#datatable').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: baseURL+'assesor/get_assesors',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'name'},
        {data: 'instance'},
        {data: 'certificate_number'},
        {data: 'year_of_certificate'},
        {data: 'certificate_publisher'},
        {data: 'expertise'},
        {data: 'id', visible: false, searchable: false, className: 'never'}
    ],
    order: [[1, 'asc']],
    dom: 'Bfrtip',
    buttons: []
});

tableAssesors.on('click', 'tr', function(){
    //var id = this.id;
    var id = tableAssesors.row(this).data().id;
    var index = $.inArray(id, selected);
    if ( index === -1 ) {
        selected.push(id);
        $('#table-selected-assesors').append(
              '<tr id="tr_assesor_'+id+'">'+
                '<td>'+
                  '<input type="hidden" name="assesor_id[]" value="'+id+'" />'+
                  tableAssesors.row(this).data().name+
                '</td>'+
                '<td>'+
                  tableAssesors.row(this).data().instance+
                '</td>'+
                '<td>'+
                  tableAssesors.row(this).data().certificate_number+
                '</td>'+
                '<td>'+
                  tableAssesors.row(this).data().certificate_publisher+
                '</td>'+
                '<td>'+
                  tableAssesors.row(this).data().expertise+
                '</td>'+
                '<td>'+
                  '<select name="position[]" class="form-control" id="position">'+
                    '<option value="">Pilih Jabatan</option>'+
                    '<option value="leader">Ketua</option>'+
                    '<option value="member">Anggota</option>'+
                  '</select>'+
                '</td>'+
              '</tr>'
        );
    } else {
        selected.splice( index, 1 );
        $('#tr_assesor_'+id).remove();
    }

    $(this).toggleClass('selected');
    
    console.log(selected);
    
} );

$('#btn-set-assesors').on('click', function(){
  if(selected.length !== 0){
    $('#tr-no-assesor-selected').hide();
  }
  else{
    $('#tr-no-assesor-selected').show(); 
  }
  $('#modal-display-assesors').modal('hide');
});




$('#btn-display-assesor-datatables').on('click', function(event){
      event.preventDefault();
      $('#modal-display-assesors').modal('show');
    });

$('#form-certification').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    // event.preventDefault();
    var data = new FormData($('#form-certification')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'djk_management/certification/save',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                $('#form-certification')[0].reset();
                alertify.success("Insert data Success");
                //window.location.reload();
            }
            else{
                alertify.error(obj.msg);
                //console.log(response);
            }
       }
    });
});

