<?php
/**
 * Theme Customizer - Service
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
class Service extends Customizer {

	protected $section_service = 'rt_service_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_service,
			'title'       => __( 'Service Option', 'techly' ),
			'description' => __( 'Service Section', 'techly' ),
			'priority'    => 36
		] );

		Customize::add_controls( $this->section_service, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_service_controls', [

			'rt_service_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Archive Option', 'techly' ),
			],

			'rt_service_style' => [
				'type'        => 'select',
				'label'       => __( 'Service Layout', 'techly' ),
				'description' => __( 'This service 02 layout only icon show', 'techly' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Service 01', 'techly' ),
					'2'    => __( 'Service 02', 'techly' ),
				]
			],

			'rt_service_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Service Archive Item Limit', 'techly' ),
				'default' => '8',
			],

			'rt_service_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'techly' ),
				'default' => 0
			],

			'rt_service_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'techly' ),
				'default' => '15',
				'condition' => [ 'rt_service_ar_excerpt' ]
			],

			'rt_service_read_more' => [
				'type'    => 'switch',
				'label'   => __( 'Read More Visibility', 'techly' ),
				'default' => 1
			],

			'rt_service_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'techly' ),
				'default' => __( 'Our Services', 'techly' ),
			],

			'rt_service_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'techly' ),
				'default' => 'service',
			],

			'rt_service_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'techly' ),
				'default' => 'service-category',
			],

			'rt_service_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Single Related Option', 'techly' ),
			],

			'rt_service_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'techly' ),
				'default' => 0
			],

			'rt_service_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Service Related Title', 'techly' ),
				'default' => __( 'Related Service', 'techly' ),
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'techly' ),
				'default' => 3,
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'techly' ),
				'description' => __( 'Service Query Type', 'techly' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'techly' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'techly' ),
					'author' => esc_html__( 'Posts by the same Author', 'techly' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'techly' ),
				'description' => __( 'Display Service Order', 'techly' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'techly' ),
					'rand' => esc_html__( 'Random Posts', 'techly' ),
					'modified' => esc_html__( 'Last Modified Posts', 'techly' ),
					'popular' => esc_html__( 'Most Commented posts', 'techly' ),
					'views' => esc_html__( 'Most Viewed posts', 'techly' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

		] );
	}


}
