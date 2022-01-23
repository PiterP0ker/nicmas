<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'directions-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'directions';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('directions_title');
$directions = get_field('directions');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if( $directions ): ?>
            <div class="directions-wrapper">
                <?php if( $title ): ?>
                    <h2 class="directions-title"><?php echo $title; ?></h2>
                <?php endif; ?>

                <div class="directions-cards">
                    <?php foreach( $directions as $direction ): ?>
                        <?php setup_postdata($direction); ?>
                        <a href="<?php echo the_permalink($direction->ID); ?>" class="directions-cards__card">
                            <img class="directions-cards__image" src="<?php echo get_the_post_thumbnail_url($direction->ID, 'medium'); ?>" >
                            <div class="directions-cards__text">
                                <h3 class="directions-cards__title"><?php echo get_the_title($direction->ID); ?></h3>
                                <p class="directions-cards__subtitle"><?php echo get_field('subtitle', $direction->ID); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="directions-arrows">
                    <div class="directions-arrow directions-arrow--left">
                        <?php echo get_template_part('svg/slider-arrow-left'); ?>
                    </div>
                    <div class="directions-arrow directions-arrow--right">
                        <?php echo get_template_part('svg/slider-arrow-right'); ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>