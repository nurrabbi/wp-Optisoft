<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use RT\TechlyCore\Abstracts\ElementorBase;
use RT\TechlyCore\Helper\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CaseStudy extends ElementorBase {

	public function __construct($data = [], $args = null) {
		$this->rt_name = esc_html__('RT Case Study', 'techly-core');
		$this->rt_base = 'rt-case-study';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'techly-core' ),
				'6'  => esc_html__( '2 Col', 'techly-core' ),
				'4'  => esc_html__( '3 Col', 'techly-core' ),
				'3'  => esc_html__( '4 Col', 'techly-core' ),
				'2'  => esc_html__( '6 Col', 'techly-core' ),
			),
		);
		parent::__construct($data, $args);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'rt_sec_general',
			[
				'label' => esc_html__('General', 'techly-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			],
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image', [
				'label'     => __( 'Choose Image', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Recommended full image', 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'subtitle', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Subtitle', 'techly-core' ),
				'default' => esc_html__( 'Software' , 'techly-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'techly-core' ),
				'default' => esc_html__( 'Tab Title' , 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'button_text', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Button Text', 'techly-core' ),
				'default' => esc_html__( 'Discover More' , 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'button_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-right-arrow-2',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'content', [
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Content', 'techly-core' ),
				'default' => esc_html__( 'iscover moving experience like no other at OutgridWe go beyond erely transporitem.' , 'techly-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'url', [
				'type' => \Elementor\Controls_Manager::URL,
				'label' => esc_html__( 'Link (Optional)', 'techly-core' ),
				'placeholder' => 'https://your-link.com',
				'label_block' => true,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'       => esc_html__( 'Case Study Layout', 'techly-core' ),
				'type'        => Controls_Manager::SELECT2,
				'options'   => [
					'layout-1' => esc_html__( 'Layout 01', 'techly-core' ),
					'layout-2' => esc_html__( 'Layout 02', 'techly-core' ),
				],
				'default'     => 'layout-1',
			]
		);
		$this->add_control(
			'item_space',
			[
				'type'        => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Item Gutter', 'techly-core' ),
				'options' => [
					'g-0' => __( 'Gutters 0', 'techly-core' ),
					'g-1' => __( 'Gutters 1', 'techly-core' ),
					'g-2' => __( 'Gutters 2', 'techly-core' ),
					'g-3' => __( 'Gutters 3', 'techly-core' ),
					'g-4' => __( 'Gutters 4', 'techly-core' ),
					'g-5' => __( 'Gutters 5', 'techly-core' ),
				],
				'default' => 'g-4',
				'condition'  => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label'     => __( 'Alignment', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'techly-core' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'techly-core' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'techly-core' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .list-item *' => 'text-align: {{VALUE}} !important',
				],
				'toggle'    => true,
			]
		);

		$this->add_control(
			'list_items',
			[
				'label' => __('List Items', 'techly-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Strategic Finance Planing', 'techly-core'),
						'content' => __('iscover moving experience like no other at OutgridWe go beyond erely transporitem.', 'techly-core'),
					],
					[
						'title' => __('Expert Advice for Consulting Success', 'techly-core'),
						'content' => __('experience like no other at OutgridWe go beyond erely transporitems preadsheet accurate.', 'techly-core'),
					],
					[
						'title' => __('Exploration and Investigation', 'techly-core'),
						'content' => __('other at OutgridWe experience like no other at OutgridWe go beyond erely.', 'techly-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title Tag', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h3',
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
			'read_more_display',
			[
				'label'        => __( 'Read More Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'line_display',
			[
				'label'        => __( 'Line Display', 'gardenar-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();


		// Title Settings
		$this->start_controls_section(
			'title_settings',
			[
				'label' => esc_html__( 'Title Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-case-study .rt-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .rt-title'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-case-study .rt-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item:hover .rt-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label'      => __( 'Title Spacing', 'techly-core' ),
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
					'{{WRAPPER}} .rt-case-study .rt-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// Sub Title Settings
		$this->start_controls_section(
			'subtitle_settings',
			[
				'label' => esc_html__( 'Subtitle Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-case-study .rt-subtitle',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .rt-subtitle'   => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'subtitle_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item:hover .rt-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_spacing',
			[
				'label'      => __( 'Subtitle Spacing', 'techly-core' ),
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
					'{{WRAPPER}} .rt-case-study .rt-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'subtitle_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .rt-subtitle' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->add_control(
			'subtitle_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .case-item .list-item:hover .rt-subtitle' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-case-study .rt-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-case-study .rt-subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->end_controls_section();

		// Content Settings
		$this->start_controls_section(
			'sec_content_settings',
			[
				'label'     => esc_html__( 'Content Settings', 'techly-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-case-study .rt-content',
			]
		);
		$this->add_control(
			'content_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .rt-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item:hover .rt-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .content-wrap' => 'background-color: {{VALUE}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->add_responsive_control(
			'content_spacing',
			[
				'label'      => __( 'Content Spacing', 'techly-core' ),
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
					'{{WRAPPER}} .rt-case-study .rt-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-case-study .content-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->add_responsive_control(
			'content_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-case-study .content-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->end_controls_section();


		// Image style
		$this->start_controls_section(
			'image_style',
			[
				'label' => esc_html__( 'Image Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			],
		);

		$this->add_control(
			'project_thumbnail_size',
			[
				'label'     => esc_html__( 'Image Size', 'techly-core' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => rt_get_all_image_sizes(),
			]
		);


		$this->add_responsive_control(
			'image_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Image Width', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 800,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .service-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Image Height', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 800,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .service-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'image_spacing',
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
					'{{WRAPPER}} .rt-case-study .service-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-case-study .service-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} .rt-case-study .service-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .rt-case-study .service-img',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'label' => __('Image Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-case-study .service-img',
			]
		);


		$this->end_controls_section();

		// Button Settings
		$this->start_controls_section(
			'button_settings',
			[
				'label' => esc_html__( 'Button Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'read_more_display' => ['yes'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-button .btn',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'button_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_width',
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
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_height',
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
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);


		//Button style Tabs
		$this->start_controls_tabs(
			'button_style_tabs', [
			]
		);

		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'button_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .btn i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-button .btn:before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-button .btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-button .btn:after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'selector' => '{{WRAPPER}} .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_hover_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-button .btn:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Button Icon
		$this->start_controls_section(
			'icon_settings',
			[
				'label' => esc_html__( 'Button Icon Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'      => __( 'Icon Size', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 5,
						'max'  => 40,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-button .btn i'   => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-button .btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn i'        => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .btn svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_icon_bg_color',
				'label' => __('Icon Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Icon Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-button .btn .rt-button-icon',
			]
		);
		$this->add_responsive_control(
			'button_icon_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Width', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn .rt-button-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_icon_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Height', 'techly-core' ),
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
					'{{WRAPPER}} .rt-button .btn .rt-button-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .rt-button .btn .rt-button-icon',
			]
		);
		$this->add_responsive_control(
			'button_icon_radius',
			[
				'label'              => __( 'Icon Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-button .btn .rt-button-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_icon_rotate',
			[
				'type'      => Controls_Manager::NUMBER,
				'label'     => esc_html__( 'Transform Value', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-button .btn .rt-button-icon ' => 'transform: rotate({{VALUE}}deg)',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_icon_bg_hover_color',
				'label' => __('Icon Hover Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Icon Hover Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-button .btn:hover .rt-button-icon',
			]
		);


		$this->end_controls_section();

		//Line setting
		$this->start_controls_section(
			'line_style',
			[
				'label' => esc_html__( 'Line Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'  => [
					'layout' => ['layout-1'],
				],
			]
			
		);
		$this->add_control(
			'line_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item .rt-line:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'line_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Background', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item:hover .rt-line:before' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'line_height',
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
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item .rt-line:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'line_width',
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
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item .rt-line:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_section();

		//List setting
		$this->start_controls_section(
			'list_style',
			[
				'label' => esc_html__( 'List Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'list_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Background', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-case-study .list-item:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'list_margin',
			[
				'label'              => __( 'Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-case-study .list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'list_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-case-study .list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'list_content_padding',
			[
				'label'              => __( 'Content Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-case-study .list-item .content-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'list_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-case-study .list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'list_border',
				'selector' => '{{WRAPPER}} .rt-case-study .list-item',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'list_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-case-study .list-item',
			]
		);


		$this->end_controls_section();

		// Responsive Settings
		$this->start_controls_section(
			'sec_grid_responsive',
			[
				'label' => esc_html__( 'Number of Responsive Columns', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition'  => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_control(
			'col_xl',
			[
				'type' => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Desktops: > 1199px', 'techly-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			]
		);
		$this->add_control(
			'col_lg',
			[
				'type' => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Desktops: > 991px', 'techly-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			]
		);
		$this->add_control(
			'col_md',
			[
				'type' => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Tablets: > 767px', 'techly-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			]
		);
		$this->add_control(
			'col_sm',
			[
				'type' => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Phones: < 768px', 'techly-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			]
		);
		$this->add_control(
			'col_xs',
			[
				'type' => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Small Phones: < 480px', 'techly-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			]
		);

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
		$template = 'view-1';
		if ( 'layout-2' == $data['layout'] ) {
			$template = 'view-2';
		}
		Fns::get_template( "elementor/case-study/$template", $data );
	}
}