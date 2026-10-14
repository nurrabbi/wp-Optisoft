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
class Blog extends Customizer {

	protected $section_blog = 'rt_blog_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog,
			'title'       => __( 'Blog Archive', 'techly' ),
			'description' => __( 'Blog Section', 'techly' ),
			'priority'    => 25
		] );

		Customize::add_controls( $this->section_blog, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_blog_controls', [

			'rt_blog_style' => [
				'type'        => 'select',
				'label'       => __( 'Blog Style', 'techly' ),
				'description' => __( 'This option works only for blog layout', 'techly' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'techly' ),
					'grid-2'    => __( 'Grid 2', 'techly' ),
					'list'    => __( 'List', 'techly' ),
				]
			],

			'rt_blog_column' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column', 'techly' ),
				'description' => __( 'This option works only for large device', 'techly' ),
				'default'     => 'default',
				'choices'     => [
					'default'   => __( 'Default From Theme', 'techly' ),
					'col-lg-12' => __( '1 Column', 'techly' ),
					'col-lg-6'  => __( '2 Column', 'techly' ),
					'col-lg-4'  => __( '3 Column', 'techly' ),
					'col-lg-3'  => __( '4 Column', 'techly' ),
				]
			],

			'rt_blog_column_gap' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column Gap', 'techly' ),
				'description' => __( 'This option works only for blog grid gap', 'techly' ),
				'default'     => 'g-4',
				'choices'     => [
					'g-1'  => __( 'Gap 1', 'techly' ),
					'g-2'  => __( 'Gap 2', 'techly' ),
					'g-3'  => __( 'Gap 3', 'techly' ),
					'g-4'  => __( 'Gap 4', 'techly' ),
					'g-5'  => __( 'Gap 5', 'techly' ),
				]
			],

			'rt_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'techly' ),
				'default' => '25',
			],

			'rt_blog_btn_style' => [
				'type'        => 'select',
				'label'       => __( 'Button Style', 'techly' ),
				'description' => __( 'This option works only for blog button style', 'techly' ),
				'default'     => 'button-3',
				'choices'     => [
					'button-1'  => __( 'Default', 'techly' ),
					'button-2'  => __( 'Button 2', 'techly' ),
					'button-3'  => __( 'Button 3', 'techly' ),
					'button-4'  => __( 'Button 4', 'techly' ),
				]
			],

			'rt_blog_btn_radius' => [
				'type'    => 'number',
				'label'   => __( 'Button Radius', 'techly' ),
				'default' => 50,
			],

			'rt_blog_pagination_style' => [
				'type'        => 'select',
				'label'       => __( 'Pagination Style', 'techly' ),
				'description' => __( 'This option works only for blog pagination style', 'techly' ),
				'default'     => 'pagination-area',
				'choices'     => [
					'pagination-area'  => __( 'Default', 'techly' ),
					'pagination-area-2'  => __( 'Style 2', 'techly' ),
				]
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'techly' ),
			],

			'rt_blog_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'techly' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_above_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Title Above Meta Style', 'techly' ),
				'default' => 'meta-style-dash',
				'choices' => Fns::meta_style( [ 'meta-style-dash-bg', 'meta-style-pipe' ] )
			],

			'rt_blog_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'techly' ),
				'description' => __( 'You can sort meta by drag and drop', 'techly' ),
				'placeholder' => __( 'Choose Meta', 'techly' ),
				'multiselect' => true,
				'default'     => 'author,date,category',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_visibility' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'techly' ),
			],

			'rt_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'techly' ),
				'default' => 1
			],

			'rt_blog_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Title Above Meta Visibility', 'techly' ),
			],

			'rt_blog_content_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Content Visibility', 'techly' ),
				'default' => 1
			],

			'rt_video_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Video Visibility', 'techly' ),
				'default' => 1
			],

			'rt_blog_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'techly' ),
				'default' => 1
			],

			'rt_animation_heading' => [
				'type'  => 'heading',
				'label' => __( 'Animation', 'techly' ),
			],

			'rt_animation' => [
				'type'      => 'switch',
				'label'       => __( 'Animation', 'techly' ),
				'default'     => 0,
			],

			'rt_animation_effect' => [
				'type'        => 'select',
				'label' => __( 'Entrance Animation', 'techly' ),
				'description' => __( 'This option works only for blog animation effect', 'techly' ),
				'default'     => 'fadeInUp',
				'choices'     => [
					'bounce' => esc_html__( 'bounce', 'techly' ),
					'flash' => esc_html__( 'flash', 'techly' ),
					'pulse' => esc_html__( 'pulse', 'techly' ),
					'rubberBand' => esc_html__( 'rubberBand', 'techly' ),
					'shakeX' => esc_html__( 'shakeX', 'techly' ),
					'shakeY' => esc_html__( 'shakeY', 'techly' ),
					'headShake' => esc_html__( 'headShake', 'techly' ),
					'swing' => esc_html__( 'swing', 'techly' ),
					'fadeIn' => esc_html__( 'fadeIn', 'techly' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'techly' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'techly' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'techly' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'techly' ),
					'bounceIn' => esc_html__( 'bounceIn', 'techly' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'techly' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'techly' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'techly' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'techly' ),
					'slideInUp' => esc_html__( 'slideInUp', 'techly' ),
					'slideInDown' => esc_html__( 'slideInDown', 'techly' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'techly' ),
					'slideInRight' => esc_html__( 'slideInRight', 'techly' ),
				],
				'condition' => [ 'rt_animation' ],
			],

			'delay' => [
				'type'  => 'text',
				'label' => __( 'Delay', 'techly' ),
				'default' => '200',
				'condition' => [ 'rt_animation' ],
			],

			'duration' => [
				'type'  => 'text',
				'label' => __( 'Duration', 'techly' ),
				'default' => '1200',
				'condition' => [ 'rt_animation' ],
			],

		] );
	}


}
