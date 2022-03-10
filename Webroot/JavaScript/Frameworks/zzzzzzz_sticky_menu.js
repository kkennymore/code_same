//****************************************************************Sticky Menu**************************************//
window.onscroll = function() {
    menuHeaderStick()
};
var header = document.getElementById("header_sticky");
var sticky = header.offsetTop;
//=================This is to stick Basket to a position===============//
function menuHeaderStick() {
    if (window.pageYOffset > sticky) {
        header.classList.add("stickyMenu");
    } else {
        header.classList.remove("stickyMenu");
    }
}