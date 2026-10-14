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

class ServiceStep extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Service Step Box', 'techly-core' );
		$this->rt_base = 'rt-service-step';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'rt_service_step_box',
			[
				'label' => esc_html__( 'Service Step Box Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
			'service_button',
			[
				'label'       => esc_html__( 'Service Tag', 'techly-core' ),
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
		$this->add_control(
			'step_arrow',
			[
				'label'     => esc_html__( 'Arrow Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'yes',
			]
		);
		$this->add_control(
			'step_icon',
			[
				'label'            => __( 'Arrow Icon', 'techly-core' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-right-arrow-2',
					'library' => 'solid',
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
					'{{WRAPPER}} .rt-service-step-box *' => 'text-align: {{VALUE}} !important',
					'{{WRAPPER}} .rt-service-step-box .icon-holder'     => 'text-align: {{VALUE}} !important',
				],
				'toggle'    => true,
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
				'selector' => '{{WRAPPER}} .rt-service-step-box .service-content-holder .service-step-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step-box .service-content-holder .service-step-title'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-step-box .service-content-holder .service-step-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step-box .service-content-holder .service-step-title a:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .rt-service-step-box .service-content-holder .service-step-title ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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

		// Icon Settings
		//==============================================================
		$this->start_controls_section(
			'icon_settings',
			[
				'label' => esc_html__( 'Icon Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-icon a i'   => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-icon a svg' => 'transform: scale({{SIZE}});',
				],

			]
		);

		$this->add_control(
			'icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-icon a i'        => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-icon a svg path' => 'stroke: {{VALUE}}',
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
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// Arrow Icon Settings
		//==============================================================
		$this->start_controls_section(
			'arrow_settings',
			[
				'label' => esc_html__( 'Arrow Icon Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Arrow Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step .step-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'arrow_typography',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-service-step .step-icon',
			]
		);
		$this->add_responsive_control(
			'arrow_icon_size',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Font Size', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 150,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-service-step .step-icon'   => 'font-size: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->end_controls_section();

		// Tag Settings
		//==============================================================
		$this->start_controls_section(
			'tag_settings',
			[
				'label' => esc_html__( 'Tag Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tag_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-content-holder .service-btn p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'tag_typography',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-service-step-box .icon-holder .service-content-holder .service-btn p',
			]
		);
		$this->add_control(
			'tag_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-content-holder .service-btn p' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'tag_border_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Border Radius', 'techly-core' ),
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder .service-content-holder .service-btn p'    => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();

		// Box Settings
		//==============================================================
		$this->start_controls_section(
			'box_settings',
			[
				'label' => esc_html__( 'Box Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Border Radius', 'techly-core' ),
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder'    => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'box_width',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Box Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
				],
			]
		);
		$this->add_responsive_control(
			'box_height',
			[
				'type'       => Controls_Manager::SLIDER,
				'label'      => esc_html__( 'Box Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-service-step-box .icon-holder' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$data     = $this->get_settings();
		$template = 'view-1';
		Fns::get_template( "elementor/service-step/{$template}", $data );
	}

}