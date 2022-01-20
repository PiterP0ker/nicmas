<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php
    $logo = get_field('logo', 'option');
    ?>
    <header class="header">
        <div class="wrapper header__wrapper">
            <?php if ($logo) : ?>
                <a class="header__logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                </a>
            <?php endif; ?>

            <nav class="header__nav">
                <?php if (has_nav_menu('menu')) :
                    echo wp_nav_menu(array(
                        'theme_location' => 'menu',
                        'menu_class' => 'header__menu',
                        'walker' => new Header_Walker_Nav_Menu()
                    ));

                endif; ?>
                <div class="header__search">
                    <?php echo get_template_part('svg/search'); ?>
                </div>

                <div class="header__language">
                    RUS
                    <?php echo get_template_part('svg/arrow-down'); ?>
                </div>
            </nav>
        </div>
    </header>
    <main>