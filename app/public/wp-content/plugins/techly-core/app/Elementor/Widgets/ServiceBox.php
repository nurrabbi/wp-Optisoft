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

class ServiceBox extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Service Box', 'techly-core' );
		$this->rt_base = 'rt-service-box';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'rt_service_box',
			[
				'label' => esc_html__( 'Service Box Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

//		$this->add_control(
//			'layout',
//			[
//				'label'   => esc_html__( 'Layout', 'techly-core' ),
//				'type'    => Controls_Manager::SELECT,
//				'default' => 'layout-1',
//				'options' => [
//					'layout-1' => __( 'Layout 1', 'techly-core' ),
//					'layout-2' => __( 'Layout 2', 'techly-core' ),
//				],
//			]
//		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image', [
				'type' => Controls_Manager::MEDIA,
				'label' =>   esc_html__('Image', 'techly-core'),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Welcome To Techly', 'techly-core' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'icon_type',
			[
				'label'   => __( 'Icon Type', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon'  => __( 'Icon', 'techly-core' ),
				],
			]
		);

		$repeater->add_control(
			'service_icon',
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

		$repeater->add_control(
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
			'items',
			[
				'label' => __('Service List', 'techly-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Strategic planning execution', 'techly-core'),
					],
					[

						'title' => __('Leadership executive coaching', 'techly-core'),

					],
					[

						'title' => __('Empowered leadership journey', 'techly-core'),

					],
					[

						'title' => __('Solution for each & every challenges', 'techly-core'),

					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		// Image Settings
		//==============================================================

		$this->start_controls_section(
			'service_image_settings',
			[
				'label' => esc_html__( 'Image Settings', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'service_image_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Width', 'techly-core' ),
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
					'{{WRAPPER}} .service-box .image-column .col-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_image_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Height', 'techly-core' ),
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
					'{{WRAPPER}} .service-box .image-column .col-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_image_radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .service-box .image-column .col-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title:hover' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_responsive_control(
			'feature_spacing',
			[
				'label'      => __( 'List Feature Spacing', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .service-box .list-feature ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'feature_spacing_right',
			[
				'label'      => __( 'List Left Spacing', 'techly-core' ),
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
					'{{WRAPPER}} .service-box .list-feature' => 'margin-left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->end_controls_section();

		// Icon Settings
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
				'type'      => Controls_Manager::NUMBER,
				'label'     => esc_html__( 'Size', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title i' => 'font-size: {{VALUE}}px',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'icon_spacing',
			[
				'label'      => __( 'Icon Spacing', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .service-box .list-feature ul li .list-item .list-title i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$data     = $this->get_settings();

		$template = 'view-1';

//		if ( 'layout-2' == $data['layout'] ) {
//			$template = 'view-2';
//		}

		Fns::get_template( "elementor/service-box/{$template}", $data );
	}

}