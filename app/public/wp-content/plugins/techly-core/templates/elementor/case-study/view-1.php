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
 * @var $button_icon            string
 * @var $button_text            string
 * @var $read_more_display      string
 * @var $project_thumbnail_size string
 * @var $line_display           string
 */

use Elementor\Icons_Manager;

?>

<div class="rt-case-study case-study-<?php echo esc_attr( $layout );?>">
	<div class="case-item">
		<?php $ade = $delay; $adu = $duration;
		foreach( $list_items as $item ) {
		$attr = '';
		if ( !empty( $item['url']['url'] ) ) {
			$attr  = 'href="' . $item['url']['url'] . '"';
			$attr .= !empty( $item['url']['is_external'] ) ? ' target="_blank"' : '';
			$attr .= !empty( $item['url']['nofollow'] ) ? ' rel="nofollow"' : '';
			$attr .= ' aria-label="info link"';
		}
		?>
		<div class="list-item <?php echo esc_attr( $animation );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $ade );?>ms" data-wow-duration="<?php echo esc_attr( $adu );?>ms">
            <div class="left-side-content">
	            <?php if( !empty( $item['image']['id'] ) ) { ?>
                    <div class="service-img">
			            <?php echo wp_get_attachment_image( $item['image']['id'], 'full') ;?>
                    </div>
	            <?php } ?>
                <div class="content-wrap">
		            <?php if( $item['subtitle'] ) { ?><div class="rt-subtitle"><?php echo techly_html( $item['subtitle'], 'allow_title' );?></div><?php } ?>
		            <?php if( $item['title'] ) { ?><<?php echo esc_attr( $title_tag ); ?> class="rt-title"><a class="link" <?php echo $attr; ?>><?php echo techly_html( $item['title'], 'allow_title' );?></a></<?php echo esc_attr( $title_tag ); ?>><?php } ?>
                </div>
            </div>
            <?php if ( $line_display ) { ?>
                <div class="rt-line"></div>
            <?php } ?>

            <div class="right-side-content">
                <?php if( $item['content'] ) { ?><div class="rt-content"><?php echo techly_html( $item['content'], 'allow_title' );?></div><?php } ?>
                <?php if( $read_more_display == 'yes' ) { ?>
                    <div class="rt-button">
                        <a class="btn button-2" <?php echo $attr; ?>>
                            <span class="btn-content-wrap">
                            <span class="rt-button-icon">
                                <span class="btn-icon-wrapper">
                                    <span class="btn-icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['button_icon'] ); ?>
                                    </span>
                                    <span class="btn-hover-icon">
                                       <?php \Elementor\Icons_Manager::render_icon( $item['button_icon'] ); ?>
                                    </span>
                                </span>
                            </span>
                            <span class="button-text"><?php echo esc_html( $item['button_text'] ); ?></span>
                        </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
	    </div>
	    <?php $ade = $ade + 200; $adu = $adu + 0; } ?>
    </div>
</div>