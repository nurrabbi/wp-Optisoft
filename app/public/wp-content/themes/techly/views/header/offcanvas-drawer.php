<?php
/**
 * Template part for displaying header offcanvas
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */
use RT\Techly\Options\Opt;
use RT\Techly\Helpers\Fns;
$logo_h1 = ! is_singular( [ 'post' ] );
$topinfo = ( techly_option( 'rt_contact_address' ) || techly_option( 'rt_phone' ) || techly_option( 'rt_email' ) || techly_option( 'rt_email' ) ) ? true : false;
?>


<div class="techly-offcanvas-drawer">
	<div class="offcanvas-logo">
		<?php echo techly_site_logo( $logo_h1 ); ?>
		<a class="trigger-icon trigger-off-canvas" href="#">×</a>
	</div>
	<?php if( techly_option( 'rt_about_label' ) || techly_option( 'rt_about_text' ) ) { ?>
	<div class="offcanvas-about offcanvas-address">
		<?php if( techly_option( 'rt_about_label' ) ) { ?><label><?php echo techly_option( 'rt_about_label' ) ?></label><?php } ?>
		<?php if( techly_option( 'rt_about_text' ) ) { ?><p><?php echo techly_option( 'rt_about_text' ) ?></p><?php } ?>
	</div>
	<?php } ?>
	<nav class="offcanvas-navigation" role="navigation">
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'walker'         => new RT\Techly\Core\WalkerNav(),
				)
			);
		endif;
		?>
	</nav><!-- .techly-navigation -->

	<div class="offcanvas-address">
		<?php if( $topinfo ) { ?>
			<?php if( techly_option( 'rt_contact_info_label' ) ) { ?><label><?php echo techly_option( 'rt_contact_info_label' ) ?></label><?php } ?>
			<ul class="offcanvas-info">
				<?php if( techly_option( 'rt_contact_address' ) ) { ?>
					<li><i class="icon-rt-map"></i><?php techly_html( techly_option( 'rt_contact_address' ) , false );?> </li>
				<?php } if( techly_option( 'rt_phone' ) ) { ?>
					<li><i class="icon-rt-phone-2"></i><a href="tel:<?php echo esc_attr( techly_option( 'rt_phone' ) );?>"><?php techly_html( techly_option( 'rt_phone' ) , false );?></a> </li>
				<?php } if( techly_option( 'rt_email' ) ) { ?>
					<li><i class="icon-rt-e-mail"></i><a href="mailto:<?php echo esc_attr( techly_option( 'rt_email' ) );?>"><?php techly_html( techly_option( 'rt_email' ) , false );?></a> </li>
				<?php } if( techly_option( 'rt_website' ) ) { ?>
					<li><i class="icon-rt-language"></i><?php techly_html( techly_option( 'rt_website' ) , false );?></li>
				<?php } ?>
			</ul>
		<?php } ?>

		<?php if( techly_option( 'rt_offcanvas_social' ) ) { ?>
			<div class="offcanvas-social-icon">
				<?php techly_get_social_html( '#555' ); ?>
			</div>
		<?php } ?>
	</div>

</div><!-- .container -->

<div class="techly-body-overlay"></div>
