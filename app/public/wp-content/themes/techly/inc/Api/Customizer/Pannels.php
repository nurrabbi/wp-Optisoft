<?php
/**
 * Theme Customizer Pannels
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer;

use RT\Techly\Traits\SingletonTraits;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Pannels {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		add_action('init', [ $this, 'add_panels'] );
	}

	/**
	 * Add Panels
	 * @return void
	 */
	public function add_panels() {
		Customize::add_panels(
			[
				[
					'id'          => 'rt_header_panel',
					'title'       => esc_html__( 'Header - Topbar - Menu', 'techly' ),
					'description' => esc_html__( 'Techly Header', 'techly' ),
					'priority'    => 22,
				],
				[
					'id'          => 'rt_typography_panel',
					'title'       => esc_html__( 'Typography', 'techly' ),
					'description' => esc_html__( 'Techly Typography', 'techly' ),
					'priority'    => 24,
				],
				[
					'id'          => 'rt_color_panel',
					'title'       => esc_html__( 'Colors', 'techly' ),
					'description' => esc_html__( 'Techly Color Settings', 'techly' ),
					'priority'    => 28,
				],
				[
					'id'          => 'rt_layouts_panel',
					'title'       => esc_html__( 'Layout Settings', 'techly' ),
					'description' => esc_html__( 'Techly Layout Settings', 'techly' ),
					'priority'    => 34,
				],
				[
					'id'          => 'rt_contact_social_panel',
					'title'       => esc_html__( 'Contact & Socials', 'techly' ),
					'description' => esc_html__( 'Techly Contact & Socials', 'techly' ),
					'priority'    => 24,
				],

			]
		);
	}

}
