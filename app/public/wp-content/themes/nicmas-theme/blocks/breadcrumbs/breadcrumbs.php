<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'breadcrumbs-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'breadcrumbs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

require_once('get-links-function.php');

$post_id = get_post()->ID;

$menu = wp_get_nav_menu_items(wp_get_nav_menu_object('menu-header'));

$links = array_reverse(getLinks($menu, $post_id));
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container breadcrumbs__container">
        <a class="breadcrumbs__item" href="<?php echo get_home_url() ?>"><?php echo get_template_part('svg/home'); ?></a>
        <?php
            foreach ($links as $key => $link):
                $title = $link->title;
        ?>
            <a class="breadcrumbs__item"><?php echo $title; ?></a>
        <?php
            endforeach;
        ?>
    </div>
</section>