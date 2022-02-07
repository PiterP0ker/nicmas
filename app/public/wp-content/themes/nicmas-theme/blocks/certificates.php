<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'certificates-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'certificates';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$post_id = get_post()->ID;
$title = get_field("certificates_title");
$images = get_field("certificates_gallery");

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container certificates__container">
        <h2 class="certificates__title"><?php echo $title ?></h2>
        <div class="certificates__slider-controls">
            <div class="certificates__slider-arrow certificates__slider-arrow--left">
                <?php echo get_template_part('svg/slider-arrow-left'); ?>
            </div>
            <div class="certificates__slider-arrow certificates__slider-arrow--right">
                <?php echo get_template_part('svg/slider-arrow-right'); ?>
            </div>
        </div>
    </div>
    <div class="certificates__slider">
        <?php
            foreach ($images as $image):
        ?>
            <div class="certificates__slider-card">
                <img src="<?php echo $image['url'] ?>">
            </div>
        <?
            endforeach;
        ?>
    </div>
    <div class="container certificates__container-mobile">
        <div class="certificates__slider-controls certificates__slider-controls--mobile">
            <div class="certificates__slider-arrow certificates__slider-arrow--left">
                <?php echo get_template_part('svg/slider-arrow-left'); ?>
            </div>
            <div class="certificates__slider-arrow certificates__slider-arrow--right">
                <?php echo get_template_part('svg/slider-arrow-right'); ?>
            </div>
        </div>
    </div>
</section>