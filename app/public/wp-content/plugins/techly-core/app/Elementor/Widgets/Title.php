<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use RT\TechlyCore\Abstracts\ElementorBase;
use RT\TechlyCore\Helper\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Title extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Section Title', 'techly-core' );
		$this->rt_base = 'rt-title';
		parent::__construct( $data, $args );
	}


	protected function register_controls() {
		/* General Options */

		$this->start_controls_section(
			'sec_general',
			[
				'label' => esc_html__( 'General', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_layout',
			[
				'label'       => esc_html__( 'Title Layout', 'techly-core' ),
				'type'        => Controls_Manager::SELECT2,
				'options'   => [
					'layout-1' => __( 'Layout 01', 'techly-core' ),
					'layout-2' => __( 'Layout 02', 'techly-core' ),
					'layout-3' => __( 'Layout 03', 'techly-core' ),
				],
				'default'     => 'layout-1',
			]
		);

		$this->add_control(
			'top_sub_title',
			[
				'label'       => esc_html__( 'Top Sub Title', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Why Choose Our About', 'techly-core' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Main Title', 'techly-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 4,
				'default'     => __( 'Welcome To Our Techly', 'techly-core' ),
				'description' => esc_html__( "If you would like to use different color then separate word by <span>.", 'techly-core' ),
			]
		);

		$this->add_control(
			'shadow_title_display',
			[
				'label'        => __( 'Shadow Title Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'no',
				'condition'  => [
					'title_layout' => 'layout-1',
				],
			]
		);

		$this->add_control(
			'shadow_title',
			[
				'label'       => esc_html__( 'Shadow Title', 'techly-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 3,
				'default'     => __('About', 'techly-core' ),
				'description' => esc_html__( 'Only use layout 1', 'techly-core' ),
				'condition'  => [
					'shadow_title_display' => 'yes',
				],
			]
		);


		$this->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'techly-core' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default'     => __('Manage and streamline operations across multiple locations, sales channels, and employees to improve efficiency and your bottom line.', 'techly-core' ),
				'condition'  => [
					'title_layout!' => 'layout-2',
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_text',
			[
				'label'       => __( 'List Text', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Powerful database store', 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-check',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'show_feature_list',
			[
				'label'        => __( 'Feature List', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'return_value' => 'is-feature',
				'condition'  => [
					'title_layout' => 'layout-1',
				],
			]
		);

		$this->add_control(
			'feature_lists',
			[
				'label'       => __( 'Feature List', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'list_text'        => __( 'Powerful database store', 'techly-core' ),
					],
					[
						'list_text'        => __( 'Easy to access all projects', 'techly-core' ),
					],
					[
						'list_text'        => __( 'Effortless courier allocation', 'techly-core' ),
					],
					[
						'list_text'        => __( 'Widest coverage network', 'techly-core' ),
					],

				],
				'title_field' => '{{{ name }}}',
				'condition'   => [
					'show_feature_list' => [ 'is-feature' ],
					'title_layout' => ['layout-1'],
				],
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label'     => __( 'Alignment', 'techly-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'       => '',
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
					'{{WRAPPER}} .section-title-wrapper' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// Main Title Settings
		$this->start_controls_section(
			'title_settings',
			[
				'label' => esc_html__( 'Title Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .main-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color_two',
			[
				'type'        => Controls_Manager::COLOR,
				'label'       => esc_html__( 'Color 2', 'techly-core' ),
				'description' => esc_html__( "If you would like to use different color then separate word by <span> from main title.", 'techly-core' ),
				'selectors'   => [
					'{{WRAPPER}} .section-title-wrapper .main-title span' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .main-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_span_typo',
				'label'    => esc_html__( 'Typo 2', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .main-title span',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .section-title-wrapper .main-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .section-title-wrapper .main-title',
			]
		);

		$this->add_responsive_control(
			'heading_margin',
			[
				'label'              => __( 'Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .main-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);


		$this->add_control(
			'main_title_tag',
			[
				'label'   => esc_html__( 'Main Title Tag', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1' => esc_html__( 'H1', 'techly-core' ),
					'h2' => esc_html__( 'H2', 'techly-core' ),
					'h3' => esc_html__( 'H3', 'techly-core' ),
					'h4' => esc_html__( 'H4', 'techly-core' ),
					'h5' => esc_html__( 'H5', 'techly-core' ),
					'h6' => esc_html__( 'H6', 'techly-core' ),
					'span' => esc_html__( 'Span', 'techly-core' ),
					'div' => esc_html__( 'Div', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'title_animation',
			[
				'label'        => __( 'Animation Title Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'no',
				'condition'  => [
					'title_layout' => 'layout-1',
				],
			]
		);

		$this->end_controls_section();

		// Top Sub Title
		$this->start_controls_section(
			'top_title_settings',
			[
				'label' => esc_html__( 'Sub Title Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_style',
			[
				'label'     => __( 'Sub Title Style', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'default',
				'options'   => [
					'default'  => __( 'Default', 'techly-core' ),
					'left-right-shape'  => __( 'Sub Title Shape', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'top_title_icon',
			[
				'label'   => __( 'Choose Icons', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::ICON,
				'include' => [
					'icon-rt-ai',
					'icon-rt-check',
					'icon-rt-right',
				],
				'default' => '',
			]
		);


		$this->add_control(
			'icon_position',
			[
				'label'     => __( 'Icon Position', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => [
					'left'  => __( 'Left', 'techly-core' ),
					'right' => __( 'Right', 'techly-core' ),
					'both'  => __( 'Both', 'techly-core' ),
				],
				'condition' => [
					'top_title_icon!' => '',
				],
			]
		);

		$this->add_control(
			'top_title_icon_size',
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
				'selectors'  => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title i'   => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'top_title_icon!' => '',
				],
			]
		);

		$this->add_control(
			'top_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'top_title_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title i'        => 'color: {{VALUE}}',
					'{{WRAPPER}} .section-title-wrapper .top-sub-title svg path' => 'fill: {{VALUE}}',
				],
				'condition' => [
					'top_title_icon!' => '',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'top_title_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .section-title-wrapper .top-sub-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'top_title_typo',
				'label'    => esc_html__( 'Typography', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .top-sub-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'top_title_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .top-sub-title',
			]
		);
		$this->add_responsive_control(
			'top_title_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'top_title_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%'],
				'selectors'          => [
					'{{WRAPPER}} .top-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'top_title_margin',
			[
				'label'              => __( 'Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%'],
				'selectors'          => [
					'{{WRAPPER}} .top-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'double_line_shape',
			[
				'label'        => __( 'Both Line Shape', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'no',
			]
		);

		$this->end_controls_section();

		// Top Title Line Settings
			$this->start_controls_section(
			'sub_title_line_settings',
			[
				'label' => esc_html__( 'Sub Title Line Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'  => [
					'double_line_shape' => 'yes',
				],
			]
		);

		$this->add_control(
			'sub_title_line_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:after' => 'background-color: {{VALUE}}',
				],
				
			]
		);
		$this->add_control(
			'sub_title_line_radius',
			[
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'label'     => esc_html__( 'Radius', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'sub_title_line_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:before' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:after' => 'width: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
			$this->add_responsive_control(
			'sub_title_line_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:before' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .section-title-wrapper .top-sub-title .both-line-shape:after' => 'height: {{SIZE}}{{UNIT}};',
				],
				
			]
		);



		$this->end_controls_section();



		// Title Shadow Settings
		$this->start_controls_section(
			'title_shadow_settings',
			[
				'label' => esc_html__( 'Shadow Title Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'description' => esc_html__( 'Only use layout 1', 'techly-core' ),
				'condition'  => [
					'shadow_title_display' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_shadow_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .shadow-title-wrap .shadow-title',
			]
		);

		$this->add_control(
			'title_shadow_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Title Stroke Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .shadow-title-wrap .shadow-title' => '-webkit-text-stroke-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'shadow_title_horizontal',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Position Horizontal', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
					],
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .shadow-title-wrap' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_stroke_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Stroke Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .shadow-title-wrap .shadow-title' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// Description Settings
		$this->start_controls_section(
			'description_settings',
			[
				'label' => esc_html__( 'Description & List Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typo',
				'label'    => esc_html__( 'Typography', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .description',
			]
		);

		$this->add_control(
			'description_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'description_margin',
			[
				'label'              => __( 'Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ '%','px' ],
				'selectors'          => [
					'{{WRAPPER}} .section-title-wrapper .description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'list_settings',
			[
				'label'     => __( 'List Settings (if you use list item in description)', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_typo',
				'label'    => esc_html__( 'List Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper ul.feature-list li',
			]
		);

		$this->add_control(
			'list_column',
			[
				'label'     => __( 'List Column', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'default',
				'options'   => [
					'default'  => __( 'One Column', 'techly-core' ),
					'two-column' => __( 'Two Column', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'list_layout',
			[
				'label'     => __( 'List Layout', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'list-layout-1',
				'options'   => [
					'list-layout-1' => __( 'Layout 1', 'techly-core' ),
					'list-layout-2' => __( 'layout 2', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'list_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'List Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .feature-list li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'list_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'List Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .feature-list li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'list_icon_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'List Icon BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .section-title-wrapper .feature-list li span' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'list_icon_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .section-title-wrapper .feature-list li span',
			]
		);
		$this->add_responsive_control(
			'list_icon_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .section-title-wrapper .feature-list li span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'list_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ '%','px' ],
				'selectors'          => [
					'{{WRAPPER}} .section-title-wrapper ul.feature-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'list_margin',
			[
				'label'              => __( 'Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ '%','px' ],
				'selectors'          => [
					'{{WRAPPER}} .section-title-wrapper ul.feature-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// Background Title Settings
		//==============================================================
		$this->start_controls_section(
			'Common Settings',
			[
				'label' => esc_html__( 'Common Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'section_title_wrap_margin',
			[
				'label'              => __( 'Wrapper Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'allowed_dimensions' => 'vertical',
				'selectors'          => [
					'{{WRAPPER}} .section-title-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
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
		$data     = $this->get_settings();

		switch ( $data['title_layout'] ) {
			case 'layout-3':
				$template = 'view-3';
				break;
			case 'layout-2':
				$template = 'view-2';
				break;
			default:
				$template = 'view-1';
				break;
		}

		Fns::get_template( "elementor/title/$template", $data );
	}

}