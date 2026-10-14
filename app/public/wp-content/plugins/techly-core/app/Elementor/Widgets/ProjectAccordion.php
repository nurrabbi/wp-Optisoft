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

class ProjectAccordion extends ElementorBase {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'RT Project Accordion', 'techly-core' );
		$this->rt_base = 'rt-project-accordion-addon';
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


		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'project_image', [
				'type' => Controls_Manager::MEDIA,
				'label' =>   esc_html__('Choose Image', 'techly-core'),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'category',
			[
				'label' => __('Category', 'techly-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('3D Shape Design', 'techly-core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title', [
				'label' => __('Title', 'techly-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Geometric 3D Shape', 'techly-core'),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'title_url',
			[
				'label'       => __( 'Link', 'techly-core' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'techly-core' ),
				'show_label'  => false,
			]
		);


		$this->add_control(
			'project_items',
			[
				'label' => __('Project list', 'techly-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Geometric 3D Shape ', 'techly-core'),
					],
					[
						'title' => __('Art with Geometric', 'techly-core'),
					],
					[
						'title' => __('Object on Robot', 'techly-core'),
					],
					[
						'title' => __('Black & White Diamond', 'techly-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();


		// Title setting
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .accordion-title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_hover_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .accordion-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Typo', 'techly-core' ),
				'selector' => '{{WRAPPER}} .rt-project-accordion-wrap .item .content .accordion-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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

		// Icon setting
		$this->start_controls_section(
			'category_style',
			[
				'label' => esc_html__( 'Category Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .rt-accordion-category a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .rt-project-accordion-wrap .item .content .rt-accordion-category a',
			]
		);
		$this->add_responsive_control(
			'category_radius',
			[
				'label'      => __( 'Border Radius', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .rt-accordion-category a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);


		$this->add_control(
			'category_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .rt-accordion-category a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'category_size',
			[
				'type'      => Controls_Manager::NUMBER,
				'label'     => esc_html__( 'Font Size', 'techly-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .rt-accordion-category a' => 'font-size: {{VALUE}}px',
				],
			]
		);
		$this->add_responsive_control(
			'category_margin',
			[
				'label'      => __( 'Margin', 'techly-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .rt-project-accordion-wrap .item .content .rt-accordion-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();



		//Box Setting
		$this->start_controls_section(
			'box_style',
			[
				'label' => esc_html__( 'Box Style', 'techly-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_height',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Box Height', 'techly-core' ),
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
					'{{WRAPPER}} .rt-project-accordion-wrap .project-bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_width',
			[
				'type'    => Controls_Manager::SLIDER,
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Box Width', 'techly-core' ),
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
					'{{WRAPPER}} .rt-project-accordion-wrap .project-bg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render() {
		$data     = $this->get_settings();
		$template = 'view-1';
		Fns::get_template( "elementor/project-accordion/$template", $data );
	}

}