tinyMCE.init({
    selector: 'textarea',
});


$('#form-edit-news_event').on('submit', function(event){
    event.preventDefault();
    tinyMCE.triggerSave();
    event.preventDefault();
    var data = new FormData($('#form-edit-news_event')[0]);
    $.ajax({
        type    :"POST",
        url     :baseURL+'information/news_event/update',
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
    var news_event_id = $(this).attr('data-id');
    $.ajax({
        type    :"POST",
        url     :baseURL+'information/news_event/remove_feature_image',
        data    :'news_event_id='+news_event_id,
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



