<?php
/**
 * @package WordPress
 * @subpackage studio5A2 Theme
 *
 * @author studio5A2
 */

if( !function_exists('theme_setup') ) {

	function theme_setup() {

		// include files in studio/includes
		studio_includes();

		// setup theme skeleton
		Skeleton::Register();

		// add some other functionalities
		add_theme_support( 'post-thumbnails' ); 		// add post thumbnail support
		add_editor_style( 'dist/css/app.css' ); 		// add css for editor
		add_theme_support( 'automatic-feed-links' ); 	// add feed links

		// load textdomain studio for theme translations
		// usage: echo __('Fill in your name', 'studio');
		load_theme_textdomain( 'studio', get_template_directory().'/languages' );

		// Display the XHTML generator that is generated on the wp_head hook, WP version
		remove_action( 'wp_head', 'wp_generator');
	}
}

if( !function_exists('studio_includes') ) {

	function studio_includes() {

	   // array with directories to include
	   $aIncludeDirs = array(
	   		get_stylesheet_directory().'/studio/includes', // child theme
	   		get_template_directory().'/studio/includes',   // parent theme
	   	);

		// scan & include files in studio/includes
		foreach( $aIncludeDirs as $aIncludedDir ) {
			foreach( scandir($aIncludedDir) as $file ) {
				if( substr($file, 0, 1) !== '.' && strpos($file, '.php') !== false ) {
					require_once( $aIncludedDir.'/'.$file) ;
				}
			}
		}
	}
}

// run theme setup
add_action( 'after_setup_theme', 'theme_setup' );