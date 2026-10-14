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

class Team extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Team', 'techly-core' );
		$this->rt_base = 'rt-team';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'techly-core' ),
				'6'  => esc_html__( '2 Col', 'techly-core' ),
				'4'  => esc_html__( '3 Col', 'techly-core' ),
				'3'  => esc_html__( '4 Col', 'techly-core' ),
				'2'  => esc_html__( '6 Col', 'techly-core' ),
			),
		);
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
				'label'       => esc_html__( 'Team Layout', 'techly-core' ),
				'type'        => Controls_Manager::SELECT2,
				'options'   => [
					'layout-1' => esc_html__( 'Team Grid 01', 'techly-core' ),
					'layout-2' => esc_html__( 'Team Grid 02', 'techly-core' ),
					'layout-5' => esc_html__( 'Team Grid 03', 'techly-core' ),

					'layout-3' => esc_html__( 'Team Slider 01', 'techly-core' ),
					'layout-4' => esc_html__( 'Team Slider 02', 'techly-core' ),

				],
				'default'     => 'layout-1',
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label'     => esc_html__( 'Alignment', 'techly-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'techly-core' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'techly-core' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'techly-core' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label'       => esc_html__( 'Team Limit', 'techly-core' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => esc_html__( 'Enter Team Limit', 'techly-core' ),
				'description' => esc_html__( 'Enter number of team to show.', 'techly-core' ),
				'default'     => '6',
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
					'layout' => ['layout-1','layout-2','layout-3','layout-4','layout-9'],
				],
			]
		);


		$this->add_control(
			'query_type',
			[
				'label' => esc_html__( 'Query type', 'techly-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'category',
				'options' => array(
					'category'  => esc_html__( 'Category', 'techly-core' ),
					'posts' => esc_html__( 'Posts', 'techly-core' ),
				),
			]
		);

		$this->add_control(
			'post_id',
			[
				'label' => esc_html__( 'Selects posts', 'techly-core' ),
				'type' => Controls_Manager::SELECT2,
				'options'     => rt_all_posts('rt-team'),
				'label_block' => true,
				'multiple' => true,
				'condition' => [
					'query_type' => 'posts',
				],
			]
		);

		$this->add_control(
			'cat_id',
			[
				'label' => esc_html__( 'Selects Category', 'techly-core' ),
				'type' => Controls_Manager::SELECT2,
				'options' => rt_taxonomy_post('rt-team-category'),
				'label_block' => true,
				'multiple' => true,
				'condition' => [
					'query_type' => 'category',
				],
			]
		);

		$this->add_control(
			'post_ordering',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Post Ordering', 'techly-core' ),
				'options' => [
					'DESC'	=> esc_html__( 'Desecending', 'techly-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'techly-core' ),
				],
				'default' => 'DESC',
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Post Sorting', 'techly-core' ),
				'options' => [
					'recent' 		=> esc_html__( 'Recent Post', 'techly-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'techly-core' ),
					'title' 		=> esc_html__( 'By Name', 'techly-core' ),
				],
				'default' => 'recent',
			]
		);
		$this->add_control(
			'team_box_animation',
			[
				'label'        => __( 'Box Animation', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'no',
				
				'condition'  => [
					'layout' => ['layout-1','layout-5'],
				],
			]
		);

		$this->add_control(
			'team_slider_shadow',
			[
				'label'        => __( 'Bg Shadow', 'techly-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'techly-core' ),
				'label_off'    => __( 'Off', 'techly-core' ),
				'default'       => 'no',
				'condition'  => [
					'layout' => ['layout-3'],
				],
			]
		);

		$this->end_controls_section();

		// Option Settings
		$this->start_controls_section(
			'sec_option',
			[
				'label' => esc_html__( 'Option', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'designation_display',
			[
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Designation Display', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Designation. Default: On', 'techly-core' ),
			]
		);

		$this->add_control(
			'social_display',
			[
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Social Display', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Social. Default: On', 'techly-core' ),
			]
		);

		$this->add_control(
			'content_display',
			[
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Content Display', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'techly-core' ),
			]
		);

		$this->add_control(
			'content_type',
			[
				'type'    => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Content Type', 'techly-core' ),
				'options' => array(
					'content' => esc_html__( 'Conents', 'techly-core' ),
					'excerpt' => esc_html__( 'Excerpts', 'techly-core' ),
				),
				'default'     => 'content',
				'description' => esc_html__( 'Display contents from Editor or Excerpt field', 'techly-core' ),
				'condition'   => [
					'content_display' => ['yes'],
				],
			]
		);

		$this->add_control(
			'content_count',
			[
				'type'    => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Word count', 'techly-core' ),
				'description' => esc_html__( 'Maximum number of words', 'techly-core' ),
				'default' => 9,
				'condition'   => [
					'content_display' => ['yes'],
				],
			]
		);
		$this->end_controls_section();

		// Box Settings
		$this->start_controls_section(
			'sec_box_style',
			[
				'label' => esc_html__( 'Box Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_item_radius',
			[
				'label'      => __( 'Box Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-team-default .team-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'box_item_margin',
			[
				'label'      => __( 'Box Margin', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-team-default .team-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'box_odd_margin',
			[
				'label'      => __( 'Item Margin', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-team-multi-layout-1 .odd' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'layout' => ['layout-1'],
				],
			]
		);

		$this->add_responsive_control(
			'box_item_padding',
			[
				'label'      => __( 'Box Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-team-default .team-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'box_item_height',
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
					'{{WRAPPER}} .team-grid-layout-1 .team-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Start box Style Tab
		$this->start_controls_tabs(
			'box_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'box_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'box_item_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Box Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .rt-team-default .team-item',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-team-default .team-item',
			]
		);
		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'box_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);
		$this->add_control(
			'box_item_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Box Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_hover_border',
				'selector' => '{{WRAPPER}} .rt-team-default .team-item:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_hover_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-team-default .team-item:hover  ',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


		// Title Settings
		$this->start_controls_section(
			'sec_title_style',
			[
				'label' => esc_html__( 'Title Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Title Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-team-default .team-item .team-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Title Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item .team-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Title Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item .team-title a:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'title_border_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Border Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-multi-layout-4 .team-item .team-title:after' => 'background-color: {{VALUE}} !important',
				],
				'condition' => [
					'layout' => ['layout-4', 'layout-8'],
				],
			]
		);

		$this->add_control(
			'title_space',
			[
				'label'      => __( 'Title Space', 'techly-core' ),
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
					'{{WRAPPER}} .rt-team-default .team-item .team-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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

		// Designation Settings
		$this->start_controls_section(
			'sec_designation_style',
			[
				'label' => esc_html__( 'Designation Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'designation_typo',
				'label'    => esc_html__( 'Designation Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-team-default .team-item .team-designation',
			]
		);

		$this->add_control(
			'designation_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Designation Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item .team-designation' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'designation_space',
			[
				'label'      => __( 'Designation Space', 'techly-core' ),
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
					'{{WRAPPER}} .rt-team-default .team-item .team-designation' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Content Settings
		$this->start_controls_section(
			'sec_content_style',
			[
				'label' => esc_html__( 'Content Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typo',
				'label'    => esc_html__( 'Content Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-team-default .team-item p',
			]
		);

		$this->add_control(
			'content_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Content Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_space',
			[
				'label'      => __( 'Content Space', 'techly-core' ),
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
					'{{WRAPPER}} .rt-team-default .team-item p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'social_position_vertical',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Social Vertical Position', 'techly-core' ),
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
					'{{WRAPPER}} .rt-team-default .team-social' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'social_position_horizontal',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Social Horizontal Position', 'techly-core' ),
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
					'{{WRAPPER}} .rt-team-default .team-social' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'item_image_heading',
			[
				'label'     => __( 'Image Style', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-team-default .team-item .post-thumbnail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'image_item_padding',
			[
				'label'      => __( 'Padding', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-team-default .team-item .post-thumbnail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'image_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Width', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item .post-thumbnail img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'image_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Height', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item .post-thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'image_space',
			[
				'label'      => __( 'Thumb Space', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rt-team-default .team-item .team-thumbs' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'blend',
				'selector' => '{{WRAPPER}} .rt-team-default .team-item .post-thumbnail img',
			]
		);
		$this->add_control(
			'image_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item .post-thumbnail' => 'background-color: {{VALUE}}',
				],
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
		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'hover_blend',
				'selector' => '{{WRAPPER}} .rt-team-default .team-item:hover .post-thumbnail',
			]
		);
		$this->add_control(
			'image_hover_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-team-default .team-item:hover .post-thumbnail' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		//End image Style Tab

		$this->end_controls_section();

		// Slider setting
		$this->start_controls_section(
			'slider_style',
			[
				'label' => esc_html__( 'Slider Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => ['layout-3', 'layout-4'],
				],
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
						'min' => -500,
						'max' => 500,
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

		// Responsive Settings
		$this->start_controls_section(
			'sec_grid_responsive',
			[
				'label' => esc_html__( 'Number of Responsive Columns', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition'  => [
					'layout' => ['layout-1','layout-2'],
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

		// Slider responsive
		$this->start_controls_section(
			'section_slider_grid',
			[
				'label' => __( 'Slider Grid', 'techly-core' ),
				'condition' => [
					'layout' => ['layout-3', 'layout-4'],
				],
			]
		);

		$this->add_control(
			'desktop',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Desktops: > 1600px', 'techly-core' ),
				'default' => '4',
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
				'default' => '4',
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
				'default' => '3',
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

		$this->end_controls_section();

		// Slider option
		$this->start_controls_section(
			'section_slider_option',
			[
				'label' => __( 'Slider Option', 'techly-core' ),
				'condition' => [
					'layout' => ['layout-3', 'layout-4'],
				],
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


		switch ( $data['layout'] ) {
			case 'layout-4':
				$data['swiper_data'] = json_encode( $swiper_data );
				$template = 'view-slider-2';
				break;
			case 'layout-3':
				$data['swiper_data'] = json_encode( $swiper_data );
				$template = 'view-slider-1';
				break;

			case 'layout-2':
				$template = 'view-2';
				break;
			case 'layout-5':
				$template = 'view-3';
				break;
			default:
				$template = 'view-1';
				break;
		}

		Fns::get_template( "elementor/team/$template", $data );
	}

}