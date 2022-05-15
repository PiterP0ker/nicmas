<?php
/*
    Useful for quick debugging
*/
if (!function_exists('_log')) {
	function _log($message) {
		if (WP_DEBUG == true) {
			if (is_array($message) || is_object($message)) {
				error_log(print_r($message, true));
			} else {
				error_log($message);
			}
		}
	}
}

/*
	Add title tag support
*/

add_theme_support('title-tag');

/*
	Google Tag Manager
*/
add_action('wp_head', function () { ?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-KB7P7G4');
	</script>

<?php

}, 99);

add_action('wp_body_open', function () { ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KB7P7G4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php
});

/*
	Enqueue Stylesheets
*/
add_action('wp_enqueue_scripts', function () {

	wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/vendors/slick.css', null, filemtime('wp-content/themes/' . get_stylesheet() . '/css/vendors/slick.css'));
	wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/style.css', null, filemtime('wp-content/themes/' . get_stylesheet() . '/css/style.css'));
});

/*
	Enqueue Javascript
 */
add_action('wp_enqueue_scripts', function () {

	// Deregister the default and add it back in to the footer
//	wp_deregister_script('jquery');
//	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
	wp_enqueue_script('jquery');

	wp_enqueue_script('scrollreveal', 'https://unpkg.com/scrollreveal');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/vendors/slick.min.js', 'jquery', filemtime('wp-content/themes/' . get_stylesheet() . '/js/vendors/slick.min.js'), true);
    wp_enqueue_script('select2-js', get_template_directory_uri() . '/js/vendors/select2.min.js', 'jquery', filemtime('wp-content/themes/' . get_stylesheet() . '/js/vendors/select2.min.js'), true);

	wp_register_script('custom_scripts', get_template_directory_uri() . '/js/custom.js', 'jquery', filemtime('wp-content/themes/' . get_stylesheet() . '/js/custom.js'), true);

	// Feed PHP data to custom_scripts
	$theme_vars = [
		'templateUrl' => get_bloginfo('template_url'),
		'websiteUrl' => site_url(),
	];

	global $wp_query;

	wp_localize_script( 'custom_scripts', 'loadmore_params', array(
    		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    		'posts' => json_encode( $wp_query->query_vars ),
    		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    		'max_page' => $wp_query->max_num_pages
    	) );
	wp_localize_script('custom_scripts', 'themeData', $theme_vars);
	wp_enqueue_script('custom_scripts');
});

/*
	Register Navs
*/
add_action('init', function () {

	register_nav_menus(
		array(
			'menu' => __('Menu'),
		)
	);
});

/*
	Remove tags and categories from articles
*/
add_action('init', function () {

	unregister_taxonomy_for_object_type('post_tag', 'post');
	unregister_taxonomy_for_object_type('category', 'post');
});

/*
	Misc Head code to add
*/
add_action('wp_head', function () { ?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php
}, 1);

/*
	Add Favicons

	@link realfavicongenerator.net
*/
add_action('wp_head', function () {

	$theme_directory = get_template_directory_uri();
?>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= $theme_directory; ?>/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= $theme_directory; ?>/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= $theme_directory; ?>/img/favicons/favicon-16x16.png">
	<link rel="mask-icon" href="<?= $theme_directory; ?>/img/favicons/safari-pinned-tab.svg" color="#52c1e9">
	<link rel="shortcut icon" href="<?= $theme_directory; ?>/img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#52c1e9">
	<meta name="msapplication-config" content="<?= $theme_directory; ?>/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

<?php
}, 11);

/*
        Disable XML RPC
        @source https://wordpress.org/plugins/disable-xml-rpc/
*/
add_filter('xmlrpc_enabled', '__return_false');

/*
	Simplify WordPress code
*/
add_action('init', function () {

	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
	//wp_deregister_script( 'wp-embed' ); // Note: breaks sites with Gutenberg
	add_filter('the_generator', '__return_empty_string');
	add_filter('gform_display_add_form_button', '__return_false');
}, 2);

/*
	Remove unneeded options from black header toolbar
*/
add_action('admin_bar_menu', function ($wp_admin_bar) {

	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('searchwp');
}, 999);

/*
    Disable unnecessary WordPress password reset emails

    @source https://wordpress.stackexchange.com/a/266006/4386
*/
add_filter('send_password_change_email', '__return_false');

/*
	Remove Unneccessary WordPress Menu Options
*/
add_action('admin_menu', function () {

	remove_menu_page('edit-comments.php');
});

/*
	Prevent pasting weird formatting into TinyMCE
*/
add_filter('tiny_mce_before_init', function ($init) {

	$init['paste_as_text'] = true;
	return $init;
});

/*
    Remove unwanted TinyMCE buttons from second row
*/
add_filter('mce_buttons_2', function ($buttons) {

	$remove = array('charmap', 'removeformat', 'wp_help', 'forecolor', 'strikethrough');
	return array_diff($buttons, $remove);
}, 2020);

/*
    Remove h1 from TinyMCE Dropdown
*/
add_filter('tiny_mce_before_init', function ($args) {

	$args['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
	return $args;
});

/*
    Remove Appearance > Customize for all
    @https://stackoverflow.com/a/25877769
*/
add_action('admin_menu', function () {
	global $submenu;
	unset($submenu['themes.php'][6]); // Customize
});

/*
	Remove unneeded admin dashboards
*/
add_action('admin_init', function () {

	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
	remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');
	remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');
});

/*
	Add footer credits
*/
add_filter('admin_footer_text', function () {

	echo '<a href="https://www.bronte.co.nz">Website by Bronte</a>';
});

/*
    Add support for Label-less Gravity Forms
*/
add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/*
    Scroll to Gravity Form confirmation message after form submission
*/
add_filter('gform_confirmation_anchor', '__return_true');

/*
	Move gform jquery scripts to footer

	@link http://hereswhatidid.com/2013/01/move-gravity-forms-jquery-calls-to-footer/
*/
add_filter('gform_init_scripts_footer', '__return_true');

/*
    Update Gravity Forms submit button
*/
add_filter('gform_submit_button', function ($button, $form) {

	return '<button type="submit" class="gform_button button btn btn-primary" id="gform_submit_button_' . $form['id'] . '">' . $form['button']['text'] . '</button>';
}, 10, 2);

/*
    Disable Gutenberg custom color picker.
*/
add_action('after_setup_theme', function () {

	add_theme_support('disable-custom-colors');
});

/*
	Always show Yoast low on the page in the backend
*/
add_filter('wpseo_metabox_prio', function () {
	return 'low';
});

if (function_exists('acf_add_options_page')) {

	acf_add_options_page();
}

add_theme_support('post-thumbnails');

add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
  return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

include_once( get_template_directory() . '/walker.php' );

include_once( get_template_directory() . '/blocks.php' );


add_image_size( 'posts', 270, 194 );

function loadmore_ajax_handler(){

function getDuration($videoID){
   $apikey = "AIzaSyAAlPE3N8dyOuzY8-f6hYg5vuYmQS6ceLs";
   $dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$videoID&key=$apikey");
   $VidDuration =json_decode($dur, true);
   foreach ($VidDuration['items'] as $vidTime)
   {
       $VidDuration= $vidTime['contentDetails']['duration'];
   }
   preg_match_all('/(\d+)/',$VidDuration,$parts);
   return convertDuration($parts);
}

function convertDuration($parts) {
    $result = '';

    if($parts[0][0]) {
        $result = $result.$parts[0][0];
    }

    if($parts[0][1]) {
        $result = $result.":".$parts[0][1];
    } else {
        $result = "0:".$result;
    }

    if($parts[0][2]) {
        $result = $result.":".$parts[0][2];
    }

    return $result;
}

// 	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	$args['post_type'] = $_POST['post_type'];
	$args['posts_per_page'] = $_POST['ppp'];
	$args['category_name'] = $_POST['category'];

    $loop = new WP_Query($args);


	if( $loop->have_posts() ) :

		while( $loop->have_posts() ): $loop->the_post();
		    if( $args['post_type'] === 'video') {
                $video_link = get_field('video_link', get_post()->ID,);
                $categories = get_the_category(get_post()->ID,);
                $category = $categories[0]->name;

                $url_path = parse_url($video_link['url'], PHP_URL_PATH);
                $basename = pathinfo($url_path, PATHINFO_BASENAME);

		        get_template_part(
                    'template-parts/video-card',
                    '',
                    array(
                    'id' => get_post()->ID,
                    'video_link' => $video_link['url'],
                    'category' => $category,
                    'duration' => getDuration($basename),
                ));
		    } else {
			    get_template_part('template-parts/actuals-card', '', array('actual' => get_post()->ID));
		    }

		endwhile;

	endif;
	die;
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler');

function loadmore_accordion_ajax_handler(){

// 	$args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $args['post_type'] = $_POST['post_type'];
    $args['posts_per_page'] = $_POST['ppp'];
    if ($_POST['term'] !== 'all') {
        $args[$_POST['tax']] = $_POST['term'];
    }

    $loop = new WP_Query($args);


    if( $loop->have_posts() ) :

        while( $loop->have_posts() ): $loop->the_post();


            get_template_part('template-parts/accordion-row', '', array('post_id' => get_post()->ID));

        endwhile;

    endif;
    die;
}

add_action('wp_ajax_loadmore-accordion', 'loadmore_accordion_ajax_handler');
add_action('wp_ajax_nopriv_loadmore-accordion', 'loadmore_accordion_ajax_handler');

function load_accordion_ajax_handler(){

// 	$args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = 0;
    $args['post_status'] = 'publish';
    $args['post_type'] = $_POST['post_type'];
    $args['posts_per_page'] = $_POST['ppp'];
    if ($_POST['term'] !== 'all') {
        $args[$_POST['tax']] = $_POST['term'];
    }

    $loop = new WP_Query($args);


    if( $loop->have_posts() ) :

        while( $loop->have_posts() ): $loop->the_post();


            get_template_part('template-parts/accordion-row', '', array('post_id' => get_post()->ID));

        endwhile;

    endif;
    die;
}

add_action('wp_ajax_load-accordion', 'load_accordion_ajax_handler');
add_action('wp_ajax_nopriv_load-accordion', 'load_accordion_ajax_handler');