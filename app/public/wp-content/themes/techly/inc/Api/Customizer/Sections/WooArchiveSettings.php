<?php
namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RTFramework\Customize;
/**
 * Customizer class
 */
class WooArchiveSettings extends Customizer {
	protected $section_wooarchive_settins = 'techly_woo_archive_settings';
	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_wooarchive_settins,
			'title'       => __( 'Woocommerce Settings', 'techly' ),
			'description' => __( 'techly Woocommerce Archive Settings', 'techly' ),
			'priority'    => 1,
			'panel' => 'woocommerce',
		] );

		Customize::add_controls( $this->section_wooarchive_settins, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'techly_service_controls', [

			'rt_woo_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Woocommerce Archive Option', 'techly' ),
			],

			'products_cols_width' => [
				'type'    => 'number',
				'label'   => __( 'Products Per Column', 'techly' ),
				'description' => __('Use product per col default 4', 'techly'),
				'default' => '4',
			],

			'products_per_page' => [
				'type'    => 'number',
				'label'   => __( 'Number of items per page', 'techly' ),
				'description' => __( 'Effect only for Shop custom page template', 'techly' ),
				'default' => '12',
			],

			'wc_woo_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category', 'techly' ),
				'default' => 1
			],

			'wc_woo_cart' => [
				'type'    => 'switch',
				'label'   => __( 'Cart', 'techly' ),
				'default' => 0
			],

			'wc_shop_quickview_icon' => [
				'type'    => 'switch',
				'label'   => __( 'QuickView', 'techly' ),
				'default' => 0
			],

			'wc_shop_compare_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Compare', 'techly' ),
				'default' => 0
			],

			'wc_shop_wishlist_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Wishlist', 'techly' ),
				'default' => 0
			],

			'wc_shop_qcheckout_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Quick Checkout', 'techly' ),
				'default' => 0
			],

			'wc_shop_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating', 'techly' ),
				'default' => 1
			],

			'rt_woo_variation_attr' => [
				'type'    => 'switch',
				'label'   => __( 'Variation Attribute', 'techly' ),
				'default' => 0
			],

			'wc_shop_sale_flash' => [
				'type'    => 'switch',
				'label'   => __( 'Sale Flash', 'techly' ),
				'default' => 1
			],

			'wc_sale_label' => [
				'type'    => 'select',
				'default' => 'text',
				'label'   => __( 'Sale Product Label', 'techly' ),
				'condition' => [ 'wc_shop_sale_flash' ],
				'choices' => [
					'percentage'       => __( 'Percentage', 'techly' ),
					'text'       => __( 'Text', 'techly' ),
				],
			],

			'rt_shop_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Shop Banner Title', 'techly' ),
				'default' => __( 'Shop Page', 'techly' ),
			],

		] );
	}
}
