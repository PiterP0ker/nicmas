<?php
/* Template Name: Search Page */

get_header();

?>

<section class="search-page">
    <div class="container">
        <h1 class="search-page__title"><?php _e( 'Результат пошуку:', 'nd_dosth' ); ?></h1>
        <div class="search-page__results">
            <?php if ( have_posts() ): ?>
                <?php while( have_posts() ): ?>
                    <?php
                    the_post();
                    $post_id = get_post()->ID;
                    $subtitle = get_field("subtitle", $post_id);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="search-page__result">
                        <h2><?php the_title(); ?></h2>
                        <?php if($subtitle): ?>
                            <p><?php echo $subtitle ?></p>
                        <?php endif; ?>
                        <?php the_excerpt(); ?>
                    </a>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else: ?>
                <p><?php _e( 'На ваш запит нічого не знайдено', 'nd_dosth' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer();