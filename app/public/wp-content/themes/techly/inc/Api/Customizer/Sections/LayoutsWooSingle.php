<?php
/**
 * Theme Customizer - Header
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RTFramework\Customize;
use RT\Techly\Traits\LayoutControlsTraits;

/**
 * Customizer class
 */
class LayoutsWooSingle extends Customizer {

	use LayoutControlsTraits;

	protected $section_woocommerce_single_layout = 'rt_woocommerce_single_layout_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {

		Customize::add_section( [
			'id'    => $this->section_woocommerce_single_layout,
			'title' => __( 'Woocommerce Single', 'techly' ),
			'panel' => 'rt_layouts_panel',
		] );
		Customize::add_controls( $this->section_woocommerce_single_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'woo-single' );
	}

}
