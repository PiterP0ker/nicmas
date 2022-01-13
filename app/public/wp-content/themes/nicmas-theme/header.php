<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php

    ?>
    <header class="header">
        <nav class="header__nav-mobile">
                    <?php if (has_nav_menu('menu')) :
                        echo wp_nav_menu(array(
                            'theme_location' => 'menu',
                            'menu_class' => 'header__menu-mobile',
                        ));
                    endif; ?>
                </nav>
    </header>
    <main>