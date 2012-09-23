// Parallax scrolling
$(window).scroll(function(e) {
    $('body').css('backgroundPositionY', - $(this).scrollTop() / 20);

});

$(document).ready(function(){
    setTimeout(function(){ update_bottom_padding(); }, 5000);
});

$(window).resize(function(e) {
    update_bottom_padding();
});

function update_bottom_padding() {
    var magick = 440;
    var padding = $(window).height() - $('.portfolio-entry-item:last').height() - magick;
    $('#content .col2').css('paddingBottom', padding);
}