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
$id = 'actual-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'actual';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
$actual_link = get_field('actual_link');
$actual_post_type = get_field('actual_post_type');

require_once('all-videos/duration-function.php');

if ( $actual_post_type === 'posts' ) {
   $actuals = get_field('actual_posts');
} else if ($actual_post_type === 'news') {
   $actuals = get_field('actual_news');
} else {
   $actuals = get_field('actual_video');
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($actual_post_type === 'video'): ?>actual--video <?php endif; ?>">
    <div class="container">
        <div class="actual-wrapper">
            <div class="actual__header">
                <?php if( $title ): ?>
                    <h2 class="actual-title"><?php echo $title; ?></h2>
                <?php endif; ?>

                <a class="link-to-archive link-to-archive--desktop" href="<?php echo $actual_link; ?>">
                <?php if($actual_post_type === 'video'): ?>
                    Дивитись усі
                <?php else: ?>
                    Читати всі статті
                <?php endif; ?>
                </a>
            </div>

            <div class="actual-block">
                <?php foreach( $actuals as $actual ): ?>
                    <?php setup_postdata($actual); ?>
                    <?php if($actual_post_type === 'video'): ?>
                        <?php
                            $video_link = get_field('video_link', $actual->ID,);
                            $categories = get_the_category($actual->ID,);
                            $category = $categories[0]->name;

                            $url_path = parse_url($video_link['url'], PHP_URL_PATH);
                            $basename = pathinfo($url_path, PATHINFO_BASENAME);
                        ?>
                        <?php echo get_template_part(
                            'template-parts/video-card',
                            '',
                            array(
                            'id' => $actual->ID,
                            'video_link' => $video_link['url'],
                            'category' => $category,
                            'duration' => getDuration($basename),
                        )); ?>
                    <?php else: ?>
                        <?php echo get_template_part('template-parts/actuals-card', '', array('actual' => $actual->ID)); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <a class="link-to-archive link-to-archive--mobile" href="<?php echo home_url(); ?>/actual/">Читати всі статті</a>
        </div>
    </div>
</section>