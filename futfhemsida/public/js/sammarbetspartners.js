/**
 * Created by jhara on 2016-10-19.
 */

var url = document.location.pathname;
if(url==='/futf/futfhemsida/public/'){
    $('#id_företag').show();
    //alert('show local');
} else if(url==='/'){
    $('#id_företag').show();
    //alert('show else');
} else {
    $('#id_företag').hide();
    //alert('hide all');
}

