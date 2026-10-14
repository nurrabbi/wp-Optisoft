<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techly
 */


use RT\Techly\Helpers\Fns;

if ( is_singular() && is_active_sidebar( Fns::default_sidebar('single') ) ) {
	techly_sidebar( Fns::default_sidebar('single')  );
} else {
	techly_sidebar( Fns::default_sidebar('main') );
}
