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
class Error extends Customizer {
	protected $section_labels = 'rt_error_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Error Page', 'techly' ),
			'description' => __( 'Error section.', 'techly' ),
			'priority'    => 39
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_error_image' => [
				'type'         => 'image',
				'label'        => __( 'Error Image', 'techly' ),
				'description'  => __( 'Upload error image for your site.', 'techly' ),
				'button_label' => __( 'Error image', 'techly' ),
			],

			'rt_error_heading' => [
				'type'        => 'text',
				'label'       => __( 'Error Heading', 'techly' ),
				'default'     => __( 'Oops, something went wrong.', 'techly' ),
			],

			'rt_error_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Text', 'techly' ),
				'default'     => __( 'Sorry! This Page Is Not Available!', 'techly' ),
			],

			'rt_error_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Button Text', 'techly' ),
				'default'     => __( 'Back To Home Page', 'techly' ),
			],

		] );
	}


}
