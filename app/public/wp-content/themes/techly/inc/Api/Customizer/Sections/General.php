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
class General extends Customizer {
	protected $section_general = 'rt_general_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_general,
			'title'       => __( 'General', 'techly' ),
			'description' => __( 'General Section', 'techly' ),
			'priority'    => 20
		] );
		Customize::add_controls( $this->section_general, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_general_controls', [

			'rt_svg_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable SVG Upload', 'techly' ),
				'default' => 1,
			],

			'rt_preloader' => [
				'type'  => 'switch',
				'label' => __( 'Preloader', 'techly' ),
			],

			'rt_preloader_logo' => [
				'type'         => 'image',
				'label'        => __( 'Preloader Logo', 'techly' ),
				'description'  => __( 'Upload preloader logo for your site.', 'techly' ),
				'button_label' => __( 'Logo', 'techly' ),
				'condition' => [ 'rt_preloader' ]
			],

			'preloader_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Preloader Background Color', 'techly' ),
				'condition' => [ 'rt_preloader' ]
			],

			'rt_back_to_top' => [
				'type'  => 'switch',
				'label' => __( 'Back to Top', 'techly' ),
			],

			'rt_remove_admin_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Remove Admin Bar', 'techly' ),
				'description' => __( 'This option not work for administrator role.', 'techly' ),
			],

			'container_width' => [
				'type'    => 'select',
				'label'   => __( 'Container Width', 'techly' ),
				'default' => '1320',
				'choices' => [
					'1554' => esc_html__( '1554px', 'techly' ),
					'1364' => esc_html__( '1364px', 'techly' ),
					'1320' => esc_html__( '1320px', 'techly' ),
					'1200' => esc_html__( '1200px', 'techly' ),
					'1140' => esc_html__( '1140px', 'techly' ),
				]
			],

			'rt_blend' => [
				'type'        => 'switch',
				'label'       => __( 'Image Blend', 'techly' ),
				'default' => 0,
				'description' => __( 'This option for use all image blend mode.', 'techly' ),
			],

			'rt_google_fonts_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable Google Fonts', 'techly' ),
				'default' => 1,
			],

		] );

	}

}
