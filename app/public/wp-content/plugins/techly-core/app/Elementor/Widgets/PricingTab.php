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

class PricingTab extends ElementorBase {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Pricing Tab', 'techly-core' );
		$this->rt_base = 'rt-pricing-tab';
		parent::__construct( $data, $args );
	}

	protected function register_controls() {
		$repeater = new \Elementor\Repeater();

		/*Monthly*/
		$repeater->add_control(
			'title', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Title', 'techly-core' ),
				'default' => esc_html__( 'Standard Plan', 'techly-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'is_subtitle', [
				'label' => __('Is Subtitle ?', 'techly-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'techly-core'),
				'label_off' => __('No', 'techly-core'),
				'return_value' => 'is-subtitle',
				'default' => false,
			]
		);

		$repeater->add_control(
			'subtitle', [
				'label' => esc_html__('Subtitle', 'techly-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'It could relate to a subscription service insurance, mobile plan.',
				'rows' => 3,
				'condition' => [
					'is_subtitle' => 'is-subtitle',
				],
			]
		);

		$repeater->add_control(
			'is_featured', [
				'label' => __('Is Featured ?', 'techly-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'techly-core'),
				'label_off' => __('No', 'techly-core'),
				'return_value' => 'is-featured',
				'default' => false,
			]
		);

		$repeater->add_control(
			'featured_text', [
				'label' => esc_html__('Featured Text', 'techly-core'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Featured',
				'label_block' => false,
				'condition' => [
					'is_featured' => 'is-featured',
				],
			]
		);

		$repeater->add_control(
			'month_price', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Month Price', 'techly-core' ),
				'default'  => '$29',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'year_price', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Year Price', 'techly-core' ),
				'default'  => '$129',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'month_unit', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Month Unit', 'techly-core' ),
				'default' => esc_html__( 'monthly', 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'year_unit', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Year Unit', 'techly-core' ),
				'default' => esc_html__( 'yearly', 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link', [
				'type' => Controls_Manager::URL,
				'label'   => esc_html__( 'Link (Optional)', 'techly-core' ),
				'placeholder' => 'https://your-link.com',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_text', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button Text', 'techly-core' ),
				'default' => esc_html__( 'Get Started', 'techly-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'text', [
				'type' => Controls_Manager::WYSIWYG,
				'label'   => esc_html__( 'Content', 'techly-core' ),
				'label_block' => true,
			]
		);

		$this->start_controls_section(
			'rt_pricing_tab',
			[
				'label' => esc_html__('Pricing Tab', 'techly-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'monthly_text',
			[
				'label' => esc_html__('Month Text', 'techly-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Monthly','techly-core'),
				'label_block' => false,
			]
		);

		$this->add_control(
			'yearly_text',
			[
				'label' => esc_html__('Year Text', 'techly-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Yearly','techly-core'),
				'label_block' => false,
			]
		);

		$this->add_control(
			'feature_lists',
			[
				'label' => __('Feature List', 'techly-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Basic Plan', 'techly-core'),
					],
					[
						'title' => __('Standard Plan', 'techly-core'),
					],
					[
						'title' => __('Premium Plan', 'techly-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'note_display',
			[
				'type'        => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Note', 'techly-core' ),
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: on', 'techly-core' ),
			]
		);

		$this->add_control(
			'note_desc',
			[
				'type'    => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Note Description', 'techly-core' ),
				'default' => esc_html__( 'Note: All prices are given in USD exclusive TAX/ VAT. TAX/ VAT will be charged depending on the destination country.', 'techly-core' ),
				'condition'   => array( 'note_display' => array( 'yes' ) ),
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
					'{{WRAPPER}} .rt-pricing-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Switch Settings
		//==============================================================
		$this->start_controls_section(
			'switch_settings',
			[
				'label' => esc_html__('Switch Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'switch_typo',
				'label' => esc_html__('Typo', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-pricing-tab .pack-name',
			]
		);

		$this->add_control(
			'switch_button_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Switch Button Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-tab .pricing-switch-container .switch-button' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'switch_bottom_space',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Bottom Space', 'techly-core'),
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-tab .price-switch-box' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// Title Settings
		//==============================================================
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
				'selector' => '{{WRAPPER}} .rt-price-tab-box .rt-title',
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
			'title_spacing',
			[
				'label' => __('Title Spacing', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'allowed_dimensions' => 'vertical',
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .rt-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .rt-price-tab-box .rt-title' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .rt-price-tab-box:hover .rt-title' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Sub Title
		$this->start_controls_section(
			'sub_title_settings',
			[
				'label' => esc_html__('Sub Title Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typo',
				'label' => esc_html__('Typo', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box .sub-title',
			]
		);

		$this->add_responsive_control(
			'subtitle_list_spacing',
			[
				'label' => __('Spacing', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'allowed_dimensions' => 'vertical',
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
	
		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => __('Padding', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'subtitle_border',
				'label' => __('Border', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box .sub-title',
			]
		);


		$this->start_controls_tabs(
			'subtitle_style_tabs'
		);

		$this->start_controls_tab(
			'subtitle_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Sub Title Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .sub-title' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'subtitle_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'subtitle_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Sub Title Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .sub-title' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Is Featured Settings
		//==============================================================
		$this->start_controls_section(
			'is_featured_settings',
			[
				'label' => esc_html__('Feature Badge Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'is_featured_typo',
				'label' => esc_html__('Typo', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box .is-featured',
			]
		);

		$this->start_controls_tabs(
			'is_featured_style_tabs'
		);

		$this->start_controls_tab(
			'is_featured_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'is_featured_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .is-featured' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_control(
			'is_featured_bg_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Background Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .is-featured' => 'background-color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'is_featured_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'is_featured_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .is-featured' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_control(
			'is_featured_bg_color_hover',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Background Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .is-featured' => 'background-color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Price setting
		$this->start_controls_section(
			'price_settings',
			[
				'label' => esc_html__('Price Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pricing_heading',
			[
				'label' => __('Pricing Options', 'techly-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => esc_html__('Typography', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box .price-wrap .price',
			]
		);

		$this->start_controls_tabs(
			'price_style_tabs'
		);

		$this->start_controls_tab(
			'price_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'price_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Price Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .price-wrap .price' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'price_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'price_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Price Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .price-wrap .price' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'period_heading',
			[
				'label' => __('Period Options', 'techly-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'period_typography',
				'label' => esc_html__('Typography', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box .price-wrap .period',
			]
		);

		$this->start_controls_tabs(
			'period_style_tabs'
		);

		$this->start_controls_tab(
			'period_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'period_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Period Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .price-wrap .period' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'period_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'period_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Period Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .price-wrap .period' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'pricing_separator',
			[
				'label' => __('Pricing Separator Options', 'techly-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs(
			'separator_style_tabs'
		);

		$this->start_controls_tab(
			'separator_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'separator_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Separator Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .price-wrap .seperator' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'separator_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'separator_color_hover',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Separator Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .price-wrap .seperator' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'separator_size',
			[
				'label' => __('Separator Size', 'techly-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .price-wrap .seperator' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Feature List Style
		$this->start_controls_section(
			'feature_list_settings',
			[
				'label' => esc_html__('Feature List Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'feature_list_typography',
				'label' => esc_html__('Typography', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box .feature-lists',
			]
		);

		$this->add_responsive_control(
			'feature_list_spacing',
			[
				'label' => __('Spacing', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'allowed_dimensions' => 'vertical',
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .feature-lists' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->start_controls_tabs(
			'feature_list_style_tabs'
		);

		$this->start_controls_tab(
			'feature_list_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'feature_list_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .feature-lists li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'feature_icon_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('List Icon Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .feature-lists i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'feature_icon_bg_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('List Icon BG Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .feature-lists i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'feature_list_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'feature_list_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .feature-lists li' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_control(
			'feature_icon_color_hover',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('List Icon Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .feature-lists i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'feature_icon_bg_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('List Icon BG Hover Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover .feature-lists i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Button More Settings
		//==============================================================
		$this->start_controls_section(
			'button_settings',
			[
				'label' => esc_html__('Button Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

	

		$this->add_control(
			'button_border_radius',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Border Radius', 'techly-core'),
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box .pricing-button .pricing-btn' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__('Button Typography', 'techly-core'),
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => __('Button Padding', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .pricing-button .pricing-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'button_width',
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
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-button .pricing-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_height',
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
					'{{WRAPPER}} .rt-price-tab-box .pricing-button .pricing-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Start button Style Tab
		$this->start_controls_tabs(
			'button_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_control(
			'button_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .pricing-button .pricing-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-button .pricing-btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __('Border', 'techly-core'),
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn',
			]
		);

		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color Hover', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .pricing-button .pricing-btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-button .pricing-btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __('Box Shadow Hover', 'techly-core'),
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'label' => __('Border', 'techly-core'),
				'selector' => '{{WRAPPER}} .pricing-button .pricing-btn:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Box Settings
		$this->start_controls_section(
			'box_settings',
			[
				'label' => esc_html__('Box Settings', 'techly-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_min_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Box Min Height', 'techly-core'),
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __('Border Radius', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __('Box Padding', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'box_margin',
			[
				'label' => __('Box Margin', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->start_controls_tabs(
			'box_style_tabs'
		);

		$this->start_controls_tab(
			'box_style_normal_tab',
			[
				'label' => __('Normal', 'techly-core'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-price-tab-box::before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __('Border', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box',
			]
		);

		$this->add_control(
			'box_up',
			[
				'label' => __('Translate Y', 'techly-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box' => 'transform: translateY( {{SIZE}}{{UNIT}} );',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_style_hover_tab',
			[
				'label' => __('Hover', 'techly-core'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow Hover', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg_hover',
				'label' => __('Background Hover', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background - Hover', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-price-tab-box::after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border_hover',
				'label' => __('Border Hover', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-price-tab-box:hover',
			]
		);

		$this->add_control(
			'box_up_hover',
			[
				'label' => __('Translate Y on Hover', 'techly-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .rt-price-tab-box:hover' => 'transform: translateY( {{SIZE}}{{UNIT}} );',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'note_heading',
			[
				'label' => __('Note Options', 'techly-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'note_typo',
				'label' => esc_html__('Typo', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-pricing-tab .price-note',
			]
		);

		$this->add_control(
			'note_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Note Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-tab .price-note' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_control(
			'note_bg_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Note Background Color', 'techly-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-tab .price-note' => 'background-color: {{VALUE}}',

				],
			]
		);

		$this->add_responsive_control(
			'note_padding',
			[
				'label' => __('Padding', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-tab .price-note' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'note_radius',
			[
				'label' => __('Radius', 'techly-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-tab .price-note' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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

		$template = 'view-1';

		Fns::get_template( "elementor/pricing-tab/$template", $data );
	}
}