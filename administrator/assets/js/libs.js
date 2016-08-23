function revDate(mystr,splitt,delimiter) {
    splitt  = splitt || "-";
    delimiter = delimiter || "-";
    if (mystr != null) {
        var myarr = mystr.split(splitt);
        myarr = myarr[2] + delimiter + myarr[1] + delimiter + myarr[0];
        return myarr;
    } else {
        return null;
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}

function errMsg(err) {
    err =  (err == undefined) ? "Error Connection" : "Error : " + err ;
    alertify.error(err);
    $(':submit').removeAttr('disabled');
}

function checkUnreadMessage() {
        //BLOCK CHECK UNREAD MESSAGE
    $.ajax({
        url: baseUrl + 'messages/cekUnreadMsg',
        type:'post',
        success:function(resp){
            var data = JSON.parse(resp);
            if(data.count > 0){
                var badge = '<span class="badge msg-count pull-right" style="background:#337ad2;margin-right:10px;">'+data.count+'</span>';
                $('span.msg-count').remove();
                $('a#2082').append(badge);                
            }
        }
    });
    //ENDBLOCK CHECK UNREAD MESSAGE
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function delCommas(nStr) {
    nStr += '';
    x1 = nStr.replace(/,/g, '');
    return x1;
}

(function ($) {
    checkUnreadMessage();
    $(".chzn-select").chosen({no_results_text: "Nothing found!"});
    $('.uniform').uniform();
    $(".dp").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $(".dpM").datepicker({
        format: "mm-yyyy",
        autoclose: true,
        minViewMode: 1
    });
    $(".dpMo").datepicker({
        format: "MM-yyyy",
        autoclose: true,
        minViewMode: 1
    });
    $(".dpY").datepicker({
        format: "yyyy",
        autoclose: true,
        minViewMode: 2
    })
    $(":input").inputmask();
    
    $.fn.sel2psi = function (formatResult, formatSelection, addParm) {
        var theSelect2 = this;
        var select2Config = {};
        if (theSelect2.data('ajax')) {
            select2Config.ajax = {
                'type': 'POST',
                'url': baseUrl + theSelect2.data('url'),
                'dataType': (theSelect2.data('datatype') ? theSelect2.data('datatype') : 'JSON'),
                'delay': (theSelect2.data('delay') ? theSelect2.data('delay') : 250),
                'data': (theSelect2.data('fnData') ? theSelect2.data('fnData') : function (params) {
                    return {
                        q: (params.term != undefined) ? params.term : '',
                        page: params.page,
                        addParm: addParm,
                        limit: theSelect2.data('limit') ? theSelect2.data('limit') : 10
                    }
                }),
                processResult: (theSelect2.data('fnProcessResult') ? theSelect2.data('fnProcessResult') : function (data, page) {
                    return {
                        results: data.items
                    };
                }),
                cache: (theSelect2.data('cache') ? theSelect2.data('cache') : true)
            };
        }
        ;
        if (formatResult != undefined) {
            select2Config.templateResult = formatResult;
            select2Config.templateSelection = formatSelection;
            select2Config.escapeMarkup = function (markup) {
                return markup;
            };
        }
        select2Config.allowClear = (theSelect2.data('allowclear') == "0") ? false : true;
        select2Config.minimumInputLength = theSelect2.data('mininputlength') ? theSelect2.data('mininputlength') : -1;
        var thDefaultValue = theSelect2.data('value');
        var initSelection = function () {

        };
        if (typeof (thDefaultValue) !== 'undefined' && String(thDefaultValue).length > 0) {
            select2Config.initSelection = function (elm, calb) {
                return $.ajax({
                    type: "POST",
                    url: baseUrl + theSelect2.data('url'),
                    dataType: 'json',
                    data: {
                        id: thDefaultValue,
                        action: 'initSelection'
                    },
                    success: function (data) {
                        calb(data);
                    }
                });
            };
        }
        theSelect2.select2(select2Config);
        return theSelect2;
    };
    var theSelectDOMopt = $("select.select2");
    var objSelect2 = [];
    theSelectDOMopt.each(function (key, val) {
        $(theSelectDOMopt[key]).sel2psi();
    });

    $.fn.selDTpsi = function (t, uRLDelete) {
        var selDT = this;
        //--- Select Row
        selDT.on('click', 'tr td', function () {
            if ($(this).parent().find("td").length < 3) {
                $(this).parent().toggleClass('selected');
            } else {
                if (!$(this).is(":last-child")) {
                    $(this).parent().toggleClass('selected');
                }
            }
            return selDT;
        });
        //--- Toogle
        selDT.find("a[title~=Toggle]").click(function (e) {
            e.preventDefault();
            $('tr', selDT).toggleClass('selected');
        });
        //--- Delete
        selDT.find("a[title~=Delete]").click(function (e) {
            e.preventDefault();
            var dr = t.rows('.selected').data();
            if (dr.length == 0) {
                alertify.error("Please select row");
                return false;
            }
            alertify.set({buttonFocus: "cancel"});
            alertify.confirm(dr.length + " rows data will be delete", function (e) {
                if (e) {
                    var id = [];
                    $.each(dr, function (i, val) {
                        id[i] = val.id;
                    });
                    $.post(uRLDelete, {id: JSON.stringify(id)}, function (obj) {
                        if (obj.msg == 1) {
                            t.ajax.reload();
                            alertify.success("Delete Data Success");
                        } else {
                            alertify.error("Error : " + obj.msg);
                        }
                    }, "json").fail(function () {
                        alertify.error("Error Connection");
                    });
                }
            });
        });
    };
    
    $('.input-num').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
        e.which <= 0 || // arrow keys
        e.which == 8 || // delete key
        /[0-9.,]/.test(String.fromCharCode(e.which)); // numbers
    })

})(jQuery);