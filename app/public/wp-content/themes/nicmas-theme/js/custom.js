jQuery(function ($) {

    $(window).ready(function () {
        if ($(window).scrollTop() > $(window).height()) {
            $(".header").addClass('header--colored');
        } else {
            if ($(".header").hasClass('header--colored')) {
                $(".header").removeClass('header--colored');
            }
        }
    })

    $(window).on('load', function () {
        $('.header__menu .menu-item').mouseenter(function () {
            $('.header__menu~.menu-item a').css({
                "background-color": "transparent"
            })
            $($(this).find('a')[0]).css({
                "background-color": "#265BC2"
            })
        })
        $('.header__menu .menu-item').mouseleave(function () {
            $($(this).find('a')[0]).css({
                "background-color": "transparent"
            })
        })

        $('.header__menu .menu-item-has-children, .header__search, .header__language').mouseover(function () {
            $('.header__nav').addClass('menu-hover');
            $(this).find('.sub-menu').css({
                "opacity": "1",
                "pointer-events": "auto"
            })
        });

        $('.header__menu .menu-item-has-children, .header__search, .header__language').mouseenter(function () {
            $($(this).find('.sub-menu').find('.sub-menu__inner-content')[0]).css({
                "opacity": "1",
                "pointer-events": "auto"
            })
            $($($(this).find('.sub-menu').find('.sub-menu-item')[0]).find('a')[0]).css({
               "background-color": "#265BC2"
            })
        })

        $('.header__menu .menu-item-has-children, .header__search, .header__language').mouseout(function () {
            $('.header__nav').removeClass('menu-hover');
            $(this).find('.sub-menu').css({
                "opacity": "0",
                "pointer-events": "none"
            });
        });

        $('.sub-menu .sub-menu-item').mouseover(function () {
            $('.sub-menu__inner-content').css({
                "opacity": "0",
                "pointer-events": "none"
            })
            $(this).find('.sub-menu__inner-content').css({
                "opacity": "1",
                "pointer-events": "auto"
            });
        });

        $('.header__nav').mouseleave(function () {
            $('.sub-menu__inner-content').css({
                "opacity": "0",
                "pointer-events": "none"
            })
        });

        $(window).on("scroll", function (e) {
            $('.sub-menu').css({
                "opacity": "0",
                "pointer-events": "none"
            });
            if ($(".hero").length && $(window).scrollTop() > $(window).height() || !$(".hero").length && $(window).scrollTop() > 97) {
                $(".header").addClass('header--colored');
            } else {
                if ($(".header").hasClass('header--colored')) {
                    $(".header").removeClass('header--colored');
                }
            }
        })

        const pageNavigationPosition = $(".page-navigation")[0]?.offsetTop + $(".page-navigation").outerHeight();

        $(document).on('mousewheel', function (e) {
            if (e.originalEvent.wheelDelta < 0) {
                if (!$('.header').hasClass('header--hidden')) {
                    $('.header').addClass('header--hidden')
                }
                if ($(window).scrollTop() > pageNavigationPosition && !$('.page-navigation').hasClass('page-navigation--sticky')) {
                    $('.page-navigation').addClass('page-navigation--sticky');
                }
                if($('.page-navigation').hasClass('page-navigation--sticky-shown')) {
                    $('.page-navigation').removeClass('page-navigation--sticky-shown');
                }
            } else {
                if ($('.header').hasClass('header--hidden')) {
                    $('.header').removeClass('header--hidden')
                }
                if ($(window).scrollTop() <= pageNavigationPosition && $('.page-navigation').hasClass('page-navigation--sticky')) {
                    $('.page-navigation').removeClass('page-navigation--sticky');
                }
                if ($(window).scrollTop() > pageNavigationPosition && $('.page-navigation').hasClass('page-navigation--sticky')) {
                    $('.page-navigation').addClass('page-navigation--sticky-shown');
                }
            }
        })

        $('.main-hero-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '.main-hero-arrow--left',
            nextArrow: '.main-hero-arrow--right',
        });

        $('.directions-cards').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            mobileFirst: true,
            prevArrow: '.directions-arrow--left',
            nextArrow: '.directions-arrow--right',
            responsive: [
                {
                    breakpoint: 604,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        arrows: true,
                    }
                }
            ]
        });

        $('.certificates__slider').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            mobileFirst: true,
            // centerMode: true,
            prevArrow: '.certificates__slider-arrow--left',
            nextArrow: '.certificates__slider-arrow--right',
            responsive: [
                {
                    breakpoint: 604,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        // initialSlide: 1,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        // initialSlide: 1,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 1240,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        // initialSlide: 2,
                        // centerPadding: "109px 0 149px",
                        arrows: true,
                    }
                }
            ]
        })

        $('.services__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite: false,
            prevArrow: '.services__slider-arrow.left',
            nextArrow: '.services__slider-arrow.right',
        })

        $('.services__menu-item').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id')
            $('.services__menu-item').removeClass('active')
            $(this).addClass('active')
            $('.services__information').each(function (item) {
                if (item === id) {
                    $(this).addClass('active')
                    $('.services__info-block').css("height", $(this).height())
                } else {
                    $(this).removeClass('active')
                }
            })
        })

        $('.services').each(function () {
            $($(this).find('.services__menu-item')?.[0]).addClass('active');
            $($(this).find('.services__information')?.[0]).addClass('active');
            $(this).find('.services__info-block').css("height", $($(this).find('.services__information')?.[0]).height())
        })

        if ($('.hero').length && $(window).scrollTop() < $(window).height()) {
            setTimeout(function () {
                $("html, body").animate({ scrollTop: $(window).height() }, 300);
            }, 200)
        }

        $('.loadmore').click(function () {
            let post_type = $(this).attr('data-post-type');
            let posts_per_page = $(this).attr('data-posts-per-page');
            let button = $(this),
                data = {
                    'action': 'loadmore',
                    'query': loadmore_params.posts,
                    'page': loadmore_params.current_page,
                    'post_type': post_type,
                    'ppp': posts_per_page
                };

            $.ajax({
                url: loadmore_params.ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function (xhr) {
                    button.text('Завантаження...');
                },
                success: function (data) {
                    if (data) {
                        $('.all-posts-news__little').append(data);
                        button.text('Показати більше');
                        loadmore_params.current_page++;

                        if (loadmore_params.current_page === loadmore_params.max_page)
                            button.remove();

                    } else {
                        button.remove();
                    }
                }
            });
        });

    });
});
