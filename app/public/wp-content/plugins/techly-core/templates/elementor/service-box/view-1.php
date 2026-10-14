<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $layout                     string
 * @var $link                       string
 * @var $icon_type                  string
 * @var $service_icon               string
 * @var $title                      string
 * @var $service_image              string
 * @var $thumb_display              string
 * @var $items                      string

 *
 *
 *
 */
use Elementor\Icons_Manager;
   
    $link_attr = '';
    if ( !empty( $item['link']['url'] ) ) {
        $link_attr  = 'href="' . esc_url( $item['link']['url'] ) . '"';
        $link_attr .= !empty( $item['link']['is_external'] ) ? ' target="_blank"' : '';
        $link_attr .= !empty( $item['link']['nofollow'] ) ? ' rel="nofollow"' : '';
        $link_attr .= ' aria-label="' . esc_attr( $item['title'] ) . '"';
    } else {
        $link_attr = 'href="#"';
    }
?>





<div class="row service-box">
    <div class="col-md-6">
        <div class="image-column">
	        <?php
                $i = 0;
                foreach ( $items as $item ) :
                $active_class = ( $i === 0 ) ? 'active' : '';
            ?>
            <div class="col-img <?php echo esc_attr( $active_class ); ?>" data-list-img="<?php echo esc_attr( $i ); ?>" style="overflow: hidden;">
		        <?php echo wp_get_attachment_image( $item['image']['id'], 'medium_large' ); ?>
            </div>
		    <?php  $i++; endforeach; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="list-feature">
            <ul>
	            <?php
                    $i = 0;
                    foreach ( $items as $item ) :
                        $link_attr = '';
                    if ( !empty( $item['link']['url'] ) ) {
                        $link_attr  = 'href="' . esc_url( $item['link']['url'] ) . '"';
                        $link_attr .= !empty( $item['link']['is_external'] ) ? ' target="_blank"' : '';
                        $link_attr .= !empty( $item['link']['nofollow'] ) ? ' rel="nofollow"' : '';
                        $link_attr .= ' aria-label="' . esc_attr( $item['title'] ) . '"';
                    } else {
                        $link_attr = 'href="#"';
                    }
	            ?>
                <li>
                    <a <?php echo $link_attr; ?>  class="list-item" data-list-hover="<?php echo esc_attr($i); ?>">
                        <span class="list-title"><?php \Elementor\Icons_Manager::render_icon( $item['service_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php echo esc_html( $item['title'] ); ?>
                        </span>
                    </a>
                </li>
                <?php $i++; endforeach; ?>
            </ul>
        </div>
    </div>
</div>








