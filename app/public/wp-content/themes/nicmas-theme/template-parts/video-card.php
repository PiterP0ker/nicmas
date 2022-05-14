<div class="videos-by-categories-block__link">
    <iframe width="400" height="301" src="<?php echo $video_link['url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <p class="videos-by-categories-block__category"><?php echo $category; ?></p>
    <p class="videos-by-categories-block__title"><?php echo get_the_title($video); ?></p>
    <p class="videos-by-categories-block__title"><?php echo getDuration($basename); ?></p>
</div>