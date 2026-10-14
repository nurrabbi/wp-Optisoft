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
class Labels extends Customizer {
	protected $section_labels = 'rt_labels_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Modify Static Text', 'techly' ),
			'description' => __( 'You can change all static text of the theme.', 'techly' ),
			'priority'    => 999
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_header_labels' => [
				'type'  => 'heading',
				'label' => __( 'Header Labels', 'techly' ),
			],

			'rt_get_menu_label' => [
				'type'        => 'text',
				'label'       => __( 'Menu Text', 'techly' ),
				'description' => __( 'Content: Menu Button', 'techly' ),
			],

			'rt_get_login_label' => [
				'type'        => 'text',
				'label'       => __( 'Log In', 'techly' ),
				'default'     => __( 'Log In', 'techly' ),
				'description' => __( 'Content: SignIn Button', 'techly' ),
			],

			'rt_get_started_label' => [
				'type'        => 'text',
				'label'       => __( 'Get Started', 'techly' ),
				'default'     => __( 'Get Started', 'techly' ),
				'description' => __( 'Content: Get Started', 'techly' ),
				'condition' => [ 'rt_get_started_button' ],
			],

			'rt_contact_info_label' => [
				'type'        => 'text',
				'label'       => __( 'Contact Info', 'techly' ),
				'default'     => __( 'Contact Info', 'techly' ),
				'description' => __( 'Content: Contact Info', 'techly' ),
			],

			'rt_follow_us_label' => [
				'type'        => 'text',
				'label'       => __( 'Follow Us On', 'techly' ),
				'default'     => __( 'Follow Us On', 'techly' ),
				'description' => __( 'Content: Follow Us On', 'techly' ),
			],

			'rt_about_label' => [
				'type'        => 'text',
				'label'       => __( 'About Us', 'techly' ),
				'description' => __( 'Content: About Us', 'techly' ),
			],

			'rt_about_text' => [
				'type'        => 'textarea',
				'label'       => __( 'About Text', 'techly' ),
				'description' => __( 'Enter about text here.', 'techly' ),
			],

			'rt_footer_labels' => [
				'type'  => 'heading',
				'label' => __( 'Footer Labels', 'techly' ),
			],

			'rt_ready_label' => [
				'type'        => 'text',
				'label'       => __( 'Are You Ready', 'techly' ),
				'default'     => __( 'ARE YOU READY TO GET STARTED?', 'techly' ),
				'description' => __( 'Content: Footer Are You Ready', 'techly' ),
			],

			'rt_contact_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Contact Us', 'techly' ),
				'default'     => __( 'Contact Us', 'techly' ),
				'description' => __( 'Content: Footer contact button', 'techly' ),
			],

			'rt_blog_labels' => [
				'type'  => 'heading',
				'label' => __( 'Blog Labels', 'techly' ),
			],
			'rt_author_prefix' => [
				'type'        => 'text',
				'label'       => __( 'By', 'techly' ),
				'default'     => 'by',
				'description' => __( 'Content: Meta Author Prefix', 'techly' ),
			],
			'rt_tags'         => [
				'type'        => 'text',
				'label'       => __( 'Tags:', 'techly' ),
				'default'     => __( 'Tags:', 'techly' ),
				'description' => __( 'Content: Single blog footer tags label', 'techly' ),
			],
			'rt_social' => [
				'type'        => 'text',
				'label'       => __( 'Socials:', 'techly' ),
				'default'     => __( 'Socials:', 'techly' ),
				'description' => __( 'Content: Single blog footer Socials label', 'techly' ),
			],
			'rt_blog_read_more' => [
				'type'        => 'text',
				'label'       => __( 'Blog Read More:', 'techly' ),
				'default'     => __( 'Continue Reading', 'techly' ),
				'description' => __( 'Content: Single blog footer read more text', 'techly' ),
			],

		] );
	}


}
