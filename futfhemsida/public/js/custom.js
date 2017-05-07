/**
 * Created by jhara on 2017-05-07.
 */

var url = document.location.pathname;
if (url === '/futf/futfhemsida/public/' || '/futf/futfhemsida/public/events') {
    // för att den ska fungera lokalt
    $('#id_sidemenuPanel').hide();
} else if (url === '/' || 'events') {
    // för att den ska fungera globalt
    $('#id_sidemenuPanel').hide();
} else {
    $('#id_sidemenuPanel').show();
}