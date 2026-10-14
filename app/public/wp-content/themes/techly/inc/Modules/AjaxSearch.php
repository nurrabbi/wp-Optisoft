<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * Ajax Search
 */
namespace RT\Techly\Modules;
use RT\Techly\Traits\SingletonTraits;

class AjaxSearch{

	use SingletonTraits;
	function __construct(){
		add_action('wp_ajax_rt_data_fetch', [$this, 'rt_data_fetch']);
		add_action('wp_ajax_nopriv_rt_data_fetch', [$this, 'rt_data_fetch']);
	}
	public function rt_data_fetch(){
		// Checking nonce.
		check_ajax_referer( 'rt-techly-nonce', 'security' );
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 8,
			's' => esc_attr( $_POST['keyword'] ?? '' ),
			'searchkey' => esc_attr( $_POST['searchkey'] ?? '' ),
		);

		$the_query = new \WP_Query( $args );
		if( $the_query->have_posts() ) :
			while( $the_query->have_posts() ):
				$the_query->the_post();?>
				<div class="rt-search-result-list">
					<a class="rt-top-title" href="<?php echo esc_url( get_permalink() ); ?>"><i class="icon-rt-arrow-right-1"></i><?php the_title();?>
					</a>
					<ul class="rt-search-breadcrumb">
						<?php
						$term_lists = get_the_terms( get_the_ID(), 'category' );
						if( $term_lists ) {
							foreach ( $term_lists as $term_list ){
								$link = get_term_link( $term_list->term_id, 'category' ); ?>
								<li><a href="<?php echo esc_url( $link ); ?>">
									<?php echo esc_html( $term_list->name ); ?></a></li><?php
							}
						}
						$terms = get_terms( array('taxonomy' => 'category' ) );
						$category_dropdown = array(  0 => __( 'All Category', 'techly' ) );
						foreach ( $terms as $category ) {
							$category_dropdown[$category->slug] = $category->name;
						}
						?>
						<li><i class="icon-rt-chevron-right"></i> <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?></a></li>
					</ul>
				</div>
			<?php endwhile;
			wp_reset_postdata();
		else: ?>
			<h3 class="rt-no-found"><?php esc_html_e('No Results Found', 'techly'); ?></h3>
		<?php endif;
		die();
	}

}
