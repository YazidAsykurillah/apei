$('#content').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['picture','link','video','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 300,

});
var table = $('#datatable').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: true,
    scrollX: "100%",
    ajax: {
        url: 'information/get_information',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'title', render:function(data, type, row, meta){
            $("body").data("R" + row.id, row);
            return '<a href="'+baseURL+'information/detail/?id='+row.id+'" class="btn btn-link" title="Klik untuk melihat detail"><i class="fa fa-link"></i>&nbsp;'+data+'</a>';
        }},
        {data: 'display_status', render:function(data){
            if(data == 'displayed'){
                return 'Displayed';
            }
            else{
                return 'Hidden';
            }
        }},
        {data: 'poster_name'},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
        	return '<a title="Edit" href="information/edit/?id='+row.id+'" class="btn btn-sm btn-success" data-id="' + row.id + '"><i class="fa fa-edit"></i></a>'+
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
    $('#form-information')[0].reset();
    $('#btn-add').removeClass('collapse');
    //remove value of input id
    $('#information-id').val('');
});

//## Delete News Eventprocess --
$('#dtInformation').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#information_id').val(d.id);
    $('#modal-delete-information').modal('show');
});


$('#form-information').on('submit', function(event){
    event.preventDefault();
    var data = new FormData($('#form-information')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'information/save',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                $('#dtInformation .table').DataTable().ajax.reload();

                $('#form-information')[0].reset();
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

$('#form-delete-information').on('submit', function(event){
    event.preventDefault();
    $.post('information/delete', $("#form-delete-information").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtInformation .table').DataTable().ajax.reload();
            $('#modal-delete-information').modal('hide');
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

    return false;
});
