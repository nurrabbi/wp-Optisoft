<?php
/**
 * Theme Customizer - Project Single
 *
 * @package techly
 */

namespace RT\Techly\Api\Customizer\Sections;

use RT\Techly\Api\Customizer;
use RTFramework\Customize;
use RT\Techly\Traits\LayoutControlsTraits;

/**
 * Customizer class
 */
class LayoutsProjectSingle extends Customizer {

	use LayoutControlsTraits;

	protected $section_project_single_layout = 'rt_project_single_layout_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_project_single_layout,
			'title' => __( 'Project Single Layout', 'techly' ),
			'panel' => 'rt_layouts_panel',
		] );

		Customize::add_controls( $this->section_project_single_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'project-single' );
	}

}
