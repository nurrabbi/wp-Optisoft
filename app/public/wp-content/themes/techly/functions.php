<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `inc/Custom/Custom.php` to write your custom functions
 *
 * @package techly
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( class_exists( 'RT\\Techly\\Init' ) ) :
	RT\Techly\Init::instance();
	do_action('techly_theme_init');
endif;

add_editor_style( 'style-editor.css' );



// // Category list count wrap filter
// add_filter('wp_list_categories', function($output){
//     // Replace (12) → <span class="count">12</span>
//     $output = preg_replace('/\((\d+)\)/', '<span class="count">($1)</span>', $output);
//     return $output;
// });







