<?php

function getLinks($menu, $id) {
    $res = [];
    foreach ($menu as $m) {
        if (get_post_meta($m->ID, '_menu_item_object_id')[0] == $id) {
            array_push($res, $m);
            if (get_post_meta($m->ID, '_menu_item_menu_item_parent')) {
                array_push($res, getLinks($menu, get_post_meta($m->ID, '_menu_item_menu_item_parent')[0])[0]);
            }
            break;
        }
    }
    return $res;
}