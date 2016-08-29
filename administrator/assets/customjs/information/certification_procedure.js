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
console.log($('#content').text());
$('#form-certification_procedure').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    //--- Insert
    $.post(baseURL+'information/certification_procedure/update', $("#form-certification_procedure").serialize(), function (obj) {
        if (obj.msg == 'success') {
            //alertify.success("Update Data Success");
            window.location.href = baseURL+'information/certification_procedure';
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

    return false;
});
