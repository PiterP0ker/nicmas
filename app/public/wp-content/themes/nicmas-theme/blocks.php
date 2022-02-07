<?php
    add_action('acf/init', 'my_acf_init_block_types');
    function my_acf_init_block_types() {

        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            acf_register_block_type(array(
                'name'              => 'main-hero',
                'title'             => __('Головний блок домашньої сторінки'),
                'description'       => __('Головний блок домашньої сторінки'),
                'render_template'   => 'blocks/main-hero.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'main-hero' ),
            ));

            acf_register_block_type(array(
                'name'              => 'directions',
                'title'             => __('Направлення'),
                'description'       => __('Направлення'),
                'render_template'   => 'blocks/directions.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'directions' ),
            ));

            acf_register_block_type(array(
                'name'              => 'news',
                'title'             => __('Новини'),
                'description'       => __('Новини'),
                'render_template'   => 'blocks/news.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'news' ),
            ));

            acf_register_block_type(array(
                'name'              => 'actual',
                'title'             => __('Актуальні'),
                'description'       => __('Актуальні'),
                'render_template'   => 'blocks/actual.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'actual' ),
            ));

            acf_register_block_type(array(
                'name'              => 'informational',
                'title'             => __('Інфрмаційний блок'),
                'description'       => __('Блок для відтворення інформації (додавання 1\2 фото, або відео)'),
                'render_template'   => 'blocks/informational.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'informational' ),
            ));

            acf_register_block_type(array(
                'name'              => 'hero',
                'title'             => __('Головний блок'),
                'description'       => __('Головний блок сторінки'),
                'render_template'   => 'blocks/hero.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'hero' ),
            ));

            acf_register_block_type(array(
                'name'              => 'services',
                'title'             => __('Послуги'),
                'description'       => __('Блок послуг'),
                'render_template'   => 'blocks/services.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'services' ),
            ));

            acf_register_block_type(array(
                'name'              => 'image-text',
                'title'             => __('Блок з фото та текстом'),
                'description'       => __('Інформаційний блок з фото, текстом та посиланням на інший сайт'),
                'render_template'   => 'blocks/image-text.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'image-text' ),
            ));

            acf_register_block_type(array(
                'name'              => 'certificates',
                'title'             => __('Сертифікати'),
                'description'       => __('блок із слайдером для сертифікатів'),
                'render_template'   => 'blocks/certificates.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'certificates' ),
            ));
        }
    }