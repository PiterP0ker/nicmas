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
    });
});
