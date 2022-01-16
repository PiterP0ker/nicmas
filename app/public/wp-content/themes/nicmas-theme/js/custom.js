jQuery(function ($) {

    $(window).on('load', function () {
        $('.header__menu .menu-item-has-children').mouseover(function () {
            $('.header__nav').addClass('menu-hover');
            $(this).find('.sub-menu').css({
                "opacity": "1",
                "pointer-events": "auto"
            });
        });

        $('.header__menu .menu-item-has-children').mouseout(function () {
            $('.header__nav').removeClass('menu-hover');
            $(this).find('.sub-menu').css({
                "opacity": "0",
                "pointer-events": "none"
            });
        });
    });
});
