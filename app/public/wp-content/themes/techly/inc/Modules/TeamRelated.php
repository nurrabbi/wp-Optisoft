<?php
/**
 * Template part for single team related
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techly
 */

namespace RT\Techly\Modules;
use RT\Techly\Helpers\Fns;
class TeamRelated {
	public static function rt_team_related() {
		$post_id = get_the_id();
		$current_post = array( $post_id );
		$related_item_number = techly_option( 'rt_team_related_limit' );

		# Making ready to the Query ...
		$query_type = techly_option( 'rt_team_related_query' );

		$args = array(
			'post_type'				 => 'rt-team',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_item_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( techly_option( 'rt_team_related_sort' ) ){

			$post_order = techly_option( 'rt_team_related_sort' );

			if( $post_order == 'rand' ){
				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){
				$args['orderby']  = 'meta_value_num';
			}
			elseif( $post_order == 'popular' ){
				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){
				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){
				$args['orderby'] = '';
				$args['order']   = '';
			}
		}

		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}
				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else {
			$terms = get_the_terms( $post_id, 'rt-team-category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
				$port_cat_links = array();
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
				$args['tax_query'] = array (
					array (
						'taxonomy' => 'rt-team-category',
						'field'    => 'ID',
						'terms'    => $port_cat_links,
					)
				);
			}
		}

		# Get the posts ----------
		$related_query = new \WP_Query( $args );
		if( $related_query->have_posts() && techly_option( 'rt_team_related' ) ) { ?>
			<div class="rt-team-default rt-team-multi-layout-1 rt-related-team">
				<div class="container">
					<h2 class="related-title"><?php techly_html( techly_option( 'rt_team_related_title' ) , 'allow_title' );?></h2>
					<div class="row g-4">
						<?php while ( $related_query->have_posts() ) {
						$related_query->the_post();

							$id = get_the_ID();
							$designation   	= get_post_meta( $id, 'rt_team_designation', true );
							$socials        = (array) get_post_meta( $id, 'rt_team_socials', true );
							$socials_fields = Fns::get_team_socials();

							$content = get_the_content();
							$content = apply_filters( 'the_content', $content );
							$content = wp_trim_words( get_the_excerpt(), techly_option( 'rt_team_excerpt_limit' ), '' );
						?>
						<div class="col-sm-6 col-xl-3 col-lg-4" >
							<article id="post-<?php the_ID(); ?>">
								<div class="team-item">
									<div class="team-content-wrap">
										<div class="team-thumbs">
											<?php techly_post_thumbnail('full'); ?>
											<?php if ( techly_option( 'rt_team_ar_social' ) ) { ?>
											<ul class="team-social">
												<li>
													<a class="hover-icon social-link" target="_blank" href="#"><i class="icon-rt-share"></i></a>
													<ul class="rt-team-social-dropdown">
														<?php foreach ( $socials as $key => $value ): ?>
															<?php if ( !empty( $value ) ): ?>
																<li class="social-item">
																	<a class="social-link" target="_blank" href="<?php echo esc_url( $value );?>"><i class="<?php echo esc_attr( $socials_fields[$key]['icon'] );?>" aria-hidden="true"></i></a>
																</li>
															<?php endif; ?>
														<?php endforeach; ?>
													</ul>
												</li>
											</ul>
										<?php } ?>
										</div>
										<div class="team-content">
											<div class="team-info">
												<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
												<?php if ( !empty($designation) && techly_option( 'rt_team_ar_designation' ) ) { ?>
													<div class="team-designation"><?php echo esc_html( $designation );?></div>
												<?php } if ( techly_option( 'rt_team_ar_excerpt' ) ) { ?>
													<p><?php techly_html( $content , false ); ?></p>
												<?php } ?>
											</div>
											
										</div>
									</div>
								</div>
							</article>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php }
		wp_reset_postdata();
	}
}
?>
