$(function () {
    var tbody_f = document.querySelectorAll('.table-fixed tbody');
    for (var i = 0; i < tbody_f.length; i++) {
        const ps2 = new PerfectScrollbar(tbody_f[i], {
            wheelSpeed: 0.1,
            minScrollbarLength: 90
        });
    }
});


$(document).ready(function () {
    $(document).on('keyup', "input[name='chargeRegister']", function (e) {
        Events.separateComma($(this));
    });
    
     $(document).on('keyup', "input[name='chargeCreate']", function (e) {
        Events.separateComma($(this));
    });
    
});
