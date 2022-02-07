<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'image-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'image-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$post_id = get_post()->ID;
$image_url = get_field("image-text_image");
$title = get_field("image-text_title");
$text = get_field("image-text_text");
$link = get_field("image-text_link");
$background = get_field("image-text_background");

if($background === 'light'):
    $link_color = "white";
else:
    $link_color = "grey";
endif;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $background ?>">
    <div class="wrapper image-text__wrapper">
        <div class="image-text__image-block">
            <?php if($image_url): ?><img class="image-text__image" src="<?php echo $image_url ?>"> <?php endif; ?>
        </div>
        <div class="image-text__text-block">
            <h2 class="image-text__title"><?php echo $title ?></h2>
            <img class="image-text__image-mobile" src="<?php echo $image_url ?>">
            <div class="image-text__content">
                <?php echo $text ?>
            </div>
            <?php if($link): get_template_part('template-parts/link', '', array('url' => $link['url'], 'title' => $link['title'], 'target' => $link['target'], 'color' => $link_color)); endif; ?>
        </div>
    </div>
</section>