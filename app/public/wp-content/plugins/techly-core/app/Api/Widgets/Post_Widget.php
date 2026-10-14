<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Api\Widgets;

use RT\TechlyCore\Helper\Fns;
use RT\Techly\Helpers\Fns as ThemeFns;
use \WP_Widget;
use \RT_Widget_Fields;


class Post_Widget extends WP_Widget {

	public function __construct() {
		$id    = TECHLY_CORE_PREFIX . '_blog_post';
		$title = __( 'Techly: Blog Post', 'techly-core' );
		$args  = [
			'description' => esc_html__( 'Displays Blog Post', 'techly-core' )
		];
		parent::__construct( $id, $title, $args );
	}


	public function form( $instance ) {
		$defaults = [
			'title'          => __( 'Latest Posts', 'techly-core' ),
			'posts_type'     => 'post',
			'posts_per_page' => 5,
			'orderby'        => 'date',
			'order'          => 'DESC',
		];

		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = [
			'title'          => [
				'label' => esc_html__( 'Title', 'techly-core' ),
				'type'  => 'text',
			],
			'layout'         => [
				'label'   => esc_html__( 'Layout Style', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'blog-list-style'      => __( 'List', 'techly-core' ),
					'blog-grid-style'      => __( 'Grid', 'techly-core' ),
				]
			],
			'query_title'    => [
				'label' => esc_html__( 'QUERY', 'techly-core' ),
				'type'  => 'heading',
			],
			'posts_type'     => [
				'label'   => esc_html__( 'Post Type', 'techly-core' ),
				'type'    => 'select',
				'options' => ThemeFns::get_post_types()
			],
			'posts_per_page' => [
				'label' => esc_html__( 'Posts Per Page', 'techly-core' ),
				'type'  => 'number',
			],
			'orderby'        => [
				'label'   => esc_html__( 'Order by', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'date'          => __( 'Date', 'techly-core' ),
					'author'        => __( 'Author', 'techly-core' ),
					'title'         => __( 'Title', 'techly-core' ),
					'modified'      => __( 'Last modified date', 'techly-core' ),
					'parent'        => __( 'Post parent ID', 'techly-core' ),
					'comment_count' => __( 'Number of comments', 'techly-core' ),
					'menu_order'    => __( 'Menu order', 'techly-core' ),
					'rand'          => __( 'Random order', 'techly-core' ),
					'popular'       => __( 'Popular Post', 'techly-core' ),
				]
			],
			'order'          => [
				'label'   => esc_html__( 'Order', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'ASC'  => __( 'ASC', 'techly-core' ),
					'DESC' => __( 'DESC', 'techly-core' ),
				]
			],
			'post_id'        => [
				'label' => esc_html__( 'Post by ID', 'techly-core' ),
				'type'  => 'text',
				'desc'  => esc_html__( 'Enter post id by comma (,) separator.', 'techly-core' ),
			],

			'meta_title'         => [
				'label' => esc_html__( 'Choose Meta', 'techly-core' ),
				'type'  => 'heading',
			],
			'category'           => [
				'label' => esc_html__( 'Category', 'techly-core' ),
				'type'  => 'checkbox',
			],
			'author'             => [
				'label' => esc_html__( 'Author', 'techly-core' ),
				'type'  => 'checkbox',
			],
			'date'               => [
				'label' => esc_html__( 'Date', 'techly-core' ),
				'type'  => 'checkbox',
			],
			'content'               => [
				'label' => esc_html__( 'Content', 'techly-core' ),
				'type'  => 'checkbox',
			],
		];

		RT_Widget_Fields::display( $fields, $instance, $this );
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title']              = $new_instance['title'] ?? __( 'Latest Post', 'techly-core' );
		$instance['layout']             = $new_instance['layout'] ?? 'blog-list-style';
		$instance['posts_type']         = $new_instance['posts_type'] ?? 'post';
		$instance['posts_per_page']     = $new_instance['posts_per_page'] ?? 5;
		$instance['orderby']            = $new_instance['orderby'] ?? 'date';
		$instance['order']              = $new_instance['order'] ?? 'DESC';
		$instance['post_id']            = $new_instance['post_id'] ?? '';
		$instance['category']           = $new_instance['category'] ?? '';
		$instance['author']             = $new_instance['author'] ?? '';
		$instance['date']               = $new_instance['date'] ?? '';
		$instance['content']            = $new_instance['content'] ?? '';

		return $instance;
	}

	public function widget( $args, $instance ) {

		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		$postArgs = [
			'post_type'           => $instance['posts_type'] ?? 'post',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $instance['posts_per_page'] ?? 5,
			'post_status'         => 'publish',
		];

		if ( ! empty( $instance['orderby'] ) ) {
			$postArgs['orderby'] = $instance['orderby'];
		}

		if ( ! empty( $instance['order'] ) ) {
			$postArgs['order'] = $instance['order'];
		}

		if ( ! empty( $instance['post_id'] ) ) :
			$post_ids             = explode( ',', $instance['post_id'] );
			$postArgs['post__in'] = $post_ids;
		endif;

		$query = new \WP_Query( $postArgs );

		$meta_list  = [];
		$_meta_list = techly_option( 'rt_blog_meta', false, true );

		if ( is_array( $_meta_list ) || is_object( $_meta_list ) ) {
			$meta_list = [];
			foreach ( $_meta_list as $meta ) {

				if ( ! empty( $instance[ $meta ] ) ) {
					$meta_list[] = $meta;
				}
			}
		}

		$data       = [
			'meta_list'          => $meta_list,
			'content' => $instance['content']??[],
		];

		$layout     = $instance['layout'] ?? 'blog-list-style';
		$post_count = 1;
		if ( $query->have_posts() ) :
			echo "<div class='techly-widdget-post " . esc_attr( $layout ) . "'>";
			while ( $query->have_posts() ) : $query->the_post();
				set_query_var( 'post_count', $post_count );
				Fns::get_template( "widgets/latest-posts", $data );
				$post_count ++;
			endwhile;
			echo "</div>";
			wp_reset_postdata();
		endif;

		echo wp_kses_post( $args['after_widget'] );
	}
}