<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use RT\TechlyCore\Helper\Fns;
use RT\TechlyCore\Abstracts\ElementorBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class InfoBox extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Info Box', 'techly-core' );
		$this->rt_base = 'rt-info-box';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'rt_info_box',
			[
				'label' => esc_html__( 'Info Box Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'layout-1',
				'options' => [
					'layout-1' => __( 'Layout 1', 'techly-core' ),
					'layout-2' => __( 'Layout 2', 'techly-core' ),
					'layout-3' => __( 'Layout 3', 'techly-core' ),
					'layout-4' => __( 'Layout 4', 'techly-core' ),
					'layout-5' => __( 'Layout 5', 'techly-core' ),
					'layout-6' => __( 'Layout 6', 'techly-core' ),
					'layout-7' => __( 'Layout 7', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Welcome To Techly', 'techly-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => esc_html__( 'Sub Title', 'techly-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'I am Info Text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit','techly-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label'   => __( 'Icon Type', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon'  => __( 'Icon', 'techly-core' ),
					'image' => __( 'Image', 'techly-core' ),
				],
			]
		);

		$this->add_control(
			'info_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'fas fa-home',
					'library' => 'fa-solid',
				],
				'condition'        => [
					'icon_type' => [ 'icon' ],
				],
			]
		);

		$this->add_control(
			'image_icon',
			[
				'label'     => __( 'Choose Image', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_type' => [ 'image' ],
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
					'value'   => 'icon-rt-correct',
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
					'layout' => 'layout-4',
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
						'list_text'        => __( 'Certificate awarded', 'techly-core' ),
					],

				],
				'title_field' => '{{{ name }}}',
				'condition'   => [
					'show_feature_list' => [ 'is-feature' ],
					'layout' => ['layout-4'],
				],
			]
		);

		$this->add_control(
			'show_read_more_btn',
			[
				'label'        => __( 'Read More Button', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'return_value' => 'is-read-more',
			]
		);

		$this->add_control(
			'read_more_btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Read More',
				'label_block' => true,
				'condition'   => [
					'show_read_more_btn' => [ 'is-read-more' ],
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label'         => __( 'Link', 'techly-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'techly-core' ),
				'show_external' => true,
				'dynamic'       => [
					'active' => true,
				],
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
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
					'{{WRAPPER}} .rt-info-box *' => 'text-align: {{VALUE}} !important',
					'{{WRAPPER}} .rt-info-box .icon-holder'     => 'text-align: {{VALUE}} !important',
				],
				'toggle'    => true,
			]
		);

		// scroll animation
		$this->add_control(
			'scroll_animation',
			[
				'label'        => __( 'Scroll Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'x_range',
			[
				'label'       => esc_html__( 'Animation Property', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'x' => __( 'x', 'techly-core' ),
					'y' => __( 'y', 'techly-core' ),
					'z' => __( 'z', 'techly-core' ),
					'rotateX' => __( 'rotateX', 'techly-core' ),
					'rotateY' => __( 'rotateY', 'techly-core' ),
					'rotateZ' => __( 'rotateZ', 'techly-core' ),
					'scaleX' => __( 'scaleX', 'techly-core' ),
					'scaleY' => __( 'scaleY', 'techly-core' ),
					'scaleZ' => __( 'scaleZ', 'techly-core' ),
					'scale' => __( 'scale', 'techly-core' ),
				],
				'label_block' => true,
				'default'     => 'y',
				'condition'   => [
					'scroll_animation' => ['yes'],
				],
			]
		);
		$this->add_control(
			'y_range',
			[
				'label'       => esc_html__( 'Animation Property', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'x' => __( 'x', 'techly-core' ),
					'y' => __( 'y', 'techly-core' ),
					'z' => __( 'z', 'techly-core' ),
					'rotateX' => __( 'rotateX', 'techly-core' ),
					'rotateY' => __( 'rotateY', 'techly-core' ),
					'rotateZ' => __( 'rotateZ', 'techly-core' ),
					'scaleX' => __( 'scaleX', 'techly-core' ),
					'scaleY' => __( 'scaleY', 'techly-core' ),
					'scaleZ' => __( 'scaleZ', 'techly-core' ),
					'scale' => __( 'scale', 'techly-core' ),
				],
				'label_block' => true,
				'default'     => 'x',
				'condition'   => [
					'scroll_animation' => ['yes'],
				],
			]
		);
		$this->add_control(
			'range_one',
			[
				'label'       => esc_html__( 'Range Value One', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 50,
				'condition'   => [
					'scroll_animation' => ['yes'],
				],
			]
		);
		$this->add_control(
			'range_two',
			[
				'label'       => esc_html__( 'Range Value Two', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 0,
				'condition'   => [
					'scroll_animation' => ['yes'],
				],
			]
		);

		$this->add_control(
			'info_left_animation',
			[
				'label'        => __( 'Left Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'false',
				'condition'  => [
					'layout' => ['layout-4'],
				],
			]
		);
		$this->add_control(
			'info_right_animation',
			[
				'label'        => __( 'Right Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'false',
				'condition'  => [
					'layout' => ['layout-4'],
				],
			]
		);
		$this->add_control(
			'info_tech_box_animation',
			[
				'label'        => __( 'Box Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'false',
				'condition'  => [
					'layout' => ['layout-1', 'layout-2', 'layout-5', 'layout-6'],
				],
			]
		);
		$this->add_control(
			'info_tech_box_sticky',
			[
				'label'        => __( 'Sticky Box', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'false',
				'condition'  => [
					'layout' => ['layout-7'],
				],
			]
		);

		$this->end_controls_section();

		// Title Settings
		//==============================================================
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
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-title'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-box .info-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-title a:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .rt-info-box:not(.rt-info-layout-1) .info-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-info-layout-1 .info-icon-holder' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
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

		$this->end_controls_section();

		// Content Settings
		$this->start_controls_section(
			'sec_content_settings',
			[
				'label'     => esc_html__( 'Content Settings', 'techly-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .content-holder p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .content-holder p',
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
					'{{WRAPPER}} .rt-info-box .content-holder p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-layout-7 .info-box .info-content-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition'   => [
					'layout' => ['layout-7'],
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
				'selector' => '{{WRAPPER}} .rt-info-box .feature-list li',
			]
		);

		$this->add_control(
			'list_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'List Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .feature-list li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'list_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'List Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .feature-list li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'list_icon_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'List Icon BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .feature-list li span' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// Icon Settings
		//==============================================================
		$this->start_controls_section(
			'icon_settings',
			[
				'label'     => esc_html__( 'Icon Settings', 'techly-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_type' => [ 'icon' ],
				],
			]
		);

		$this->add_responsive_control(
			'icon_box_width',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Icon Box Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 250,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-box .info-icon'   => 'width: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_responsive_control(
			'icon_box_height',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Icon Box Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 250,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-box .info-icon'   => 'height: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_responsive_control(
			'icon_box_vertical',
			[
				'label'      => __( 'Vertical Position', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'%' => [
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					'px' => [
						'min'  => -1000,
						'max'  => 1000,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-box .info-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'layout' => ['layout-6'],
				],
			]
		);


		$this->add_responsive_control(
			'icon_size',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Icon Font Size', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 150,
						'step' => 0.1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-box .info-icon i'   => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .info-box .info-icon svg' => 'transform: scale({{SIZE}});',
				],

			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label'      => __( 'Icon Spacing / Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .info-box .info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => __( 'Icon Margin', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .icon-holder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'icon_border_radius',
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
					'{{WRAPPER}} .rt-info-box .info-box .info-icon'    => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		//Start Icon Style Tab
		$this->start_controls_tabs(
			'icon_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'icon_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-box .info-icon i'        => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-box .info-box .info-icon svg path' => 'stroke: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-box .info-icon'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box .info-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box .info-icon',
			]
		);

		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'icon_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color Hover', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-box:hover .info-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-box .info-box:hover .info-icon svg path' => 'stroke: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-box:hover .info-icon'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box:hover .info-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_hover_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box:hover .info-icon',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//End Icon Style Tab

		$this->end_controls_section();

		// Image Icon Settings
		$this->start_controls_section(
			'image_icon_settings',
			[
				'label'     => esc_html__( 'Image Icon Settings', 'techly-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_type' => [ 'image' ],
				],
			]
		);

		$this->add_responsive_control(
			'image_wrap_margin_bottom',
			[
				'label'      => __( 'Image Wrapper Margin Bottom', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .icon-holder' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_icon_width',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Image Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .info-icon img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
				],
				'condition'  => [
					'icon_type' => [ 'image' ],
				],
			]
		);

		$this->add_responsive_control(
			'image_wrap_width',
			[
				'label'      => __( 'Image Wrapper Width / Height', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 50,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .icon-holder .info-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'image_align',
			[
				'label'   => esc_html__( 'Image Align', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center' => esc_html__( 'Center', 'techly-core' ),
					'self-start' => esc_html__( 'Top', 'techly-core' ),
					'self-end' => esc_html__( 'Bottom', 'techly-core' ),
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .icon-holder .info-icon' => 'align-items: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['layout-6'],
				],
			]
		);

		$this->add_responsive_control(
			'image_spacing',
			[
				'label'      => __( 'Image Spacing / Margin', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .icon-holder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Image Radius', 'techly-core' ),
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .icon-holder .info-icon img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'image_box_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Box Radius', 'techly-core' ),
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-box .info-icon' => 'border-radius: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .rt-info-box .icon-holder' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		//Start image Style Tab
		$this->start_controls_tabs(
			'image_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'image_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'image_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-box .info-icon'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'image_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box .info-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box .info-icon',
			]
		);

		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'image_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'image_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .info-box:hover .info-icon'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'image_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box:hover .info-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_hover_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box:hover .info-icon',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//End Icon Style Tab

		$this->end_controls_section();

		// Info Image Settings
		$this->start_controls_section(
			'info_image_settings',
			[
				'label' => esc_html__( 'Info Image Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'    => [
					'layout' => ['layout-6'],
				],
			]
		);

		$this->add_control(
			'info_image_display',
			[
				'label'        => __( 'Image Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default' => 'no',
			]
		);

		$this->add_control(
			'info_image',
			[
				'label'     => __( 'Choose Image', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'info_image_display' => [ 'yes' ],
				],
			]
		);

		$this->add_responsive_control(
			'info_image_width',
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
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-info-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'info_image_display' => [ 'yes' ],
				],
			]
		);

		$this->add_responsive_control(
			'info_image_height',
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
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-info-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'info_image_display' => [ 'yes' ],
				],
			]
		);

		$this->add_responsive_control(
			'info_image_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'info_image_display' => [ 'yes' ],
				],
			]
		);

		$this->end_controls_section();

		// Read More Button Settings
		$this->start_controls_section(
			'read_more_settings',
			[
				'label'     => esc_html__( 'Button Settings', 'techly-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_read_more_btn' => [ 'is-read-more' ],
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'read_more_btn_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn',
			]
		);

		$this->add_responsive_control(
			'read_more_border_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Border Radius', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);


		$this->add_responsive_control(
			'btn_more_width',
			[
				'label'      => __( 'Button Width', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
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
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_more_height',
			[
				'label'      => __( 'Button Height', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
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
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'read_more_padding_spacing',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		// Button Icon Settings
		$this->add_control(
			'button_icon_heading',
			[
				'label'     => __( 'Button Icon Settings', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_btn_icon',
			[
				'label'        => __( 'Show Button Icon', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'techly-core' ),
				'label_off'    => __( 'No', 'techly-core' ),
				'return_value' => 'yes',
				'default'      => false,
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label'     => __( 'Button Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => [
					'value'   => 'icon-rt-guidance',
					'library' => 'solid',
				],
				'condition' => [
					'show_btn_icon' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'btn_icon_font_size',
			[
				'label'      => __( 'Icon Size', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn .btn-icon'   => 'font-size:{{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'show_btn_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'button_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Button Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn .btn-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-box .rt-button .btn .btn-hover-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'btn_icon_height',
			[
				'label'      => __( 'Icon Height', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
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
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn .rt-button-icon' => 'height:{{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'show_btn_icon' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'btn_icon_width',
			[
				'label'      => __( 'Icon Width', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
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
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn .rt-button-icon' => 'width:{{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'show_btn_icon' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'read_icon_bg',
				'label' => __('Icon Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Icon Background', 'techly-core' ),
					],
				],
				'condition'  => [
					'show_btn_icon' => 'yes',
				],
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn .rt-button-icon',


			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_icon_border',
				'label'    => __( 'Icon Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn .rt-button-icon',
			]
		);
		$this->add_responsive_control(
			'read_icon_border_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Icon Border Radius', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn .rt-button-icon' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		//Start read_more Style Tab
		$this->start_controls_tabs(
			'read_more_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'read_more_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);

		$this->add_control(
			'read_more_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'read_more_bg',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => ' {{WRAPPER}} .rt-info-box .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'label'    => __( 'Box Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_more_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn',
			]
		);

		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'read_more_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'read_more_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color Hover', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .rt-button .btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'read_more_bg_hover',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => ' {{WRAPPER}} .rt-info-box .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow_hover',
				'label'    => __( 'Box Shadow Hover', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_more_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .rt-button .btn:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		//Side Arrow Icon
		$this->start_controls_section(
			'side_arrow_icon_settings',
			[
				'label' => esc_html__( 'Side Arrow Icon Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'  => [
					'layout' => 'layout-3',
				],
			]
		);
		$this->add_control(
			'arrow_icon',
			[
				'label'     => __( 'Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => [
					'value'   => 'icon-rt-guidance',
					'library' => 'solid',
				],
				'condition' => [
					'layout' => 'layout-3',
				],
			]
		);
		$this->add_responsive_control(
			'side_arrow_icon_font_size',
			[
				'label'      => __( 'Size', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-arrow-icon i'   => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'side_arrow_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .info-arrow-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'side_arrow_icon_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .info-box:hover .info-arrow-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'side_arrow_icon_bg',
				'label' => __('Arrow Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Arrow Background', 'techly-core' ),
					],
				],
				'selector' => ' {{WRAPPER}} .info-arrow-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'side_arrow_icon_bg_hover',
				'label' => __('Hover Arrow Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Hover Arrow Background', 'techly-core' ),
					],
				],
				'selector' => ' {{WRAPPER}} .info-box:hover .info-arrow-icon',
			]
		);
		$this->add_responsive_control(
			'side_arrow_icon_width',
			[
				'label'      => __( 'Width', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
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
				'selectors'  => [
					'{{WRAPPER}} .info-arrow-icon' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'side_arrow_icon_height',
			[
				'label'      => __( 'Height', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
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
				'selectors'  => [
					'{{WRAPPER}} .info-arrow-icon' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'side_arrow_icon_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .info-arrow-icon',
			]
		);
		$this->add_responsive_control(
			'side_arrow_icon_border_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Radius', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .info-arrow-icon' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);


		$this->end_controls_section();

		// Box Settings
		$this->start_controls_section(
			'box_settings',
			[
				'label' => esc_html__( 'Box Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_radius',
			[
				'label'      => __( 'Border Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'{{WRAPPER}} .rt-info-layout-4 .info-box:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label'      => __( 'Box Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-box .info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'border_round_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Item Border Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-layout-2 .info-box:after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-layout-2 .info-box:before' => 'border-color: {{VALUE}}',
				],
				'condition'     => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->start_controls_tabs(
			'box_style_tabs'
		);

		$this->start_controls_tab(
			'box_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => __( 'Box Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'           => 'box_bg',
				'label'          => __( 'Background', 'techly-core' ),
				'fields_options' => [
					'background' => [
						'label' => esc_html__( 'Box Background', 'techly-core' ),
					],
				],
				'types'          => [ 'classic', 'gradient' ],
				'selector'       => '{{WRAPPER}} .rt-info-box .info-box',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .rt-info-box .info-box',
			]
		);
		$this->add_control(
			'shape_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-layout-1 .info-box .rt-shape svg' => 'color: {{VALUE}}',
				],
				'condition'     => [
					'shape_display' => ['yes'],'layout' => ['layout-1'],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow_hover',
				'label'    => __( 'Box Shadow Hover', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-box .info-box:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'           => 'box_bg_hover',
				'label'          => __( 'Background Hover', 'techly-core' ),
				'fields_options' => [
					'background' => [
						'label' => esc_html__( 'Box Background - Hover', 'techly-core' ),
					],
				],
				'types'          => [ 'classic', 'gradient' ],
				'selector'       => '{{WRAPPER}} .rt-info-box .info-box:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_hover_border',
				'selector' => '{{WRAPPER}} .rt-info-box .info-box:hover',
			]
		);

		$this->add_control(
			'shape_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-layout-1 .info-box:hover .rt-shape svg' => 'color: {{VALUE}}',
				],
				'condition'     => [
					'shape_display' => ['yes'],'layout' => ['layout-1'],
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		// Box Shape Settings
		$this->add_control(
			'shape_display',
			[
				'label'        => __( 'Shape Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default' => 'yes',
				'condition'     => [
					'layout' => ['layout-1', 'layout-6'],
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

		$template = 'view-1';

		if ( 'layout-2' == $data['layout'] ) {
			$template = 'view-2';
		} elseif ( 'layout-3' == $data['layout'] ) {
			$template = 'view-3';
		} elseif ( 'layout-4' == $data['layout'] ) {
			$template = 'view-4';
		} elseif ( 'layout-5' == $data['layout'] ) {
			$template = 'view-5';
		} elseif ( 'layout-6' == $data['layout'] ) {
			$template = 'view-6';
		} elseif ( 'layout-7' == $data['layout'] ) {
			$template = 'view-7';
		}

		Fns::get_template( "elementor/info-box/{$template}", $data );
	}

}