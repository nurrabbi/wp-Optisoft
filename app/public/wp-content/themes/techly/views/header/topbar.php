<?php
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

use RT\Techly\Options\Opt;

if(! Opt::$has_top_bar ) {
	return;
}
$topinfo = ( techly_option( 'rt_contact_address' ) || techly_option( 'rt_phone' ) || techly_option( 'rt_email' ) || techly_option( 'rt_website' ) ) ? true : false;
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

<div class="techly-topbar">
	<div class="topbar-container rt-container<?php echo esc_attr($_fullwidth) ?>">
		<div class="topbar-row d-flex flex-wrap column-gap-30 align-items-center">
			<?php if( $topinfo ) { ?>
			<div class="topbar-left d-flex flex-wrap align-items-center">
				<?php if( techly_option( 'rt_topbar_address' ) && techly_option( 'rt_contact_address' )  ) { ?>
					<span><i class="icon-rt-location"></i><?php techly_html( techly_option( 'rt_contact_address' ) , false );?></span>
				<?php } if( techly_option( 'rt_topbar_email' ) && techly_option( 'rt_email' ) ) { ?>
					<span><i class="icon-rt-mail"></i><a href="mailto:<?php echo esc_attr( techly_option( 'rt_email' ) );?>"><?php techly_html( techly_option( 'rt_email' ) , false );?></a></span>
				<?php } if( techly_option( 'rt_topbar_website' ) && techly_option( 'rt_website' ) ) { ?>
					<span><i class="icon-tag"></i><?php techly_html( techly_option( 'rt_website' ) , false );?></span>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( techly_option( 'rt_topbar_social' ) ) { ?>
			<div class="topbar-right d-flex align-items-center">
				<?php if( techly_option( 'rt_topbar_phone' ) && techly_option( 'rt_phone' ) ) { ?>
				<span><i class="icon-rt-phone"></i><a href="tel:<?php echo esc_attr( techly_option( 'rt_phone' ) );?>"><?php techly_html( techly_option( 'rt_phone' ) , false );?></a></span>
				<?php } ?>
				<div class="social-icon">
					<?php if( techly_option( 'rt_follow_us_label' ) ) { ?><label><?php echo techly_option( 'rt_follow_us_label' ) ?></label><?php } ?>
					<?php techly_get_social_html( '#555' ); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
