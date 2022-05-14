<?php
$post_id = $args['post_id'];
$post_type = $args['post_type'];
$date = get_the_date('d.m.y', $post_id);
$customer = get_field('customer', $post_id);
$period = get_field('period', $post_id);
$description = get_field('description', $post_id);
$image = get_field('image', $post_id);
$text = get_field('text', $post_id);
$link = get_field('link', $post_id);
$file = get_field('file', $post_id);
?>
<div class="accordion__table-row">
    <div class="accordion__table-cell accordion__table-cell--date">
        <?php echo $date ?>
    </div>
    <div class="accordion__table-cell accordion__table-cell--customer">
        <?php if($post_type === 'references'): echo $customer; else: echo $period; endif; ?>
    </div>
    <div class="accordion__table-cell accordion__table-cell--description">
        <?php echo $description ?>
    </div>
    <div class="accordion__table-cell accordion__table-cell--icon">
        <div>
            <?php echo get_template_part('svg/accordion-arrow'); ?>
        </div>
        <div>
            <?php echo get_template_part('svg/accordion-cross'); ?>
        </div>
    </div>
</div>
<div class="accordion__table-info">
    <div>
        <?php if($image): ?>
            <img src="<?php echo $image['url']; ?>">
        <?php endif; ?>
    </div>
    <div>
        <?php if($post_type === 'references'): ?>
            <?php echo $text; ?>
            <?php if($link): ?>
            <div class="flex">
                <?php get_template_part('template-parts/link', '', array('url' => $link['url'], 'title' => $link['title'], 'target' => $link['target'], 'color' => 'grey')); ?>
            </div>
            <?php endif; ?>
        <?php else: ?>
        <?php if($file): ?>
            <div class="flex">
                <a class="accordion__download-button" href="<?php echo $file['url'] ?>">Завантажити каталог <?php get_template_part('svg/download-arrow') ?></a>
            </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>