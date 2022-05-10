<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'page-navigation-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'page-navigation';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$content_array = parse_blocks(get_the_content());

foreach ($content_array as $key => $val) {
    if ($val['blockName'] === 'acf/page-navigation') {
        $blockIndex = $key;
        break;
    }
}

$content_array_filtered = array_filter($content_array, function ($value, $key) use ($blockIndex) {
    return $value['blockName'] && $value['blockName'] !== 'acf/actual' && $key > $blockIndex;
}, ARRAY_FILTER_USE_BOTH);

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container page-navigation__container" style="grid-template-columns: repeat(<?php echo count($content_array_filtered) ?>, 1fr)">
        <?php
        foreach ($content_array_filtered as $key => $value):
            $block_name = mb_substr($value['attrs']['name'], 4);
            $link_title = $value['attrs']['data'][$block_name.'_title'];
            ?>
            <a class="page-navigation__link" href="#<?php echo $link_title ?>"><?php echo $link_title ?></a>
        <?php
        endforeach;
        ?>
    </div>
</section>