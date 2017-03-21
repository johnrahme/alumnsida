/**
 * Created by jhara on 2016-10-19.
 *
 * Gör samarbetspartnerfönstret
 * endast synligt på startsidan.
 *
 */

var url = document.location.pathname;
if (url === '/futf/futfhemsida/public/') {
    // för att den ska fungera lokalt
    $('#id_företag').show();
} else if (url === '/') {
    // för att den ska fungera globalt
    $('#id_företag').show();
} else {
    $('#id_företag').hide();
}