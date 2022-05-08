<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

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
    <?php if($image_url): ?>
    <div class="hero__parallax" style="background-image: url('<?php echo $image_url ?>')">
        <?php if(!$image2_url): ?>
            <div class="container hero__content">
                <?php if($title): ?>
                    <h1 class="hero__title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if($subtitle): ?>
                    <p class="hero__subtitle"><?php echo $subtitle ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if($image2_url): ?>
        <div class="hero__parallax" style="background-image: url('<?php  echo $image2_url ?>')">
            <div class="container hero__content">
                <?php if($title): ?>
                    <h1 class="hero__title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if($subtitle): ?>
                    <p class="hero__subtitle"><?php echo $subtitle ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>