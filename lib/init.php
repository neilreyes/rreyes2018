<?php
/* Roboto Constants */
function roboto_constants(){
	define( 'ROBOTO_DIR' , dirname(__FILE__) . '/' );
	define( 'ROBOTO_ASSETS', dirname(__FILE__) . '/assets/' );
	define( 'ROBOTO_COMPONENTS_DIR', dirname(__FILE__) . '/components/' );
	define( 'ROBOTO_FUNCTIONS_DIR', dirname(__FILE__) . '/functions/' );
	define( 'ROBOTO_STRUCTURES_DIR', dirname(__FILE__) . '/structures/' );
	define( 'ROBOTO_TEMPLATE_PARTS_DIR', dirname(__FILE__) . '/template-parts/' );
}	

add_action( 'roboto_init', 'roboto_constants' );

function roboto_load_framework(){
	// Load framework
	require_once( ROBOTO_DIR . 'framework.php' );

	// Load functions
	// require_once( ROBOTO_FUNCTIONS_DIR . 'acf.php' );
	// require_once( ROBOTO_FUNCTIONS_DIR . 'widgetize.php' );

	// Load structures
<<<<<<< HEAD
	// require_once( ROBOTO_STRUCTURES_DIR . 'footer.php');
=======
	require_once( ROBOTO_STRUCTURES_DIR . 'footer.php');
>>>>>>> develop
	require_once( ROBOTO_STRUCTURES_DIR . 'front-page.php');
	require_once( ROBOTO_STRUCTURES_DIR . 'header.php');
	require_once( ROBOTO_STRUCTURES_DIR . 'layout.php');
	require_once( ROBOTO_STRUCTURES_DIR . 'loops.php');
	require_once( ROBOTO_STRUCTURES_DIR . 'post.php');

	// require_once( ROBOTO_STRUCTURES_DIR . 'menu.php' );
}

add_action( 'roboto_init', 'roboto_load_framework' );

function roboto_load_option_page(){
	// ACF add options page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Roboto Settings',
			'menu_title'	=> 'Roboto Settings',
			'menu_slug' 	=> 'roboto-theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> true
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'General Settings',
			'menu_title'	=> 'General Settings',
			'parent_slug'	=> 'roboto-theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Site Header Settings',
			'menu_title'	=> 'Site Header',
			'parent_slug'	=> 'roboto-theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Site Footer Settings',
			'menu_title'	=> 'Site Footer',
			'parent_slug'	=> 'roboto-theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Social Media Channels',
			'menu_title'	=> 'Social Media Channels',
			'parent_slug'	=> 'roboto-theme-general-settings',
		));
	}
}

add_action('roboto_init','roboto_load_option_page');

do_action('roboto_init');

function roboto_child_theme_setup(){
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );

	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-footer-widget', 4 );
	// Remove .wrap from menu-primary or other element by omitting them from the array below
	add_theme_support( 'genesis-structural-wraps', array() );

	remove_action('genesis_site_title', 'genesis_seo_site_title');
	remove_action('genesis_side_description', 'genesis_seo_site_description');
}

add_action('genesis_setup', 'roboto_child_theme_setup', 15);

function roboto_styles_and_scripts(){
	$parent_style = 'parent-style';
	$roboto_base_style = 'roboto-base-style';
	$roboto_main_style = 'roboto-main-style';
	$roboto_font_stack = 'roboto-gfonts';

	wp_enqueue_style( $roboto_font_stack, 'https://fonts.googleapis.com/css?family=Montserrat:700|Rubik:300,400,500' );	
	wp_enqueue_style( $roboto_style, get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style( $roboto_main_style, get_stylesheet_directory_uri() . '/lib/assets/dist/css/main.css');

	$navigation_script = 'roboto-theme-navigation';
	$slide_out = 'slide-out-js';
	$roboto_features_Script = 'roboto-features';

	wp_enqueue_script( $slide_out, 'https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js', array('jquery'), false, true );

	//wp_enqueue_script( $navigation_script, get_stylesheet_directory_uri() . '/lib/assets/src/js/navigation.js', array('jquery'), false, true );

	//wp_enqueue_script( $roboto_features_script, get_stylesheet_directory_uri() . '/lib/assets/src/js/roboto-features.js', array('jquery'), false, true );

	//wp_enqueue_script( 'tabs', get_stylesheet_directory_uri() . '/lib/assets/src/js/tabs.js', array('jquery'), false, true );
}

add_action('wp_enqueue_scripts','roboto_styles_and_scripts');

?>