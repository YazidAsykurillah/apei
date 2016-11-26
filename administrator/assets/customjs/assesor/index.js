var table = $('#datatable').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: true,
    scrollX: "100%",
    ajax: {
        url: 'assesor/get_assesors',
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
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
        	return '<a title="Edit" href="assesor/edit/?id='+row.id+'" class="btn btn-sm btn-success" data-id="' + row.id + '"><i class="fa fa-edit"></i></a>'+
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
    $('#form-assesor')[0].reset();
    $('#btn-add').removeClass('collapse');
    //remove value of input id
    $('#assesor-id').val('');
});

//## Delete News Eventprocess --
$('#dtassesor').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#assesor_id').val(d.id);
    $('#modal-delete-assesor').modal('show');
});


$('#form-assesor').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    // event.preventDefault();
    var data = new FormData($('#form-assesor')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'assesor/save',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                $('#dtassesor .table').DataTable().ajax.reload();

                $('#form-assesor')[0].reset();
                $('#form-container').slideUp('slow');
                alertify.success("Insert data Success");
                //window.location.reload();
            }
            else{
                alertify.error(obj.msg);
            }
       }
    });
});

$('#form-delete-assesor').on('submit', function(event){
    event.preventDefault();
    $.post('assesor/delete', $("#form-delete-assesor").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtassesor .table').DataTable().ajax.reload();
            $('#modal-delete-assesor').modal('hide');
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

    return false;
});
