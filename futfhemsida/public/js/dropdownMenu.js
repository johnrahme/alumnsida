/**
 * Created by jhara on 2016-11-27.
 */



/* Make function dropdownMenu only running when  is less than a certain pixels */
/* When the user clicks on the button, toggle between hiding and showing the dropdown content */
function dropdownMenu() {
    var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if(w <= 768) {
        document.getElementById("dropdownMenu").classList.toggle("show");
    }
    else {}
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdownmenu-content");
        for (var d = 0; d < dropdowns.length; d++) {
            var openDropdown = dropdowns[d];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}