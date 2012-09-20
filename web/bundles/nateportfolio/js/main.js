// Parallax scrolling
$(window).scroll(function(e) {
    $('body').css('backgroundPositionY', - $(this).scrollTop() / 3);
});