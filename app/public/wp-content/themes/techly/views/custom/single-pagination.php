<?php
/**
 * Template part for single thumbn pagination
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

$previous = get_previous_post();
$next     = get_next_post();
$cols     = ( $previous && $next ) ? 'two-cols' : 'one-cols';
?>
<?php if ( techly_option( 'rt_single_navigation_visibility' ) ) { ?>
<div class="single-post-pagination <?php echo esc_attr( $cols ) ?>">
	<?php if ( $previous ):
		$prev_image = get_the_post_thumbnail_url( $previous, 'thumbnail' ); ?>

		<div class="post-navigation prev">

			<?php echo techly_get_svg( 'arrow-right', '180' ); ?>
			<div class="pagination-content">
				<a href="<?php echo esc_url( get_permalink( $previous ) ); ?>" class="nav-title">
					<?php esc_html_e( 'Previous Post: ', 'techly' ) ?>
				</a>

				<a href="<?php echo esc_url( get_permalink( $previous ) ); ?>" class="link pg-prev">
					<p class="item-title"><?php echo get_the_title( $previous ); ?></p>
				</a>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $next ):
		$next_image = get_the_post_thumbnail_url( $next, 'thumbnail' ); ?>

		<div class="post-navigation next text-right">

			<div class="pagination-content">
				<a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="nav-title">
					<?php esc_html_e( 'Next Post: ', 'techly' ) ?>
				</a>
				<a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="link pg-next">
					<p class="item-title"><?php echo get_the_title( $next ); ?></p>
				</a>
			</div>
			<?php echo techly_get_svg( 'arrow-right' ); ?>
		</div>
	<?php endif; ?>
</div>
<?php } ?>
