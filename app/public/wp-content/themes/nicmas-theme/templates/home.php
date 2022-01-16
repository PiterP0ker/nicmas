<?php
/*
Template Name: Home Template
*/
get_header();

?>
<section class="section section--hero">
    <div class="container">
        <div class="hero">
        <?php
        $menu_name = 'menu';
        $locations = get_nav_menu_locations();
        $args = array('output_key' => 'object');
        function filter($item) {
            $type = get_post_meta($item->ID, '_menu_item_object');
            if($type[0] === 'page') {
                return true;
            }
            return false;
        };
        function take_pages_ids($item) {
            return get_post_meta($item->ID, '_menu_item_object_id');
        };
            $menu_pages = array_filter(wp_get_nav_menu_items($locations[ $menu_name ], $args), "filter");
            $page_ids = array_map('take_pages_ids', $menu_pages);




            ?>
        </div>
    </div>
</section>


<?php

get_footer();
