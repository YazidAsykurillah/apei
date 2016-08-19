tinyMCE.init({
    selector: 'textarea',
});

$('#form-company-org_structure').on('submit', function(event){
	event.preventDefault();
	tinyMCE.triggerSave();
	//--- Save company org_structure
    $.post('company_profile/save_org_structure', $("#form-company-org_structure").serialize(), function (obj) {
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
