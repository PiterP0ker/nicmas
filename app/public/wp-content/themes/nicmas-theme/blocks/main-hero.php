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
$id = 'main-hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'main-hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$y = 1;

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="main-hero-slider">
        <?php if( have_rows('main-hero_slider') ): ?>
            <?php while( have_rows('main-hero_slider') ) : the_row(); ?>
            <?php
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $link = get_sub_field('link');
                $image = get_sub_field('image');
            ?>
                <div class="main-hero-image main-hero-image--<?php echo $y; ?>" style="background-image: url('<?php echo $image['url']; ?>')">
                    <div class="container">
                        <?php if( $title ): ?>
                            <h1 class="main-hero-image__title"><?php echo $title; ?></h1>
                        <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <p class="main-hero-image__subtitle"><?php echo $subtitle; ?></p>
                        <?php endif; ?>
                        <?php if( $link ): ?>
                            <a class="main-hero-image__link" href="<?php echo $link['url']; ?>">
                                <?php echo $link['title']; ?>
                                <?php echo get_template_part('svg/arrow-right'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php $y++; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="main-hero-arrows">
        <div class="main-hero-arrow main-hero-arrow--left">
            <?php echo get_template_part('svg/slider-arrow-left'); ?>
        </div>
        <div class="main-hero-arrow main-hero-arrow--right">
            <?php echo get_template_part('svg/slider-arrow-right'); ?>
        </div>
    </div>
</section>