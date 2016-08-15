var table = $('#datatable-buttons').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: false,
    scrollX: "100%",
    ajax: {
        url: 'user_course/get_user_course',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'start_date'},
        {data: 'end_date'},
        {data: 'institution_name'},
        {data: 'description'},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
        	return '<a title="Edit" href="#" class="btn btn-sm btn-warning" data-id="' + row.id + '"><i class="fa  fa-pencil"></i></a>';
        }},
        {data: 'id', visible: false, searchable: false, className: 'never'},
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

$('#btnReset').click(function(){
	$('#form-container').slideUp("slow");
	$('#form-user-course')[0].reset();
	$('#btn-add').removeClass('collapse');
	//remove value of input id
	$('#user-course-id').val('');
});

$('#dtUserCourse').on('click', 'a[title~=Edit]', function (e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#user-course-id').val(d.id);
    $('#start_date').val(d.start_date);
    $('#end_date').val(d.end_date);
    $('#institution_name').val(d.institution_name);
    $('#description').val(d.description);
    $('#form-container').slideDown('slow');
    
});

$('#form-user-course').on('submit', function(event){
	event.preventDefault();
	if($('#user-course-id').val() != ''){
		//--- Edit Mode
		var id = $('#user-course-id').val();
	    $.post('user_course/update_user_course', $("#form-user-course").serialize()+ "&id=" + id, function (obj) {
	        if (obj.msg == 'success') {
	            alertify.success("Update Data Success");
	            $('#form-user-course')[0].reset();
				$('#form-container').slideUp('slow');
	            $('#dtUserCourse .table').DataTable().ajax.reload();
	            //remove value of input id
	            $('#user-course-id').val('');
	        }else{
	            alertifyError(obj.msg);

	        }
	    }, "json").fail(function () {
	        alertifyError();
	    });
	}	
	else{
		//--- Insert
	    $.post('user_course/save_user_course', $("#form-user-course").serialize(), function (obj) {
	        if (obj.msg == 'success') {
	            alertify.success("Insert Data Success");
	            $('#form-user-course')[0].reset();
				$('#form-container').slideUp('slow');
	            $('#dtUserCourse .table').DataTable().ajax.reload();
	            //remove value of input id
	            $('#user-course-id').val();
	            
	        } else {
	            alertifyError(obj.msg);

	        }
	    }, "json").fail(function () {
	        alertifyError();
	    });
	}
	
	return false;
});


$('#start_date').daterangepicker({
	"singleDatePicker": true,
	"showDropdowns": true

});
$('#end_date').daterangepicker({
	"singleDatePicker": true,
	"showDropdowns": true

});
