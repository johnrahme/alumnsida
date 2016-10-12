/**
 * Created by jhara on 2016-10-06.
 */
function startTime() {
    date = new Date;
    month = date.getMonth();
    months = new Array('jauari', 'februari', 'mars', 'april', 'maj', 'juni', 'juli', 'augusti', 'september', 'oktober', 'november', 'december');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Söndag', 'Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag');
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('date_timer').innerHTML =
        days[day] + 'en den ' + d + ' ' + months[month] + ' <br> ' + h + ':' + m + ':' + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}