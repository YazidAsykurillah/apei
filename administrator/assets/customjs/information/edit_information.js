$('#content').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['picture','link','video','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 300,

});

$('#form-information').on('submit', function(event){
    event.preventDefault();
    var data = new FormData($('#form-information')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'information/update',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                alertify.success("Berhasil memperbarui data");
                //window.location.reload();
            }
            else{
                alertify.error(obj.msg);
            }
       }
    });
});

