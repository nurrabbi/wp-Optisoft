<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Controllers;

use Elementor\Plugin;
use RT\TechlyCore\Elementor\Controls\ImageSelectorControl;
use RT\TechlyCore\Elementor\Controls\Select2AjaxControl;
use RT\TechlyCore\Helper\Fns;
use RT\TechlyCore\Traits\SingletonTraits;
use RT\TechlyCore\Elementor\Core\ElementorCore;
use RT\TechlyCore\Modules\IconList;
use RT\TechlyCore\Elementor\Widgets\Title;
use RT\TechlyCore\Elementor\Widgets\Button;
use RT\TechlyCore\Elementor\Widgets\HeroSlider;
use RT\TechlyCore\Elementor\Widgets\ContactInfo;
use RT\TechlyCore\Elementor\Widgets\Image;
use RT\TechlyCore\Elementor\Widgets\ImageGallery;
use RT\TechlyCore\Elementor\Widgets\SocialIcon;
use RT\TechlyCore\Elementor\Widgets\InfoBox;
use RT\TechlyCore\Elementor\Widgets\VideoIcon;
use RT\TechlyCore\Elementor\Widgets\Counter;
use RT\TechlyCore\Elementor\Widgets\ProgressBar;
use RT\TechlyCore\Elementor\Widgets\LogoBrand;
use RT\TechlyCore\Elementor\Widgets\Testimonial;
use RT\TechlyCore\Elementor\Widgets\PricingTable;
use RT\TechlyCore\Elementor\Widgets\Post;
use RT\TechlyCore\Elementor\Widgets\PostSlider;
use RT\TechlyCore\Elementor\Widgets\Team;
use RT\TechlyCore\Elementor\Widgets\Project;
use RT\TechlyCore\Elementor\Widgets\SiteLogo;
use RT\TechlyCore\Elementor\Widgets\SiteMenu;
use RT\TechlyCore\Elementor\Widgets\MenuIcons;
use RT\TechlyCore\Elementor\Widgets\AjaxSearch;
use RT\TechlyCore\Elementor\Widgets\Download;
use RT\TechlyCore\Elementor\Widgets\CopyRight;
use RT\TechlyCore\Elementor\Widgets\ServiceStep;
use RT\TechlyCore\Elementor\Widgets\MoveShape;
use RT\TechlyCore\Elementor\Widgets\ServiceBox;
use RT\TechlyCore\Elementor\Widgets\IconLists;
use RT\TechlyCore\Elementor\Widgets\Shape;
use RT\TechlyCore\Elementor\Widgets\Marquee;
use RT\TechlyCore\Elementor\Widgets\WorkingProcess;
use RT\TechlyCore\Elementor\Widgets\ProjectAccordion;
use RT\TechlyCore\Elementor\Widgets\IntegrationShape;
use RT\TechlyCore\Elementor\Widgets\CaseStudy;
use RT\TechlyCore\Elementor\Widgets\PricingTab;
use RT\TechlyCore\Elementor\Widgets\InfoSlider;
use RT\TechlyCore\Elementor\Widgets\ServiceSlider;
use RT\TechlyCore\Elementor\Widgets\ImageSlider;
use RT\TechlyCore\Elementor\Widgets\DataService;
use RT\TechlyCore\Elementor\Widgets\WorkingAccordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class ElementorController {
	use SingletonTraits;

	public function __construct() {
		ElementorCore::instance();
		add_action( 'elementor/widgets/register', [ $this, 'register_widget' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'widget_category' ] );
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_style' ] );
		add_action( 'elementor/controls/register', [ $this, 'register_new_control' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'editor_scripts' ] );
		add_action( 'wp_ajax_rt_select2_object_search', [ $this, 'select2_ajax_posts_filter_autocomplete' ] );
		add_action( 'wp_ajax_nopriv_rt_select2_object_search', [ $this, 'select2_ajax_posts_filter_autocomplete' ] );
		// Select2 ajax save data.
		add_action( 'wp_ajax_rt_select2_get_title', [ $this, 'select2_ajax_get_posts_value_titles' ] );
		add_action( 'wp_ajax_nopriv_rt_select2_get_title', [ $this, 'select2_ajax_get_posts_value_titles' ] );
		add_action( 'elementor/icons_manager/additional_tabs', [ $this, 'fontello_support' ] );
	}


	/**
	 * Editor JS.
	 *
	 * @return void
	 */
	public function editor_scripts() {
		$version = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : TECHLY_CORE;

		wp_enqueue_script(
			'techly-editor-script',
			Fns::get_assets_url('js/editor.js'),
			[
				'jquery',
				'elementor-editor',
				'jquery-elementor-select2',
			],
			$version,
			true
		);
	}

	/**
	 * Register Controls
	 * @param $controls_manager
	 *
	 * @return void
	 */
	public function register_new_control( $controls_manager ) {
		$controls_manager->register( new ImageSelectorControl() );
		$controls_manager->register( new Select2AjaxControl() );
	}

	/**
	 * Register Elementor Widget.
	 * Just put the widget class reference here
	 * @return void
	 */
	public function register_widget() {

		$widgets = [
			Title::class,
			Button::class,
			HeroSlider::class,
			ContactInfo::class,
			Image::class,
			ImageGallery::class,
			ProgressBar::class,
			SocialIcon::class,
			VideoIcon::class,
			Counter::class,
			InfoBox::class,
			PricingTable::class,
			LogoBrand::class,
			Testimonial::class,
			Post::class,
			PostSlider::class,
			Team::class,
			Project::class,
			SiteLogo::class,
			SiteMenu::class,
			MenuIcons::class,
			AjaxSearch::class,
			Download::class,
			CopyRight::class,
			ServiceStep::class,
			MoveShape::class,
			ServiceBox::class,
			IconLists::class,
			Shape::class,
			Marquee::class,
			WorkingProcess::class,
			ProjectAccordion::class,
			IntegrationShape::class,
			CaseStudy::class,
			PricingTab::class,
			InfoSlider::class,
			ServiceSlider::class,
			WorkingAccordion::class,
			ImageSlider::class,
			DataService::class,
		];
		foreach ( $widgets as $class ) {
			Plugin::instance()->widgets_manager->register( new $class );
		}
	}

	/**
	 * Elementor Editor Style
	 * @return void
	 */
	public function editor_style() {
		$icon         = Fns::get_assets_url( 'images/icon.png' );
		$editor_style = '.elementor-element .icon .rdtheme-el-custom{content: url(' . $icon . ');width: 28px;}';
		$editor_style .= '.elementor-panel .select2-container {min-width: 100px !important; min-height: 30px !important;}';
		$editor_style .= '.elementor-panel .elementor-control-type-heading .elementor-control-title {color: #93013d !important}';

		wp_add_inline_style( 'elementor-editor', $editor_style );
	}

	/**
	 * Register Elementor category
	 *
	 * @param $elements_manager
	 *
	 * @return void
	 */
	public function widget_category( $elements_manager ) {
		$categories = $elements_manager->get_categories();
		// Add your category at the start
		$new_category = [
			TECHLY_CORE_PREFIX . '-widgets' => [
				'title' => __( 'RadiusTheme Elements', 'techly-core' ),
				'icon'  => 'fa fa-plug',
			]
		];
	
		// Merge your category first, then the rest
		$categories = array_merge( $new_category, $categories );
	
		// Clear and re-add categories
		$reflection = new \ReflectionClass( $elements_manager );
		$property   = $reflection->getProperty( 'categories' );
		$property->setAccessible( true );
		$property->setValue( $elements_manager, $categories );
	}

	/**
	 * Adding custom icon to icon control in Elementor
	 */
	public function fontello_support( $tabs = [] ) {
		// Append new icons
		$fontello_icons = IconList::fontello();

		$tabs['rt-fontello-icons'] = [
			'name'          => 'rt-fontello-icons',
			'label'         => esc_html__( 'Fontello Icons', 'techly-core' ),
			'labelIcon'     => 'fab fa-elementor',
			'prefix'        => '',
			'displayPrefix' => '',
			'url'           => techly_get_file( '/assets/vendor/rt-fontello.css' ),
			'icons'         => array_keys($fontello_icons),
			'ver'           => '1.0',
		];

		return $tabs;
	}

	/**
	 * Ajax callback for rt-select2
	 *
	 * @param $post_type
	 * @param $limit
	 * @param $search
	 * @param $paged
	 *
	 * @return array
	 */
	public function get_query_data( $post_type = 'any', $limit = 10, $search = '', $paged = 1 ) {
		global $wpdb;
		$where = '';
		$data  = [];

		if ( - 1 == $limit ) {
			$limit = '';
		} elseif ( 0 == $limit ) {
			$limit = 'limit 0,1';
		} else {
			$offset = 0;
			if ( $paged ) {
				$offset = ( $paged - 1 ) * $limit;
			}
			$limit = $wpdb->prepare( ' limit %d, %d', esc_sql( $offset ), esc_sql( $limit ) );
		}

		if ( 'any' === $post_type ) {
			$in_search_post_types = get_post_types( [ 'exclude_from_search' => false ] );
			if ( empty( $in_search_post_types ) ) {
				$where .= ' AND 1=0 ';
			} else {
				$where .= " AND {$wpdb->posts}.post_type IN ('" . join(
						"', '",
						array_map( 'esc_sql', $in_search_post_types )
					) . "')";
			}
		} elseif ( ! empty( $post_type ) ) {
			$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_type = %s", esc_sql( $post_type ) );
		}

		if ( ! empty( $search ) ) {
			$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_title LIKE %s", '%' . esc_sql( $search ) . '%' );
		}

		$query   = "select post_title,ID  from $wpdb->posts where post_status = 'publish' {$where} {$limit}";
		$results = $wpdb->get_results( $query );

		if ( ! empty( $results ) ) {
			foreach ( $results as $row ) {
				$data[ $row->ID ] = $row->post_title . ' [#' . $row->ID . ']';
			}
		}

		return $data;
	}

	/**
	 * Ajax callback for rt-select2
	 *
	 * @return void
	 */
	public function select2_ajax_posts_filter_autocomplete() {

		$query_per_page = 15;
		$post_type      = 'post';
		$source_name    = 'post_type';
		$paged          = $_POST['page'] ?? 1;

		if ( ! empty( $_POST['post_type'] ) ) {
			$post_type = sanitize_text_field( $_POST['post_type'] );
		}

		if ( ! empty( $_POST['source_name'] ) ) {
			$source_name = sanitize_text_field( $_POST['source_name'] );
		}

		$search  = ! empty( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : '';
		$results = $post_list = [];
		switch ( $source_name ) {
			case 'taxonomy':
				$args = [
					'hide_empty' => false,
					'orderby'    => 'name',
					'order'      => 'ASC',
					'search'     => $search,
					'number'     => '5',
				];

				if ( $post_type !== 'all' ) {
					$args['taxonomy'] = $post_type;
				}

				$post_list = wp_list_pluck( get_terms( $args ), 'name', 'term_id' );
				break;
			case 'user':
				$users = [];

				foreach ( get_users( [ 'search' => "*{$search}*" ] ) as $user ) {
					$user_id           = $user->ID;
					$user_name         = $user->display_name;
					$users[ $user_id ] = $user_name;
				}

				$post_list = $users;
				break;
			default:
				$post_list = $this->get_query_data( $post_type, $query_per_page, $search, $paged );
		}

		$pagination = true;
		if ( count( $post_list ) < $query_per_page ) {
			$pagination = false;
		}
		if ( ! empty( $post_list ) ) {
			foreach ( $post_list as $key => $item ) {
				$results[] = [
					'text' => $item,
					'id'   => $key,
				];
			}
		}
		wp_send_json(
			[
				'results'    => $results,
				'pagination' => [ 'more' => $pagination ],
			]
		);
	}


	/**
	 * Ajax callback for rt-select2
	 *
	 * @return void
	 */
	public function select2_ajax_get_posts_value_titles() {

		if ( empty( $_POST['id'] ) ) {
			wp_send_json_error( [] );
		}

		if ( empty( array_filter( $_POST['id'] ) ) ) {
			wp_send_json_error( [] );
		}
		$ids         = array_map( 'intval', $_POST['id'] );
		$source_name = ! empty( $_POST['source_name'] ) ? sanitize_text_field( $_POST['source_name'] ) : '';

		switch ( $source_name ) {
			case 'taxonomy':
				$args = [
					'hide_empty' => false,
					'orderby'    => 'name',
					'order'      => 'ASC',
					'include'    => implode( ',', $ids ),
				];

				if ( $_POST['post_type'] !== 'all' ) {
					$args['taxonomy'] = sanitize_text_field( $_POST['post_type'] );
				}

				$response = wp_list_pluck( get_terms( $args ), 'name', 'term_id' );
				break;
			case 'user':
				$users = [];

				foreach ( get_users( [ 'include' => $ids ] ) as $user ) {
					$user_id           = $user->ID;
					$user_name         = $user->display_name . '-' . $user->ID;
					$users[ $user_id ] = $user_name;
				}

				$response = $users;
				break;
			default:
				$post_info = get_posts(
					[
						'post_type' => sanitize_text_field( $_POST['post_type'] ),
						'include'   => implode( ',', $ids ),
					]
				);
				$response  = wp_list_pluck( $post_info, 'post_title', 'ID' );
		}

		if ( ! empty( $response ) ) {
			wp_send_json_success( [ 'results' => $response ] );
		} else {
			wp_send_json_error( [] );
		}
	}
}