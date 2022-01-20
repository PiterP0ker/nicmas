<?php
// свой класс построения меню:
class Header_Walker_Nav_Menu extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = NULL ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<div class="' . $class_names . '"><ul>' . "\n";
    }

    // add main/sub classes to li's and links
    function start_el(&$output, $item, $depth = 0, $args = NULL, $id = 0) {
        global $wp_query;
        $object_id = get_post_meta($item->ID, '_menu_item_object_id')[0];
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        if ($depth !== 0) {
            $args->link_after = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">'.
                '<rect x="0.5" y="23.5" width="23" height="23" transform="rotate(-90 0.5 23.5)" stroke="white"/>'.
                '<path d="M5.13281 18.5L17.684 5.94885" stroke="white"/>'.
                '<path d="M18 14.1411L18 5.64111L9.5 5.64111" stroke="white"/>'.
            '</svg>';
        } else {
            $args->link_after = '';
        }

        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $item_info = '';
        if ($depth !== 0) {
            $object_id = get_post_meta($item->ID, '_menu_item_object_id')[0];
            $subtitle = get_field("subtitle", $object_id);
            $description = get_field("description", $object_id);
            $item_info .= '<div class="sub-menu__inner-content"><h2 class="sub-menu__inner-title">' . $subtitle . '</h2><p class="sub-menu__inner-description">'.$description.'</p>'.get_the_post_thumbnail($object_id).'</div>';
        }
        $output .= "\n" . $item_info . '</li>' . "\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "\n" . '</ul></div>' . "\n";
    }
}