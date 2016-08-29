$('#content').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['picture','link','video','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 300,

});


$('#form-edit-scope').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    event.preventDefault();
    var data = new FormData($('#form-edit-scope')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'scope/update',
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


$('#btn-remove-feature-image').on('click', function(event){
    event.preventDefault();
    var scope_id = $(this).attr('data-id');
    $.ajax({
        type    :"POST",
        url     :baseURL+'scope/remove_feature_image',
        data    :'scope_id='+scope_id,
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
