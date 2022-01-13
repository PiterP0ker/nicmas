<?php
/*
	General Content Page
*/
get_header();

if (is_front_page()) :

    get_template_part('templates/home');

elseif (is_page()) :

    get_template_part('templates/page');

else :

    if (have_posts()) : while (have_posts()) : the_post();

            the_content();

        endwhile;
    else :

        echo 'Page Not Found';

    endif;

endif;

get_footer();
