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
$id = 'news-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'news';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('news_title');
$news = get_field('news');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="news-wrapper">
            <div class="news__header">
                <?php if( $title ): ?>
                    <h2 class="news-title"><?php echo $title; ?></h2>
                <?php endif; ?>

                <a class="link-to-archive link-to-archive--desktop" href="<?php echo home_url(); ?>/news/">Усі новини</a>
            </div>

            <div class="news-block">
                <a href="<?php echo the_permalink($news[0]); ?>" class="news-block__left" style="background-image: url('<?php echo get_the_post_thumbnail_url($news[0], 'large'); ?>')">
                    <div class="news-block__gradient"></div>
                    <p class="news-block__left-title"><?php echo get_the_title($news[0]); ?></p>
                </a>
                <div class="news-block__right">
                    <?php foreach( $news as $value => $new ): ?>
                        <?php if( $value > 0 ): ?>
                            <?php setup_postdata($new); ?>
                            <a href="<?php echo the_permalink($new->ID); ?>" class="news-block__link">
                                <div class="news-block__date"><?php echo get_the_date('d.m.y', $new->ID); ?></div>
                                <p class="news-block__title"><?php echo get_the_title($new->ID); ?></p>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="link-to-archive link-to-archive--mobile" href="<?php echo home_url(); ?>/news/">Усі новини</a>
        </div>
    </div>
</section>