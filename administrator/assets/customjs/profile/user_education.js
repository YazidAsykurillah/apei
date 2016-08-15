var table = $('#datatable-buttons').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: false,
    scrollX: "100%",
    ajax: {
        url: 'user_education/get_user_education',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'start_date'},
        {data: 'end_date'},
        {data: 'school_name'},
        {data: 'title'},
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
	$('#form-user-education')[0].reset();
	$('#btn-add').removeClass('collapse');
	//remove value of input id
	$('#user-certification-id').val('');
});

$('#dtUserEducation').on('click', 'a[title~=Edit]', function (e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#user-certification-id').val(d.id);
    $('#start_date').val(d.start_date);
    $('#end_date').val(d.end_date);
    $('#school_name').val(d.school_name);
    $('#title').val(d.title);
    $('#form-container').slideDown('slow');
    
});

$('#form-user-education').on('submit', function(event){
	event.preventDefault();
	if($('#user-certification-id').val() != ''){
		//--- Edit Mode
		var id = $('#user-certification-id').val();
	    $.post('user_education/update_user_education', $("#form-user-education").serialize()+ "&id=" + id, function (obj) {
	        if (obj.msg == 'success') {
	            alertify.success("Update Data Success");
	            $('#form-user-education')[0].reset();
				$('#form-container').slideUp('slow');
	            $('#dtUserEducation .table').DataTable().ajax.reload();
	            //remove value of input id
	            $('#user-certification-id').val('');
	        }else{
	            alertifyError(obj.msg);

	        }
	    }, "json").fail(function () {
	        alertifyError();
	    });
	}	
	else{
		//--- Insert
	    $.post('user_education/save_user_education', $("#form-user-education").serialize(), function (obj) {
	        if (obj.msg == 'success') {
	            alertify.success("Insert Data Success");
	            $('#form-user-education')[0].reset();
				$('#form-container').slideUp('slow');
	            $('#dtUserEducation .table').DataTable().ajax.reload();
	            //remove value of input id
	            $('#user-certification-id').val();
	            
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
