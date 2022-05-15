<div class="all-videos-block__link">
    <div class="all-videos-block__iframe">
        <iframe width="400" height="301" src="<?php echo $args['video_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <p class="all-videos-block__category"><?php echo $args['category']; ?></p>
    <p class="all-videos-block__title"><?php echo get_the_title($args['id']); ?></p>
    <p class="all-videos-block__duration"><?php echo $args['duration']; ?></p>
</div>