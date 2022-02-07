<?php
$url = $args['url'];
$title = $args['title'];
$target = $args['target'];
$color = $args['color'];

?>
<a class="link <?php echo $color ?>" href="<?php echo $url ?>" target="<?php if($target): echo $target; else: echo '_self'; endif; ?>"><?php echo $title; echo get_template_part('svg/arrow-right'); ?></a>
