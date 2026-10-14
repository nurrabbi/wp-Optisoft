<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.1.0
 */

namespace RT\Techly\Modules;
use RT\Techly\Traits\SingletonTraits;

require_once get_template_directory() . '/inc/Lib/class-tgm-plugin-activation.php';
class TgmConfig {

	use SingletonTraits;

	public $base;
	public $path;

	public function __construct() {
		$this->base = 'techly';
		$this->path = get_template_directory() . '/plugin-bundle/';

		add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );
	}

	public function register_required_plugins() {
		$plugins = [
			// Bundled
			[
				'name'     => 'Techly Core',
				'slug'     => 'techly-core',
				'source'   => 'techly-core.zip',
				'required' => true,
				'version'  => '1.0.0'
			],
			[
				'name'     => 'RT Framework',
				'slug'     => 'rt-framework',
				'source'   => 'rt-framework.zip',
				'required' => true,
				'version'  => '3.0.3'
			],

			// Repository
			// [
			// 	'name'     => esc_html__('WooCommerce','techly'),
			// 	'slug'     => 'woocommerce',
			// 	'required' => false,
			// ],
			[
				'name'     => esc_html__('Breadcrumb NavXT','techly'),
				'slug'     => 'breadcrumb-navxt',
				'required' => false,
			],
			[
				'name'     => esc_html__('Elementor Page Builder','techly'),
				'slug'     => 'elementor',
				'required' => false,
			],
			[
				'name'     => esc_html__('WP Fluent Forms','techly'),
				'slug'     => 'fluentform',
				'required' => false,
			],
			[
				'name'     => esc_html__('Easy Demo Importer','techly'),
				'slug'     => 'easy-demo-importer',
				'required' => false,
			],
			// [
			// 	'name'     => esc_html__('ShopBuilder - Elementor WooCommerce Builder Addons','techly'),
			// 	'slug'     => 'shopbuilder',
			// 	'required' => false,
			// ],
		];

		$config = [
			'id'           => $this->base,
			'default_path' => $this->path,
			'menu'         => $this->base . '-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		];

		tgmpa( $plugins, $config );
	}
}
