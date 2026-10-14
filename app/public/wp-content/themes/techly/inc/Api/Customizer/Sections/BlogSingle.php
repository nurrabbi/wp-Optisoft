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
class BlogSingle extends Customizer {
	protected $section_blog_single = 'rt_blog_single_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog_single,
			'title'       => __( 'Blog Single', 'techly' ),
			'description' => __( 'Blog Single Section', 'techly' ),
			'priority'    => 26
		] );

		Customize::add_controls( $this->section_blog_single, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_single_controls', [

			'rt_single_post_style' => [
				'type'    => 'select',
				'label'   => __( 'Post View Style', 'techly' ),
				'default' => '1',
				'choices' => Fns::single_post_style()
			],

			'rt_single_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Single Meta', 'techly' ),
				'description' => __( 'You can sort meta by drag and drop', 'techly' ),
				'placeholder' => __( 'Choose Meta', 'techly' ),
				'multiselect' => true,
				'default'     => 'author,date,category,comment',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_single_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'techly' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_visibility_heading' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'techly' ),
			],

			'rt_single_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'techly' ),
				'default' => 1
			],

			'rt_single_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Above Meta Visibility', 'techly' ),
			],
			'rt_single_tag_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Tag Visibility', 'techly' ),
			],
			'rt_single_share_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Share Visibility', 'techly' ),
			],
			'rt_single_profile_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Author Profile Visibility', 'techly' ),
			],
			'rt_single_caption_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Caption Visibility', 'techly' ),
			],
			'rt_single_navigation_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Navigation Visibility', 'techly' ),
			],
			'rt_post_share' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Share Media', 'techly' ),
				'description' => __( 'You can sort meta by drag and drop', 'techly' ),
				'placeholder' => __( 'Choose Media', 'techly' ),
				'multiselect' => true,
				'default'     => 'facebook,twitter,linkedin',
				'choices'     => Fns::post_share_list(),
				'condition' => [ 'rt_single_share_visibility' ]
			],

			'rt_post_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Single Related Option', 'techly' ),
			],

			'rt_post_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'techly' ),
				'default' => 0
			],

			'rt_post_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Post Related Title', 'techly' ),
				'default' => __( 'Related Post', 'techly' ),
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'techly' ),
				'default' => 4,
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'techly' ),
				'description' => __( 'Post Query Type', 'techly' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'techly' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'techly' ),
					'author' => esc_html__( 'Posts by the same Author', 'techly' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'techly' ),
				'description' => __( 'Display Post Order', 'techly' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'techly' ),
					'rand' => esc_html__( 'Random Posts', 'techly' ),
					'modified' => esc_html__( 'Last Modified Posts', 'techly' ),
					'popular' => esc_html__( 'Most Commented posts', 'techly' ),
					'views' => esc_html__( 'Most Viewed posts', 'techly' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

		] );
	}


}
