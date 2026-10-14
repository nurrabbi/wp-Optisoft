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

class InfoSlider extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Info Slider', 'techly-core' );
		$this->rt_base = 'rt-info-slider';
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
			'rt_info_slider',
			[
				'label' => esc_html__( 'Info Slider Settings', 'techly-core' ),
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
					'layout-1' => __( 'Slider Layout', 'techly-core' ),
				],
			]
		);



        $repeater = new \Elementor\Repeater();

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

        $repeater->add_control(
            'rt_icon',
            [
                'label'            => __( 'RT Icon', 'techly-core' ),
                'type'      => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'condition'        => [
					'icon_type' => [ 'icon' ],
				],
                'default'          => [
                    'value'   => 'icon-rt-guidance',
                    'library' => 'solid',
                ],
            ]
        );


		$repeater->add_control(
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
                'default' => __( 'Read More', 'techly-core' ),
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label'         => __( 'Button Link', 'techly-core' ),
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
                'label'       => __( 'InfoSlider List', 'techly-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title'        => __( 'Real-Time Tracking', 'techly-core' ),
                        'content'     => __( 'Lorem ipsum dolor as consectetur adipisg elit. Mauris nulla the integer the semper the ipsum dolor sit amet consectetur adipiscing nteger dolor nunc semper.',
                            'techly-core' ),

                    ],
                    [
                        'title'        => __( 'Real-Time Tracking', 'techly-core' ),
                        'content'     => __( 'Lorem ipsum dolor as consectetur adipisg elit. Mauris nulla the integer the semper the ipsum dolor sit amet consectetur adipiscing nteger dolor nunc semper.',
                            'techly-core' ),

                    ],
                    [
                        'title'        => __( 'Real-Time Tracking', 'techly-core' ),
                        'content'     => __( 'Lorem ipsum dolor as consectetur adipisg elit. Mauris nulla the integer the semper the ipsum dolor sit amet consectetur adipiscing nteger dolor nunc semper.', 'techly-core' ),

                    ],

                ],
                'title_field' => '{{{ name }}}',
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
					'{{WRAPPER}} .rt-info-slider *' => 'text-align: {{VALUE}} !important',
					'{{WRAPPER}} .rt-info-slider .icon-holder'     => 'text-align: {{VALUE}} !important',
				],
				'toggle'    => true,
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
            'icon_display',
            [
                'label'        => __( 'Icon Display', 'techly-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'techly-core' ),
                'label_off'    => __( 'Hide', 'techly-core' ),
                'return_value' => 'no',
                'default'      => 'no',
            ]
        );

        $this->add_control(
            'btn_display',
            [
                'label'        => __( 'Button Display', 'techly-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'techly-core' ),
                'label_off'    => __( 'Hide', 'techly-core' ),
                'return_value' => 'no',
                'default'      => 'no',
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
				'selector' => '{{WRAPPER}} .rt-info-slider .info-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-slider .info-title'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-slider .info-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-slider .info-title a:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .rt-info-slider:not(.rt-info-layout-1) .info-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider p',
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
					'{{WRAPPER}} .rt-info-slider p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon'   => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon'  => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon i'   => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-info-slider .rt-icon svg' => 'transform: scale({{SIZE}});',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon'    => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon i'        => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-slider .rt-icon svg path' => 'stroke: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-slider .rt-icon'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-slider .rt-icon:hover svg path' => 'stroke: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_bg_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-info-slider .rt-icon:hover'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_hover_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon:hover',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon svg' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'image_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon',
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
					'{{WRAPPER}} .rt-info-slider .rt-icon:hover '  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'image_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_hover_shadow',
				'label' => __('Icon Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-icon:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//End Icon Style Tab

		$this->end_controls_section();

        // Read More Button Settings
		$this->start_controls_section(
			'read_more_settings',
			[
				'label'     => esc_html__( 'Button Settings', 'techly-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'read_more_btn_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn' => 'width:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn' => 'height:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn .btn-icon'   => 'font-size:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn .btn-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-slider .rt-button .btn .btn-hover-icon' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn .rt-button-icon' => 'height:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn .rt-button-icon' => 'width:{{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn .rt-button-icon',


			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_icon_border',
				'label'    => __( 'Icon Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn .rt-button-icon',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn .rt-button-icon' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn' => 'color: {{VALUE}}',
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
				'selector' => ' {{WRAPPER}} .rt-info-slider .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'label'    => __( 'Box Shadow', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_more_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn',
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
					'{{WRAPPER}} .rt-info-slider .rt-button .btn:hover' => 'color: {{VALUE}}',
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
				'selector' => ' {{WRAPPER}} .rt-info-slider .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow_hover',
				'label'    => __( 'Box Shadow Hover', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'read_more_border_hover',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-info-slider .rt-button .btn:hover',
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
			'box_radius',
			[
				'label'      => __( 'Border Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-info-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-info-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} .rt-info-slider',
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
				'selector'       => '{{WRAPPER}} .rt-info-slider',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .rt-info-slider',
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
				'selector' => '{{WRAPPER}} .rt-info-slider:hover',
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
				'selector'       => '{{WRAPPER}} .rt-info-slider:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_hover_border',
				'selector' => '{{WRAPPER}} .rt-info-slider:hover',
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();


		// Box Shape Settings


		$this->end_controls_section();

        // Slider setting
        $this->start_controls_section(
            'slider_style',
            [
                'label' => esc_html__( 'Slider Style', 'techly-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => ['layout-1'],
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
			'navigation_spacing',
			[
				'label'      => __( 'Navigation Spacing', 'techly-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-navigation .swiper-button' => 'margin-top: {{SIZE}}{{UNIT}};',
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
            ]
        );
        $this->add_responsive_control(
            'next_arrow',
            [
                'type'    => Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .swiper-navigation .swiper-button i' => 'color: {{VALUE}}',
                ],
                'condition'   => [
                    'display_arrow' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'arrow_width',
            [
                'type'    => Controls_Manager::SLIDER,
                'label'     => esc_html__( 'Arrow Stroke Width', 'techly-core' ),
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-navigation .swiper-button i ' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
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

        // Slider responsive
        $this->start_controls_section(
            'section_slider_grid',
            [
                'label' => __( 'Slider Grid', 'techly-core' ),
                'condition' => [
                    'layout' => ['layout-1'],
                ],
            ]
        );

        $this->add_control(
            'desktop',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Desktops: > 1600px', 'techly-core' ),
                'default' => '2',
                'options' => array(
                    '1' => esc_html__( '1', 'techly-core' ),
                    '2' => esc_html__( '2', 'techly-core' ),
                    '3' => esc_html__( '3', 'techly-core' ),
                    '4' => esc_html__( '4', 'techly-core' ),
                    '5' => esc_html__( '5', 'techly-core' ),
                    '6' => esc_html__( '6', 'techly-core' ),
                ),
            ]
        );
        $this->add_control(
            'md_desktop',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Desktops: > 1200px', 'techly-core' ),
                'default' => '2',
                'options' => array(
                    '1' => esc_html__( '1', 'techly-core' ),
                    '2' => esc_html__( '2', 'techly-core' ),
                    '3' => esc_html__( '3', 'techly-core' ),
                    '4' => esc_html__( '4', 'techly-core' ),
                    '5' => esc_html__( '5', 'techly-core' ),
                    '6' => esc_html__( '6', 'techly-core' ),
                ),
            ]
        );
        $this->add_control(
            'sm_desktop',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Desktops: > 992px', 'techly-core' ),
                'default' => '1',
                'options' => array(
                    '1' => esc_html__( '1', 'techly-core' ),
                    '2' => esc_html__( '2', 'techly-core' ),
                    '3' => esc_html__( '3', 'techly-core' ),
                    '4' => esc_html__( '4', 'techly-core' ),
                ),
            ]
        );
        $this->add_control(
            'tablet',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Tablets: > 768px', 'techly-core' ),
                'default' => '1',
                'options' => array(
                    '1' => esc_html__( '1', 'techly-core' ),
                    '2' => esc_html__( '2', 'techly-core' ),
                    '3' => esc_html__( '3', 'techly-core' ),
                    '4' => esc_html__( '4', 'techly-core' ),
                ),
            ]
        );
        $this->add_control(
            'mobile',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Phones: > 576px', 'techly-core' ),
                'default' => '1',
                'options' => array(
                    '1' => esc_html__( '1', 'techly-core' ),
                    '2' => esc_html__( '2', 'techly-core' ),
                ),
            ]
        );
        $this->add_control(
            'sm_mobile',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Phones: > 425px', 'techly-core' ),
                'default' => '1',
                'options' => array(
                    '1' => esc_html__( '1', 'techly-core' ),
                    '2' => esc_html__( '2', 'techly-core' ),
                ),
            ]
        );
		$this->add_control(
			'xs_mobile',
			[
				'type'    => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Phones: > 320px', 'techly-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'techly-core' ),
					'2' => esc_html__( '2', 'techly-core' ),
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
                    'layout' => ['layout-1'],
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
                '320'    =>array('slidesPerView' =>$data['xs_mobile']),
                '425'    =>array('slidesPerView' =>$data['sm_mobile']),
                '576'    =>array('slidesPerView' =>$data['mobile']),
                '768'    =>array('slidesPerView' =>$data['tablet']),
                '992'    =>array('slidesPerView' =>$data['sm_desktop']),
                '1200'    =>array('slidesPerView' =>$data['md_desktop']),
                '1600'    =>array('slidesPerView' =>$data['desktop'])
            ),
            'auto'   =>$data['slider_autoplay']
        );

		$template = 'view-1';
        $data['swiper_data'] = json_encode( $swiper_data );
		if ( 'layout-1' == $data['layout'] ) {
            $template = 'view-1';
		}
		Fns::get_template( "elementor/info-slider/{$template}", $data );
	}

}