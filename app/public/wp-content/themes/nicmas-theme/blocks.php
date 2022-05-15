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
                'name'              => 'all-posts-news',
                'title'             => __('Всі публікації'),
                'description'       => __('Всі публікації'),
                'render_template'   => 'blocks/all-posts-news.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'all-posts-news' ),
            ));

            acf_register_block_type(array(
                'name'              => 'all-videos',
                'title'             => __('Актуальні відео'),
                'description'       => __('Актуальні відео'),
                'render_template'   => 'blocks/all-videos/all-videos.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'all-videos' ),
            ));

            acf_register_block_type(array(
                'name'              => 'chosen-videos',
                'title'             => __('Вибірка відео'),
                'description'       => __('Вибірка відео'),
                'render_template'   => 'blocks/chosen-videos.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'chosen-videos' ),
            ));

            acf_register_block_type(array(
                'name'              => 'videos-by-categories',
                'title'             => __('Відео за категорією'),
                'description'       => __('Відео за категорією'),
                'render_template'   => 'blocks/all-videos/videos-by-categories.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'videos-by-categories' ),
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
                'description'       => __('Блок із слайдером для сертифікатів'),
                'render_template'   => 'blocks/certificates.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'certificates' ),
            ));

            acf_register_block_type(array(
                'name'              => 'page-navigation',
                'title'             => __('Навігація по сторінці'),
                'description'       => __('Блок із навігацією по блокам що знаходяться нижче від цього блока'),
                'render_template'   => 'blocks/page-navigation.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'page-navigation' ),
            ));

            acf_register_block_type(array(
                'name'              => 'breadcrumbs',
                'title'             => __('Блок хлібних крихт'),
                'description'       => __('Блок із навігацією по меню відносно даної сторінки'),
                'render_template'   => 'blocks/breadcrumbs/breadcrumbs.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'breadcrumbs' ),
            ));

            acf_register_block_type(array(
                'name'              => 'accordion',
                'title'             => __('Блок робіт/звітів'),
                'description'       => __('Блок акордіону / таблиця робіт'),
                'render_template'   => 'blocks/accordion.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'accordion' ),
            ));

            acf_register_block_type(array(
                'name'              => 'contact-form',
                'title'             => __('Контактна форма'),
                'description'       => __('Форма для контактів'),
                'render_template'   => 'blocks/contact-form.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'contact-form' ),
            ));

            acf_register_block_type(array(
                'name'              => 'partners-list',
                'title'             => __('Партнери'),
                'description'       => __('Блок партнерів'),
                'render_template'   => 'blocks/partners-list.php',
                'category'          => 'formatting',
                'icon'              => 'align-left',
                'keywords'          => array( 'partners-list' ),
            ));
        }
    }

add_filter( 'allowed_block_types_all', 'filter_function_name_2201', 10, 2 );
function filter_function_name_2201( $allowed_block_types, $block_editor_context ){
    return [
        'core/heading',
        'core/paragraph',
        'core/image',
        'core/list',
        'acf/main-hero',
        'acf/news',
        'acf/actual',
        'acf/informational',
        'acf/hero',
        'acf/services',
        'acf/image-text',
        'acf/certificates',
        'acf/page-navigation',
        'acf/breadcrumbs',
        'acf/accordion',
        'acf/contact-form',
        'acf/partners-list',
        'acf/all-videos',
        'acf/videos-by-categories',
        'acf/chosen-videos',
        'acf/all-posts-news',
        'acf/directions',
    ];
}