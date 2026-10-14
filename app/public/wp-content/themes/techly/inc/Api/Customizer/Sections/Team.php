<?php
/**
 * Theme Customizer - Team
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
class Team extends Customizer {

	protected $section_team = 'rt_team_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_team,
			'title'       => __( 'Team Option', 'techly' ),
			'description' => __( 'Team Section', 'techly' ),
			'priority'    => 35
		] );

		Customize::add_controls( $this->section_team, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_team_controls', [

			'rt_team_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Archive Option', 'techly' ),
			],

			'rt_team_style' => [
				'type'        => 'select',
				'label'       => __( 'Team Layout', 'techly' ),
				'description' => __( 'This option works only for team layout', 'techly' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Team 01', 'techly' ),
					'2'    => __( 'Team 02', 'techly' ),
				]
			],

			'rt_team_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Team Archive Item Limit', 'techly' ),
				'default' => '8',
			],

			'rt_team_ar_designation' => [
				'type'    => 'switch',
				'label'   => __( 'Designation Visibility', 'techly' ),
				'default' => 1
			],

			'rt_team_ar_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'techly' ),
				'default' => 1
			],

			'rt_team_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'techly' ),
				'default' => 0
			],

			'rt_team_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'techly' ),
				'default' => '12',
				'condition' => [ 'rt_team_ar_excerpt' ]
			],

			'rt_team_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'techly' ),
				'default' => __( 'Our Teams', 'techly' ),
			],

			'rt_team_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'techly' ),
				'default' => __( 'team', 'techly' ),
			],

			'rt_team_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'techly' ),
				'default' => 'team-category',
			],

			'rt_team_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Option', 'techly' ),
			],

			'rt_team_single_author' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Layout', 'techly' ),
				'default'     => 'team-thumb-square',
				'choices'     => [
					'team-thumb-square'    => __( 'Thumb Square', 'techly' ),
					'team-thumb-round'    => __( 'Thumb Round', 'techly' ),
				]
			],

			'rt_team_single_author_order' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Order', 'techly' ),
				'default'     => 'thumb-left',
				'choices'     => [
					'thumb-left'    => __( 'Thumb Left', 'techly' ),
					'thumb-right'    => __( 'Thumb Right', 'techly' ),
				]
			],

			'rt_team_single_info' => [
				'type'    => 'switch',
				'label'   => __( 'Info Visibility', 'techly' ),
				'default' => 1
			],

			'rt_team_single_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'techly' ),
				'default' => 1
			],

			'rt_team_single_skill' => [
				'type'    => 'switch',
				'label'   => __( 'Skill Visibility', 'techly' ),
				'default' => 1
			],

			'rt_team_single_contact' => [
				'type'    => 'switch',
				'label'   => __( 'Contact Visibility', 'techly' ),
				'default' => 0
			],

			'rt_team_contact_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Contact Title', 'techly' ),
				'default' => __( 'Team Contact', 'techly' ),
				'condition' => [ 'rt_team_single_contact' ]
			],

			'rt_team_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Related Option', 'techly' ),
			],

			'rt_team_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'techly' ),
				'default' => 0
			],

			'rt_team_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Related Title', 'techly' ),
				'default' => __( 'Related Team', 'techly' ),
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'techly' ),
				'default' => 4,
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'techly' ),
				'description' => __( 'Team Query Type', 'techly' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'techly' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'techly' ),
					'author' => esc_html__( 'Posts by the same Author', 'techly' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'techly' ),
				'description' => __( 'Display Team Order', 'techly' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'techly' ),
					'rand' => esc_html__( 'Random Posts', 'techly' ),
					'modified' => esc_html__( 'Last Modified Posts', 'techly' ),
					'popular' => esc_html__( 'Most Commented posts', 'techly' ),
					'views' => esc_html__( 'Most Viewed posts', 'techly' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

		] );
	}


}
