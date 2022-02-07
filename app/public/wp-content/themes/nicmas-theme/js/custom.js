jQuery(function ($) {

    $(window).on('load', function () {
        $('.header__menu .menu-item-has-children, .header__search, .header__language').mouseover(function () {
            $('.header__nav').addClass('menu-hover');
            $(this).find('.sub-menu').css({
                "opacity": "1",
                "pointer-events": "auto"
            });
        });

        $('.header__menu .menu-item-has-children, .header__search, .header__language').mouseout(function () {
            $('.header__nav').removeClass('menu-hover');
            $(this).find('.sub-menu').css({
                "opacity": "0",
                "pointer-events": "none"
            });
        });

        $('.directions-cards__card').mouseover(function () {
            $(this).find('.directions-cards__image').hide();
            $(this).find('.directions-cards__image-hover').show();
        });

        $('.directions-cards__card').mouseout(function () {
            $(this).find('.directions-cards__image').show();
            $(this).find('.directions-cards__image-hover').hide();
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
            // prevArrow: '.main-hero-arrow--left',
            // nextArrow: '.main-hero-arrow--right',
        })

        $('.services__menu-item').click(function (e) {
            e.preventDefault();
            const id = $(this).data('id')
            $('.services__information').each(function (item) {
                if (item === id) {
                    $(this).addClass('active')
                } else {
                    $(this).removeClass('active')
                }
            })
        })

    });
});
