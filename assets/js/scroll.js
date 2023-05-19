$(function() {
    var header = $('#header'),
        introH = $('#intro').innerHeight(),
        scrollOffset = $(window).scrollTop();
    
    $(window).on("scroll", function() {
        scrollOffset = $(this).scrollTop();
        checkScroll(scrollOffset);
    });

    function checkScroll(scrollOffset) {
        if(scrollOffset >= introH) {
            header.addClass('fixed');
        }
        else {
            header.removeClass('fixed');
        }
    }
    $("[data-scroll]").on("click", function(event) {
        event.preventDefault();
        $("#burger").removeClass("active");
        $("#nav").removeClass("active");

        var blockId = $(this).data('scroll'),
            blockOffset =  $(blockId).offset().top;

        $("html, body").animate({
            scrollTop: blockOffset
        }, 500);
    });
});