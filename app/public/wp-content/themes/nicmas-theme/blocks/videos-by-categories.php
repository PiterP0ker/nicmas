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
$id = 'videos-by-categories-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'videos-by-categories';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('videos-by-categories-title');
$videos = get_field('videos-by-categories');

function getDuration($videoID){
   $apikey = "AIzaSyAAlPE3N8dyOuzY8-f6hYg5vuYmQS6ceLs";
   $dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$videoID&key=$apikey");
   $VidDuration =json_decode($dur, true);
   foreach ($VidDuration['items'] as $vidTime)
   {
       $VidDuration= $vidTime['contentDetails']['duration'];
   }
   preg_match_all('/(\d+)/',$VidDuration,$parts);
   return convertDuration($parts);
}

function convertDuration($parts) {
    $result = '';

    if($parts[0][0]) {
        $result = $result.$parts[0][0];
    }

    if($parts[0][1]) {
        $result = $result.":".$parts[0][1];
    } else {
        $result = "0:".$result;
    }

    if($parts[0][2]) {
        $result = $result.":".$parts[0][2];
    }

    return $result;
}

$args = array(
    'post_type' => 'video',
	'posts_per_page' => 3,
);
$posts = new WP_Query( $args );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="videos-by-categories-wrapper">
            <?php if( $title ): ?>
                <h2 class="videos-by-categories__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <div class="videos-by-categories-block cards-block">
                <?php foreach( $videos as $video ): ?>
                    <?php setup_postdata($videos); ?>
                    <?php
                        $video_link = get_field('video_link', $video->ID);
                        $categories = get_the_category($video->ID);
                        $category = $categories[0]->name;

                        $url_path = parse_url($video_link['url'], PHP_URL_PATH);
                        $basename = pathinfo($url_path, PATHINFO_BASENAME);
                    ?>

                    <div class="videos-by-categories-block__link">
                        <iframe width="400" height="301" src="<?php echo $video_link['url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p class="videos-by-categories-block__category"><?php echo $category; ?></p>
                        <p class="videos-by-categories-block__title"><?php echo get_the_title($video); ?></p>
                        <p class="videos-by-categories-block__title"><?php echo getDuration($basename); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <span class="link-to-archive loadmore-video" data-post-type="<?php echo $args['posts_per_page'] ?>" data-posts-per-page="<?php echo $args['posts_per_page'] ?>">Показати більше</span>
        </div>
    </div>
</section>