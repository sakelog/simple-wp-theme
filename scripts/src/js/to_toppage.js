var target = document.getElementById('to_page_top');
var duration = 500;
target.addEventListener('click', function () {
    var currentY = window.pageYOffset;
    var step = duration / currentY > 1 ? 10 : 100;
    var timeStep = duration / currentY * step;
    var intervalID = setInterval(scrollUP, timeStep);
    function scrollUP() {
        currentY = window.pageYOffset;
        if (currentY === 0) {
            clearInterval(intervalID);
        }
        else {
            scrollBy(0, -step);
        }
    }
});
