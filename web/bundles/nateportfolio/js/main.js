// Parallax scrolling
$(window).scroll(function(e) {
    $('body').css('backgroundPositionY', - $(this).scrollTop() / 3);
});

$(document).ready(function(){
    setTimeout(function(){ update_bottom_padding(); }, 5000);
});

$(window).resize(function(e) {
    update_bottom_padding();
});

function update_bottom_padding() {
    console.log('doin it');
    var magick = 400;
    var padding = $(window).height() - $('.portfolio-entry-item:last').height() - magick;
    $('#content .col2').css('paddingBottom', padding);
}