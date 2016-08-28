// tinyMCE.init({
//     selector: 'textarea',
// });
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
        url: 'page_profile/get_page_profile',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'title'},
        {data: 'slug'},
        {data: 'type'},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
        	return '<a title="Edit" href="page_profile/edit/?id='+row.id+'" class="btn btn-sm btn-success" data-id="' + row.id + '"><i class="fa fa-edit"></i></a>'+
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
    $('#form-page_profile')[0].reset();
    $('#btn-add').removeClass('collapse');
    //remove value of input id
    $('#page_profile-id').val('');
});

//## Delete News Eventprocess --
$('#dtPageProfile').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#page_profile_id').val(d.id);
    $('#modal-delete-page_profile').modal('show');
});


$('#form-page_profile').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    // event.preventDefault();
    var data = new FormData($('#form-page_profile')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'page_profile/save',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                window.location.reload();
            }
            else{
                alertify.error(obj.msg);
            }
       }
    });
});

$('#form-delete-page_profile').on('submit', function(event){
    event.preventDefault();
    $.post('page_profile/delete', $("#form-delete-page_profile").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtPageProfile .table').DataTable().ajax.reload();
            $('#modal-delete-page_profile').modal('hide');
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

    return false;
});

$('#file-to-upload-display').hide();
$('#type').on('change', function(){
    var page_type = $(this).val();
    if(page_type =='files'){
        $('#content-display').hide();
        $('#file-to-upload-display').show();
    }
    else{
        $('#content-display').show();
        $('#file-to-upload-display').hide();
    }
});