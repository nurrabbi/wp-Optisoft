<?php

namespace RT\TechlyCore\Controllers;

use RT\TechlyCore\Traits\SingletonTraits;
use RT\Techly\Options\Opt;
use \RT_Posts;

class PostTypeController {
	use SingletonTraits;

	public $post_type;

	public function __construct() {
		$this->post_type = RT_Posts::getInstance();
		add_action('init', [$this, 'register_post_type'], 5);
	}


	/**
	 * Register post_type and taxonomy
	 *
	 * @return void
	 */
	public function register_post_type() {
		$this->register_custom_post_type();
		$this->register_custom_taxonomy();
	}

	/**
	 * Register custom post type
	 * @return void
	 */
	private function register_custom_post_type() {
		$custom_posts = [
			[
				'id'            => 'rt-team',
				'slug'          => get_theme_mod('rt_team_slug'),
				'singular'      => 'Team',
				'plural'        => 'Teams',
				'menu_icon'     => 'dashicons-admin-customizer',
				'menu_position' => 20,
				'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments' ],
				'description'   => esc_html__( 'Teams Custom Post Type', 'techly-core' ),
			],
			[
				'id'            => 'rt-service',
				'slug'          => get_theme_mod('rt_service_slug'),
				'singular'      => 'Service',
				'plural'        => 'Services',
				'menu_icon'     => 'dashicons-admin-customizer',
				'menu_position' => 21,
				'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments' ],
				'description'   => esc_html__( 'Service Custom Post Type', 'techly-core' ),
			],
			[
				'id'            => 'rt-project',
				'slug'          => get_theme_mod('rt_project_slug'),
				'singular'      => 'Project',
				'plural'        => 'Projects',
				'menu_icon'     => 'dashicons-admin-customizer',
				'menu_position' => 22,
				'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments' ],
				'description'   => esc_html__( 'Project Custom Post Type', 'techly-core' ),
			]
		];

		$this->post_type->add_post_types( $custom_posts );
	}

	/**
	 * Register custom taxonomy
	 * @return void
	 */
	private function register_custom_taxonomy() {
		$custom_posts = [
			[
				'id'        => 'rt-team-category',
				'post_type' => [ 'rt-team' ],
				'slug'      => get_theme_mod('rt_team_cat_slug'),
				'singular'  => esc_html__( 'Team Category', 'techly-core' ),
				'plural'    => esc_html__( 'Team Categories', 'techly-core' ),
			],
			[
				'id'        => 'rt-service-category',
				'post_type' => [ 'rt-service' ],
				'slug'      => get_theme_mod('rt_service_cat_slug'),
				'singular'  => esc_html__( 'Service Category', 'techly-core' ),
				'plural'    => esc_html__( 'Service Categories', 'techly-core' ),
			],
			[
				'id'        => 'rt-project-category',
				'post_type' => [ 'rt-project' ],
				'slug'      => get_theme_mod('rt_project_cat_slug'),
				'singular'  => esc_html__( 'Project Category', 'techly-core' ),
				'plural'    => esc_html__( 'Project Categories', 'techly-core' ),
			]
		];

		$this->post_type->add_taxonomies( $custom_posts );
	}
}

