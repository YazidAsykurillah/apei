$('#btn-add').click(function(){
    $('#form-container').slideDown("slow");
    //$(this).addClass('collapse');
});

$('#btnReset').click(function(){
    $('#form-container').slideUp("slow");
    $('#form-upload-photo')[0].reset();
    $('#btn-add').removeClass('collapse');
    
});

$('#form-upload-photo').on('submit', function(event){
    event.preventDefault();
    var data = new FormData($('#form-upload-photo')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'gallery/album/upload_photo',
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


$('.btn-delete-photo').on('click', function(event){
    event.preventDefault();
    var id = $(this).attr('data-id');
    $('#photo_id').val(id);
    $('#modal-delete-photo').modal('show');
});

$('#form-delete-photo').on('submit', function(event){
    event.preventDefault();
    $.post(baseURL+'gallery/album/delete_photo', $("#form-delete-photo").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#modal-delete-photo').modal('hide');
            window.location.reload();
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });
    
    return false;
});