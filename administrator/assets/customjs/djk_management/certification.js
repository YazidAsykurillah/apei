tinyMCE.init({
    selector: 'textarea',
});
$('#start_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true
});
$('#end_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true
});

var table = $('#datatable').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: true,
    scrollX: "100%",
    ajax: {
        url: 'certification/get_certification',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'title'},
        {data: 'description'},
        {data: 'accessor_name'},
        {data: 'supervisor_name'},
        {data: 'organizer'},
        {data: 'place'},
        {data: 'start_date'},
        {data: 'end_date'},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
            return '<a title="Edit" href="#" class="btn btn-sm btn-warning" data-id="' + row.id + '"><i class="fa  fa-pencil"></i></a>'+
                '<a title="Delete" href="#" class="btn btn-sm btn-danger" data-id="' + row.id + '"><i class="fa fa-trash"></i></a>';
        }},
/*        {data: 'id', visible: false, searchable: false, className: 'never'},*/
    ],
    order: [[1, 'asc']],
	dom: 'Bfrtip',
	buttons: [{
		extend: "csv",
		className: "btn-sm",
		text:'<i class="fa fa-file-text-o"></i>',
		titleAttr: 'CSV'
	}, {
		extend: "excel",
		className: "btn-sm",
		text:'<i class="fa fa-file-excel-o"></i>',
		titleAttr: 'Excel'
	}, {
		extend: "pdf",
		className: "btn-sm",
		text:'<i class="fa fa-file-pdf-o"></i>',
		titleAttr: 'PDF'
	}, {
		extend: "print",
		className: "btn-sm",
		text:'<i class="fa fa-print"></i>',
		titleAttr: 'Print'
	}]
});

$('#btn-add').click(function(){
    $('#form-container').slideDown("slow");
    //$(this).addClass('collapse');
});

$('#btnReset').click(function(){
    $('#form-container').slideUp("slow");
    $('#form-certification')[0].reset();
    $('#btn-add').removeClass('collapse');
    //remove value of input id
    $('#certification-id').val('');
});

$('#dtCertification').on('click', 'a[title~=Edit]', function (e){
    e.preventDefault();
    tinyMCE.triggerSave();
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#certification-id').val(d.id);
    $('#title').val(d.title);
    tinyMCE.get('description').setContent(d.description);
    $('#organizer').val(d.organizer);
    $('#place').val(d.place);
    $('#start_date').val(d.start_date);
    $('#end_date').val(d.end_date);
    $('#form-container').slideDown('slow');
    
});



$('#form-certification').on('submit', function(event){
    event.preventDefault();
    tinyMCE.triggerSave();
    if($('#certification-id').val() != ''){
        //--- Edit Mode
        var id = $('#certification-id').val();
        $.post('certification/update', $("#form-certification").serialize()+ "&id=" + id, function (obj) {
            if (obj.msg == 'success') {
                alertify.success("Update Data Success");
                $('#form-certification')[0].reset();
                $('#form-container').slideUp('slow');
                $('#dtCertification .table').DataTable().ajax.reload();
                //remove value of input id
                $('#certification-id').val('');
            }else{
                alertifyError(obj.msg);

            }
        }, "json").fail(function () {
            alertifyError();
        });
    }
    else{
        //--- Insert Mode
        $.post('certification/save', $("#form-certification").serialize(), function (obj) {
            if (obj.msg == 'success') {
                alertify.success("Insert Data Success");
                $('#form-certification')[0].reset();
                $('#form-container').slideUp('slow');
                $('#dtCertification .table').DataTable().ajax.reload();
            } else {
                alertifyError(obj.msg);
            }
        }, "json").fail(function () {
            alertifyError();
        });
    }
    
    
    return false;
});


//## Delete Certification --
$('#dtCertification').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#certification_id').val(d.id);
    $('#modal-delete-certification').modal('show');
});

$('#form-delete-certification').on('submit', function(event){
    event.preventDefault();
    $.post('certification/delete', $("#form-delete-certification").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtCertification .table').DataTable().ajax.reload();
            $('#modal-delete-certification').modal('hide');
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });
    
    return false;
});

$('#accessor_id').select2();
$('#supervisor_id').select2();