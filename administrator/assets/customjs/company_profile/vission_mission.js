tinyMCE.init({
    selector: 'textarea',
});

$('#form-company-vission_mission').on('submit', function(event){
	event.preventDefault();
	tinyMCE.triggerSave();
	//--- Save company vission_mission
    $.post('company_profile/save_vission_mission', $("#form-company-vission_mission").serialize(), function (obj) {
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
