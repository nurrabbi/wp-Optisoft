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
class Footer extends Customizer {
	protected $section_footer = 'rt_footer_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer,
			'title'       => __( 'Footer', 'techly' ),
			'description' => __( 'Footer Section', 'techly' ),
			'priority'    => 38
		] );

		Customize::add_controls( $this->section_footer, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_footer_controls', [

			'rt_footer_display' => [
				'type'        => 'switch',
				'label'       => __( 'Footer Display', 'techly' ),
				'description' => __( 'Show footer display', 'techly' ),
				'default' => 1,
			],

			'rt_footer_style' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'techly' ),
				'default' => '1',
				'choices' => Fns::image_placeholder( 'footer', 1 )
			],

			'rt_footer_width' => [
				'type'    => 'select',
				'label'   => __( 'Footer Width', 'techly' ),
				'default' => '',
				'choices' => [
					''       => __( 'Box Width', 'techly' ),
					'-fluid' => __( 'Full Width', 'techly' ),
				]
			],

			'rt_footer_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Footer Max Width (PX)', 'techly' ),
				'description' => __( 'Enter a number greater than 992.', 'techly' ),
				'condition'   => [ 'rt_footer_width', '==', '-fluid' ]
			],

			'rt_sticky_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Footer', 'techly' ),
				'description' => __( 'Show footer at the top when scrolling down', 'techly' ),
			],

			'rt_social_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Social Icon', 'techly' ),
				'description' => __( 'Show footer at the social icon, This options available for only Footer layout.', 'techly' ),
			],
			'rt_shape_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Shape', 'techly' ),
				'description' => __( 'Show footer at the shape display', 'techly' ),
			],

			'rt_footer_left_image' => [
				'type'         => 'image',
				'label'        => __( 'Footer Left Image', 'techly' ),
				'description'  => __( 'Upload footer image for your site.', 'techly' ),
				'button_label' => __( 'Footer image', 'techly' ),
			],
			'rt_footer_right_image' => [
				'type'         => 'image',
				'label'        => __( 'Footer Right Image', 'techly' ),
				'description'  => __( 'Upload footer image for your site.', 'techly' ),
				'button_label' => __( 'Footer image', 'techly' ),
			],

			'rt_footer_copyright' => [
				'type'        => 'tinymce',
				'label'       => __( 'Footer Copyright Text', 'techly' ),
				'default'     => __( 'Copyright© [y] Techly by RadiusTheme', 'techly' ),
				'description' => __( 'Add [y] flag anywhere for dynamic year.', 'techly' ),
			],

		] );

	}

}
