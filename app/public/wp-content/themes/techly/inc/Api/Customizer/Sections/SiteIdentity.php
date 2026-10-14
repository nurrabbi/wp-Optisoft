<?php
/**
 * Theme Customizer - Header
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class SiteIdentity extends Customizer {

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_controls( 'title_tagline', $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_title_tagline_controls', [

			'rt_logo' => [
				'type'         => 'image',
				'label'        => __( 'Main Logo', 'techly' ),
				'description'  => __( 'Upload main logo for your site.', 'techly' ),
				'button_label' => __( 'Logo', 'techly' ),
			],

			'rt_logo_light' => [
				'type'         => 'image',
				'label'        => __( 'Light Logo', 'techly' ),
				'description'  => __( 'Upload light logo for transparent header. It should a white logo', 'techly' ),
				'button_label' => __( 'Light Logo', 'techly' ),
			],

			'rt_logo_mobile' => [
				'type'         => 'image',
				'label'        => __( 'Mobile Logo', 'techly' ),
				'description'  => __( 'Upload, if you need a different logo for mobile device..', 'techly' ),
				'button_label' => __( 'Mobile Logo', 'techly' ),
			],

			'rt_logo_width_height' => [
				'type'      => 'text',
				'label'     => __( 'Main Logo Dimension', 'techly' ),
				'description'     => __( 'Enter the width and height value separate by comma (,). Eg. 120px,45px', 'techly' ),
				'transport' => '',
			],

			'rt_mobile_logo_width_height' => [
				'type'      => 'text',
				'label'     => __( 'Mobile Logo Dimension', 'techly' ),
				'description'     => __( 'Enter the width and height value separate by comma (,). Eg. 120px,45px', 'techly' ),
				'transport' => '',
			],

		] );

	}

}
