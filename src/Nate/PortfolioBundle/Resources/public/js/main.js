
var Site = (function(){

    var self = this;
    var isMobile = true;

    this.isMobile = function() {
        if (isMobile == null) {
            isMobile = navigator.userAgent.match(/Android/i)
                || navigator.userAgent.match(/BlackBerry/i)
                || navigator.userAgent.match(/iPhone|iPad|iPod/i)
                || navigator.userAgent.match(/IEMobile/i);
        }
        return isMobile;
    };

    $(document).ready(function(){
        if (self.isMobile()) {
            $('body').addClass('mobile');
            $('.portfolio-entry-item').css('opacity', 1);
            $('[rel="lightbox"]').attr('rel', 'not_lightbox');

        } else {
            updateBottomPadding();
            updateCardAlpha(0);
        }
    });

    $(window).scroll(function(e) {
        if (!self.isMobile()) {
            var scrollTop = $(this).scrollTop();
            updateParallax(scrollTop);
            updateCardAlpha(scrollTop);
        }
    });

    $(window).resize(function(e) {
        if (!self.isMobile()) {
            updateBottomPadding();
        }
    });

    var updateBottomPadding = function() {
        var magic = 360;
        var padding = $(window).height() - $('.portfolio-entry-item:last').height() - magic;
        $('#content .col2').css('paddingBottom', padding);
    };

    var updateCardAlpha = function(scrollTop) {
        $('.portfolio-entry-item').each(function() {
            var distance = Math.abs(scrollTop - $(this).offset().top + 200);

            if (distance > 0) {
                $(this).css('opacity', 300/distance);
            } else  {
                $(this).css('opacity', 1);
            }
        });
    };

    var updateParallax = function(scrollTop) {
        $('body').css('backgroundPositionY', - scrollTop / 20);
    };

})();

