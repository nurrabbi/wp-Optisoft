<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $layout                     string
 * @var $main_image                 string
 * @var $title1                     string
 * @var $title2                     string
 * @var $title3                     string
 * @var $position                   string
 * @var $z_index                    string
 * @var $animation                  string
 * @var $duration                   string
 * @var $alignment                  string
 * @var $animations                 string
 * @var $animation_effect           string
 * @var $delay                      string
 * @var $durations                  string
 * @var $image_shape                string
 * @var $image_shape_style          string
  * @var $shape_animation           string
 *
 * @var $scroll_animation           string
 * @var $range_one                  string
 * @var $range_two                  string
 * @var $x_range                    string
 * @var $y_range                    string
 *
 */

$attr = '';
if ( !empty( $link['url'] ) ) {
	$attr  = 'href=' . $link['url'] . '';
	$attr  = 'href=' . esc_url( $link['url'] );
	$attr .= !empty( $link['is_external'] ) ? ' target=_blank' : '';
	$attr .= !empty( $link['nofollow'] ) ? ' rel=nofollow' : '';
}

$shape_animation = ( $image_shape_animation == 'yes' ) ? 'ty-shape-circle' : '';
$zoom_animation = ( $image_zoom_animation == 'yes' ) ? 'rt-image-zoom' : '';
$clip_animation = ( $image_clip_animation == 'yes' ) ? 'rt-image-anim' : '';
$rotate_animation = ( $image_rotate_animation == 'yes' ) ? 'rt-image-rotate' : '';
$sidebar_animation = ( $image_sidebar_animation == 'yes' ) ? 'right_side_view_1' : '';

$range_one = ( $scroll_animation == 'yes' ) ? $range_one : '';
$range_two = ( $scroll_animation == 'yes' ) ? $range_two : '';
?>

<div class="rt-image-layout rt-image-<?php echo esc_attr( $layout ) ?> <?php if( !empty( $alignment ) ) { ?><?php echo esc_attr( $alignment ) ?><?php } ?>"  data-parallax='{"<?php echo esc_attr( $x_range );?>" : <?php echo esc_attr( $range_one );?>, "<?php echo esc_attr( $y_range );?>" : <?php echo esc_attr( $range_two );?>}'>

	<?php if( $layout == 'layout-1' ) { ?>
        <div class="rt-image <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms">

	            <?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
		            <?php endif ?>
		            <?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
		            <?php if( $attr ) : ?>
                </a>
                <?php endif ?>
        </div>

    <?php } ?>


	<?php if( $layout == 'layout-2' ) { ?>
        <div class="rt-image <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms" style="position: <?php echo esc_attr( $position ); ?>; z-index: <?php echo esc_attr( $z_index ); ?>">
            <span class="rt-img <?php echo esc_attr( $animation ); ?>">
                <?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
                    <?php endif ?>
                    <?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
                    <?php if( $attr ) : ?>
                </a>
                <?php endif ?>
            </span>
        </div>
	<?php } ?>

	<?php if( $layout == 'layout-3' ) { ?>
        <div class="rt-image  <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms">
            <div class="<?php echo esc_attr( $shape_animation); ?>">
				<?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
					<?php endif ?>
					<?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
					<?php if( $attr ) : ?>
                </a>
			    <?php endif ?>
            </div>
        </div>
	<?php } ?>

    <?php if( $layout == 'layout-4' ) { ?>
        <div class="rt-image <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms">
            <div class="<?php echo esc_attr( $zoom_animation); ?>">
	            <?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
		            <?php endif ?>
		            <?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
		            <?php if( $attr ) : ?>
                </a>
                <?php endif ?>
            </div>
        </div>

    <?php } ?>
    <?php if( $layout == 'layout-5' ) { ?>
        <div class="rt-image <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms">
            <div class="<?php echo esc_attr( $clip_animation); ?>">
	            <?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
		            <?php endif ?>
		            <?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
		            <?php if( $attr ) : ?>
                </a>
                <?php endif ?>
            </div>
        </div>
    <?php } ?>
    <?php if( $layout == 'layout-6' ) { ?>
        <div class="rt-image <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms">
            <div class="<?php echo esc_attr( $rotate_animation); ?>">
	            <?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
		            <?php endif ?>
		            <?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
		            <?php if( $attr ) : ?>
                </a>
                <?php endif ?>
            </div>
        </div>
    <?php } ?>
    <?php if( $layout == 'layout-7' ) { ?>
        <div class="rt-image <?php echo esc_attr( $animations );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $delay );?>ms" data-wow-duration="<?php echo esc_attr( $durations );?>ms">
            <div class="<?php echo esc_attr( $sidebar_animation); ?>">
	            <?php if( $attr ) : ?>
                <a <?php echo esc_attr($attr) ?> aria-label="image">
		            <?php endif ?>
		            <?php echo wp_get_attachment_image( $main_image['id'], 'full' ); ?>
		            <?php if( $attr ) : ?>
                </a>
                <?php endif ?>
            </div>
        </div>
    <?php } ?>
</div>