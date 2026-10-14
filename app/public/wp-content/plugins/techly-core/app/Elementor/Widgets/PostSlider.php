<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.2
 */

namespace RT\TechlyCore\Elementor\Widgets;

use Elementor\Controls_Manager;
use RT\TechlyCore\Helper\Fns;
use RT\TechlyCore\Abstracts\ElementorBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PostSlider extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name      = esc_html__( 'RT Post Slider', 'techly-core' );
		$this->rt_base      = 'rt-post-slider';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {
		// widget title
		$this->start_controls_section(
			'rt_post_grid',
			[
				'label' => esc_html__( 'Post Grid', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Post Slider 01', 'techly-core' ),
					'grid-2' => __( 'Post Slider 02', 'techly-core' ),
					'grid-3' => __( 'Post Slider 03', 'techly-core' ),
					'grid-4' => __( 'Post Slider 04', 'techly-core' ),
					'grid-5' => __( 'Post Slider 05', 'techly-core' ),
					'list-2' => __( 'Post Slider 06', 'techly-core' ),
				],

			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title Tag', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1' => esc_html__( 'H1', 'techly-core' ),
					'h2' => esc_html__( 'H2', 'techly-core' ),
					'h3' => esc_html__( 'H3', 'techly-core' ),
					'h4' => esc_html__( 'H4', 'techly-core' ),
					'h5' => esc_html__( 'H5', 'techly-core' ),
					'h6' => esc_html__( 'H6', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'title_count',
			[
				'label'       => __( 'Title Count', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'default' => '15',
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label'       => __( 'Post Limit', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'description' => __( 'Enter number of post to show.', 'techly-core' ),
				'default'     => '3',
			]
		);

		$this->add_control(
			'post_source',
			[
				'label'       => __( 'Post Source', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options'     => [
					'most_recent' => __( 'From all recent post', 'techly-core' ),
					'by_category' => __( 'By Category', 'techly-core' ),
					'by_tags'     => __( 'By Tags', 'techly-core' ),
					'by_id'       => __( 'By Post ID', 'techly-core' ),
				],
				'default'     => [ 'most_recent' ],
				'description' => __( 'Select posts source that you like to show.', 'techly-core' ),
			]
		);

		$this->add_control(
			'categories',
			[
				'label'       => __( 'Choose Categories', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => rt_category_list(),
				'label_block' => true,
				'condition'   => [
					'post_source' => 'by_category',
				],
				'description' => __( 'Select post category\'s.', 'techly-core' ),
			]
		);

		$this->add_control(
			'tags',
			[
				'label'       => __( 'Choose Tags', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => rt_tag_list(),
				'label_block' => true,
				'condition'   => [
					'post_source' => 'by_tags',
				],
				'description' => __( 'Select post tag\'s.', 'techly-core' ),
			]
		);

		$this->add_control(
			'post_id',
			[
				'label'       => __( 'Enter post IDs', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => __( 'Enter the post IDs separated by comma', 'techly-core' ),
				'label_block' => 'true',
				'condition'   => [
					'post_source' => 'by_id',
				],
			]
		);

		$this->add_control(
			'offset',
			[
				'label'       => __( 'Post offset', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Post offset', 'techly-core' ),
				'description' => __( 'Number of post to displace or pass over. The offset parameter is ignored when post limit => -1 (show all posts) is used.', 'techly-core' ),
			]
		);

		$this->add_control(
			'exclude',
			[
				'label'       => __( 'Exclude posts', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => 'true',
				'description' => __( 'Enter the post IDs separated by comma for exclude', 'techly-core' ),
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => __( 'Order by', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'recent' 		=> __('Recent Post', 'techly-core'),
					'popular' 		=> __('Popular Post', 'techly-core'),
					'date'           => __( 'Date', 'techly-core' ),
					'ID'             => __( 'Order by post ID', 'techly-core' ),
					'author'         => __( 'Author', 'techly-core' ),
					'title'          => __( 'Title', 'techly-core' ),
					'modified'       => __( 'Last modified date', 'techly-core' ),
					'parent'         => __( 'Post parent ID', 'techly-core' ),
					'comment_count'  => __( 'Number of comments', 'techly-core' ),
					'menu_order'     => __( 'Menu order', 'techly-core' ),
					'rand'           => __( 'Random order', 'techly-core' ),
				],
				'default'     => [ 'recent' ],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __( 'Sort order', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'ASC'  => __( 'ASC', 'techly-core' ),
					'DESC' => __( 'DESC', 'techly-core' ),
				],
				'default'     => [ 'ASC' ],
				'condition' => [
					'orderby!' => ['popular'],
				],
			]
		);

		$this->end_controls_section();


		// Thumbnail style
		//========================================================
		$this->start_controls_section(
			'thumbnail_style',
			[
				'label' => __( 'Thumbnail Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'thumbnail_visibility',
			[
				'label'   => __( 'Thumbnail Visibility', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'visible' => [
						'title' => __( 'Visible', 'techly-core' ),
						'icon'  => 'eicon-check',
					],
					'hidden'  => [
						'title' => __( 'Hidden', 'techly-core' ),
						'icon'  => 'eicon-editor-close',
					],
				],
				'toggle'  => false,
				'default' => 'visible',
			]
		);

		$this->add_control(
			'project_thumbnail_size',
			[
				'label'     => esc_html__( 'Image Size', 'techly-core' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => rt_get_all_image_sizes(),
				'condition' => [
					'thumbnail_visibility' => 'visible',
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Width', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .blog-list-2.rt-el-post-wrapper .post-thumbnail-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'list-2',
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Height', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .blog-list-2.rt-el-post-wrapper .post-thumbnail-wrap' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'list-2',
				],
			]
		);

		$this->add_responsive_control(
			'thumb_box_radius',
			[
				'label'      => __( 'Thumbnail Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .article-inner-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .post-thumbnail-wrap .post-thumbnail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .post-thumbnail-wrap .post-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'thumbnail_visibility' => 'visible',
				],
			]
		);

		$this->end_controls_section();


		// Title Settings
		//=====================================================================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title Style', 'techly-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .techly-post-card .entry-title',
			]
		);

		$this->add_control(
			'title_spacing',
			[
				'label'              => __( 'Title Spacing', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .techly-post-card .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'allowed_dimensions' => 'vertical',
				'default'            => [
					'top'      => '',
					'right'    => '',
					'bottom'   => '',
					'left'     => '',
					'isLinked' => false,
				],
			]
		);

		$this->start_controls_tabs(
			'title_style_tabs'
		);

		$this->start_controls_tab(
			'title_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .techly-post-card .entry-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label'     => __( 'Title Hover Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .techly-post-card .entry-title a:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


		// Content Settings
		//=====================================================================

		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Excerpt Style', 'techly-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_visibility',
			[
				'label'   => __( 'Excerpt Visibility', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'visible' => [
						'title' => __( 'Visible', 'techly-core' ),
						'icon'  => 'eicon-check',
					],
					'hidden'  => [
						'title' => __( 'Hidden', 'techly-core' ),
						'icon'  => 'eicon-editor-close',
					],
				],
				'toggle'  => false,
				'default' => 'hidden',
			]
		);


		$this->add_control(
			'content_limit',
			[
				'label'     => __( 'Excerpt Limit', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'default'   => '20',
				'condition' => [
					'content_visibility' => 'visible',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'      => 'content_typography',
				'selector'  => '{{WRAPPER}} .entry-content',
				'condition' => [
					'content_visibility' => 'visible',
				],
			]
		);

		$this->add_control(
			'content_spacing',
			[
				'label'              => __( 'Excerpt Spacing', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .entry-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'allowed_dimensions' => 'vertical',
				'default'            => [
					'top'      => '',
					'right'    => '',
					'bottom'   => '',
					'left'     => '',
					'isLinked' => false,
				],
				'condition'          => [
					'content_visibility' => 'visible',
				],
			]
		);

		$this->add_responsive_control(
			'meta_list_spacing',
			[
				'label'      => __( 'Meta List Spacing', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-post-meta ul' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label'     => __( 'Content Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .entry-content' => 'color: {{VALUE}}',
				],
				'condition' => [
					'content_visibility' => 'visible',
				],
			]
		);

		$this->end_controls_section();

		// Meta Information Settings

		$this->start_controls_section(
			'meta_info_style',
			[
				'label' => __( 'Meta Info Style', 'techly-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Meta Typo', 'techly-core' ),
				'name'     => 'post_meta_typography',
				'selector' => '{{WRAPPER}} .rt-post-meta',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Meta Icon Typo', 'techly-core' ),
				'name'     => 'post_meta_icon_typo',
				'selector' => '{{WRAPPER}} .rt-post-meta ul li i',
			]
		);

		$this->start_controls_tabs(
			'post_meta_style_tabs'
		);

		$this->start_controls_tab(
			'post_meta_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);


		$this->add_control(
			'post_meta_color',
			[
				'label'     => __( 'Meta Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-post-meta' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-meta a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'post_meta_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'post_meta_color_hover',
			[
				'label'     => __( 'Meta Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-post-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'post_meta_icon_color',
			[
				'label'     => __( 'Icon Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-post-meta ul li i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'author_visibility',
			[
				'label'        => __( 'Author Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'cat_visibility',
			[
				'label'        => __( 'Category Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'date_visibility',
			[
				'label'        => __( 'Date Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'comment_visibility',
			[
				'label'        => __( 'Comment Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => false,
			]
		);

		$this->add_control(
			'reading_visibility',
			[
				'label'        => __( 'Reading Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => false,
			]
		);

		$this->add_control(
			'views_visibility',
			[
				'label'        => __( 'Views Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => false,
			]
		);
		$this->add_control(
			'tag_visibility',
			[
				'label'        => __( 'Tag Visibility', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => false,
			]
		);

		$this->end_controls_section();

		// Category Settings
		$this->start_controls_section(
			'category_settings',
			[
				'label' => esc_html__( 'Category Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'     => [
					'layout!' => ['grid-2'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'cat_typo',
				'selector' => '{{WRAPPER}} .separate-meta a',
			]
		);

		$this->add_responsive_control(
			'cat_radius',
			[
				'label'      => __( 'Border Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .separate-meta a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'cat_padding',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .separate-meta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'cat_spacing',
			[
				'label'      => __( 'Spacing', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .separate-meta a' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'cat_style_tabs'
		);

		$this->start_controls_tab(
			'cat_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'cat_shadow',
				'label'    => __( 'Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .separate-meta a',
			]
		);


		$this->add_control(
			'cat_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .separate-meta a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'           => 'cat_bg',
				'label'          => __( 'Background', 'techly-core' ),
				'fields_options' => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'types'          => [ 'classic', 'gradient' ],
				'selector'       => '{{WRAPPER}} .separate-meta a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cat_border',
				'selector' => '{{WRAPPER}} .separate-meta a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'cat_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'cat_shadow_hover',
				'label'    => __( 'Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .separate-meta a:hover',
			]
		);

		$this->add_control(
			'cat_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .separate-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'           => 'cat_bg_hover',
				'label'          => __( 'Background', 'techly-core' ),
				'fields_options' => [
					'background' => [
						'label' => esc_html__( 'Box Background - Hover', 'techly-core' ),
					],
				],
				'types'          => [ 'classic', 'gradient' ],
				'selector'       => '{{WRAPPER}} .separate-meta a:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cat_hover_border',
				'selector' => '{{WRAPPER}} .separate-meta a:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


		// Read More Style
		$this->start_controls_section(
			'readmore_style',
			[
				'label' => __( 'Read More Style', 'techly-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'readmore_visibility',
			[
				'label'   => __( 'Read More Visibility', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'visible' => [
						'title' => __( 'Visible', 'techly-core' ),
						'icon'  => 'eicon-check',
					],
					'hidden'  => [
						'title' => __( 'Hidden', 'techly-core' ),
						'icon'  => 'eicon-editor-close',
					],
				],
				'toggle'  => false,
				'default' => 'hidden',
			]
		);

		$this->add_control(
			'readmore_text',
			[
				'label'       => __( 'Button Text', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'See Details', 'techly-core' ),
				'placeholder' => __( 'Type your title here', 'techly-core' ),
				'condition'   => [
					'readmore_visibility' => [ 'visible' ],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'      => 'readmore_typography',
				'selector'  => '{{WRAPPER}} .rt-button .btn',
				'condition' => [
					'readmore_visibility' => [ 'visible' ],
				],
			]
		);

		$this->add_control(
			'readmore_spacing',
			[
				'label'              => __( 'Button Spacing', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'allowed_dimensions' => 'vertical',
				'default'            => [
					'top'      => '',
					'right'    => '',
					'bottom'   => '',
					'left'     => '',
					'isLinked' => false,
				],
				'selectors'          => [
					'{{WRAPPER}} .rt-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'          => [
					'readmore_visibility' => [ 'visible' ],
				],
			]
		);

		$this->add_control(
			'readmore_padding',
			[
				'label'      => __( 'Button Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'readmore_visibility' => [ 'visible' ],
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-button .btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'readmore_visibility' => [ 'visible' ],
				],
			]
		);


		//Button style Tabs
		$this->start_controls_tabs(
			'readmore_style_tabs', [
				'condition' => [
					'readmore_visibility' => [ 'visible' ],
				],
			]
		);

		$this->start_controls_tab(
			'readmore_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);

		$this->add_control(
			'readmore_color',
			[
				'label'     => __( 'Font Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .btn i' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'readmore_bg',
			[
				'label'     => __( 'Background Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .rt-button .btn',
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'readmore_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'readmore_color_hover',
			[
				'label'     => __( 'Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'readmore_bg_hover',
			[
				'label'     => __( 'Background Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn:after' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hover_border',
				'selector' => '{{WRAPPER}} .rt-button .btn:hover',
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Custom Cursor
		
		$this->start_controls_section(
			'custom_cursor',
			[
			'label'     => esc_html__( 'Custom Cursor', 'techly-core' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'custom_cursor_display',
			[
			'type'        => Controls_Manager::SWITCHER,
			'label'       => esc_html__( 'Custom Cursor Display', 'techly-core' ),
			'label_on'    => esc_html__( 'On', 'techly-core' ),
			'label_off'   => esc_html__( 'Off', 'techly-core' ),
			'default'     => 'yes',
			'description' => esc_html__( 'Enable or disable. Default: On', 'techly-core' ),
			]
		);

		$this->add_responsive_control(
			'custom_cursor_width',
			[
			'type'       => Controls_Manager::SLIDER,
			'label'      => esc_html__( ' Width', 'techly-core' ),
			'size_units' => [ 'px' ],
			'range'      => [
				'px' => [
					'min'  => 0,
					'max'  => 250,
					'step' => 1,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .cursor .cursor__inner'   => 'width: {{SIZE}}{{UNIT}};',
			],
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],

			]
		);

		$this->add_responsive_control(
			'custom_cursor_height',
			[
			'type'       => Controls_Manager::SLIDER,
			'label'      => esc_html__( 'Height', 'techly-core' ),
			'size_units' => [ 'px' ],
			'range'      => [
				'px' => [
					'min'  => 0,
					'max'  => 250,
					'step' => 1,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .cursor .cursor__inner'   => 'height: {{SIZE}}{{UNIT}};',
			],
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],

			]
		);

		$this->add_control(
			'custom_cursor_border_radius',
			[
			'type'       => Controls_Manager::SLIDER,
			'label'      => esc_html__( 'Border Radius', 'techly-core' ),
			'size_units' => [ '%' ],
			'range'      => [
				'%' => [
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .cursor .cursor__inner'    => 'border-radius: {{SIZE}}{{UNIT}}',
			],
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],
			]
		);

		$this->add_control(
			'custom_cursor_color',
			[
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Color', 'techly-core' ),
			'selectors' => [
				'{{WRAPPER}} .cursor .cursor__inner i'        => 'color: {{VALUE}}',
				'{{WRAPPER}} .cursor .cursor__inner svg path' => 'stroke: {{VALUE}}',
			],
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],
			]
		);

		$this->add_control(
			'custom_cursor_bg_color',
			[
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Background Color', 'techly-core' ),
			'selectors' => [
				'{{WRAPPER}} .cursor .cursor__inner'  => 'background-color: {{VALUE}}',
			],
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
			'name'     => 'custom_cursor_border',
			'label'    => __( 'Border', 'techly-core' ),
			'selector' => '{{WRAPPER}} .cursor .cursor__inner',
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
			'name' => 'custom_cursor_box_shadow',
			'label' => __('Shadow', 'techly-core'),
			'selector' => '{{WRAPPER}} .cursor .cursor__inner',
			'condition'   => [
				'custom_cursor_display' => 'yes',
			],
			]
		);

		$this->end_controls_section();


		// Slider setting
		$this->start_controls_section(
			'slider_style',
			[
				'label' => esc_html__( 'Slider Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'arrow_hover_visibility',
			[
				'label'   => esc_html__( 'Arrow Visibility', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'techly-core' ),
					'hover-visibility' => __( 'Hover', 'techly-core' ),
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'arrow_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'navigation_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Navigation Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'navigation_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Navigation Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'nex_prev_arrow',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Arrow Top / Bottom', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
					],
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'prev_arrow',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Prev Arrow', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
					],
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'next_arrow',
			[
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'next_arrow',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Next Arrow', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
					],
					'px' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->start_controls_tabs(
			'navigation_style_tabs',
			[
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]

		);

		$this->start_controls_tab(
			'navigation_style_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Arrow Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'color: {{VALUE}}',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);
		$this->add_control(
			'arrow_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Arrow BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .swiper-navigation .swiper-button',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'navigation_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);
		$this->add_control(
			'arrow_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'ArrowHover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button:hover' => 'color: {{VALUE}}',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Arrow BG Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button:hover' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'display_arrow' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'selector' => '{{WRAPPER}} .swiper-navigation .swiper-button:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'pagination_heading',
			[
				'label'     => __( 'Pagination Style', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition'   => [
					'display_pagination' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'pagination_up_down',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Pagination UP / Down', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'display_pagination' => 'yes',
				],
			]
		);

		$this->add_control(
			'pagination_color',
			[
				'label'     => __( 'Pagination Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'display_pagination' => 'yes',
				],
			]
		);
		$this->add_control(
			'pagination_active_color',
			[
				'label'     => __( 'Pagination Active Color', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'display_pagination' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// Slider responsive
		$this->start_controls_section(
			'section_slider_grid',
			[
				'label' => __( 'Slider Grid', 'techly-core' ),
			]
		);

		$this->add_control(
			'desktop',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Desktops: > 1600px', 'techly-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
					'3' => esc_html__( '3',  'techly-core' ),
					'4' => esc_html__( '4',  'techly-core' ),
					'5' => esc_html__( '5',  'techly-core' ),
					'6' => esc_html__( '6',  'techly-core' ),
				),
			]
		);
		$this->add_control(
			'md_desktop',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Desktops: > 1200px', 'techly-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
					'3' => esc_html__( '3',  'techly-core' ),
					'4' => esc_html__( '4',  'techly-core' ),
					'5' => esc_html__( '5',  'techly-core' ),
					'6' => esc_html__( '6',  'techly-core' ),
				),
			]
		);
		$this->add_control(
			'sm_desktop',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Desktops: > 992px', 'techly-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
					'3' => esc_html__( '3',  'techly-core' ),
					'4' => esc_html__( '4',  'techly-core' ),
					'5' => esc_html__( '5',  'techly-core' ),
				),
			]
		);
		$this->add_control(
			'tablet',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Tablets: > 768px', 'techly-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
					'3' => esc_html__( '3',  'techly-core' ),
					'4' => esc_html__( '4',  'techly-core' ),
					'5' => esc_html__( '5',  'techly-core' ),
				),
			]
		);
		$this->add_control(
			'mobile',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Phones: > 576px', 'techly-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
					'3' => esc_html__( '3',  'techly-core' ),
					'4' => esc_html__( '4',  'techly-core' ),
					'5' => esc_html__( '5',  'techly-core' ),
				),
			]
		);
		$this->add_control(
			'sm_mobile',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Phones: > 425px', 'techly-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
					'3' => esc_html__( '3',  'techly-core' ),
					'4' => esc_html__( '4',  'techly-core' ),
					'5' => esc_html__( '5',  'techly-core' ),
				),
			]
		);

		$this->end_controls_section();

		// Slider option
		$this->start_controls_section(
			'section_slider_option',
			[
				'label' => __( 'Slider Option', 'techly-core' ),
			]
		);
		$this->add_control(
			'slider_autoplay',
			[
				'type'        => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Autoplay', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'techly-core' ),
			]
		);
		$this->add_control(
			'display_arrow',
			[
				'type'        => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Navigation Arrow', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'techly-core' ),
			]
		);
		$this->add_control(
			'display_pagination',
			[
				'type'        => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Pagination', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'techly-core' ),
			]
		);
		$this->add_control(
			'slides_per_group',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'label'   => esc_html__( 'slides Per Group', 'techly-core' ),
				'default' => array(
					'size' => 1,
				),
				'description' => esc_html__( 'slides Per Group. Default: 1', 'techly-core' ),
			]
		);
		$this->add_control(
			'centered_slides',
			[
				'type'        => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Centered Slides', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Centered Slides. Default: On', 'techly-core' ),
			]
		);
		$this->add_control(
			'slides_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'label'   => esc_html__( 'Slides Space', 'techly-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 24,
				),
				'description' => esc_html__( 'Slides Space. Default: 24', 'techly-core' ),
			]
		);
		$this->add_control(
			'slider_autoplay_delay',
			[
				'type'    => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Autoplay Slide Delay', 'techly-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'techly-core' ),
				'condition'   => [
					'slider_autoplay' => 'yes',
				],
			]
		);
		$this->add_control(
			'slider_autoplay_speed',
			[
				'type'    => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Autoplay Slide Speed', 'techly-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'techly-core' ),
				'condition'   => [
					'slider_autoplay' => 'yes',
				],
			]
		);
		$this->add_control(
			'slider_loop',
			[
				'type'        => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Loop', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'techly-core' ),
			]
		);
		$this->end_controls_section();

		//Box setting
		$this->start_controls_section(
			'box_style',
			[
				'label' => esc_html__( 'Box Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .article-inner-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_content_padding',
			[
				'label'              => __( 'Content Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .article-inner-wrapper .entry-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .article-inner-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		//Box Tabs
		$this->start_controls_tabs(
			'box_style_tabs', [
			]
		);

		$this->start_controls_tab(
			'box_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);

		$this->add_control(
			'box_bag',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .article-inner-wrapper' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .article-inner-wrapper',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => __( 'Box Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .article-inner-wrapper',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'box_hover_bag',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .techly-post-card:hover .article-inner-wrapper' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
	        \Elementor\Group_Control_Border::get_type(),
	        [
		        'name' => 'box_hover_border',
		        'selector' => '{{WRAPPER}} .techly-post-card:hover .article-inner-wrapper',
	        ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_hover_shadow',
				'label'    => __( 'Box Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .techly-post-card:hover .article-inner-wrapper',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		//Animation setting
		$this->start_controls_section(
			'animation_style',
			[
				'label' => esc_html__( 'Animation Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'animation',
			[
				'type'      => Controls_Manager::SELECT,
				'label'     => esc_html__( 'Animation', 'techly-core' ),
				'options' => [
					'wow' => esc_html__( 'On', 'techly-core' ),
					'wow-off'         => esc_html__( 'Off', 'techly-core' ),
				],
				'default' => 'wow-off',
			]
		);

		$this->add_control(
			'animation_effect',
			[
				'type'    => Controls_Manager::SELECT,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'techly-core' ),
				'options' => [
					'bounce' => esc_html__( 'bounce', 'techly-core' ),
					'flash' => esc_html__( 'flash', 'techly-core' ),
					'pulse' => esc_html__( 'pulse', 'techly-core' ),
					'headShake' => esc_html__( 'headShake', 'techly-core' ),
					'swing' => esc_html__( 'swing', 'techly-core' ),
					'hinge' => esc_html__( 'hinge', 'techly-core' ),
					'flipInX' => esc_html__( 'flipInX', 'techly-core' ),
					'flipInY' => esc_html__( 'flipInY', 'techly-core' ),
					'fadeIn' => esc_html__( 'fadeIn', 'techly-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'techly-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'techly-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'techly-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'techly-core' ),
					'bounceIn' => esc_html__( 'bounceIn', 'techly-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'techly-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'techly-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'techly-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'techly-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'techly-core' ),
					'slideInDown' => esc_html__( 'slideInDown', 'techly-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'techly-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'techly-core' ),
					'zoomIn' => esc_html__( 'zoomIn', 'techly-core' ),
					'zoomInDown' => esc_html__( 'zoomInDown', 'techly-core' ),
					'zoomInUp' => esc_html__( 'zoomInUp', 'techly-core' ),
					'zoomInLeft' => esc_html__( 'zoomInLeft', 'techly-core' ),
					'zoomInRight' => esc_html__( 'zoomInRight', 'techly-core' ),
					'zoomOut' => esc_html__( 'zoomOut', 'techly-core' ),
				],
				'default' => 'fadeInUp',
				'condition'   => [
					'animation' => [ 'wow' ]
				],
			]
		);

		$this->add_control(
			'delay',
			[
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Delay', 'techly-core' ),
				'default' => '200',
				'condition'   => [
					'animation' => [ 'wow' ]
				],
			],
		);

		$this->add_control(
			'duration',
			[
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'techly-core' ),
				'default' => '1200',
				'condition'   => [
					'animation' => [ 'wow' ]
				],
			],
		);

		$this->end_controls_section();

	}

	protected function render() {
		$data = $this->get_settings();

		if($data['slider_autoplay']=='yes'){
			$data['slider_autoplay']=true;
		}
		else{
			$data['slider_autoplay']=false;
		}

		$swiper_data = array(
			'slidesPerView' 	=>2,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space']['size'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'				=>array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'speed'      =>$data['slider_autoplay_speed'],
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'425'    =>array('slidesPerView' =>$data['sm_mobile']),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
			'auto'   =>$data['slider_autoplay']
		);


		$template = 'view-1';
		if ( 'grid-2' == $data['layout'] ) {
			$template = 'view-2';
		} elseif ( 'grid-3' == $data['layout'] ) {
			$template = 'view-3';
		} elseif ( 'grid-4' == $data['layout'] ) {
			$template = 'view-4';
		} elseif ( 'grid-5' == $data['layout'] ) {
			$template = 'view-5';
		} elseif ( 'list-2' == $data['layout'] ) {
			$template = 'view-6';
		}

		$data['swiper_data'] = json_encode( $swiper_data );

		$args = [
			'post_type'           => 'post',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $data['post_limit'],
			'post_status'         => 'publish',
		];

		if ( ! empty ( $data['orderby'] ) ) {
			$args['orderby'] = $data['orderby'];
		}
		if ( ! empty( $data['order'] ) ) {
			$args['order'] = $data['order'];
		}

		if( ! empty ( $data['orderby'] ) && $data['orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'rt_post_views';
		}

		if ( $data['post_source'] == 'by_category' && $data['categories'] ) :
			$args = wp_parse_args(
				[
					'cat' => $data['categories'],
				]
				, $args );
		endif;

		if ( $data['post_source'] == 'by_tags' && $data['tags'] ) :
			$args = wp_parse_args(
				[
					'tag_slug__in' => $data['tags'],
				]
				, $args );
		endif;

		if ( $data['post_source'] == 'by_id' && $data['post_id'] ) :
			$post_ids         = explode( ',', $data['post_id'] );
			$args['post__in'] = $post_ids;
		endif;

		if ( $data['exclude'] ) :
			$excluded_ids         = explode( ',', $data['exclude'] );
			$args['post__not_in'] = $excluded_ids;
		endif;


		if ( $data['offset'] ) {
			$args['offset'] = $data['offset'];
		}

		$query               = new \WP_Query( $args );
		?>
        <div class="rt-el-post-wrapper blog-<?php echo esc_attr( $data['layout'] ) ?>">
			<?php if  ($data['custom_cursor_display'] == 'yes') { ?>
            <div class="cursor">
                <div class="cursor__inner">
                    <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.71875 10.4375L5.28125 7L8.71875 3.5625" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.9062 10.4375L19.3438 7L15.9062 3.5625" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
			<?php } ?>
			<?php if ( $query->have_posts() ) : ?>
                <div class="custom-cursor-swiper rt-swiper-slider <?php echo esc_attr( $data['arrow_hover_visibility'] ) ?>" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
                    <div class="swiper-wrapper">
					<?php $ade = $data['delay']; $adu = $data['duration'];
                    while ( $query->have_posts() ) : $query->the_post();
						echo '<article class="techly-post-card swiper-slide ' . esc_attr( $data['animation'] ) . ' ' . esc_attr( $data['animation_effect'] ) . '" data-wow-delay= ' . esc_attr( $ade ) . "ms" .' data-wow-duration=' . esc_attr( $adu ) . "ms" .'>';
						Fns::get_template( "elementor/post/$template", $data );
						echo '</article>';
                        $ade = $ade + 200; $adu = $adu + 0; endwhile; ?>
                    </div>
	                <?php if ( $data['display_arrow']  == 'yes' ) { ?>
                        <div class="swiper-navigation">
                            <div class="swiper-button swiper-button-prev"><i class="icon-rt-right-arrow"></i></div>
                            <div class="swiper-button swiper-button-next"><i class="icon-rt-left-arrow"></i></div>
                        </div>
	                <?php } ?>
	                <?php if ( $data['display_pagination'] == 'yes' ) { ?>
                        <div class="swiper-pagination"></div>
	                <?php } ?>
                </div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
        </div>
		<?php
	}
}