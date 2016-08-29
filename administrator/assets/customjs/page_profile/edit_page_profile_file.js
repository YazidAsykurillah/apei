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


$('#form-edit-page_profile').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    // event.preventDefault();
    var data = new FormData($('#form-edit-page_profile')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'page_profile/update_page_file_type',
        data    :data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache   : false,
        processData: false,
        success:function(response){
            var obj = $.parseJSON(response);
            if(obj.msg == 'success'){
                alertify.success('Sukses merubah data');
                //window.location.reload();
            }
            else{
                alertify.error(obj.msg);
            }
       }
    });
});
