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
        {data: 'supervisor_name'},
        {data: 'organizer'},
        {data: 'place'},
        {data: 'start_date'},
        {data: 'end_date'},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
            return  '<a title="View" href="'+baseURL+'djk_management/certification/detail/'+row.id+'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>'+
                    '<a title="Edit" href="certification/edit/'+row.id+'" class="btn btn-sm btn-warning" data-id="' + row.id + '"><i class="fa  fa-pencil"></i></a>'+
                    '<a title="Delete" href="#" class="btn btn-sm btn-danger" data-id="' + row.id + '"><i class="fa fa-trash"></i></a>';
        }},
        {data: 'supervisor_id', visible: false, searchable: false, className: 'never'},
/*      {data: 'id', visible: false, searchable: false, className: 'never'},*/
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
