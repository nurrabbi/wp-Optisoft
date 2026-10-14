
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $display_arrow              string
 * @var $display_pagination         string
 * @var $layout                     string
 * @var $swiper_data                string
 * @var $items                      string
 * @var $title_display              string
 * @var $alignment                  string
 * @var $arrow_hover_visibility     string
 * @var $animation                  string
 * @var $animation_effect           string
 * @var $delay                      string
 * @var $duration                   string
 * @var $title                      string
 * @var $content                    string
 * @var $service_image              string
 * @var $rt_icon                    string
 */
use Elementor\Icons_Manager;


?>
<div class="rt-service-slider rt-service-slider-<?php echo esc_attr( $layout ) ?>">
    <div class="rt-swiper-slider" data-xld ="<?php echo esc_attr( $swiper_data );?>">
        <div class="swiper-wrapper">
            <?php $ade = $delay; $adu = $duration; ?>
            <?php foreach ( $items as $item ): ?>
            <?php
                $attr = '';
                if ( !empty( $item['link']['url'] ) ) {
                $attr  = 'href="' . $item['link']['url'] . '"';
                $attr .= !empty( $item['url']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $item['url']['nofollow'] ) ? ' rel="nofollow"' : '';
                }
            ?>
            <div class="swiper-slide <?php echo esc_attr( $animation );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $ade );?>ms" data-wow-duration="<?php echo esc_attr( $adu );?>ms">
                <div class="slider-item <?php if( !empty( $alignment ) ) { ?><?php echo esc_attr( $alignment ) ?><?php } ?>">
                    <div class="rt-service-slider-box <?php echo $service_tech_box_animation? 'tech-box-item' : ''; ?>">
                        <div class="service-thumb-wrap">
                            <?php if ( $item['service_image']['id'] && $thumb_display ) {
                            echo "<div class='service-thumbs'>";
                            echo wp_get_attachment_image( $item['service_image']['id'], 'full' );
                            echo "</div>";

                        } ?>
                        <div class="rt-icon">
                            <?php if ( !empty( $item['link']['url'] ) ): ?>
                                <a <?php echo $attr; ?>>
                                    <?php Icons_Manager::render_icon( $item['rt_icon'] ); ?>
                                </a>
                            <?php else: ?>
                                <?php Icons_Manager::render_icon( $item['rt_icon'] ); ?>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="service-content">
                            <h3 class="slider-title">
                                <?php if ( !empty( $item['link']['url'] ) ): ?>
                                    <a <?php echo $attr; ?>>
                                        <?php echo esc_html( $item['title'] ); ?>
                                    </a>
                                <?php else: ?>
                                    <?php echo esc_html( $item['title'] ); ?>
                                <?php endif; ?>
                            </h3>
                            <p><?php echo esc_html( $item['content'] ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php $ade = $ade + 200; $adu = $adu + 0; endforeach; ?>
        </div>
        <?php if ( $display_arrow == 'yes' ) { ?>
            <div class="swiper-navigation">
                <div class="swiper-button swiper-button-prev"><i class="icon-rt-right-arrow-2"></i></div>
                <div class="swiper-button swiper-button-next active"><i class="icon-rt-right-arrow-2"></i></div>
            </div>
        <?php } ?>
        <?php if ( $display_pagination == 'yes' ) { ?>
            <div class="swiper-pagination"></div>
        <?php } ?>
    </div>
</div>