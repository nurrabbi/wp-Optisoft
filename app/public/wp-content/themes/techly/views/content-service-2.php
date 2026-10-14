<?php
/**
 * Template part for displaying service
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package techly
 */

$id = get_the_ID();
$rt_service_icon= get_post_meta( $id, 'rt_service_icon', true );
$icon_class 			= '' ;
if ( !empty( $rt_service_icon ) ) {
	$icon_class 		= 'service-item-icon';
} else {
	$icon_class 		= 'service-item-image';
}

$service_icon_bg    = get_post_meta( $id, 'rt_service_color', true );
$service_bg = "";
if( !empty( $service_icon_bg ) ) {
	$service_bg = 'style="color: ' . $service_icon_bg . '"';
}

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), techly_option( 'rt_service_excerpt_limit' ), '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="service-item <?php echo esc_attr( $icon_class ); ?>">
		<?php if (!empty( $rt_service_icon )  ) { ?>
			<div class="service-icon" <?php echo wp_specialchars_decode( esc_attr( $service_bg ), ENT_COMPAT ); ?>><i class="<?php techly_html( $rt_service_icon , false );?>"></i></div>
		<?php } ?>
		<div class="service-content">
			<h2 class="service-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( techly_option( 'rt_service_ar_excerpt' ) ) { ?>
				<p><?php techly_html( $content , false ); ?></p>
			<?php } ?>
			<?php if ( techly_option( 'rt_service_read_more' ) ) { ?>
				<div class="rt-button">
					<a class="btn button-1" href="<?php the_permalink();?>">
						<span class="btn-content-wrap">
							<span class="rt-button-icon">
								<span class="btn-icon-wrapper">
									<span class="btn-icon">
										<i class="icon-rt-guidance"></i>
									</span>
									<span class="btn-hover-icon">
										<i class="icon-rt-guidance"></i>
									</span>
								</span>
							</span>
						</span>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</article>
