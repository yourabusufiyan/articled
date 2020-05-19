/**
*  Theme Main Animation and transition JS File.
*
* @package Articled
* @since Articled 1.0
*
*/

(function ($) {
    "use strict";
    $(document).ready(function () {
        var articledLazyLoad = function () {
            new LazyLoad({
                selector: '.single-post-thumb img, .post-thumbnail img, .related-posts img',
                error: function (ele, msg) {
                    if (msg === 'missing') {
                        $(this).innerHTML = 'Missing Image'
                    } else if (msg === 'invalid') {
                        $(this).innerHTML = 'Invalid Image'
                    }
                },
                breakpoints: [{
                    width: 420,
                    src: 'data-src-small'
                }, {
                    width: 768,
                    src: 'data-src-medium'
                }, {
                    width: 992,
                    src: 'data-src-large'
                },],
                successClass: 'lazy-loaded',
                validateDelay: 25 * 4 * 2
            })
        };
        articledLazyLoad();
        $('#content').find('a').has('img').addClass('imgwrap');
        $('#content p').each(function () {
            var $this = $(this);
            if ($this.html().replace(/\s| /g, '').length == 0) $this.addClass('empty')
        });

        $('.top-searchform .icons').on('click', function () {
            $('.searcharea').fadeIn()
        });
        $('.closeme').on('click', function () {
            $(this).parent().fadeOut()
        });
        var widowdfgsWiddth = $(window).width();
        if (widowdfgsWiddth > 480) {
            $('.menu-item-has-children').on('hover', function () {
                $(this).children('.sub-menu').slideToggle()
            })
        } else {
            $('.menu-item-has-children').on('click', function () {
                $(this).children('.sub-menu').slideToggle()
            })
        };
        $(window).bind('resize', function () {
            var widowsWidfgddth = $(window).width();
            if (widowsWidfgddth > 480) {
                $('.menu-item-has-children').on('hover', function () {
                    $(this).children('.sub-menu').slideToggle()
                })
            } else {
                $('.menu-item-has-children').on('click', function () {
                    $(this).children('.sub-menu').slideToggle()
                })
            }
        });
        $('.show-mobile').on('click', function () {
            $('.mobile-menu').slideToggle()
        });
        $('.toggle-btn').on('click', function () {
            $('#toggleBar').slideToggle();
            $('#toggle-icon').toggleClass('fa-plus');
            $('#toggle-icon').toggleClass('fa-minus')
        });
        $('.top-mobile .pull-right i').on('click', function () {
            $('#pull-topbar-text span').toggleClass('show');
            $('#pull-topbar-text span').toggleClass('hide');
            $('.top-mobile .pull-right i').toggleClass('fa-bars');
            $('.top-mobile .pull-right i').toggleClass('fa-times');
            $('.top-bar .social-icon, .top-bar .main-menu-wrap ').slideToggle()
        });
        $(window).bind('resize', function () {
            var widowsWidth = $(window).width();
            if (widowsWidth > 680) {
                $('.top-bar .main-menu-wrap , .top-bar .social-icon ').slideDown()
            }
            if (widowsWidth < 680) {
                var elemei = '.top-mobile .pull-right i';
                var menuContainer = '.top-bar .main-menu-wrap , .top-bar .social-icon';
                if (!$(elemei).hasClass('fa-bars')) {
                    $(menuContainer).slideDown();
                    $('.top-mobile .pull-right i').addClass('fa-times')
                } else {
                    $(menuContainer).slideUp()
                }
            }
        });
        $('.slider, .body-content').on('click', function () {
            $('#slider-container').toggleClass('slider-opened');
            $('#sliders').toggleClass('fa-align-center');
            $('#sliders').toggleClass('fa-plus')
        });
        $('.sliderclose').on('click', function () {
            $('.sliderclose').parent().toggleClass('slider-opened');
            $('#sliders').toggleClass('fa-align-center');
            $('#sliders').toggleClass('fa-plus')
        });
        $('.comments-button').on('click', function () {
            $('.comments-list').slideToggle();
            $('.comments-button .comments-text-show').fadeToggle(0);
            $('.comments-button .comments-text-hide').fadeToggle(0)
        });
        $(window).on('scroll', function () {
            $('p, .textwidget, .rssSummary, .textwidget p ').each(function (i) {
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                if (bottom_of_window > bottom_of_object) {
                    $(this).animate({
                        'opacity': '1'
                    }, 500)
                }
            })
        });

        function typewriter(text) {
            var letterArray = text.innerHTML.split('');
            text.innerHTML = '';
            letterArray.forEach((letter, index) => {
                setTimeout(function () {
                    text.innerHTML += letter
                }, 85 * index)
            })
        }
        var scrollTop = $(".scrollTop");
        $(window).on('scroll', function () {
            var topPos = $(this).scrollTop();
            if (topPos > 1000) {
                $(scrollTop).css("opacity", "1")
            } else {
                $(scrollTop).css("opacity", "0")
            }
        });
        $(scrollTop).on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return !1
        });
        $(".single-post-meta .comments").on('click', function () {
            $('html, body').animate({
                scrollTop: $(".single-comments").offset().top
            }, 1000)
        });

        $(document.body).on('post-load', function () {
            articledLazyLoad();
        });
    });

})(jQuery);
