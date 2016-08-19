tinyMCE.init({
    selector: 'textarea',
});

$('#form-company-functions').on('submit', function(event){
	event.preventDefault();
	tinyMCE.triggerSave();
	//--- Save company functions
    $.post('company_profile/save_functions', $("#form-company-functions").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Visi dan Misi perusahaan berhasil diperbarui");
        }else{
            alertifyError(obj.msg);

        }
    }, "json").fail(function () {
        alertifyError();
    });
	return false;
});
