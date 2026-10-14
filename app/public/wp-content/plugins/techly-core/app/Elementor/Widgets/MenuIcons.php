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

class MenuIcons extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = __( 'RT Menu Icons', 'techly-core' );
		$this->rt_base = 'rt-menu-icons';
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
		$this->add_responsive_control(
			'action_item_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Item Space', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper .menu-icon-action' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'has_separator',
			[
				'label'       => esc_html__( 'Item Separator', 'techly-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on'    => esc_html__( 'On', 'techly-core' ),
				'label_off'   => esc_html__( 'Off', 'techly-core' ),
				'default'     => 'yes',
				'render_type' => 'template',
			]
		);
		$this->add_control(
			'separator_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Separator Color', 'techly-core' ),
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .has-separator li:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition'   => [
					'has_separator' => [ 'yes' ],
				],
			]
		);
		$this->add_responsive_control(
			'separator_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Separator Space', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper .has-separator li:not(:last-child)' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition'   => [
					'has_separator' => [ 'yes' ],
				],
			]
		);
		$this->add_responsive_control(
			'alignment',
			[
				'label'     => __( 'Alignment', 'techly-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => __( 'Left', 'techly-core' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'     => [
						'title' => __( 'Center', 'techly-core' ),
						'icon'  => 'eicon-text-align-center',
					],
					'flex-end'   => [
						'title' => __( 'Right', 'techly-core' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper' => 'justify-content: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'direction',
			[
				'label'       => esc_html__( 'Direction', 'techly-core' ),
				'type'        => Controls_Manager::SELECT2,
				'options'   => [
					'row' => __( 'Default', 'techly-core' ),
					'row-reverse' => __( 'Reverse', 'techly-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper .menu-icon-action' => 'flex-direction: {{VALUE}};',
				],
				'default'     => 'row',
			]
		);

		$this->end_controls_section();

		// Action button
		$this->start_controls_section(
			'sec_action_button',
			[
				'label' => esc_html__( 'Action Button', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'button',
			[
				'label'     => esc_html__( 'Action Button Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'yes',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Get Started', 'techly-core' ),
				'condition'   => [
					'button' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-comment',
					'library' => 'solid',
				],
				'condition'   => [
					'button' => [ 'yes' ],
				],
			]
		);


		$this->add_control(
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
				'condition'   => [
					'button' => [ 'yes' ],
				],
			]
		);

		$this->end_controls_section();

		// login setting
		$this->start_controls_section(
			'sec_login_button',
			[
				'label' => esc_html__( 'Login Button', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'login',
			[
				'label'     => esc_html__( 'Login Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'yes',
			]
		);
		$this->add_control(
			'log_button_text',
			[
				'label'       => esc_html__( 'Login Button Text', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Log In', 'techly-core' ),
				'condition'   => [
					'login' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'login_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-user-1',
					'library' => 'solid',
				],
				'condition'   => [
					'login' => [ 'yes' ],
				],
			]
		);
		$this->end_controls_section();

		// Phone setting
		$this->start_controls_section(
			'sec_phone',
			[
				'label' => esc_html__( 'Phone', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'phone',
			[
				'label'     => esc_html__( 'Phone Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'yes',
			]
		);
		$this->add_control(
			'phone_label',
			[
				'label'       => esc_html__( 'Phone Label', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Hotline', 'techly-core' ),
				'condition'   => [
					'phone' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'phone_number',
			[
				'label'       => esc_html__( 'Phone Number', 'techly-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( '+123-7767-8989', 'techly-core' ),
				'condition'   => [
					'phone' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'phone_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-phone-2',
					'library' => 'solid',
				],
				'condition'   => [
					'phone' => [ 'yes' ],
				],
			]
		);
		$this->end_controls_section();

		// Cart setting
		$this->start_controls_section(
			'shop_action_style',
			[
				'label' => __( 'Shop Action', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cart',
			[
				'label'     => esc_html__( 'Cart Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'no',
			]
		);
		$this->add_control(
			'cart_icon',
			[
				'label'            => __( 'Choose Icon', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value'   => 'icon-rt-cart-2',
					'library' => 'solid',
				],
				'condition'   => [
					'cart' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'wishlist',
			[
				'label'     => esc_html__( 'Wishlist Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'no',
			]
		);
		$this->add_control(
			'compare',
			[
				'label'     => esc_html__( 'Compare Display', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'no',
			]
		);

		$this->end_controls_section();

		// Icon Style
		$this->start_controls_section(
			'search_style',
			[
				'label' => __( 'Search Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'search',
			[
				'label'     => esc_html__( 'Search', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'yes',
			]
		);
		$this->add_control(
			'search_size',
			[
				'label' => __( 'Button Size', 'techly-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper .menu-search-bar' => 'transform: scale({{SIZE}});',
				],
			]
		);
		$this->add_control(
			'search_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper .menu-search-bar' => 'color: {{VALUE}}',
				],
				'condition'   => [
					'search' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'search_icon_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .menu-icon-wrapper a.menu-search-bar:hover'  => 'color: {{VALUE}}',
				],
				'condition'   => [
					'search' => [ 'yes' ],
				],
			]
		);

		$this->end_controls_section();

		// Hamburger Style
		$this->start_controls_section(
			'hamburger_style',
			[
				'label' => __( 'Hamburger Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hamburger',
			[
				'label'     => esc_html__( 'Hamburg menu', 'techly-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'On', 'techly-core' ),
				'label_off' => esc_html__( 'Off', 'techly-core' ),
				'default'   => 'yes',
			]
		);
		$this->add_control(
			'hamburger_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .ham-burger .btn-hamburger svg' => 'color: {{VALUE}}',
				],
				'condition'     => [
					'hamburger' => 'yes',
				],
			]
		);
		$this->add_control(
			'hamburger_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .ham-burger .menu-bar:hover .btn-hamburger svg' => 'color: {{VALUE}}',
				],
				'condition'     => [
					'hamburger' => 'yes',
				],
			]
		);
		$this->add_control(
			'hamburger_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .ham-burger .menu-bar' => 'background-color: {{VALUE}}',
				],
				'condition'     => [
					'hamburger' => 'yes',
				],
			]
		);
		$this->add_control(
			'hamburger_hover_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .ham-burger .menu-bar:hover' => 'background-color: {{VALUE}}',
				],
				'condition'     => [
					'hamburger' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'hamburger_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .ham-burger .menu-bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'hamburger_width',
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
					'{{WRAPPER}} .ham-burger .menu-bar' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hamburger_height',
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
					'{{WRAPPER}} .ham-burger .menu-bar' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hamburger_border',
				'selector' => '{{WRAPPER}} .ham-burger .menu-bar',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hamburger_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .ham-burger .menu-bar',
			]
		);

		$this->end_controls_section();

		// Button Style
		$this->start_controls_section(
			'button_style',
			[
				'label' => __( 'Button Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'     => [
					'button' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-action-button .btn',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-action-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'button_margin',
			[
				'label'              => __( 'Icon Margin', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-action-button .btn i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'button_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-action-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		// Login Button style Tabs
		$this->start_controls_tabs(
			'button_style_tabs', [
			]
		);

		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'button_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-action-button .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-action-button .btn i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-action-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .rt-action-button .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-action-button .btn',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-action-button .btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-action-button .btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-action-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'selector' => '{{WRAPPER}} .rt-action-button .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_hover_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-action-button .btn:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Login Button Style
		$this->start_controls_section(
			'login_style',
			[
				'label' => __( 'Login Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'     => [
					'login' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'login_typo',
				'label'    => esc_html__( 'Typography', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-user-login .btn',
			]
		);

		$this->add_responsive_control(
			'login_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-user-login .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'login_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-user-login .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		// Login Button style Tabs
		$this->start_controls_tabs(
			'login_style_tabs', [
			]
		);

		$this->start_controls_tab(
			'login_style_normal_tab',
			[
				'label' => __( 'Normal', 'techly-core' ),
			]
		);
		$this->add_control(
			'login_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-user-login .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-user-login .btn i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'login_bg_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-user-login .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'login_border',
				'selector' => '{{WRAPPER}} .rt-user-login .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'login_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-user-login .btn',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'login_style_hover_tab',
			[
				'label' => __( 'Hover', 'techly-core' ),
			]
		);

		$this->add_control(
			'login_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-user-login .btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-user-login .btn:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'login_bg_hover_color',
				'label' => __('Background', 'techly-core'),
				'types' => ['classic', 'gradient'],
				'fields_options'  => [
					'background' => [
						'label' => esc_html__( 'Background', 'techly-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .rt-user-login .btn:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'login_hover_border',
				'selector' => '{{WRAPPER}} .menu-icon-wrapper .rt-user-login a:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'login_hover_box_shadow',
				'label' => __('Box Shadow', 'techly-core'),
				'selector' => '{{WRAPPER}} .rt-user-login .btn:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Phone Style
		$this->start_controls_section(
			'phone_style',
			[
				'label' => __( 'Phone Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'     => [
					'phone' => 'yes',
				],
			]
		);
		$this->add_control(
			'phone_layout',
			[
				'label'   => esc_html__( 'Layout', 'techly-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'phone-1',
				'options' => [
					'phone-1' => __( 'Layout 1', 'techly-core' ),
					'phone-2' => __( 'Layout 2', 'techly-core' ),
				],

			]
		);
		// Phone Icon Settings
		$this->add_control(
			'phone_icon_heading',
			[
				'label'     => __( 'Phone Icon Settings', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'phone_icon_typo',
				'label'    => esc_html__( 'Icon Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-phone .phone-icon',
			]
		);
		$this->add_control(
			'phone_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone .phone-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'phone_icon_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone:hover .phone-icon' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'phone_icon_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone .phone-icon i' => 'background-color: {{VALUE}}',
				],
				'condition'     => [
					'phone_layout!' => ['phone-1'],
				],
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'phone_icon_border',
                'selector' => '{{WRAPPER}} .rt-phone .phone-icon i',
            ]
        );
		$this->add_responsive_control(
			'phone_icon_space',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Space', 'techly-core' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-phone .phone-icon' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		// Phone Label Settings
		$this->add_control(
			'phone_label_heading',
			[
				'label'     => __( 'Phone Label Settings', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'phone_label_typo',
				'label'    => esc_html__( 'Label Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-phone .phone-label',
			]
		);
		$this->add_control(
			'phone_label_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Label Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone .phone-label' => 'color: {{VALUE}}',
				],
			]
		);
		// Phone Number Settings
		$this->add_control(
			'phone_number_heading',
			[
				'label'     => __( 'Phone Number Settings', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'phone_number_typo',
				'label'    => esc_html__( 'Number Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-phone .phone-number',
			]
		);
		$this->add_control(
			'phone_number_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Number Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone .phone-number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'phone_number_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Number Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone .phone-number:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-phone:hover .phone-number' => 'color: {{VALUE}}',
				],
			]
		);
		// Phone Box Style
		$this->add_control(
			'phone_box_style',
			[
				'label'     => __( 'Phone Box Settings', 'techly-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'phone_box_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'phone_box_hover_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'BG Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-phone:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'phone_box_padding',
			[
				'label'              => __( 'Padding', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ '%','px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-phone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'phone_box_border',
				'label'    => __( 'Border', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-phone',
			]
		);
		$this->add_responsive_control(
			'phone_box_radius',
			[
				'label'              => __( 'Radius', 'techly-core' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'selectors'          => [
					'{{WRAPPER}} .rt-phone' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();

		// Shop Style
		$this->start_controls_section(
			'shop_style',
			[
				'label' => __( 'Shop Action Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'shop_icon_typo',
				'label'    => esc_html__( 'Icon Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .menu-icon-action .action-icon i',
			]
		);
		$this->add_control(
			'shop_icon_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Icon Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .menu-icon-action .action-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'shop_count_typo',
				'label'    => esc_html__( 'Count Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .menu-icon-action .action-icon > span',
			]
		);
		$this->add_control(
			'shop_count_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Count Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .menu-icon-action .action-icon > span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'shop_count_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Count BG Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .menu-icon-action .action-icon > span' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'view-1';

		Fns::get_template( "elementor/menu-icons/$template", $data );
	}

}