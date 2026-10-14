<?php
/**
 * Theme Customizer - Project
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Project extends Customizer {

	protected $section_project = 'rt_project_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_project,
			'title'       => __( 'Project Option', 'techly' ),
			'description' => __( 'Project Section', 'techly' ),
			'priority'    => 37
		] );

		Customize::add_controls( $this->section_project, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_project_controls', [

			'rt_project_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Archive Option', 'techly' ),
			],

			'rt_project_style' => [
				'type'        => 'select',
				'label'       => __( 'Project Layout', 'techly' ),
				'description' => __( 'This option works only for project layout', 'techly' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Project 01', 'techly' ),
					'2'    => __( 'Project 02', 'techly' ),
				]
			],

			'rt_project_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Archive Item Limit', 'techly' ),
				'default' => '6',
			],

			'rt_project_filter' => [
				'type'        => 'select',
				'label'       => __( 'Image Filter', 'techly' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default', 'techly' ),
					'grayscale'    => __( 'Grayscale', 'techly' ),
				]
			],

			'rt_project_ar_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_ar_button' => [
				'type'    => 'switch',
				'label'   => __( 'Button Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'techly' ),
				'default' => 0
			],

			'rt_project_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'techly' ),
				'default' => '12',
				'condition' => [ 'rt_project_ar_excerpt' ]
			],

			'rt_project_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'techly' ),
				'default' => __( 'Our Projects', 'techly' ),
			],

			'rt_project_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'techly' ),
				'default' => 'project',
			],

			'rt_project_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'techly' ),
				'default' => 'project-category',
			],

			'rt_project_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Option', 'techly' ),
			],

			'rt_project_title' => [
				'type'    => 'switch',
				'label'   => __( 'Info Title Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_text' => [
				'type'    => 'switch',
				'label'   => __( 'Text Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_client' => [
				'type'    => 'switch',
				'label'   => __( 'Client Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_start' => [
				'type'    => 'switch',
				'label'   => __( 'Start Time Visibility', 'techly' ),
				'default' => 1
			],
			'rt_project_location' => [
				'type'    => 'switch',
				'label'   => __( 'Location', 'techly' ),
				'default' => 1
			],
			'rt_project_date' => [
				'type'    => 'switch',
				'label'   => __( 'Date', 'techly' ),
				'default' => 1
			],

			'rt_project_end' => [
				'type'    => 'switch',
				'label'   => __( 'End Time Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_weblink' => [
				'type'    => 'switch',
				'label'   => __( 'Weblink Visibility', 'techly' ),
				'default' => 1
			],

			'rt_project_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating Visibility', 'techly' ),
				'default' => 0
			],

			'rt_project_pagination' => [
				'label'   => __( 'Show Pagination', 'techly-core' ),
				'type'    => 'switch',
				'default' => '1',
			],

			'project_prev_text' => [
				'label'   => __( 'Previous Project Text', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'project_next_text' => [
				'label'   => __( 'Next Project Text', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_project_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Related Option', 'techly' ),
			],

			'rt_project_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'techly' ),
				'default' => 0
			],

			'rt_project_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Project Related Title', 'techly' ),
				'default' => __( 'Related Projects', 'techly' ),
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'techly' ),
				'default' => 3,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_title_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Title Limit', 'techly' ),
				'default' => 5,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'techly' ),
				'description' => __( 'Project Query Type', 'techly' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'techly' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'techly' ),
					'author' => esc_html__( 'Posts by the same Author', 'techly' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'techly' ),
				'description' => __( 'Display Project Order', 'techly' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'techly' ),
					'rand' => esc_html__( 'Random Posts', 'techly' ),
					'modified' => esc_html__( 'Last Modified Posts', 'techly' ),
					'popular' => esc_html__( 'Most Commented posts', 'techly' ),
					'views' => esc_html__( 'Most Viewed posts', 'techly' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

		] );
	}


}
