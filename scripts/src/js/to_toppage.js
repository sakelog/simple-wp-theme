function getScrolled() {
    return window.pageYOffset !== undefined
        ? window.pageYOffset
        : document.documentElement.scrollTop;
}
var topbutton = document.getElementById('to_page_top');
function scrollToTop() {
    var scrolled = getScrolled();
    window.scrollTo(0, 0);
}
topbutton.onclick = function () {
    scrollToTop();
};
