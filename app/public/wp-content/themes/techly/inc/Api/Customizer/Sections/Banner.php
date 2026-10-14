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
class Banner extends Customizer {

	protected $section_breadcrumb = 'rt_breadcrumb_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_breadcrumb,
			'title'       => __( 'Banner - Breadcrumb', 'techly' ),
			'description' => __( 'Banner Section', 'techly' ),
			'priority'    => 23
		] );

		Customize::add_controls( $this->section_breadcrumb, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_top_bar_controls', [

			'rt_banner' => [
				'type'    => 'switch',
				'label'   => __( 'Banner Visibility', 'techly' ),
				'default' => 1
			],

			'rt_banner_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Banner Style', 'techly' ),
				'default'   => 1,
				'choices'   => Fns::image_placeholder( 'banner', 1 ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Banner Alignment', 'techly' ),
				'default' => 'align-items-center',
				'choices' => [
					'default'               => __( 'Alignment Default', 'techly' ),
					'align-items-center'    => __( 'Alignment Center', 'techly' ),
					'align-items-end'       => __( 'Alignment right', 'techly' ),
				],
				'condition' => [ 'rt_banner' ]
			],

			'rt_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Background Image', 'techly' ),
				'description'  => __( 'Upload Banner Image', 'techly' ),
				'button_label' => __( 'Banner', 'techly' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_color' => [
				'type'         => 'alfa_color',
				'label'        => __( 'Banner Background Color', 'techly' ),
				'description'  => __( 'Inter Banner Color', 'techly' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'cover',
					]
				)
			],

			'rt_banner_color_opacity' => [
				'type'         => 'number',
				'label'        => __( 'Background Opacity', 'techly' ),
				'description'  => __( 'Inter Banner Opacity', 'techly' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_padding_top' => [
				'type'        => 'number',
				'label'       => __( 'Banner Padding Top (px)', 'techly' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner_padding_bottom' => [
				'type'        => 'number',
				'label'       => __( 'Banner Padding Bottom (px)', 'techly' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner_color_mode' => [
				'type'    => 'select',
				'label'   => __( 'Banner Color Mode', 'techly' ),
				'default' => 'banner-dark',
				'choices' => [
					'banner-dark'    => __( 'Dark Color', 'techly' ),
					'banner-light'   => __( 'Light Color', 'techly' ),
				],
				'condition' => [ 'rt_banner' ]
			],

			'rt_banner1' => [
				'type'      => 'heading',
				'label'     => __( 'Breadcrumb Settings', 'techly' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_title' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Title', 'techly' ),
				'default'   => 1,
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Breadcrumb', 'techly' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_border' => [
				'type'      => 'switch',
				'label'     => __( 'Breadcrumb Border', 'techly' ),
				'default'   => 0,
				'condition' => [ 'rt_banner' ]
			],

		] );

	}

}
