
$(window).scroll(function(e) {
    // Parallax scrolling
    var scrollTop = $(this).scrollTop();
    $('body').css('backgroundPositionY', - scrollTop / 20);

    update_card_alpha(scrollTop);
});

$(document).ready(function(){
    setTimeout(function(){ update_bottom_padding(); }, 5000);
    update_card_alpha();
});

$(window).resize(function(e) {
    update_bottom_padding();
});

function update_bottom_padding() {
    var magick = 400;
    var padding = $(window).height() - $('.portfolio-entry-item:last').height() - magick;
    $('#content .col2').css('paddingBottom', padding);
}

function update_card_alpha(scrollTop) {
    $('.portfolio-entry-item').each(function() {
        var distance = Math.abs(scrollTop - $(this).offset().top + 200);

        if (distance > 0) {
            $(this).css('opacity', 300/distance);
        } else  {
            $(this).css('opacity', 1);
        }
    });
}