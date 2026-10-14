<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use RT\Techly\Helpers\Fns;
use RT\Techly\Options\Opt;
use RT\Techly\Modules\Pagination;

get_header();

$post_classes = "";
if ( Opt::$layout == 'right-sidebar' || Opt::$layout == 'left-sidebar' ) {
	$post_classes = 'col-sm-6 col-lg-4';
} else {
	$post_classes = 'col-sm-6 col-xl-4 col-lg-4';
}

if ( techly_option( 'rt_team_style' ) == 'default' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-1";
} elseif ( techly_option( 'rt_team_style' ) == '2' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-2";
} else {
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-1";
}
$content_columns = Fns::content_columns();

?>

<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $team_archive_layout );?> <?php echo esc_attr( $content_columns ); ?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
						<div class="row g-4 item-parent">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="<?php echo esc_attr( $post_classes );?> item">
									<?php get_template_part( 'views/content-team', techly_option( 'rt_team_style' ) ); ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php else:?>
						<?php get_template_part( 'views/content', 'none' );?>
					<?php endif;?>
					<?php Pagination::pagination(); ?>
				</main>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
