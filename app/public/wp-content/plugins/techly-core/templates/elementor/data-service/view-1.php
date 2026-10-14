<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $layout                 string
 * @var $list_items             string
 * @var $animation              string
 * @var $animation_effect       string
 * @var $delay                  string
 * @var $duration               string
 * @var $title_tag              string
 * @var $image                  string
 
 */


?>

<div class="rt-data-service rt-data-service-<?php echo esc_attr( $layout ); ?>">
    <div class="data-service-item">
        <?php 
        $ade = $delay; 
        $adu = $duration; 
        $i   = 1;

        foreach ( $list_items as $item ) {

            // URL attributes
            $attr = '';
            if ( !empty( $item['url']['url'] ) ) {
                $attr  = 'href="' . esc_url( $item['url']['url'] ) . '"';
                $attr .= !empty( $item['url']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $item['url']['nofollow'] ) ? ' rel="nofollow"' : '';
                $attr .= ' aria-label="info link"';
            }

            // Even/Odd
            $item_parity = ( $i % 2 == 0 ) ? 'even' : 'odd';

            // Image URL (safe check)
            $image_url = !empty( $item['image']['url'] ) ? $item['image']['url'] : '';
            ?>
            
            <div class="list-item <?php echo $service_image_animation? 'hover-reveal-item' : ''; ?> <?php echo esc_attr( $item_parity ); ?> <?php echo esc_attr( $item_parity ); ?> <?php echo esc_attr( $animation ); ?> <?php echo esc_attr( $animation_effect ); ?>" 
                data-wow-delay="<?php echo esc_attr( $ade ); ?>ms" 
                data-wow-duration="<?php echo esc_attr( $adu ); ?>ms">
                <div class="data-service-content">
                    <?php if ( !empty( $item['num'] ) ) : ?>
                        <div class="rt-number">
                            <?php echo techly_html( $item['num'], 'allow_title' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( !empty( $item['title'] ) ) : ?>
                        <<?php echo esc_attr( $title_tag ); ?> class="rt-title">
                            <a class="link" <?php echo $attr; ?>>
                                <?php echo techly_html( $item['title'], 'allow_title' ); ?>
                            </a>
                        </<?php echo esc_attr( $title_tag ); ?>>
                    <?php endif; ?>
                </div>
                <div class="service-bg-image" data-bg-image="<?php echo esc_url( $image_url ); ?>"></div>
            </div>
        <?php 
            $ade += 200; 
            $i++;
        } ?>
    </div>
</div>
