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
$id = 'chosen-videos-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'chosen-videos';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

require_once('duration-function.php');
$chosen_videos = get_field('chosen-videos');
$x= 0;
$y= 0;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if( $chosen_videos ): ?>
            <div class="chosen-videos__wrapper">
                <div class="chosen-videos__iframe-block">
                    <?php foreach( $chosen_videos as $video ): ?>
                        <?php
                            setup_postdata($video);
                            $video_link = get_field('video_link', $video->ID,);
                            $url_path = parse_url($video_link['url'], PHP_URL_PATH);
                            $basename = pathinfo($url_path, PATHINFO_BASENAME);
                        ?>
                        <div class="chosen-videos__iframe-link" data-id="<?php echo $x; ?>">
                            <div class="chosen-videos__iframe">
                                <iframe width="400" height="301" src="<?php echo $video_link['url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="chosen-videos__iframe-duration"><?php echo getDuration($basename); ?></div>
                            <div class="chosen-videos__iframe-title"><?php echo get_the_title($video->ID); ?></div>
                        </div>
                    <?php $x++; ?>
                    <?php endforeach; ?>
                </div>

                <div class="chosen-videos__video-block">
                <?php foreach( $chosen_videos as $video ): ?>
                        <?php
                            setup_postdata($video);
                            $video_link = get_field('video_link', $video->ID,);
                            $url_path = parse_url($video_link['url'], PHP_URL_PATH);
                            $basename = pathinfo($url_path, PATHINFO_BASENAME);
                        ?>
                        <div class="chosen-videos__video-link" data-id="<?php echo $y; ?>">
                            <div class="chosen-videos__svg">
                                <?php echo get_template_part('svg/play'); ?>
                            </div>
                            <span class="chosen-videos__duration"><?php echo getDuration($basename); ?></span>
                            <span class="chosen-videos__title"><?php echo get_the_title($video->ID); ?></span>
                        </div>
                    <?php $y++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>