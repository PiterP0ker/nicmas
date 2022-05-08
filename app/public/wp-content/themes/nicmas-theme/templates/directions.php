<?php
/*
Template Name: Directions Template
*/
get_header();

the_content();


$cont = parse_blocks(get_the_content());
var_dump($cont);
echo $cont[0]['blockName'];
var_dump(get_block_template($cont[0]['attrs']['id']))
?>



<?php

get_footer();
