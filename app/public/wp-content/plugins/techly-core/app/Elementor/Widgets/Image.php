<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Box_Shadow;
use RT\TechlyCore\Helper\Fns;
use RT\TechlyCore\Abstracts\ElementorBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Image extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Image', 'techly-core' );
		$this->rt_base = 'rt-image';
		parent::__construct( $data, $args );
	}

	public function get_script_depends() {
		return [ 'rt-parallax-scroll' ];
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
					'layout-4' => __( 'Layout 04', 'techly-core' ),
					'layout-5' => __( 'Layout 05', 'techly-core' ),
					'layout-6' => __( 'Layout 06', 'techly-core' ),
					'layout-7' => __( 'Layout 07', 'techly-core' ),
				],
				'default'     => 'layout-1',
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label'     => __( 'Alignment', 'techly-core' ),
				'type'      => Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} .rt-image-layout' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
				'condition'   => [
					'layout!' => ['layout-5', 'layout-6'],
				],
			]
		);

		$this->add_control(
			'main_image',
			[
				'label'   => __( 'Main Image', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => __( 'Logo Link', 'techly-core' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'techly-core' ),
				'show_label'  => false,
				'condition'   => [
					'layout!' => ['layout-5', 'layout-6'],
				],
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
				'condition'   => [
					'layout' => ['layout-1'],
				],
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
					'layout' => ['layout-1'],
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
					'layout' => ['layout-1'],
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
					'layout' => ['layout-1'],
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
					'layout' => ['layout-1'],
				],
			]
		);



		// layout 2
		$this->add_control(
			'position',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Position', 'techly-core' ),
				'options' => array(
					'relative' 		=> esc_html__( 'Relative', 'techly-core' ),
					'absolute' 		=> esc_html__( 'Absolute', 'techly-core' ),
				),
				'default' => 'relative',
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_control(
			'z_index',
			[
				'type'    => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Z-Index', 'techly-core' ),
				'default' => 1,
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_responsive_control(
			'position_horizontal',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Horizontal', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
					],
					'px' => [
						'min' => -1200,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-image-layout .rt-image' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_responsive_control(
			'position_vertical',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Vertical', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
					],
					'px' => [
						'min' => -1200,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-image-layout .rt-image' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_control(
			'animation',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Animation', 'techly-core' ),
				'options' => array(
					'default' 		=> esc_html__( 'default', 'techly-core' ),
					'spin' 		=> esc_html__( 'Spin', 'techly-core' ),
					'move' 	    => esc_html__( 'Move 1', 'techly-core' ),
					'move1' 	=> esc_html__( 'Move 2', 'techly-core' ),
					'move2' 	=> esc_html__( 'Move 3', 'techly-core' ),
				),
				'default' => 'default',
				'condition'   => [
					'layout' => 'layout-2',
				],
			]
		);

		$this->add_control(
			'duration',
			[
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Duration', 'techly-core' ),
				'default' => 15,
				'condition'   => [
					'layout' => 'layout-2',
				],
			]
		);

		$this->add_control(
			'image_shape_animation',
			[
				'label'        => __( 'Shape Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'       => 'false',
				'separator' => 'before',
				'condition'   => [
					'layout' => 'layout-3',
				],
			]
		);
		$this->add_control(
			'image_zoom_animation',
			[
				'label'        => __( 'Zoom Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'       => 'false',
				'separator' => 'before',
				'condition'   => [
					'layout' => 'layout-4',
				],
			]
		);
		$this->add_control(
			'image_clip_animation',
			[
				'label'        => __( 'Clip Top Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'       => 'false',
				'separator' => 'before',
				'condition'   => [
					'layout' => 'layout-5',
				],
			]
		);
		$this->add_control(
			'image_rotate_animation',
			[
				'label'        => __( 'Rotate Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'       => 'false',
				'separator' => 'before',
				'condition'   => [
					'layout' => 'layout-6',
				],
			]
		);
		$this->add_control(
			'image_sidebar_animation',
			[
				'label'        => __( 'Right Side Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'       => 'false',
				'separator' => 'before',
				'condition'   => [
					'layout' => 'layout-7',
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

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'blend',
				'label'   => esc_html__( 'Image Blend', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-image img',
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
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-image img' => 'width: {{SIZE}}{{UNIT}};',
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
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'image_box_style',
			[
				'label' => esc_html__( 'Image Box Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-image img' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .rt-image img',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .rt-image img',
			]
		);

		$this->add_responsive_control(
			'radius',
			[
				'label'      => __( 'Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'image_padding',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
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
			'animations',
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
					'animations' => [ 'wow' ]
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
					'animations' => [ 'wow' ]
				],
			],
		);

		$this->add_control(
			'durations',
			[
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Duration', 'techly-core' ),
				'default' => '1200',
				'condition'   => [
					'animations' => [ 'wow' ]
				],
			],
		);

		$this->end_controls_section();

	}

	protected function render() {
		$data  = $this->get_settings();
		$template = 'view-1';
		Fns::get_template( "elementor/image/$template", $data );
	}

}