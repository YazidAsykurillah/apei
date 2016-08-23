tinyMCE.init({
    selector: 'textarea',
});
$('#start_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true
});
$('#end_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true
});



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