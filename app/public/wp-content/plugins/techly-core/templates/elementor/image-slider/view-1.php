<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $layout                     string
 * @var $image                      string
 * @var $shape_animation           string

 */




$slider_animation1 = ( $image_slider_animation1 == 'yes' ) ? 'slider_view_1' : '';
$slider_animation2 = ( $image_slider_animation2 == 'yes' ) ? 'slider_view_2' : '';


?>

<div class="rt-image-slider-layout rt-image-slider-<?php echo esc_attr( $layout ) ?>">
	<?php if( $layout == 'layout-1' ) { ?>
        <div class="tech-cta-image-wrap">
            <div class="image-wrap-1 <?php echo esc_attr( $slider_animation1); ?>">
                <?php foreach( $items as $item ): ?>
                    <?php if( !empty( $item['image']['id'] ) ) { ?>
                        <div class="cta-img-1">
                            <?php echo wp_get_attachment_image( $item['image']['id'], 'full') ;?>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <?php if(!empty($images)) : ?>
                <div class="image-wrap-2 <?php echo esc_attr( $slider_animation2); ?>">
                    <?php foreach( $images as $image ): ?>
                        <?php if( !empty( $image['image']['id'] ) ) { ?>
                            <div class="cta-img-1">
                                <?php echo wp_get_attachment_image( $image['image']['id'], 'full') ;?>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php } ?>
    <?php if( $layout == 'layout-2' ) { ?>
        <div class="tech-cta-image-wrap">
            <div class="image-wrap-1 <?php echo esc_attr( $slider_animation1); ?>">
                <?php foreach( $items as $item ): ?>
                    <?php if( !empty( $item['image']['id'] ) ) { ?>
                        <div class="cta-img-1">
                            <?php echo wp_get_attachment_image( $item['image']['id'], 'full') ;?>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <?php if(!empty($images)) : ?>
                <div class="image-wrap-2 <?php echo esc_attr( $slider_animation2); ?>">
                    <?php foreach( $images as $image ): ?>
                        <?php if( !empty( $image['image']['id'] ) ) { ?>
                            <div class="cta-img-1">
                                <?php echo wp_get_attachment_image( $image['image']['id'], 'full') ;?>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php } ?>
</div>