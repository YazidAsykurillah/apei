
var table = $('#datatable-buttons').DataTable({
	serverSide: true,
    processing: true,
    autoWidth: false,
    scrollX: "100%",
    ajax: {
        url: 'member/get_member',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'name'},
        {data: 'email'},
        {data: 'foto_file', render:function(data, type, row, meta){
        	var host = window.location.origin;
        	return '<img src="'+host+'/apei/uploads/'+data+'" class="img-thumbnail" >';
        }},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
        	return row.birth_place+','+' '+row.birth_date;
        }},
        {data:'status', render:function(data, type, row, met){
        	var status_display = '';
        	if(data == 'ak'){
        		status_display = 'Approved';
        	}
        	else{
        		status_display = 'N/A';
        	}
        	return status_display;
        }},
        {data: 'id', render:function(data, type, row, meta){
        	$("body").data("R" + row.id, row);
        	return '<a title="Approve" href="#" class="btn btn-sm btn-success" data-id="' + row.id + '"><i class="fa fa-check-circle"></i></a>';
        }},
        {data: 'id', visible: false, searchable: false, className: 'never'},
        {data: 'birth_place', visible: false, searchable: false, className: 'never'},
        {data: 'birth_date', visible: false, searchable: false, className: 'never'},
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


$('#dtMember').on('click', 'a[title~=Approve]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#member_id').val(d.id);
    $('#modal-approve').modal('show');

    
});


$('#form-approve-member').on('submit', function(event){
	event.preventDefault();
	if($('#member_id').val() != ''){
		//--- Approve Member
	    $.post('member/approve', $("#form-approve-member").serialize(), function (obj) {
	        if (obj.msg == 'success') {
	            $('#form-approve-member')[0].reset();
				$('#form-container').slideUp('slow');
	            $('#dtMember .table').DataTable().ajax.reload();
	            $('#modal-approve').modal('hide');
	            alertify.success("Approval sukses");
	        }else{
	            alertifyError(obj.msg);

	        }
	    }, "json").fail(function () {
	        alertifyError();
	    });
	}	
	else{
		alertify.error("You did not select any member");
	}
	
	return false;
});
