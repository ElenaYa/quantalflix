(function ($) {
    "use strict";

    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    new WOW().init();


    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
    
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 100, 'easeInOutExpo');
        return false;
    });


    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });


    $('.testimonial-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });

    function initMobileOptimizations() {
        if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
            $('input, select, textarea').on('focus', function() {
                $(this).css('font-size', '16px');
            });
        }

        if ('ontouchstart' in window) {
            $('.navbar-nav').css('-webkit-overflow-scrolling', 'touch');
        }

        if ($(window).width() <= 768) {
            $('.header-carousel').owlCarousel({
                autoplay: true,
                smartSpeed: 1000,
                loop: true,
                nav: false,
                dots: true,
                items: 1,
                dotsData: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        }

        $('.modal').on('show.bs.modal', function() {
            if ($(window).width() <= 768) {
                $(this).find('.modal-dialog').addClass('modal-fullscreen-sm-down');
            }
        });

        $('input[type="email"], input[type="text"], textarea').attr('autocomplete', 'off');
        
        $('.btn').on('touchstart', function() {
            $(this).addClass('touch-active');
        }).on('touchend touchcancel', function() {
            $(this).removeClass('touch-active');
        });
    }

    initMobileOptimizations();

    $(window).on('resize', function() {
        initMobileOptimizations();
    });

    if ($(window).width() <= 768) {
        $('[data-wow-delay]').each(function() {
            var delay = $(this).attr('data-wow-delay');
            if (delay) {
                var newDelay = parseFloat(delay) * 0.5;
                $(this).attr('data-wow-delay', newDelay + 's');
            }
        });
    }

    $(window).on('orientationchange', function() {
        setTimeout(function() {
            $(window).trigger('resize');
        }, 100);
    });

    
})(jQuery);

