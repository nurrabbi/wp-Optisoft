<?php

namespace RT\TechlyCore\Controllers;

use RT\Techly\Helpers\Fns;
use \RT_Postmeta;
use RT\TechlyCore\Traits\SingletonTraits;
use RT\TechlyCore\Builder\Builder;
use RT\TechlyCore\Helper\FnsBuilder;
use RT\TechlyCore\Modules\IconList;

class PostMetaController {
	use SingletonTraits;

	public $postmeta;

	public function __construct() {
		$this->postmeta = RT_Postmeta::getInstance();
//		$this->add_meta_box();
		add_action( 'init', [ $this, 'add_meta_box' ] );
	}

	/**
	 * Add all metabox
	 * @return void
	 */
	function add_meta_box() {

		$this->postmeta->add_meta_box(
			"rt_page_settings",
			__( 'Layout Settings', 'techly-core' ),
			[ 'page', 'post', 'rt-team', 'rt-service', 'rt-project' ],
			'',
			'',
			'high',
			[
				'fields' => [
					"rt_layout_meta_data" => [
						'label' => __( 'Layouts', 'techly-core' ),
						'type'  => 'group',
						'value' => $this->get_post_page_meta_args(),
					],
				],
			]
		);

		//Post Info
		$this->postmeta->add_meta_box(
			"rt_post_info",
			__( 'Post Info', 'techly-core' ),
			[ 'post' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_post_info_meta(),
			]
		);

		//Team meta
		$this->postmeta->add_meta_box(
			"rt_team_info",
			__( 'Team Info', 'techly-core' ),
			[ 'rt-team' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_team_info_meta(),
			]
		);
		$this->postmeta->add_meta_box(
			"rt_team_social",
			__( 'Team Social', 'techly-core' ),
			[ 'rt-team' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_team_social_meta(),
			]
		);

		$this->postmeta->add_meta_box(
			"rt_team_skill",
			__( 'Team Skill', 'techly-core' ),
			[ 'rt-team' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_team_skill_meta(),
			]
		);

		$this->postmeta->add_meta_box(
			"rt_team_contact",
			__( 'Team Contact', 'techly-core' ),
			[ 'rt-team' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_team_contact_meta(),
			]
		);

        //service meta
        $this->postmeta->add_meta_box(
            "rt_service_icon",
            __( 'Service Icon', 'techly-core' ),
            [ 'rt-service' ],
            '',
            '',
            'high',
            [
                'fields' => $this->get_service_icon_meta(),
            ]
        );

		//Project meta
		$this->postmeta->add_meta_box(
			"rt_project_info",
			__( 'Project Info', 'techly-core' ),
			[ 'rt-project' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_project_info_meta(),
			]
		);

        //header footer build
		$this->postmeta->add_meta_box(
			"rt_el_builder_settings",
			__( 'Header - Footer Builder Settings', 'techly-core' ),
			[ 'elementor-techly' ],
			'',
			'',
			'high',
			[
				'fields' => $this->get_el_builder_meta_args(),
			]
		);
	}

	function get_el_builder_meta_args() {
		return apply_filters( 'techly_layout_meta_field', [
			'template_type' => [
				'label'   => __( 'Template Type', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Choose Options', 'techly-core' ),
					'header'  => __( 'Header', 'techly-core' ),
					'footer'  => __( 'Footer', 'techly-core' ),
				],
				'default' => 'default',
			],

			'show_on' => [
				'label'   => __( 'Show On', 'techly-core' ),
				'type'    => 'multi_select2',
				'options' => FnsBuilder::get_builder_type(),
				'default' => [],
				'class'   => 'rt-header-footer-select'
			],

			'choose_post' => [
				'label'       => __( 'Choose posts or pages', 'techly-core' ),
				'type'        => 'ajax_select',
				'data_source' => 'post',
				'default'     => [],
			],

		] );
	}

	function get_post_page_meta_args() {
		$sidebars = [ 'default' => __( 'Default from customizer', 'techly-core' ) ] + Fns::sidebar_lists();

		return apply_filters( 'techly_layout_meta_field', [
			'layout'            => [
				'label'   => __( 'Layout', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default'       => __( 'Default from customizer', 'techly-core' ),
					'full-width'    => __( 'Full Width', 'techly-core' ),
					'left-sidebar'  => __( 'Left Sidebar', 'techly-core' ),
					'right-sidebar' => __( 'Right Sidebar', 'techly-core' ),
				],
				'default' => 'default',
			],
			'single_post_style' => [
				'label'   => __( 'Post View Style', 'techly-core' ),
				'type'    => 'select',
				'options' => [ 'default' => __( 'Default from customizer', 'techly-core' ) ] + Fns::single_post_style(),
				'default' => 'default',
			],
			'header_style'      => [
				'label'   => __( 'Header Style', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'1'       => __( 'Layout 1', 'techly-core' ),
					'2'       => __( 'Layout 2', 'techly-core' ),
				],
				'default' => 'default',
			],
			'sidebar'           => [
				'label'   => __( 'Custom Sidebar', 'techly-core' ),
				'type'    => 'select',
				'options' => $sidebars,
				'default' => 'default',
			],
			'top_bar'           => [
				'label'   => __( 'Top Bar Visibility', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'on'      => __( 'ON', 'techly-core' ),
					'off'     => __( 'OFF', 'techly-core' ),
				],
				'default' => 'default',
			],
			'topbar_style'      => [
				'label'   => __( 'Top Bar Style', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'1'       => __( 'Layout 1', 'techly-core' ),
				],
				'default' => 'default',
			],
			'header_width'      => [
				'label'   => __( 'Header Width', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'box'     => __( 'Box Width', 'techly-core' ),
					'full'    => __( 'Full Width', 'techly-core' ),
				],
				'default' => 'default',
			],
			'menu_alignment'    => [
				'label'   => __( 'Menu Alignment', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default'     => __( 'Default from customizer', 'techly-core' ),
					'menu-left'   => __( 'Left Alignment', 'techly-core' ),
					'menu-center' => __( 'Center Alignment', 'techly-core' ),
					'menu-right'  => __( 'Right Alignment', 'techly-core' ),
				],
				'default' => 'default',
			],

			'tr_header'        => [
				'label'   => __( 'Transparent Header', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'on'      => __( 'ON', 'techly-core' ),
					'off'     => __( 'OFF', 'techly-core' ),
				],
				'default' => 'default',
			],

			'tr_header_color' => [
				'label'   => __( 'Transparent color', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default'   => __( 'Default from customizer', 'techly-core' ),
					'tr-header-light'   => __( 'Light Color', 'techly-core' ),
					'tr-header-dark'    => __( 'Dark Color', 'techly-core' ),
				],
				'default' => 'default',
			],

			'banner'           => [
				'label'   => __( 'Banner Visibility', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'on'      => __( 'ON', 'techly-core' ),
					'off'     => __( 'OFF', 'techly-core' ),
				],
				'default' => 'default',
			],
			'breadcrumb_title' => [
				'label'   => __( 'Banner Title', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'on'      => __( 'ON', 'techly-core' ),
					'off'     => __( 'OFF', 'techly-core' ),
				],
				'default' => 'default',
			],
			'breadcrumb'       => [
				'label'   => __( 'Banner Breadcrumb', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'on'      => __( 'ON', 'techly-core' ),
					'off'     => __( 'OFF', 'techly-core' ),
				],
				'default' => 'default',
			],

			'banner_image'    => [
				'type'  => 'image',
				'label' => __( 'Banner Background Image', 'techly-core' ),
			],
			'banner_color'    => [
				'type'  => 'color_picker',
				'label' => __( 'Banner Background Color', 'techly-core' ),
			],


			'footer_style'     => [
				'label'   => __( 'Footer Layout', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default' => __( 'Default from customizer', 'techly-core' ),
					'1'       => __( 'Layout 1', 'techly-core' ),
					'2'       => __( 'Layout 2', 'techly-core' ),
				],
				'default' => 'default',
			],
			'footer_schema'    => [
				'label'   => __( 'Footer Schema', 'techly-core' ),
				'type'    => 'select',
				'options' => [
					'default'      => __( 'Default from customizer', 'techly-core' ),
					'footer-light' => __( 'Light Footer', 'techly' ),
					'footer-dark'  => __( 'Dark Footer', 'techly' ),
				],
				'default' => 'default',
			],
			'padding_top'    => [
				'label' => __( 'Padding Top (Page Content)', 'techly-core' ),
				'type'  => 'number',
			],
			'padding_bottom'   => [
				'label' => __( 'Padding Bottom (Page Content)', 'techly-core' ),
				'type'  => 'number',
			],
			'page_bg_image'    => [
				'type'  => 'image',
				'label' => __( 'Background Image', 'techly-core' ),
			],
			'page_bg_color'    => [
				'type'  => 'color_picker',
				'label' => __( 'Background Color', 'techly-core' ),
			],

		] );
	}

	function get_post_info_meta() {
		return apply_filters( 'rt_post_info', [
			'rt_youtube_link' => [
				'label'   => __( 'Youtube Link', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],
			'rt_post_gallery' => [
				'label' => __( 'Post Gallery', 'techly-core' ),
				'type'  => 'gallery',
				'desc'  => __( 'Only work for the gallery post format', 'techly-core' ),
			],
		] );
	}

	//Team meta info
	function get_team_info_meta() {
		return apply_filters( 'rt_team_meta_field', [
			'rt_team_info_title' => array(
				'label' => __( 'Information Title', 'techly-core' ),
				'type'  => 'text',
			),

			'rt_team_designation' => [
				'label'   => __( 'Team Designation', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_team_qualification' => [
				'label'   => __( 'Qualification', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],
			'rt_team_age' => [
				'label'   => __( 'Age', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_team_phone' => [
				'label'   => __( 'Team Phone', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_team_website' => [
				'label'   => __( 'Team Website', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_team_email' => [
				'label'   => __( 'Team Email', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_team_address' => [
				'label'   => __( 'Team Address', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

		] );
	}
	function get_team_social_meta() {
		return apply_filters( 'rt_team_meta_social', [
			'rt_team_socials' => array(
				'type'  => 'group',
				'value' => Fns::get_team_socials(),
			),
		] );
	}

	function get_team_skill_meta() {
		return apply_filters( 'rt_team_meta_skill', [

			'rt_team_skill_title' => array(
				'label' => __( 'Skill Title', 'techly-core' ),
				'type'  => 'text',
			),

			'rt_team_skill_info' => [
				'label'   => __( 'Team Skill Info', 'techly-core' ),
				'type'    => 'textarea',
			],

			'rt_team_skill' => [
				'type'  => 'repeater',
				'button' => __( 'Add New Skill', 'techly-core' ),
				'value'  => [
					'skill_name' => [
						'label' => __( 'Skill Name', 'techly-core' ),
						'type'  => 'text',
						'desc'  => __( 'eg. Marketing', 'techly-core' ),
					],
					'skill_value' => [
						'label' => __( 'Skill Percentage (%)', 'techly-core' ),
						'type'  => 'text',
						'desc'  => __( 'eg. 75', 'techly-core' ),
					],
					'skill_color' => [
						'label' => __( 'Skill Color', 'techly-core' ),
						'type'  => 'color_picker',
						'desc'  => __( 'If not selected, primary color will be used', 'techly-core' ),
					],
				]
			],
		] );
	}

	function get_team_contact_meta() {
		return apply_filters( 'rt_team_meta_contact', [
			'rt_team_contact_form' => array(
				'label' => __( 'Contact Form Shortcode', 'techly-core' ),
				'type'  => 'text',
			),
		] );
	}

    // Service meta info

    function get_service_icon_meta() {
        return apply_filters( 'rt_service_meta_icon', [
            'rt_service_icon'    => [
                'label'   => __( 'Service Icon', 'techly-core' ),
                'type'    => 'select',
                'options' => IconList::fontello_service(),
            ],
            'rt_service_color'    => [
	            'label'   => __( 'Service Color', 'techly-core' ),
	            'type'  => 'color_picker',
            ],
        ] );
    }


	//Project meta info
	function get_project_info_meta() {
		return apply_filters( 'rt_project_meta_field', [

			'rt_project_text' => [
				'label'   => __( 'Info Text', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_project_client' => [
				'label'   => __( 'Client', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_project_start' => [
				'label'   => __( 'Starts On', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],
			'rt_project_location' => [
				'label'   => __( 'Location', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],
			'rt_project_date' => [
				'label'   => __( 'Date', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_project_end' => [
				'label'   => __( 'End On', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_project_weblink' => [
				'label'   => __( 'Weblink', 'techly-core' ),
				'type'    => 'text',
				'default' => '',
			],

			'rt_project_rating' => [
				'label' => __( 'Select the Rating', 'techly-core' ),
				'type'  => 'select',
				'options' => array(
					'-1' => __( 'Default', 'techly-core' ),
					'1'    => '1',
					'2'    => '2',
					'3'    => '3',
					'4'    => '4',
					'5'    => '5'
				),
				'default'  => '-1',
			],

		] );
	}
}

