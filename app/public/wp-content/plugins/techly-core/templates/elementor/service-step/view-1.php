<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $link                       string
 * @var $bg_animation               string
 * @var $icon_animation             string
 * @var $image_invert               string
 * @var $icon_type                  string
 * @var $image_icon                 string
 * @var $info_icon                  string
 * @var $info_image_display         string
 * @var $info_image                 string
 * @var $title                      string
 * @var $title_tag                  string
 * @var $service_button             string
 * @var $step_arrow                 string
 * @var $step_icon                  string
 *
 */

$attr = '';
if ( !empty( $link['url'] ) ) {
	$attr  = 'href="' . $link['url'] . '"';
	$attr .= !empty( $link['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $link['nofollow'] ) ? ' rel="nofollow"' : '';
	$attr .= ' aria-label="info link"';
}

?>

<div class="rt-service-step">
    <div class="rt-service-step-box">
		<?php if( $image_icon['id'] || $info_icon ) { ?>
            <div class="icon-holder">
                <div class="service-icon">
                    <?php
                    echo $link['url'] ? '<a ' . $attr . '>' : null;
                    if ( 'image' == $icon_type ) {
                        echo wp_get_attachment_image( $image_icon['id'], 'full' );
                    } else {
                        \Elementor\Icons_Manager::render_icon( $info_icon, [ 'aria-hidden' => 'true' ] );
                    }
                    echo $link['url'] ? '</a>' : null;
                    ?>
                </div>
                <div class="service-content-holder">
                    <?php if ( $title ) { ?>
                        <<?php echo esc_attr( $title_tag ); ?> class="service-step-title"><a <?php echo $attr; ?>><?php techly_html( $title, 'allow_title' );?></a></<?php echo esc_attr( $title_tag ); ?>>
                    <?php } ?>

                    <?php if ( $service_button ) : ?>
                        <div class="service-btn"><p><?php techly_html( $service_button, 'allow_title' );?></p></div>
                    <?php endif; ?>

                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ( $step_arrow == 'yes' ) { ?>
        <div class="step-icon">
            <?php
            \Elementor\Icons_Manager::render_icon( $step_icon, [ 'aria-hidden' => 'true' ] );
            ?>
        </div>
    <?php } ?>

</div>