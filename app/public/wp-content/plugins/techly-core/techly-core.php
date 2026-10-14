<?php
/*
Plugin Name: Techly Core
Plugin URI: https://www.radiustheme.com
Description: Techly Theme Core Plugin
Version: 1.0.0
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'TECHLY_CORE' ) ) {
	define( 'TECHLY_CORE', '1.0.0' );
	define( 'TECHLY_CORE_PREFIX', 'techly' );
	define( 'TECHLY_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );
	define( 'TECHLY_CORE_BASE_DIR', plugin_dir_path( __FILE__ ) );
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( class_exists( 'RT\\TechlyCore\\Init' ) ) :
	RT\TechlyCore\Init::instance();
endif;

define( 'RDTHEME_CORE_DEMO_CONTENT', plugin_dir_path( __FILE__ ) . 'demo-importer/' );
define( 'RDTHEME_CORE_BASE_URL', plugin_dir_url( __FILE__ ) . 'demo-importer/' );
require_once RDTHEME_CORE_DEMO_CONTENT . 'init.php';
