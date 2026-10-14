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
class ColorSite extends Customizer {
	protected $section_site_color = 'rt_site_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_site_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Site Colors', 'techly' ),
			'description' => __( 'Site Color Section', 'techly' ),
			'priority'    => 2
		] );
		Customize::add_controls( $this->section_site_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_site_color_controls', [

			'rt_site_color1'   => [
				'type'  => 'heading',
				'label' => __( 'Site Ascent Color', 'techly' ),
			],
			'rt_primary_color' => [
				'type'    => 'color',
				'label'   => __( 'Primary Color', 'techly' ),
			],

			'rt_color_separator2' => [
				'type' => 'separator',
			],

			'rt_secondary_color' => [
				'type'    => 'color',
				'label'   => __( 'Secondary Color', 'techly' ),
			],

			'rt_color_separator3' => [
				'type' => 'separator',
			],

			'rt_tertiary_color' => [
				'type'    => 'color',
				'label'   => __( 'Tertiary Color', 'techly' ),
			],

			'rt_site_color2' => [
				'type'  => 'heading',
				'label' => __( 'Others Color', 'techly' ),
			],

			'rt_body_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Body BG Color', 'techly' ),
			],

			'rt_body_color' => [
				'type'    => 'color',
				'label'   => __( 'Body Color', 'techly' ),
			],

			'rt_border_color' => [
				'type'    => 'color',
				'label'   => __( 'Border Color', 'techly' ),
			],

			'rt_title_color' => [
				'type'    => 'color',
				'label'   => __( 'Title Color', 'techly' ),
			],

			'rt_button_color' => [
				'type'    => 'color',
				'label'   => __( 'Button Color', 'techly' ),
			],

			'rt_button_text_color' => [
				'type'    => 'color',
				'label'   => __( 'Button Text Color', 'techly' ),
			],

			'rt_meta_color' => [
				'type'    => 'color',
				'label'   => __( 'Meta Color', 'techly' ),
			],

			'rt_meta_light' => [
				'type'    => 'color',
				'label'   => __( 'Meta Light', 'techly' ),
			],

			'rt_gray10_color' => [
				'type'    => 'color',
				'label'   => __( 'Gray # 1', 'techly' ),
			],

			'rt_gray20_color' => [
				'type'    => 'color',
				'label'   => __( 'Gray # 2', 'techly' ),
			],

		] );


	}

}
