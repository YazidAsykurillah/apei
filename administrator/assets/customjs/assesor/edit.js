$('#form-edit-assesor').on('submit', function(event){
    event.preventDefault();
    // tinyMCE.triggerSave();
    event.preventDefault();
    var data = new FormData($('#form-edit-assesor')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'assesor/update',
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


