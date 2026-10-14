<?php
/**
 * Template part for displaying banner content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

use RT\Techly\Options\Opt;
use RT\Techly\Helpers\Fns;
use RadiusTheme\SB\Helpers\BuilderFns;

if ( ! Opt::$has_banner ) {
	return;
}

$banner_image_css = '';
	$image_url = wp_get_attachment_image_src( Opt::$banner_image, 'full' );
	$banner_image_css .= isset( $image_url[0] ) ? "background-image:url({$image_url[0]});" : '';

	if ( ! empty( techly_option( 'rt_banner_image_attr' ) ) ) {
		$bg_attr = json_decode( techly_option( 'rt_banner_image_attr' ), ARRAY_A );

		if ( ! empty( $bg_attr['position'] ) ) {
			$banner_image_css .= "background-position: {$bg_attr['position']};";
		}
		if ( ! empty( $bg_attr['attachment'] ) ) {
			$banner_image_css .= "background-attachment: {$bg_attr['attachment']};";
		}
		if ( ! empty( $bg_attr['repeat'] ) ) {
			$banner_image_css .= "background-repeat: {$bg_attr['repeat']};";
		}
		if ( ! empty( $bg_attr['size'] ) ) {
			$banner_image_css .= "background-size: {$bg_attr['size']};";
		}
	}

$has_image = isset( $image_url[0] );
if ( in_array( Opt::$single_style, [] ) ) {
	$has_image        = false;
	$banner_image_css = '';
}

$classes = Fns::class_list( [
	'techly-breadcrumb-wrapper',
	$has_image ? 'has-bg' : 'no-bg',
	Opt::$banner_color ? 'has-color' : 'no-color',
	techly_option('rt_banner_color_mode') == 'banner-dark' ? 'banner-dark' : 'banner-light',
] );

/*banner title*/
if ( is_404() ) {
	$techly_title = "Error Page";
}
elseif ( is_search() ) {
	$techly_title = esc_html__( 'Search Results for : ', 'techly' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$techly_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$techly_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'techly' ) );
	}
} elseif (is_post_type_archive('rt-team')) {
	$techly_title  = techly_option('rt_team_banner_archive_title');
} elseif (is_post_type_archive('rt-service')) {
	$techly_title  = techly_option('rt_service_banner_archive_title');
} elseif (is_post_type_archive('rt-project')) {
	$techly_title  = techly_option('rt_project_banner_archive_title');
} elseif (is_tax('rt-team-category')) {
	$techly_title  = single_term_title( '', false );
} elseif (is_tax('rt-service-category')) {
	$techly_title  = single_term_title( '', false );
} elseif (is_tax('rt-project-category')) {
	$techly_title  = single_term_title( '', false );
} elseif ( is_category() ) {
	$techly_title = single_term_title( '', false );
} elseif ( is_archive() ) {
	$techly_title = esc_html__( 'Our Recent Posts', 'techly' );
} elseif ( is_single() ) {
	$techly_title = get_the_title();
} else {
	$techly_title = get_the_title();
}

// if ( class_exists( 'WooCommerce' ) ) {
// 	if ( is_shop() ) {
// 		$techly_title = techly_option('rt_shop_banner_single_title');
// 	} elseif ( class_exists( BuilderFns::class ) && is_singular( BuilderFns::$post_type_tb ) ) {
// 		$techly_title  = get_the_title();
// 	} elseif ( is_product_category() ) {
// 		$category = get_queried_object();
// 		if ( $category ) {
// 			$techly_title = $category->name;
// 		}
// 	} elseif ( is_product() ) {
// 		$techly_title  = get_the_title();
// 	} else {
// 		$techly_title = $techly_title;
// 	}
// }

?>

<div class="<?php echo esc_attr( $classes ) ?>">
	<span class="banner-image" style="<?php echo esc_attr( $banner_image_css ) ?>"></span>
	<div class="container">
		<?php if ( Opt::$has_breadcrumb ) { ?>
			<?php get_template_part( 'views/content', 'breadcrumb' ); ?>
		<?php } ?>
		<?php if ( Opt::$breadcrumb_title == 1 ) { ?>
			<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php techly_html( $techly_title, 'allow_title' ); ?></h1>
			<?php } else if ( is_page() ) { ?>
				<h1 class="entry-title"><?php techly_html( $techly_title , 'allow_title' );?></h1>
			<?php } else { ?>
				<h1 class="entry-title"><?php techly_html( $techly_title , 'allow_title' );?></h1>
			<?php } ?>
		<?php } ?>
	</div>
</div>
