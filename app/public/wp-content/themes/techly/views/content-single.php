<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

use RT\Techly\Options\Opt;

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( techly_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php if ( ! in_array( Opt::$single_style, [ '2', '3', '4', '5' ] ) ) : ?>
			<?php techly_post_single_thumbnail(); ?>
		<?php endif; ?>
		<div class="entry-wrapper">
			<?php techly_single_entry_header(); ?>
				<div class="entry-content">
					<?php techly_entry_content() ?>
				</div>
			<?php techly_post_single_video(); ?>
			<?php techly_entry_footer(); ?>
			<?php techly_entry_profile(); ?>
		</div>
	</div>
</article>
