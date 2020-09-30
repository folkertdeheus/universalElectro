window.onscroll = function() {scrollFunction()};

function scrollFunction() {

    var headerimage = document.getElementById("headerimage");
    var headerleft = document.getElementById("headerleft");
    var headermain = document.getElementById("headermain");
    var menu = document.getElementById("menu");

    var viewportwidth = window.innerWidth;

    // Values for most screen widths
    var hiWidth = "100%";
    var mHeight = "100%";
    var hiMargin = "none";
    var hlHeight = "100%";
    var hmHeight = "100%";
    var hlBackground = "none";

    if (viewportwidth >= 1200) {
        // Default size
        var hmFontSize = "50px";
        var hmLineHeight = "100px";

    } else if (viewportwidth >= 800) {
        // Small screen/tablet size
        var hmFontSize = "40px";
        var hmLineHeight = "100px";

    } else if (viewportwidth >= 600) {
        // Big phone/small tablet size
        var hmFontSize = "35px";
        var hmLineHeight = "100px";

    } else {
        // Small phone size
        var hiWidth = "150px";
        var hlBackground = "url(images/background.png) no-repeat bottom 25% left 50% cover";
        var hmFontSize = "35px";
        var hmLineHeight = "50px";
    }
    
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    
        headerimage.style.width = "50px";
        headerimage.style.margin = "0 auto";
        headerleft.style.height = "50px";
        headerleft.style.backgroundColor = "rgba(35, 31, 32, 1)";
        headermain.style.height = "50px";
        headermain.style.fontSize = "30px";
        headermain.style.lineHeight = "50px";
        menu.style.height = "50px";

    } else {
    
        headerimage.style.width = hiWidth;
        headerimage.style.margin = hiMargin;
        headerleft.style.height = hlHeight;
        headerleft.style.background = hlBackground;
        headermain.style.height = hmHeight;
        headermain.style.fontSize = hmFontSize;
        headermain.style.lineHeight = hmLineHeight;
        menu.style.height = mHeight;
    
    }
} 