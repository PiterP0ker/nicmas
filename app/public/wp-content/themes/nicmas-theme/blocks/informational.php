<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'informational-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'informational';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$post_id = get_post()->ID;
$type = get_field("informational_type");
$title = get_field("informational_title");
$text = get_field("informational_text");
$image1 = get_field("informational_photo_1");
$image2 = get_field("informational_photo_2");
$video = get_field("informational_video_link");
$link = get_field("informational_link");

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <a id="<?php echo $title ?>"></a>
    <div class="container informational__container">
        <?php if($title): ?>
            <h2><?php echo $title ?></h2>
        <?php endif; ?>
        <?php if($type != "video"): ?>
            <div class="informational__content revert">
                <div class="informational__image">
                    <?php if($image1): ?>
                        <img src="<?php echo $image1 ?>">
                    <?php endif; ?>
                </div>
                <div class="informational__text">
                    <?php echo $text ?>
                    <?php if($type == "single"): ?>
                        <?php if($link): get_template_part('template-parts/link', '', array('url' => $link['url'], 'title' => $link['title'], 'target' => $link['target'], 'color' => 'grey')); endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($type == "multiple"): ?>
                <div class="informational__content">
                    <div class="informational__image">
                        <?php if($image2): ?>
                            <img src="<?php echo $image2 ?>">
                        <?php endif; ?>
                    </div>
                    <div class="informational__text">
                        <?php echo $text ?>
                        <?php if($link): get_template_part('template-parts/link', '', array('url' => $link['url'], 'title' => $link['title'], 'target' => $link['target'], 'color' => 'grey')); endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
        <div class="informational__content">
            <div class="informational__image">

            </div>
            <div class="informational__text">
                <?php echo $text ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>