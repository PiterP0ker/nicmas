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
$id = 'all-videos-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'all-videos';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('all-videos_title');

require_once('duration-function.php');

$args = array(
    'post_type' => 'video',
	'posts_per_page' => 9,
);
$posts = new WP_Query( $args );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="all-videos-wrapper">
            <?php if( $title ): ?>
                <h2 class="all-videos__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if( $posts->have_posts() ): ?>
                <div class="all-videos-block cards-block">
                    <?php while( $posts->have_posts() ): ?>
                    <?php $posts->the_post(); ?>
                    <?php
                        $video_link = get_field('video_link', get_post()->ID,);
                        $categories = get_the_category(get_post()->ID,);
                        $category = $categories[0]->name;

                        $url_path = parse_url($video_link['url'], PHP_URL_PATH);
                        $basename = pathinfo($url_path, PATHINFO_BASENAME);
                    ?>

                        <?php echo get_template_part(
                        'template-parts/video-card',
                        '',
                        array(
                        'id' => get_post()->ID,
                        'video_link' => $video_link['url'],
                        'category' => $category,
                        'duration' => getDuration($basename),
                        )); ?>

                    <?php endwhile; ?>
                </div>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

            <span
                class="link-to-archive loadmore"
                data-post-type="<?php echo $args['post_type']; ?>"
                data-posts-per-page="<?php echo $args['posts_per_page'] ?>"
                data-current-page="1"
            >
                Дивитись усі
            </span>
        </div>
    </div>
</section>