<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $layout             string
 * @var $title              string
 * @var $title_tag          string
 * @var $process_list       string
 * @var $animation          string
 * @var $animation_effect   string
 * @var $delay              string
 * @var $duration           string
 * @var $icon_display       string
 * @var $process_img       	string
 */

use Elementor\Icons_Manager;
?>

<div class="rt-working-process rt-process-<?php echo esc_attr( $layout ); ?>">
	<div class="rt-process-box">
		<div class="process-item-img <?php echo $rocket_animation? 'shake-launch-animation' : ''; ?>">
			<?php echo wp_get_attachment_image( $process_img['id'], 'full' ); ?>
		</div>
		<ul class="rt-process-list">
			<?php $ade = $delay; $adu = $duration;
			foreach($process_list as $item) {
			$attr = '';
			if ( !empty( $item['url']['url'] ) ) {
				$attr  = 'href="' . $item['url']['url'] . '"';
				$attr .= !empty( $item['url']['is_external'] ) ? ' target="_blank"' : '';
				$attr .= !empty( $item['url']['nofollow'] ) ? ' rel="nofollow"' : '';
			}

			?>
			<li class="process-item <?php if( !empty( $alignment ) ) { ?><?php echo esc_attr( $alignment );?><?php } ?> elementor-repeater-item-<?php echo esc_attr($item['_id']) ?> <?php echo esc_attr( $animation );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $ade );?>ms" data-wow-duration="<?php echo esc_attr( $adu );?>ms">
				<div class="process-content">
					<?php if( $icon_display == 'yes' ) { ?><div class="process-icon"><?php Icons_Manager::render_icon( $item['rt_icon'] );?></div><?php } ?>
					<?php if( $item['title'] ) { ?><<?php echo esc_attr( $title_tag ) ?> class="rt-title"><a class="title-link" <?php echo $attr; ?>><?php echo techly_html( $item['title'], 'allow_title' );?></a></<?php echo esc_attr( $title_tag ) ?>><?php } ?>
				</div>
			</li>
			<?php $ade = $ade + 200; $adu = $adu + 0; } ?>
		</ul>
		
	</div>	
</div>

