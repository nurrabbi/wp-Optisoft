<?php
/**
 * Theme Customizer - Header
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RT\Techly\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Header extends Customizer {
	protected $section_header = 'rt_header_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_header,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Menu', 'techly' ),
			'description' => __( 'Header Section', 'techly' ),
			'priority'    => 2,
			'edit-point'  => ''
		] );
		Customize::add_controls( $this->section_header, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_header_controls', [

			'rt_header_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Choose Layout', 'techly' ),
				'default'   => '1',
				'edit-link' => '.site-branding',
				'choices'   => Fns::image_placeholder( 'header', 2 )
			],

			'rt_menu_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Menu Alignment', 'techly' ),
				'default' => 'justify-content-center',
				'choices' => [
					''                       => __( 'Menu Alignment', 'techly' ),
					'justify-content-start'  => __( 'Left Alignment', 'techly' ),
					'justify-content-center' => __( 'Center Alignment', 'techly' ),
					'justify-content-end'    => __( 'Right Alignment', 'techly' ),
				]
			],

			'rt_header_width' => [
				'type'    => 'select',
				'label'   => __( 'Header Width', 'techly' ),
				'default' => 'box',
				'choices' => [
					'box'       => __( 'Box Width', 'techly' ),
					'full' => __( 'Full Width', 'techly' ),
				]
			],

			'rt_header_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Header Max Width (PX)', 'techly' ),
				'description' => __( 'Enter a number greater than 1440. Remove value for 100%', 'techly' ),
				'condition'   => [ 'rt_header_width', '==', 'full' ]
			],

			'rt_sticy_header' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Header', 'techly' ),
				'description' => __( 'Show header at the top when scrolling down', 'techly' ),
			],

			'rt_tr_header' => [
				'type'  => 'switch',
				'label' => __( 'Transparent Header', 'techly' ),
			],

			'rt_tr_header_color' => [
				'type'    => 'select',
				'label'   => __( 'Transparent color', 'techly' ),
				'default' => 'tr-header-dark',
				'choices' => [
					'tr-header-light'   => __( 'Light Color', 'techly' ),
					'tr-header-dark'    => __( 'Dark Color', 'techly' ),
				],
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_tr_header_shadow' => [
				'type'  => 'switch',
				'label' => __( 'Header Dark Shadow', 'techly' ),
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_header_border' => [
				'type'    => 'switch',
				'label'   => __( 'Header Border', 'techly' ),
				'default' => 0
			],
			'rt_header_sep1'   => [
				'type' => 'separator',
				'edit-link' => '.menu-icon-wrapper',
			],


			'rt_header_login_link' => [
				'type'    => 'switch',
				'label'   => __( 'User Login ?', 'techly' ),
				'default' => 0,
			],

			'rt_header_search' => [
				'type'    => 'switch',
				'label'   => __( 'Search Icon ?', 'techly' ),
				'default' => 1,
			],

			'rt_header_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Hamburger Menu', 'techly' ),
				'description' => __( 'It will be hide only for desktop.', 'techly' ),
				'default'     => 0,
			],

			'rt_header_separator' => [
				'type'    => 'switch',
				'label'   => __( 'Icon Separator', 'techly' ),
				'default' => 0,
			],

			'rt_offcanvas_social' => [
				'type'    => 'switch',
				'label'   => __( 'Offcanvas Social', 'techly' ),
				'default' => 0,
			],

			'rt_header_add_to_cart' => [
				'type'    => 'switch',
				'label'   => __( 'Cart Icon ?', 'techly' ),
				'default' => 0,
			],


			'rt_header_sep2' => [
				'type' => 'separator',
			],

			'rt_get_started_button' => [
				'type'    => 'switch',
				'label'   => __( 'Get Started Button ?', 'techly' ),
				'default' => 0
			],

			'rt_get_started_button_url' => [
				'type'    => 'text',
				'label'   => __( 'Button Link', 'techly' ),
				'condition' => [ 'rt_get_started_button' ],
			],

		] );

	}
}
