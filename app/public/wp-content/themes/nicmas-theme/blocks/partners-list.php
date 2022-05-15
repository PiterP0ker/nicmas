<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'partners-list-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'partners-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container partners-list__container">
        <?php
        if (have_rows("partners-list_list")):
            while (have_rows("partners-list_list")):
                the_row();
                $logo = get_sub_field('logo');
                $name = get_sub_field('name');
                $description = get_sub_field('description');
                $link = get_sub_field('link');
                ?>
            <div class="partners-list__card">
                <div class="partners-list__logo-wrapper">
                    <iframe class="partners-list__logo" src="<?php echo $logo ?>"></iframe>
                </div>
                <h3 class="partners-list__name"><?php echo $name ?></h3>
                <div class="partners-list__description">
                    <p><?php echo $description ?></p>
                </div>
                <div class="partners-list__link">
                    <?php if($link): get_template_part('template-parts/link', '', array('url' => $link['url'], 'title' => $link['title'], 'target' => $link['target'], 'color' => 'white')); endif;?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>
</section>