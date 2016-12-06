var currSMin = 0;
var currSHour = 0;
var currEMin = 0;
var currEHour = 0;
var currSYear = 0;
var currSMonth = 0;
var currSDate = 0;
var currEYear = 0;
var currEMonth = 0;
var currEDate = 0;

var logic1 = function (ct) {
    currSHour = ct.getHours();
    currSMin = ct.getMinutes();
    currSYear = ct.getFullYear();
    currSMonth = ct.getMonth();
    currSDate = ct.getDate();

    if (currEYear == currSYear && currEMonth == currSMonth && currEDate == currSDate) {

        this.setOptions({

            maxDate: jQuery('#dateTimeTo').val() ? jQuery('#dateTimeTo').val() : false, formatDate: 'Y-m-d H:i',
            maxTime: currEHour + ":" + currEMin + "0", formatTime: 'H:i'
        });

    }
    else {
        this.setOptions({
            maxDate: jQuery('#dateTimeTo').val() ? jQuery('#dateTimeTo').val() : false, formatDate: 'Y-m-d H:i',
            maxTime: false
        });

    }
};
var logic2 = function (ct) {
    currEHour = ct.getHours();
    currEMin = ct.getMinutes();
    currEYear = ct.getFullYear();
    currEMonth = ct.getMonth();
    currEDate = ct.getDate();
    if (currEYear == currSYear && currEMonth == currSMonth && currEDate == currSDate) {
        this.setOptions({
            minDate: jQuery('#dateTimeFrom').val() ? jQuery('#dateTimeFrom').val() : false, formatDate: 'Y-m-d H:i',
            minTime: currSHour + ":" + currSMin + "0", formatTime: 'H:i'
        });
    }
    else {
        this.setOptions({
            minDate: jQuery('#dateTimeFrom').val() ? jQuery('#dateTimeFrom').val() : false, formatDate: 'Y-m-d H:i',
            minTime: false
        });

    }
};

jQuery(function () {
    jQuery('#dateTimeFrom').datetimepicker({
        format: 'Y-m-d H:i',
        onShow: logic1,
        onChangeDateTime: logic1
    });
    jQuery('#dateTimeTo').datetimepicker({
        format: 'Y-m-d H:i',
        onShow: logic2,
        onChangeDateTime: logic2
    });
    jQuery('#regFrom').datetimepicker({
        format: 'Y-m-d H:i'
    });
    jQuery('#regTo').datetimepicker({
        format: 'Y-m-d H:i'
    });
});
