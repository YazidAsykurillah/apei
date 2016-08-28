/*$('#description').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['link','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 100,
});*/
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
        url: 'slider/get_slider',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'file_name', render:function(data, type, row, meta){
            var host = window.location.origin;
            return '<img src="'+host+'/apei/uploads/'+data+'" class="thumbnail" style="width:auto;" >';
        }},
        {data: 'title'},
        {data: 'description'},
        {data: 'display_status'},
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
    //$('#description').summernote('reset');
    $('#form-slider')[0].reset();
    $('#form-container').slideDown("slow");
    //$(this).addClass('collapse');
});

$('#btnReset').click(function(){
    $('#form-container').slideUp("slow");
    //$('#description').summernote('reset');
    $('#form-slider')[0].reset();
    $('#original_photo').html('');
    $('#btn-add').removeClass('collapse');
    //remove value of input id
    $('#slider-id').val('');
});

$('#dtSlider').on('click', 'a[title~=Edit]', function (e){
    e.preventDefault();
    var host = window.location.origin;
    //$('#description').summernote('reset');
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#slider-id').val(d.id);
    $('#original_photo').html('<img src="'+host+'/apei/uploads/'+d.file_name+'" class="thumbnail" style="width:auto;" >');
    $('#title').val(d.title);
    //$('#description').summernote('code', d.description);
    $('#form-container').slideDown('slow');

});



$('#form-slider').on('submit', function(event){
    event.preventDefault();
    var slider_id = $('#slider-id').val();
    var data = new FormData($('#form-slider')[0]);
    if(slider_id ==''){
        //insert mode
        $.ajax({
            type    :"POST",
            url     :baseURL+'slider/save',
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

    }
    else{
        //update mode
        data.append('slider_id', slider_id);
        $.ajax({
            type    :"POST",
            url     :baseURL+'slider/update',
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
    }
    
    return false;
});


//## Delete slider --
$('#dtSlider').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#slider_id').val(d.id);
    $('#modal-delete-slider').modal('show');
});

$('#form-delete-slider').on('submit', function(event){
    event.preventDefault();
    $.post('slider/delete', $("#form-delete-slider").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtSlider .table').DataTable().ajax.reload();
            $('#modal-delete-slider').modal('hide');
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
