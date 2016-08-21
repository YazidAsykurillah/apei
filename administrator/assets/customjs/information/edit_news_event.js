tinyMCE.init({
    selector: 'textarea',
});


$('#form-edit-news_event').on('submit', function(event){
    event.preventDefault();
    tinyMCE.triggerSave();
    //--- Insert
    $.post(baseURL+'information/news_event/update', $("#form-edit-news_event").serialize(), function (obj) {
        if (obj.msg == 'success') {
            //alertify.success("Update Data Success");
            window.location.href = baseURL+'information/news_event';
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });
    
    return false;
});



