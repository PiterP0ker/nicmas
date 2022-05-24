<form class="search-form" action="/" method="get">
    <div class="search-form__wrap">
        <div class="search-form__inner">
            <div class="search-form__btn-wrap">
                <div class="search-form__svg"><?php echo get_template_part('svg/search'); ?></div>
                <input type="image" alt="Search" />
            </div>
            <input type="text" name="s" id="search" placeholder="Ваш запит..." value="<?php the_search_query(); ?>" />
            <span class="search-form__close">
                <?php echo get_template_part('svg/close'); ?>
            </span>
        </div>
    </div>

    <div class="search-form__btn"><?php echo get_template_part('svg/search'); ?></div>
</form>