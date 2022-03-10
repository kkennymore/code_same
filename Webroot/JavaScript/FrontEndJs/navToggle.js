//=========mobile menu toggle=========
function showMobileMenuToggle() {
    document.getElementById("mobile_page_wrap").style.display = "block";
    document.getElementById("pbm-front-mobile").style.display = "none";
}
//=========mobile menu toggle=========
function hideMobileMenuToggle() {
    document.getElementById("mobile_page_wrap").style.display = "none";
    document.getElementById("pbm-front-mobile").style.display = "grid";
}
//====show more menu ===============
function showMoreNavs(id) {
    var header_more_menu = document.getElementById(id);
    if (header_more_menu.style.display == "block") {
        header_more_menu.style.display = "none";
        document.getElementById("pbm-minus").style.display = "none";
        document.getElementById("pbm-caret-down").style.display = "inline";
    } else {
        header_more_menu.style.display = "block";
        document.getElementById("pbm-minus").style.display = "inline";
        document.getElementById("pbm-caret-down").style.display = "none";
    }
}

var ellipse_mobile_icon = document.querySelector(".ellipse_mobile_icon");

var bottom_mobile_menu = document.querySelector(".bottom-mobile-menu");
bottom_mobile_menu.style.display = "none";
ellipse_mobile_icon.style.paddingRight = "20px";
ellipse_mobile_icon.addEventListener("click", (e) => {
    if (bottom_mobile_menu.style.display == "none") {
        bottom_mobile_menu.style.display = "block";
        ellipse_mobile_icon.innerHTML = '<i class="fas fa-times"></i>';
        ellipse_mobile_icon.style.color = "#bc5fa4";
    } else {
        bottom_mobile_menu.style.display = "none";

        ellipse_mobile_icon.innerHTML =
            '<i class="fa fa-ellipsis-v" aria-hidden="true"></i>';
    }
});

//===========PWA LANGUAGE TOGGLE=============//

//==========SIDEBAR MENU TOGGLING===================//
var side_bar_toggle = document.querySelector(".subcatsidesorting");
var sidebar = document.querySelector(".sidebar");
sidebar.style.display = "block";
if (window.matchMedia("(max-width: 1100px) AND (min-width: 10px)").matches) {
    sidebar.style.display = "none";
}
side_bar_toggle.addEventListener("click", () => {
    if (sidebar.style.display == "none") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
});

//=========PRODUCT LAYOUT Displace
var layout = document.querySelector(".layout-selector");
layout.addEventListener("click", (e) => {
    var data = new FormData();
    data.append("layout", "layoutValue");
    ajaxSend(data, "/category/layoutswitch/");
});