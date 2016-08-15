var table = $('#datatable-buttons').DataTable({
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
	$(this).addClass('collapse');
});

$('#reset').click(function(){
	$('#form-container').slideUp("slow");
	$('#form-dokter')[0].reset();
	$('#btn-add').removeClass('collapse');
});

function edit_form(){
	$('#form-container').slideDown('slow');
	$('#btn-add').addClass('collapse');
}
