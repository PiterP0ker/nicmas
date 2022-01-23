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
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$post_id = get_post()->ID;
$title = get_the_title($post_id);
$subtitle = get_field("subtitle", $post_id);
$image_url =  get_the_post_thumbnail_url($post_id);
$image2_url = get_field("paralax_image", $post_id)

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hero__parallax" style="background-image: url('<?php echo $image_url ?>')"></div>
    <div class="hero__parallax" style="background-image: url('<?php  echo $image2_url ?>')"></div>
    <div class="hero__info">
        <h1><?php echo $title ?></h1>
        <p><?php echo $subtitle ?></p>
    </div>
</section>