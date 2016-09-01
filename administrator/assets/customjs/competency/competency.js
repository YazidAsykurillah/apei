// tinyMCE.init({
//     selector: 'textarea',
// });
$('#description').summernote({
     toolbar: [
          ['paragraph', ['style','ol','ul','paragraph','height']],
          ['fontStyle', ['fontname', 'fontsize', 'color','bold','italic','underline','strikethrough','superscript','subscript','clear']],
          ['Insert', ['link','table','hr']],
          ['misc',['fullscreen','codeview','undo','redo']]
     ],
     height: 300,
});

var table = $('#datatable').DataTable({
    serverSide: true,
    processing: true,
    autoWidth: true,
    scrollX: "100%",
    ajax: {
        url: 'competency/get_competency',
        type: 'POST'
    },
    columns: [
        {data: "#", orderable: false, searchable: false},
        {data: 'name'},
        {data: 'description'},
        {data: 'id', render:function(data, type, row, meta){
            $("body").data("R" + row.id, row);
            return '<a title="Edit" href="#" class="btn btn-sm btn-warning" data-id="' + row.id + '"><i class="fa  fa-pencil"></i></a>'+
                '<a title="Delete" href="#" class="btn btn-sm btn-danger" data-id="' + row.id + '"><i class="fa fa-trash"></i></a>';
        }},
/*      {data: 'id', visible: false, searchable: false, className: 'never'},*/
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
     $('#description').summernote('reset');
     $('#form-competency')[0].reset();
    $('#form-container').slideDown("slow");
    //$(this).addClass('collapse');
});

$('#btnReset').click(function(){
    $('#form-container').slideUp("slow");
    $('#description').summernote('reset');
    $('#form-competency')[0].reset();
    $('#btn-add').removeClass('collapse');
    //remove value of input id
    $('#competency_id').val('');
});

$('#dtCompetency').on('click', 'a[title~=Edit]', function (e){
    e.preventDefault();
    $('#description').summernote('reset');
    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#competency_id').val(d.id);
    $('#name').val(d.name);

    $('#description').summernote('code', d.description);
    $('#form-container').slideDown('slow');



});



$('#form-competency').on('submit', function(event){
    event.preventDefault();
    if($('#competency_id').val() != ''){
        //--- Edit Mode
        var id = $('#competency_id').val();
        $.post('competency/update', $("#form-competency").serialize()+ "&id=" + id, function (obj) {
            if (obj.msg == 'success') {
                alertify.success("Update Data Success");
                $('#form-competency')[0].reset();
                $('#form-container').slideUp('slow');
                $('#dtCompetency .table').DataTable().ajax.reload();
                //remove value of input id
                $('#competency_id').val('');
            }else{
                alertifyError(obj.msg);

            }
        }, "json").fail(function () {
            alertifyError();
        });
    }
    else{
        //--- Insert Mode
        $.post('competency/save', $("#form-competency").serialize(), function (obj) {
            if (obj.msg == 'success') {
                alertify.success("Insert Data Success");
                $('#form-competency')[0].reset();
                $('#form-container').slideUp('slow');
                $('#dtCompetency .table').DataTable().ajax.reload();
            } else {
                alertifyError(obj.msg);
            }
        }, "json").fail(function () {
            alertifyError();
        });
    }


    return false;
});


//## Delete competency --
$('#dtCompetency').on('click', 'a[title~=Delete]', function (e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var d = $("body").data("R" + id);
    $('#id_to_delete').val(d.id);
    $('#modal-delete-competency').modal('show');
});

$('#form-delete-competency').on('submit', function(event){
    event.preventDefault();
    $.post('competency/delete', $("#form-delete-competency").serialize(), function (obj) {
        if (obj.msg == 'success') {
            alertify.success("Sukses menghapus data");
            $('#dtCompetency .table').DataTable().ajax.reload();
            $('#modal-delete-competency').modal('hide');
        } else {
            alertifyError(obj.msg);
        }
    }, "json").fail(function () {
        alertifyError();
    });

    return false;
});

