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
$id = 'all-posts-news-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'all-posts-news';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$all_post_type = get_field('all_post_type');
if ($all_post_type === 'concern_news') {
    $highlighted = get_field('all-posts-news_highlighted-news');
} else {
    $highlighted = get_field('all-posts-news_highlighted-post');
}
$args = array(
    'post_type' => $all_post_type,
	'posts_per_page' => 12,
);
$posts = new WP_Query( $args );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="all-posts-news-wrapper">
            <a href="<?php echo the_permalink($highlighted[0]); ?>" class="all-posts-news__big" style="background-image: url('<?php echo get_the_post_thumbnail_url($highlighted[0], 'large'); ?>')">
                <div class="all-posts-news__gradient"></div>
                <p class="all-posts-news__big-title"><?php echo get_the_title($highlighted[0]); ?></p>
            </a>

            <?php if( $posts->have_posts() ): ?>
                <div class="all-posts-news__little">
                    <?php while( $posts->have_posts() ): ?>
                    <?php $posts->the_post(); ?>

                        <?php echo get_template_part('template-parts/actuals-card', '', array('actual' => get_post()->ID)); ?>

                    <?php endwhile; ?>
            	</div>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

                <span class="link-to-archive loadmore" data-post-type="<?php echo $all_post_type; ?>">Усі новини</span>

        </div>
    </div>
</section>