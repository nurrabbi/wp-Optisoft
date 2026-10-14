<?php
/**
 * Theme Demo Configuration File
 *
 * This file contains the configuration for the demo importer.
 *
 * @package @package Radiustheme\Techly
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

return [
	// Basic theme information.
	'blog_slug'           => 'blog',
	'demo_url'            => 'https://www.radiustheme.com/demo/wordpress/themes/techly/',
	'commenter_email'     => 'dev-email@wpengine.local',
	'menus'               => [
		'primary'  => 'Main Menu',
	],

	// File paths.
	'demo_content_zip'    => 'demo-files/demo-content.zip',

	// Demo variants.
	'demo_variants'       => [
		'home' => [
			'name'    => 'Home',
			'preview' => 'screenshots/home-1.webp',
			'url'     => '',
		],
		'home-02' => [
			'name'    => 'Home 02',
			'preview' => 'screenshots/home-2.webp',
			'url'     => 'home-02/',
		],
		'home-03' => [
			'name'    => 'Home 03',
			'preview' => 'screenshots/home-3.webp',
			'url'     => 'home-03/',
		],
		'home-04' => [
			'name'    => 'Home 04',
			'preview' => 'screenshots/home-4.webp',
			'url'     => 'home-04/',
		],
		'home-05' => [
			'name'    => 'Home 05',
			'preview' => 'screenshots/home-5.webp',
			'url'     => 'home-05/',
		],
		'home-06' => [
			'name'    => 'Home 06',
			'preview' => 'screenshots/home-6.webp',
			'url'     => 'home-06/',
		],
	
		'home-07' => [
			'name'    => 'Home 07',
			'preview' => 'screenshots/home-7.webp',
			'url'     => 'home-07/',
		],
		'home-08' => [
			'name'    => 'Home 08',
			'preview' => 'screenshots/home-8.webp',
			'url'     => 'home-08/',
		],

		'home-one-page' => [
			'name'    => 'Home One Page',
			'preview' => 'screenshots/home-1.webp',
			'url'     => 'home-one-page/',
		],
		'home-02-onepage' => [
			'name'    => 'Home 02 Onepage',
			'preview' => 'screenshots/home-2.webp',
			'url'     => 'home-02-onepage/',
		],
		'home-03-onepage' => [
			'name'    => 'Home 03 Onepage',
			'preview' => 'screenshots/home-3.webp',
			'url'     => 'home-03-onepage/',
		],
		'home-04-onepage' => [
			'name'    => 'Home 04 Onepage',
			'preview' => 'screenshots/home-4.webp',
			'url'     => 'home-04-onepage/',
		],
		'home-05-onepage' => [
			'name'    => 'Home 05 Onepage',
			'preview' => 'screenshots/home-5.webp',
			'url'     => 'home-05-onepage/',
		],
		'home-06-onepage' => [
			'name'    => 'Home 06 Onepage',
			'preview' => 'screenshots/home-6.webp',
			'url'     => 'home-06-onepage/',
		],
		'home-07-onepage' => [
			'name'    => 'Home 07 Onepage',
			'preview' => 'screenshots/home-7.webp',
			'url'     => 'home-07-onepage/',
		],
		'home-08-onepage' => [
			'name'    => 'Home 08 Onepage',
			'preview' => 'screenshots/home-8.webp',
			'url'     => 'home-08-onepage/',
		],
		
	],

	// Additional settings.
	'settings_json'       => [
		'_fluentform_global_form_settings',
		'rtsb_extra_settings',
		'rtsb_settings',
		'rtsb_template_settings',
	],
	'fluent_forms_json'   => 'fluentform',

	// WordPress repository plugins.
	'wp_plugins'          => [
		'breadcrumb-navxt'               => 'Breadcrumb NavXT',
		'elementor'                      => 'Elementor Page Builder',
		'fluentform'                     => 'WP Fluent Forms',
		// 'woocommerce'                    => 'WooCommerce',
		// 'shopbuilder'                    => 'ShopBuilder – Elementor WooCommerce Builder Addons',
	],

	// Bundled/Premium plugins.
	'bundled_plugins'     => [
		'techly-core' => [
			'name' => 'Techly Core',
			'file' => 'plugin-bundle/techly-core.zip',
		],
		'rt-framework'                       => [
			'name' => 'RT Framework',
			'file' => 'plugin-bundle/rt-framework.zip',
		],
	],

	// Enable/disable import features.
	'features'            => [
		'woo_support'     => true,
		'elementor_fixes' => true,
	],

	'elementor_fixes' => [
		'rt-project' => [ 'cat_id' ],
	],

	// Pre-import options.
	'pre_import_options'  => [
		'elementor_experiment-e_font_icon_svg' => 'inactive',
	],

	// Post-import options.
	'post_import_options' => [
		'elementor_unfiltered_files_upload' => true,
	],
];
