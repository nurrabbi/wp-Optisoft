<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

$meta_list = techly_option( 'rt_single_meta', '', true );
$meta      = techly_option( 'rt_blog_above_meta_visibility' );
$meta      = techly_option( 'rt_single_above_meta_style' );
if ( techly_option( 'rt_single_above_meta_visibility' ) ) {
	$category_index = array_search( 'category', $meta_list );
	unset( $meta_list[ $category_index ] );
}
?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( techly_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<div class="entry-wrapper">
			<div class="entry-content">
				<?php techly_entry_content() ?>
			</div>
			<?php techly_post_single_video(); ?>
			<?php techly_entry_footer(); ?>
			<?php techly_entry_profile(); ?>
		</div>
	</div>
</article>
