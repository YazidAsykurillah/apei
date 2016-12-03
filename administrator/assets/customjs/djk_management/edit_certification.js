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

//Block Assesor Selection

var selected = [];

$('.selected_assesors').each(function(){
  selected.push(this.value);
});

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
    rowCallback: function(row, data){
        if($.inArray(data.id, selected) !== -1){
          $(row).addClass('selected');
        }
        //console.log(selected);
    },
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
              '<tr class="tr_assesor_'+id+'">'+
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
        $('.tr_assesor_'+id).remove();
    }

    $(this).toggleClass('selected');
    //console.log(selected);
    
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

//ENDBlock Assesor Selection

//Block Competency selection
var selected_competency = [];
$('.selected_competencies').each(function(){
  selected_competency.push(this.value);
});
var tableCompetencies = $('#datatableCompetency').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: baseURL+'competency/get_competency',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'name'},
        {data: 'id', visible: false, searchable: false, className: 'never'}
    ],
    rowCallback: function(row, data){
        if($.inArray(data.id, selected_competency) !== -1){
          $(row).addClass('selected');
        }
        //console.log(selected_competency);
    },
    order: [[1, 'asc']],
    dom: 'Bfrtip',
    buttons: []
});

tableCompetencies.on('click', 'tr', function(){
    //var id = this.id;
    var id = tableCompetencies.row(this).data().id;
    var index = $.inArray(id, selected_competency);
    if ( index === -1 ) {
        selected_competency.push(id);
        $('#table-selected-competencies').append(
              '<tr id="tr_competency_'+id+'">'+
                '<td>'+
                  '<input type="hidden" name="competency_id[]" value="'+id+'" />'+
                  tableCompetencies.row(this).data().name+
                '</td>'+
              '</tr>'
        );
    } else {
        selected_competency.splice( index, 1 );
        $('.tr_competency_'+id).remove();
    }

    $(this).toggleClass('selected');
    
    //console.log(selected_competency);
} );

$('#btn-set-competencies').on('click', function(){
  if(selected_competency.length !== 0){
    $('#tr-no-competency-selected').hide();
  }
  else{
    $('#tr-no-competency-selected').show(); 
  }
  $('#modal-display-competencies').modal('hide');
});


$('#btn-display-competency-datatables').on('click', function(event){
  event.preventDefault();
  $('#modal-display-competencies').modal('show');
});

//ENDBlock Competency selection

$('#form-certification').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    // event.preventDefault();
    var data = new FormData($('#form-certification')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'djk_management/certification/update',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                $('#form-certification')[0].reset();
                alertify.success("Update data Success");
                //window.location.reload();
            }
            else{
                alertify.error(obj.msg);
                //console.log(response);
            }
       }
    });
});

