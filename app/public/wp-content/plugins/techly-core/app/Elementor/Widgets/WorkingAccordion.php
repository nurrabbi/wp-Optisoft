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

class WorkingAccordion extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Working Accordion', 'techly-core' );
		$this->rt_base = 'rt-working-accordion';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'rt_working_accordion',
			[
				'label' => esc_html__( 'Working Accordion Settings', 'techly-core' ),
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
					'layout-1' => __( 'Accordion Layout', 'techly-core' ),
				],
			]
		);



        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'working_image',
			[
				'label'   => __( 'Choose Image', 'techly-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
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
                'default'     => __( 'Welcome To techly', 'techly-core' ),
                'label_block' => true,
            ]
        );

     

        $repeater->add_control(
            'content',
            [
                'label'   => __( 'Content', 'techly-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Enter Content', 'techly-core' ),
            ]
        );

         $repeater->add_control(
            'button_icon',
            [
                'label'            => __( 'Button Icon', 'techly-core' ),
                'type'      => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default'          => [
                    'value'   => 'icon-rt-guidance',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'read_more_btn_text',
            [
                'label'        => __( 'Read More Button', 'techly-core' ),
                'type'        => Controls_Manager::TEXT,
                'default' => __( 'Discover More', 'techly-core' ),
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
                    'is_external' => false,
                    'nofollow'    => false,
                ],
            ]
        );



        $this->add_control(
            'items',
            [
                'label'       => __( 'WorkingAccordion List', 'techly-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title'        => __( 'Data centre Visualisation', 'techly-core' ),
                        'content'     => __( 'Lorem ipsum dolor as consectetur adipisg elit. Mauris nulla the integer the semper the ipsum dolor sit amet consectetur adipiscing nteger dolor nunc semper.',
                            'techly-core' ),

                    ],
                    [
                        'title'        => __( 'Data Analysis Services', 'techly-core' ),
                        'content'     => __( 'Lorem ipsum dolor as consectetur adipisg elit. Mauris nulla the integer the semper the ipsum dolor sit amet consectetur adipiscing nteger dolor nunc semper.',
                            'techly-core' ),

                    ],
                    [
                        'title'        => __( 'Target Your Data Audience', 'techly-core' ),
                        'content'     => __( 'Lorem ipsum dolor as consectetur adipisg elit. Mauris nulla the integer the semper the ipsum dolor sit amet consectetur adipiscing nteger dolor nunc semper.', 'techly-core' ),

                    ],

                ],
                'title_field' => '{{{ name }}}',
            ]
        );

		$this->end_controls_section();

        //Option setting
        $this->start_controls_section(
            'section_option',
            [
                'label' => __( 'Option', 'techly-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'thumb_display',
            [
                'label'        => __( 'Thumb Display', 'techly-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'techly-core' ),
                'label_off'    => __( 'Hide', 'techly-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'content_display',
            [
                'label'        => __( 'Content Display', 'techly-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'techly-core' ),
                'label_off'    => __( 'Hide', 'techly-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'title_display',
            [
                'label'        => __( 'Title Display', 'techly-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'techly-core' ),
                'label_off'    => __( 'Hide', 'techly-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'btn_display',
            [
                'label'        => __( 'Button Display', 'techly-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'techly-core' ),
                'label_off'    => __( 'Hide', 'techly-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
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
				'selector' => '{{WRAPPER}} .working-accordion-box .working-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .working-accordion-box .working-title'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .working-accordion-box .working-title a' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .working-accordion-box .working-title a:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .working-accordion-box:not(.rt-info-layout-1) .working-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .working-accordion-box p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box p',
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
					'{{WRAPPER}} .working-accordion-box p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				// 'condition' => [
				// 	'show_read_more_btn' => [ 'is-read-more' ],
				// ],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'read_more_btn_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn' => 'width:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn' => 'height:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn .btn-icon'   => 'font-size:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn .btn-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .working-accordion-box .rt-button .btn .btn-hover-icon' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn .rt-button-icon' => 'height:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn .rt-button-icon' => 'width:{{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn .rt-button-icon',


			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_icon_border',
				'label'    => __( 'Icon Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn .rt-button-icon',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn .rt-button-icon' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn' => 'color: {{VALUE}}',
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
				'selector' => ' {{WRAPPER}} .working-accordion-box .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'label'    => __( 'Box Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_more_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn',
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
					'{{WRAPPER}} .working-accordion-box .rt-button .btn:hover' => 'color: {{VALUE}}',
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
				'selector' => ' {{WRAPPER}} .working-accordion-box .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow_hover',
				'label'    => __( 'Box Shadow Hover', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_more_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .working-accordion-box .rt-button .btn:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
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
			'box_content_width',
			[
				'label'      => __( 'Box Content Width', 'techly-core' ),
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
					'{{WRAPPER}} .working-accordion-box .working-content' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_radius',
			[
				'label'      => __( 'Border Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .working-accordion-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .working-accordion-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} .working-accordion-box',
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
				'selector'       => '{{WRAPPER}} .working-accordion-box',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .working-accordion-box',
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
				'selector' => '{{WRAPPER}} .working-accordion-box:hover',
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
				'selector'       => '{{WRAPPER}} .working-accordion-box:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_hover_border',
				'selector' => '{{WRAPPER}} .working-accordion-box:hover',
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();


		// Box Shape Settings


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
		Fns::get_template( "elementor/working-accordion/{$template}", $data );
	}

}