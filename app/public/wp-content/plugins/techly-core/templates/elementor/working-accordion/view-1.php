
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $display_arrow              string
 * @var $display_pagination         string
 * @var $thumb_display              string
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
 *
 * @var $title                      string
 * @var $image_icon                 string
 * @var $info_icon                  string
 * @var $icon_type                  string
 * @var $sub_title                  string
 * @var $show_read_more_btn         string
 * @var $read_more_btn_text         string
 * @var $button_icon                string
 * @var $info_image_display         string
 * @var $info_image                 string
 * @var $btn_display                string
 * @var $icon_display               string
 */
use Elementor\Icons_Manager;


?>
<div class="rt-working-accordion rt-working-accordion-<?php echo esc_attr( $layout ) ?>">
    <div class="rt-working-accordion-item">
        <?php $ade = $delay; $adu = $duration; $i = 0; ?>
            <?php foreach ( $items as $item ): ?>
                <?php
                    $active_class = ($i === 0) ? 'active' : '';
                ?>
            <?php
                $attr = '';
                if ( !empty( $item['link']['url'] ) ) {
                $attr  = 'href="' . $item['link']['url'] . '"';
                $attr .= !empty( $item['url']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $item['url']['nofollow'] ) ? ' rel="nofollow"' : '';
                }
            ?>
            <div class="working-accordion-box accordion-item <?php echo $active_class; ?> <?php echo esc_attr( $animation );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $ade );?>ms" data-wow-duration="<?php echo esc_attr( $adu );?>ms">
                <div class="working-content">
                    <?php if ( $item['title'] && $title_display ) { ?>
                    <h3 class="working-title"><?php echo esc_html( $item['title'] ); ?></h3>
                    <?php } ?>
                    <?php if ( $content_display ) { ?><p><?php echo esc_html( $item['content'] ); ?></p><?php } ?>
                    <?php if ($btn_display) { ?>
                        <div class="rt-button">
                            <a class="btn button-2" <?php echo $attr; ?>>
                                <span class="btn-content-wrap">
                                    <span class="rt-button-icon">
                                        <span class="btn-icon-wrapper">
                                            <span class="btn-icon">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['button_icon'] ) ; ?>
                                            </span>
                                            <span class="btn-hover-icon">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['button_icon'] ) ; ?>
                                            </span>
                                        </span>
                                    </span> 
                                    <span class="button-text"><?php echo esc_html( $item['read_more_btn_text']); ?></span>
                                </span>
                            </a>
                        </div>
                    <?php }?>
                </div>
                <?php if ( $item['working_image']['id'] && $thumb_display ) {
                    echo "<div class='working-thumb'>";
                    echo wp_get_attachment_image( $item['working_image']['id'], 'full' );
                    echo "</div>";
                } ?>
            </div>
        <?php $ade = $ade + 200; $adu = $adu + 0; $i++; endforeach; ?>
    </div>
</div>
