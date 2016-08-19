tinyMCE.init({
    selector: 'textarea',
});

$('#form-company-background').on('submit', function(event){
	event.preventDefault();
	tinyMCE.triggerSave();
	//--- Save company background
    $.post('company_profile/save_background', $("#form-company-background").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses update latar belakang perusahaan");
        }else{
            alertifyError(obj.msg);

        }
    }, "json").fail(function () {
        alertifyError();
    });
	return false;
});
