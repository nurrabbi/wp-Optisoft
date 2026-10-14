<?php
/**
 * LayoutControls
 */

namespace RT\Techly\Traits;

// Do not allow directly accessing this file.
use RT\Techly\Helpers\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

trait LayoutControlsTraits {
	public function get_layout_controls( $prefix = '' ) {

		$_left_text  = __( 'Left Sidebar', 'techly' );
		$_right_text = __( 'Right Sidebar', 'techly' );
		$left_text   = $_left_text;
		$right_text  = $_right_text;
		$image_left  = 'sidebar-left.png';
		$image_right = 'sidebar-right.png';

		if ( is_rtl() ) {
			$left_text   = $_right_text;
			$right_text  = $_left_text;
			$image_left  = 'sidebar-right.png';
			$image_right = 'sidebar-left.png';
		}

		return apply_filters( "techly_{$prefix}_layout_controls", [

			$prefix . '_layout' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'techly' ),
				'default' => 'right-sidebar',
				'choices' => [
					'left-sidebar'  => [
						'image' => techly_get_img( $image_left ),
						'name'  => $left_text,
					],
					'full-width'    => [
						'image' => techly_get_img( 'sidebar-full.png' ),
						'name'  => __( 'Full Width', 'techly' ),
					],
					'right-sidebar' => [
						'image' => techly_get_img( $image_right ),
						'name'  => $right_text,
					],
				]
			],

			$prefix . '_sidebar' => [
				'type'    => 'select',
				'label'   => __( 'Choose a Sidebar', 'techly' ),
				'default' => 'default',
				'choices' => Fns::sidebar_lists()
			],

			$prefix . '_page_bg_image' => [
				'type'         => 'image',
				'label'        => __( 'Page Background Image', 'techly' ),
				'description'  => __( 'Upload Background Image', 'techly' ),
				'button_label' => __( 'Background Image', 'techly' ),
			],

			$prefix . '_page_bg_color' => [
				'type'         => 'color',
				'label'        => __( 'Page Background Color', 'techly' ),
				'description'  => __( 'Inter Background Color', 'techly' ),
			],

			$prefix . '_header_heading' => [
				'type'  => 'heading',
				'label' => __( 'Header Settings', 'techly' ),
			],

			$prefix . '_header_style' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Header Layout', 'techly' ),
				'choices' => [
					'default' => __( '--Default--', 'techly' ),
					'1'       => __( 'Layout 1', 'techly' ),
					'2'       => __( 'Layout 2', 'techly' ),
				],
			],

			$prefix . '_top_bar' => [
				'type'    => 'select',
				'label'   => __( 'Top Bar', 'techly' ),
				'default' => 'default',
				'choices' => [
					'default' => __( '--Default--', 'techly' ),
					'on'      => __( 'On', 'techly' ),
					'off'     => __( 'Off', 'techly' ),
				]
			],

			$prefix . '_banner_heading' => [
				'type'  => 'heading',
				'label' => __( 'Banner Settings', 'techly' ),
			],

			$prefix . '_banner' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Visibility', 'techly' ),
				'choices' => [
					'default' => __( '--Default--', 'techly' ),
					'on'      => __( 'On', 'techly' ),
					'off'     => __( 'Off', 'techly' ),
				],
			],

			$prefix . '_breadcrumb_title' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Title', 'techly' ),
				'choices' => [
					'default' => __( '--Default--', 'techly' ),
					'on'      => __( 'On', 'techly' ),
					'off'     => __( 'Off', 'techly' ),
				],
			],

			$prefix . '_breadcrumb' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Breadcrumb', 'techly' ),
				'choices' => [
					'default' => __( '--Default--', 'techly' ),
					'on'      => __( 'On', 'techly' ),
					'off'     => __( 'Off', 'techly' ),
				],
			],

			$prefix . '_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Image', 'techly' ),
				'description'  => __( 'Upload Banner Image', 'techly' ),
				'button_label' => __( 'Banner Image', 'techly' ),
			],

			$prefix . '_banner_color' => [
				'type'         => 'color',
				'label'        => __( 'Banner Background Color', 'techly' ),
				'description'  => __( 'Inter Background Color', 'techly' ),
			],

			$prefix . '_footer_heading' => [
				'type'  => 'heading',
				'label' => __( 'Footer Settings', 'techly' ),
			],

			$prefix . '_footer_style'  => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Footer Layout', 'techly' ),
				'choices' => [
					'default' => __( '--Default--', 'techly' ),
					'1'       => __( 'Layout 1', 'techly' ),
					'2'       => __( 'Layout 2', 'techly' ),
				],
			],

		] );


	}


}
