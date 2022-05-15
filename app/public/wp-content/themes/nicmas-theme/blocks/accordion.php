<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('accordion_title');
$post_type = get_field('accordion_type');
$link = get_field('accordion_link');
$taxonomy = get_field('accordion_tag');

//var_dump(get_page_template_slug(get_post()));
$is_archive = get_field('accordion_is_archive');

$tax = mb_substr($post_type, 0, strlen($post_type) - 1).'_type';

if($is_archive) {
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => 10,
    );
} else {
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => 10,
        $tax => $taxonomy->slug,
    );
}

$terms = get_terms($tax);

$posts = new WP_Query( $args );

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if(!$is_archive): ?><a id="<?php echo $title ?>"></a><?php endif; ?>
    <div class="container">
        <div class="accordion__top">
            <h2><?php echo $title; ?></h2>
            <?php if($is_archive): ?>
                <select class="accordion__select" data-post-type="<?php echo $post_type ?>" data-posts-per-page="<?php echo $args['posts_per_page'] ?>" data-tax="<?php echo $tax ?>">
                    <option value="all">Усі</option>
                    <?php foreach ($terms as $term): ?>
                        <option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <?php if($link): ?>
                    <a class="link-to-archive desktop" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="accordion__table">
            <div class="accordion__table-row accordion__table-row--first">
                <div class="accordion__table-cell">
                    Дата
                </div>
                <div class="accordion__table-cell">
                    Замовник
                </div>
                <div class="accordion__table-cell">
                    Опис
                </div>
                <div class="accordion__table-cell"></div>
            </div>
            <div class="accordion__table-list">
            <?php if( $posts->have_posts() ): ?>
                    <?php while( $posts->have_posts() ):
                    $posts->the_post();
                        echo get_template_part('template-parts/accordion-row', '', array('post_id' => get_post()->ID, 'post_type' => $post_type));
                    endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div>
        </div>
        <?php if($is_archive): ?>
        <div class="accordion__bottom">
            <span class="link-to-archive loadmore-accordion" data-post-type="<?php echo $post_type; ?>" data-posts-per-page="<?php echo $args['posts_per_page'] ?>" data-tax="<?php echo $tax ?>">Більше</span>
        </div>
        <?php else: ?>
            <?php if($link): ?>
            <div class="accordion__bottom">
                <a class="link-to-archive mobile" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>