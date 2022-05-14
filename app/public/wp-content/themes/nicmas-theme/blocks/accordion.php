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

$args = array(
    'post_type' => $post_type,
    'posts_per_page' => 10,
);
$posts = new WP_Query( $args );

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
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
            <?php if( $posts->have_posts() ): ?>
                    <?php while( $posts->have_posts() ):
                    $posts->the_post();
                    $post_id = get_post()->ID;
                    $date = get_the_date('d.m.y', $post_id);
                    $customer = get_field('customer', $post_id);
                    $description = get_field('description', $post_id);
                    ?>
                        <div class="accordion__table-row">
                            <div class="accordion__table-cell accordion__table-cell--date">
                                <?php echo $date ?>
                            </div>
                            <div class="accordion__table-cell accordion__table-cell--customer">
                                <?php echo $customer ?>
                            </div>
                            <div class="accordion__table-cell accordion__table-cell--description">
                                <?php echo $description ?>
                            </div>
                            <div class="accordion__table-cell accordion__table-cell--icon">
                                <?php echo 'Іконка' ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>