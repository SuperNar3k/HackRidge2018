
function isElementInViewport(elem) {
    var $elem = $(elem);

    // Get the scroll position of the page.
    var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
    var viewportTop = $(scrollElem).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    // Get the position of the element on the page.
    var elemTop = Math.round( $elem.offset().top );
    var elemBottom = elemTop + $elem.height();

    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
}
$(document).ready(function(){
    $(window).scroll(function(){
        if(!$("#ourPurposeText").hasClass("animated") && $(window).scrollTop() + $(window).height() >= $("#ourPurposeText").scrollTop()){
            $("#ourPurposeText").addClass("animated");
            $("#ourPurposeText").fadeIn();
        }
    });
});