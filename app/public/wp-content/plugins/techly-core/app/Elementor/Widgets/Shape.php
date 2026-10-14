<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Elementor\Widgets;

use Elementor\Controls_Manager;
use RT\TechlyCore\Helper\Fns;
use RT\TechlyCore\Abstracts\ElementorBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Shape extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Shape', 'techly-core' );
		$this->rt_base = 'rt-shape';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'sec_general',
			[
				'label' => esc_html__( 'General', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'       => esc_html__( 'Shape Layout', 'techly-core' ),
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
			'position',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Position', 'techly-core' ),
				'options' => array(
					'relative' 		=> esc_html__( 'Relative', 'techly-core' ),
					'absolute' 		=> esc_html__( 'Absolute', 'techly-core' ),
				),
				'default' => 'absolute',
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'position: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'zindex',
			[
				'type'    => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Z-Index', 'techly-core' ),
				'default' => -1,
			]
		);

		$this->end_controls_section();

		// Shape one
		$this->start_controls_section(
			'sec_shape_one',
			[
				'label' => esc_html__( 'Shape One Layout', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' =>[
					'layout' => ['layout-1'],
				]
			]
		);

		$this->add_control(
			'shape_one_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'shape_one_blur',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Blur', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'filter: blur({{SIZE}}{{UNIT}})',
				],
			]
		);

		$this->add_responsive_control(
			'shape_one_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'shape_one_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'position_horizontal',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Horizontal', 'techly-core' ),
				'size_units' => [ '%','px' ],
				'range' => [
					'px' => [
						'min' => -1920,
						'max' => 1920,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'position_vertical',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Vertical', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1200,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Shape two
		$this->start_controls_section(
			'sec_shape_two',
			[
				'label' => esc_html__( 'Shape Two Layout', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' =>[
					'layout' => ['layout-2'],
				]
			]
		);

		$this->add_control(
			'shape_2left_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Left Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape .shape1' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'shape_2right_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Right Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape .shape2' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'shape_two_blur',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Blur', 'techly-core' ),
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
					'{{WRAPPER}} .rt-blur-shape li' => 'filter: blur({{SIZE}}{{UNIT}})',
				],
			]
		);

		$this->add_responsive_control(
			'shape_two_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'shape_two_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape li' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Shape style Tabs
		$this->start_controls_tabs(
			'shape_style_tabs', [
			]
		);

		$this->start_controls_tab(
			'shape_left_tab',
			[
				'label' => __( 'Shape Left', 'techly-core' ),
			]
		);

		$this->add_responsive_control(
			'position_shape_two_ltb',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Shape Top/Bottom', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1200,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape-layout-2 li:nth-child(1)' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'position_shape_two_llr',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Shape Left/Right', 'techly-core' ),
				'size_units' => [ '%','px' ],
				'range' => [
					'px' => [
						'min' => -1920,
						'max' => 1920,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape-layout-2 li:nth-child(1)' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'shape_right_tab',
			[
				'label' => __( 'Shape Right', 'techly-core' ),
			]
		);

		$this->add_responsive_control(
			'position_shape_two_rtb',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Shape Top/Bottom', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1200,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape-layout-2 li:nth-child(2)' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'position_shape_two_rlr',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Shape Left/Right', 'techly-core' ),
				'size_units' => [ '%','px' ],
				'range' => [
					'px' => [
						'min' => -1920,
						'max' => 1920,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape-layout-2 li:nth-child(2)' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Shape three
		$this->start_controls_section(
			'sec_shape_three',
			[
				'label' => esc_html__( 'Shape Three layout', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' =>[
					'layout' => ['layout-3'],
				]
			]
		);

		$this->add_control(
			'shape_3left_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Left Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape .shape1' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'shape_3right_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Right Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape .shape2' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'shape_3center_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Shape Center Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-blur-shape .shape3' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'shape_three_blur',
			[
				'type'    => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Shape Blur', 'techly-core' ),
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
					'{{WRAPPER}} .rt-blur-shape li' => 'filter: blur({{SIZE}}{{UNIT}})',
				],
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$data  = $this->get_settings();
		$template = 'view-1';
		Fns::get_template( "elementor/shape/$template", $data );
	}

}