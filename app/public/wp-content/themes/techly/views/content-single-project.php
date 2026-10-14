<?php
/**
 * The template for displaying all single project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package techly
 */

use RT\Techly\Options\Opt;

global $post;
$id = get_the_ID();
$rt_project_text 		= get_post_meta( $id, 'rt_project_text', true );
$rt_project_client 		= get_post_meta( $id, 'rt_project_client', true );
$rt_project_start 		= get_post_meta( $id, 'rt_project_start', true );
$rt_project_end 		= get_post_meta( $id, 'rt_project_end', true );
$rt_project_weblink 	= get_post_meta( $id, 'rt_project_weblink', true );
$rt_project_location 	= get_post_meta( $id, 'rt_project_location', true );
$rt_project_date 		= get_post_meta( $id, 'rt_project_date', true );
$rt_project_pagination = get_post_meta( $id, 'rt_project_pagination', true );


$ratting	 	= get_post_meta( $id, 'rt_project_rating', true );
$rt_project_rating = 5- intval( $ratting );

?>
<div id="post-<?php the_ID();?>" <?php post_class( 'project-single' );?>>
	<div class="project-single-item">
		<div class="project-content-info">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<div class="project-information">
				
				<ul class="info-list">
					<?php if ( techly_option( 'rt_project_cat' ) ) { ?>
						<li><label><?php esc_html_e( 'Category', 'techly' );?>: </label>
							<span class="project-cat"><?php
								$i = 1;
								$term_lists = get_the_terms( get_the_ID(), 'rt-project-category' );
								if( $term_lists ) { foreach ( $term_lists as $term_list ){
									$link = get_term_link( $term_list->term_id, 'rt-project-category' ); ?>
									<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?></span>
						</li>
					<?php } ?>
					<?php if ( !empty( $rt_project_client ) && techly_option( 'rt_project_client' ) ) { ?>
						<li><label><?php esc_html_e( 'Client', 'techly' );?>: </label><?php echo esc_html( $rt_project_client );?></li>
					<?php } if ( !empty( $rt_project_location ) && techly_option( 'rt_project_location' ) ) { ?>
						<li><label><?php esc_html_e( 'Location', 'techly' );?>: </label><?php echo esc_html( $rt_project_location );?></li>
					<?php }
					if ( !empty( $rt_project_date ) && techly_option( 'rt_project_date' ) ) { ?>
						<li><label><?php esc_html_e( 'Date', 'techly' );?>: </label><?php echo esc_html( $rt_project_date );?></li>
					<?php }
					if ( !empty( $rt_project_start ) && techly_option( 'rt_project_start' ) ) { ?>
						<li><label><?php esc_html_e( 'Start Date', 'techly' );?>: </label><?php echo esc_html( $rt_project_start );?></li>
					<?php } if ( !empty( $rt_project_end ) && techly_option( 'rt_project_end' ) ) { ?>
						<li><label><?php esc_html_e( 'Handover', 'techly' );?>: </label><?php echo esc_html( $rt_project_end );?></li>
					<?php } if ( !empty( $rt_project_weblink ) && techly_option( 'rt_project_weblink' ) ) { ?>
						<li><label><?php esc_html_e( 'Web Link', 'techly' );?>: </label><?php echo esc_html( $rt_project_weblink );?></li>
					<?php } ?>

					<?php if( techly_option( 'rt_project_rating' ) ) { ?>
						<?php if( $ratting != -1) { ?>
							<li><label><?php esc_html_e( 'Rating', 'techly' );?>: </label>
								<ul class="rating">
									<?php for ($i=0; $i < $ratting; $i++) { ?>
										<li class="star-rate"><i class="icon-rt-star" aria-hidden="true"></i></li>
									<?php } ?>
									<?php for ($i=0; $i < $rt_project_rating; $i++) { ?>
										<li><i class="icon-rt-star" aria-hidden="true"></i></li>
									<?php } ?>
								</ul>
							</li>
						<?php } } ?>
				</ul>
			</div>
		</div>
		<div class="project-single-img">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-thumbnail-wrap single-post-thumbnail">
					<figure class="post-thumbnail">
						<?php the_post_thumbnail('large-medium'); ?>
					</figure><!-- .post-thumbnail -->
				</div>
			<?php } ?>
		</div>
		<div class="project-item-wrap">
			<div class="project-item-content">
				<div class="project-content">
					<?php if( ! Opt::$breadcrumb_title == 1 ) { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
					<?php the_content();?>
				</div>
			</div>

			<?php if ( techly_option('rt_project_pagination') == '1' ) { 
				$prev_text = techly_option('project_prev_text', 'Previous Project');
				$next_text = techly_option('project_next_text', 'Next Project');
			?>
				<div class="project-pagination">
					<div class="prev-project">
						<?php previous_post_link('%link', '<i class="icon-rt-right-arrow"></i> ' . esc_html($prev_text)); ?>
					</div>
					<div class="next-project">
						<?php next_post_link('%link', esc_html($next_text) . ' <i class="icon-rt-left-arrow"></i>'); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
