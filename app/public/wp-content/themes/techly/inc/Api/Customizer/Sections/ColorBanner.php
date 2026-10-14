<?php
/**
 * Theme Customizer - Header
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class ColorBanner extends Customizer {

	protected $section_banner_color = 'rt_banner_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_banner_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Banner / Breadcrumb Colors', 'techly' ),
			'description' => __( 'Banner Color Section', 'techly' ),
			'priority'    => 6
		] );

		Customize::add_controls( $this->section_banner_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_site_color_controls', [

			'rt_breadcrumb_title_color' => [
				'type'    => 'color',
				'label'   => __( 'Title Color', 'techly' ),
			],
			'rt_breadcrumb_color' => [
				'type'    => 'color',
				'label'   => __( 'Link Color', 'techly' ),
			],
			'rt_breadcrumb_hover' => [
				'type'    => 'color',
				'label'   => __( 'Link Hover Color', 'techly' ),
			],
			'rt_breadcrumb_active' => [
				'type'    => 'color',
				'label'   => __( 'Link Active Color', 'techly' ),
			],
			'rt_banner_overlay1_color' => [
				'type'         => 'alfa_color',
				'label'        => __( 'Banner Overlay 1 Color', 'techly' ),
			],
			'rt_banner_overlay2_color' => [
				'type'         => 'alfa_color',
				'label'        => __( 'Banner Overlay 2 Color', 'techly' ),
			],
		] );
	}
}
