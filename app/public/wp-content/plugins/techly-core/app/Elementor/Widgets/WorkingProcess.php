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

if (!defined('ABSPATH')) {
	exit;
}

class WorkingProcess extends ElementorBase {

	public function __construct($data = [], $args = null) {
		$this->rt_name = esc_html__('RT Working Process', 'techly-core');
		$this->rt_base = 'rt-working-process';
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
			'rt_process_item',
			[
				'label' => esc_html__('Process Item', 'techly-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Features
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'rt_icon',
			[
				'label' => __('Icon', 'techly-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'icon-rt-correct',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'number', [
				'label' => __('Number', 'techly-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '01',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title', [
				'label' => __('Title', 'techly-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Online Application', 'techly-core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __('Content', 'techly-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Donec Sodales Sagittis Neamagna Cras Dapibus. Praesent Utter Ligula Varius Sagittis.', 'techly-core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'url', [
				'label' => __('Link', 'techly-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'techly-core'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
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
				],

			]
		);
		$this->add_control(
			'process_img',
			[
				'label'   => __( 'Image', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_control(
			'process_list',
			[
				'label' => __('Process List', 'techly-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'number' => __('01', 'techly-core'),
						'title' => __('Online Application', 'techly-core'),
						'content' => __('Donec Sodales Sagittis Neamagna Cras Dapibus. Praesent Utter Ligula Varius Sagittis.', 'techly-core'),
					],
					[
						'number' => __('02', 'techly-core'),
						'title' => __('Pick A Plan', 'techly-core'),
						'content' => __('Donec Sodales Sagittis Neamagna Cras Dapibus. Praesent Utter Ligula Varius Sagittis.', 'techly-core'),
					],
					[
						'number' => __('03', 'techly-core'),
						'title' => __('Compare Quotes', 'techly-core'),
						'content' => __('Donec Sodales Sagittis Neamagna Cras Dapibus. Praesent Utter Ligula Varius Sagittis.', 'techly-core'),
					],
					[
						'number' => __('01', 'techly-core'),
						'title' => __('Sign Your Contract', 'techly-core'),
						'content' => __('Donec Sodales Sagittis Neamagna Cras Dapibus. Praesent Utter Ligula Varius Sagittis.', 'techly-core'),
					],
				],
				'title_field' => '{{{ title }}}',
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
					'{{WRAPPER}} .rt-working-process .process-item' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'rocket_animation',
			[
				'label'        => __( 'Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'false',
				'condition'  => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->end_controls_section();

		// Responsive Settings
		$this->start_controls_section(
			'sec_grid_responsive',
			[
				'label' => esc_html__( 'Number of Responsive Columns', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'col_xl',
			[
				'type' => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Desktops: > 1199px', 'techly-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '3',
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

		// Title Settings
		$this->start_controls_section(
			'title_settings',
			[
				'label' => esc_html__('Title Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => esc_html__('Typo', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .rt-title',
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
		$this->add_responsive_control(
			'title_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Space', 'techly-core' ),
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
					'{{WRAPPER}} .rt-working-process .rt-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'title_style_tabs'
		);

		$this->start_controls_tab(
			'title_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'title_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .rt-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-working-process .rt-title .title-link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Hover Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .rt-title .title-link:hover' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Icon Settings
		$this->start_controls_section(
			'icon_settings',
			[
				'label' => esc_html__('Icon Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'icon_alignment',
			[
				'label'     => __( 'Alignment', 'techly-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'row'   => [
						'title' => __( 'left', 'techly-core' ),
						'icon'  => 'eicon-arrow-right',
					],
					'row-reverse'  => [
						'title' => __( 'right', 'techly-core' ),
						'icon'  => 'eicon-arrow-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-process-box .process-item .process-content' => 'flex-direction: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_display',
			[
				'label'        => __( 'Icon Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'      => 'yes',
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
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-working-process .process-icon i'   => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-working-process .process-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Space', 'techly-core' ),
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
					'{{WRAPPER}} .rt-working-process .process-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .process-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-working-process .process-icon svg path' => 'stroke: {{VALUE}}',
				],
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_control(
			'icon_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Hover Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .process-item:hover .process-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-working-process .process-item:hover .process-icon svg path' => 'stroke: {{VALUE}}',
				],
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .process-icon',
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_hover_bg_color',
				'label' => __('Hover Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Hover Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .process-item .process-icon:before',
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'icon_width',
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
					'{{WRAPPER}} .rt-working-process .process-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'icon_height',
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
					'{{WRAPPER}} .rt-working-process .process-icon' => 'Height: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'icon_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-working-process .process-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .rt-working-process .process-icon',
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .process-icon',
				'condition'   => [
					'icon_display' => 'yes',
				],
			]
		);


		$this->end_controls_section();

		//Process Image Settings
		$this->start_controls_section(
			'process_image_settings',
			[
				'label' => esc_html__('Image Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'process_image_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .rt-process-box .process-item-img',
			]
		);
		$this->add_responsive_control(
			'process_image_width',
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
					'{{WRAPPER}} .rt-working-process .rt-process-box .process-item-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'process_image_height',
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
					'{{WRAPPER}} .rt-working-process .rt-process-box .process-item-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'process_image_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-working-process .rt-process-box .process-item-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'process_image_border',
				'selector' => '{{WRAPPER}} .rt-working-process .rt-process-box .process-item-img',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'process_image_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .rt-process-box .process-item-img',
			]
		);


		$this->end_controls_section();

		// Process Box Settings
		$this->start_controls_section(
			'process_box_settings',
			[
				'label' => esc_html__('Process Box Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'layout' => ['layout-2'],
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'process_box_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .rt-process-box',
			]
		);
		$this->add_responsive_control(
			'process_box_width',
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
					'{{WRAPPER}} .rt-working-process .rt-process-box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'process_box_height',
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
					'{{WRAPPER}} .rt-working-process .rt-process-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'process_box_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-working-process .rt-process-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'process_box_border',
				'selector' => '{{WRAPPER}} .rt-working-process .rt-process-box',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'process_box_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .rt-process-box',
			]
		);

		$this->end_controls_section();


		// Number Settings
		$this->start_controls_section(
			'number_settings',
			[
				'label' => esc_html__('Number Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_display',
			[
				'label'        => __( 'Number Display', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'techly-core' ),
				'label_off'    => __( 'Hide', 'techly-core' ),
				'default'      => 'yes',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typo',
				'label' => esc_html__('Typo', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'number_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Space', 'techly-core' ),
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
					'{{WRAPPER}} .rt-process-layout-1 .rt-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-process-layout-2 .rt-number' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-process-layout-3 .rt-number' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'number_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-working-process .rt-number' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'number_width',
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
					'{{WRAPPER}} .rt-working-process .rt-number' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'number_height',
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
					'{{WRAPPER}} .rt-working-process .rt-number' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		// Number tab
		$this->start_controls_tabs(
			'number_style_tabs',
		);

		$this->start_controls_tab(
			'number_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		$this->add_control(
			'number_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .rt-number' => 'color: {{VALUE}}',
				],
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'number_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'number_border',
				'selector' => '{{WRAPPER}} .rt-working-process .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'number_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'number_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		$this->add_control(
			'number_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .process-item:hover .rt-number' => 'color: {{VALUE}}',
				],
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'number_bg_hover_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .process-item:hover .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'number_hover_border',
				'selector' => '{{WRAPPER}} .rt-working-process .process-item:hover .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'number_box_hover_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .process-item:hover .rt-number',
				'condition'   => [
					'number_display' => 'yes',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Content Settings
		$this->start_controls_section(
			'content_settings',
			[
				'label' => esc_html__('Content Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-working-process .rt-content',
			]
		);

		$this->add_control(
			'content_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .rt-content' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();

		// Box Settings
		$this->start_controls_section(
			'box_settings',
			[
				'label' => esc_html__('Box Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-working-process .process-item',
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __('Padding', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .process-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __('Radius', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .process-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' =>'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .rt-working-process .process-item',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-working-process .process-item',
			]
		);

		$this->add_responsive_control(
			'info_wrap_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Info Wrap Space', 'techly-core' ),
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-working-process .process-info' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
		$data = $this->get_settings();
		if ( 'layout-1' == $data['layout'] ) {
			$template = 'view-1';
		} elseif ( 'layout-2' == $data['layout'] ) {
			$template = 'view-2';
		} elseif ( 'layout-3' == $data['layout'] ) {
			$template = 'view-3';
		}
		Fns::get_template( "elementor/working-process/$template", $data );
	}
}