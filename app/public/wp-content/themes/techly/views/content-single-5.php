<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( techly_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php techly_single_entry_header(); ?>
		<?php techly_post_single_thumbnail(); ?>
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
