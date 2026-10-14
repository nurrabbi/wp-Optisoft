<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RT\TechlyCore\Hooks;

use RT\TechlyCore\Traits\SingletonTraits;

class FilterHooks {
	use SingletonTraits;


	public function __construct() {
		//Add user contact info
		add_filter( 'user_contactmethods', [ __CLASS__, 'rt_user_extra_contact_info' ] );
		add_filter( 'the_password_form', [ __CLASS__, 'rt_post_password_form' ] );
		add_filter( 'get_search_form', [ $this, 'search_form' ] );
		add_filter( 'upload_mimes', [ $this, 'techly_mime_types' ] );


	}

	/**
	 * Search form modify
	 * @return string
	 */
	public function search_form() {
		$output = '
		<form method="get" class="techly-search-form" action="' . esc_url( home_url( '/' ) ) . '">
            <div class="search-box">
				<input type="text" class="form-control" placeholder="' . esc_attr__( 'Search here...', 'techly-core' ) . '" value="' . get_search_query() . '" name="s" />
				<button class="item-btn" type="submit">
					' . techly_get_svg( 'search' ) . '
					<span class="btn-label">' . esc_html__( "Search", "techly-core" ) . '</span>
				</button>
            </div>
		</form>
		';

		return $output;
	}


	/* User Contact Info */
	public static function rt_user_extra_contact_info( $contactmethods ) {
		$contactmethods['rt_designation'] = __( 'Designation', 'techly-core' );
		$contactmethods['rt_phone']     = __( 'Phone Number', 'techly-core' );
		$contactmethods['rt_facebook']  = __( 'Facebook', 'techly-core' );
		$contactmethods['rt_twitter']   = __( 'Twitter', 'techly-core' );
		$contactmethods['rt_linkedin']  = __( 'LinkedIn', 'techly-core' );
		$contactmethods['rt_vimeo']     = __( 'Vimeo', 'techly-core' );
		$contactmethods['rt_youtube']   = __( 'Youtube', 'techly-core' );
		$contactmethods['rt_instagram'] = __( 'Instagram', 'techly-core' );
		$contactmethods['rt_pinterest'] = __( 'Pinterest', 'techly-core' );
		$contactmethods['rt_whatsapp']  = __( 'Whatsapp', 'techly-core' );

		return $contactmethods;
	}

	/*
	 * change post password from
	 */
	public static function rt_post_password_form() {
		global $post;
		$label  = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
		<p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p>
		<p><label for="' . $label . '"><span class="pass-label">' . __( 'Password:' ) . ' </span><input name="post_password" id="' . $label
		          . '" type="password" size="20" /> <input type="submit" name="Submit" value="' . esc_attr_x( 'Enter', 'post password form' ) . '" /></label></p></form>
		';

		return $output;
	}

	/**
	 * Enable svg upload
	 *
	 * @param $mimes
	 *
	 * @return mixed
	 */
	public function techly_mime_types( $mimes ) {
		if ( ! techly_option( 'rt_svg_enable' ) ) {
			return $mimes;
		}
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

}