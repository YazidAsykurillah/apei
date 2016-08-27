// tinyMCE.init({
//     selector: 'textarea',
// });
$('#vission_mission').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['link','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 300,

});
$('#form-company-vission_mission').on('submit', function(event){
	event.preventDefault();
	// tinyMCE.triggerSave();
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
