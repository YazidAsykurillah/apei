var table = $('#datatable-buttons').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: false,
    scrollX: "100%",
    ajax: {
        url: 'profile/get_user_certification',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'registration_number'},
        {data: 'certificate_number'},
        {data: 'division_id'},
        {data: 'subdivision_id'},
        {data: 'competence_unit'},
        {data: 'level'},
        {data: 'validity_period'},
        {data: 'id', visible: false, searchable: false, className: 'never'},
        {data: 'user_id', visible: false, searchable: false, className: 'never'},
    ],
    order: [[1, 'asc']],
	dom: 'Bfrtip',
	buttons: [{
		extend: "csv",
		className: "btn-sm",
		text:'<i class="fa fa-file-text-o"></i>',
		titleAttr: 'CSV'
	}, {
		extend: "excel",
		className: "btn-sm",
		text:'<i class="fa fa-file-excel-o"></i>',
		titleAttr: 'Excel'
	}, {
		extend: "pdf",
		className: "btn-sm",
		text:'<i class="fa fa-file-pdf-o"></i>',
		titleAttr: 'PDF'
	}, {
		extend: "print",
		className: "btn-sm",
		text:'<i class="fa fa-print"></i>',
		titleAttr: 'Print'
	}]
});

$('#btn-add').click(function(){
	$('#form-container').slideDown("slow");
	//$(this).addClass('collapse');
});

$('#reset').click(function(){
	$('#form-container').slideUp("slow");
	$('#form-user-certification')[0].reset();
	$('#btn-add').removeClass('collapse');
});

function edit_form(){
	$('#form-container').slideDown('slow');
	//$('#btn-add').addClass('collapse');
}


$('#form-user-certification').on('submit', function(event){
	event.preventDefault();
	//--- Insert
    $.post('profile/save_user_certification', $("#form-user-certification").serialize(), function (obj) {
        if (obj.msg == 1) {
            alertify.success("Insert Data Success");
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

});



