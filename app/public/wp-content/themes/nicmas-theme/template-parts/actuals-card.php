<a href="<?php echo the_permalink($args['actual']); ?>" class="actual-block__link">
    <div class="actual-block__image" style="background-image: url('<?php echo get_the_post_thumbnail_url($args['actual'], 'posts'); ?>')"></div>
    <p class="actual-block__title"><?php echo get_the_title($args['actual']); ?></p>
    <div class="actual-block__date"><?php echo get_the_date('d.m.y', $args['actual']); ?></div>
</a>