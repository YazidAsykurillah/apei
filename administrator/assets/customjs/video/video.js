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
        url: 'video/get_video',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'title', render:function(data, type, row, meta){
            $("body").data("R" + row.id, row);
            return data;
            //return '<a title="Detail" href="'+baseURL+'gallery/video/detail/'+row.id+'">'+data+'</a>';
        }},
        {data: 'description'},
        {data: 'youtube_url'},
        {data: 'embed_code'},
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
     $('#form-video')[0].reset();
     $('#description').summernote('reset');
    $('#form-container').slideDown("slow");
    //$(this).addClass('collapse');
});

$('#btnReset').click(function(){
    $('#form-container').slideUp("slow");
    $('#form-video')[0].reset();
    $('#btn-add').removeClass('collapse');
    $('#description').summernote('reset');
    //remove value of input id
    $('#video-id').val('');
});

$('#dtVideo').on('click', 'a[title~=Edit]', function (e){
    e.preventDefault();
    $('#description').summernote('reset');
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#video-id').val(d.id);
    $('#title').val(d.title);
    $('#description').summernote('code',d.description);
    $('#yt_url').val(d.youtube_url);
    
    $('#form-container').slideDown('slow');

});

$('#form-video').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    if($('#video-id').val() != ''){
        //--- Edit Mode
        var id = $('#video-id').val();
        $.post('video/update', $("#form-video").serialize()+ "&id=" + id, function (obj) {
            if (obj.msg == 'success') {
                alertify.success("Update Data Success");
                $('#form-video')[0].reset();
                $('#form-container').slideUp('slow');
                $('#dtVideo .table').DataTable().ajax.reload();
                //remove value of input id
                $('#video-id').val('');
            }else{
                alertifyError(obj.msg);

            }
        }, "json").fail(function () {
            alertifyError();
        });
    }
    else{
        //--- Insert Mode
        $.post('video/save', $("#form-video").serialize(), function (obj) {
            if (obj.msg == 'success') {
                alertify.success("Insert Data Success");
                $('#form-video')[0].reset();
                $('#form-container').slideUp('slow');
                $('#dtVideo .table').DataTable().ajax.reload();
            } else {
                alertifyError(obj.msg);
            }
        }, "json").fail(function () {
            alertifyError();
        });
    }


    return false;
});


//## Delete video --
$('#dtVideo').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#video_id').val(d.id);
    $('#modal-delete-video').modal('show');
});

$('#form-delete-video').on('submit', function(event){
    event.preventDefault();
    $.post('video/delete', $("#form-delete-video").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtVideo .table').DataTable().ajax.reload();
            $('#modal-delete-video').modal('hide');
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

    return false;
});
