/**
 * Created by jhara on 2016-10-19.
 */

var url = document.location.pathname;
if (url === '/futf/futfhemsida/public/') {
    $('#id_företag').show();
    //alert('show local');
} else if (url === '/') {
    $('#id_företag').show();
    //alert('show else');
} else {
    $('#id_företag').hide();
    //alert('hide all');
}







var removeDate;
var dateAdded;
var width;
var currentDate;
var image;
var dynamicCompany;
var body;

dynamicCompany = document.getElementById('dynamicCompany');
dynamicCompany.innerHTML = '<input type="file"/><img id="imageUpload" src="#" style="height: 100%;"/>';
document.getElementById("imageUpload").style.width = getWidth()-2 + "px";
//document.getElementById('#multi_file_upload').onclick = addCompany(e);

function addCompany(e) {
    body = document.getElementsByTagName('bodyOfDiv');
    dateAdded = new Date(new Date().setFullYear(new Date().getFullYear()));
    removeDate = new Date(new Date().setFullYear(new Date().getFullYear() + 1));
    e.preventDefault();
    document.body.innerHTML += '<div style="position:absolute;width:100%;height:100%;opacity:0.3;z-index:100;background:#000;"></div>';
}

function getWidth(){
    return document.getElementById("id_företag").offsetWidth;
}

function displayCompany() {
    width = getWidth();
}
function getCompanyImage() {
    return image;
}

function checkCompany() {
    currentDate = new Date(new Date().setFullYear(new Date().getFullYear()));
    if(currentDate>=removeDate) {
        removeCompany(getCompanyImage())
    }
}

function removeCompany(image) {
    image.parentNode.removeChild(image);
}


//Upload company image below
$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#imageUpload').attr('src', e.target.result);
};