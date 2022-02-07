<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'services-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'services';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field("services_title");

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if($title): ?><h2 class="services__title"><?php echo $title ?></h2><?php endif; ?>
    </div>
    <div class="wrapper services__wrapper">
        <div class="services__menu-block">
            <?php if(have_rows('services_items')): ?>
                <div class="services__menu">
                    <?php
                        $index = 0;
                        while( have_rows('services_items') ) : the_row();
                    ?>
                        <a href="#" class="services__menu-item <?php if($index === 0): echo 'active'; endif; ?>" data-id = "<?php echo $index ?>"><?php echo get_sub_field('title') ?></a>
                    <?php
                            $index++;
                        endwhile;
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="services__info-block">
            <?php if(have_rows('services_items')): ?>
                <?php
                    $index = 0;
                    while( have_rows('services_items') ) : the_row();
                ?>
                    <div class="services__information <?php if($index === 0): echo 'active'; endif; ?>" data-id="<?php echo $index ?>">
                        <div>
                            <h3><?php echo get_sub_field('title'); ?></h3>
                            <a>Завантажити каталог</a>
                        </div>
                        <?php if(get_sub_field('text_1')): ?>
                        <div>
                            <?php echo get_sub_field('text_1') ?>
                        </div>
                        <?php endif; ?>
                        <?php if(get_sub_field('photos')): ?>
                            <div class="services__slider">
                                <?php $photos = get_sub_field('photos');
                                foreach($photos as $photo):
                                ?>
                                    <div>
                                        <img src="<?php echo $photo['url'] ?>">
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if(get_sub_field('text_2')): ?>
                        <div>
                            <?php echo get_sub_field('text_2') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php
                        $index++;
                    endwhile;
                ?>
            <?php endif; ?>
        </div>
    </div>
</section>