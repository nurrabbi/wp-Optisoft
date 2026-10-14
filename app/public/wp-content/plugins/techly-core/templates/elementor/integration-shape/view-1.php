<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $shape_icon                 string
 * @var $items                      string
 * @var $item                      string
 * @var $list_icon                 string
 * @var $list_text                 string
 *
 */

use Elementor\Icons_Manager;

?>
<div class="rt-integration-shape trigger-section reveal" id="revealSection">
    <div class="fixed-shape">
        <div class="rt-icon">
			<?php \Elementor\Icons_Manager::render_icon( $shape_icon ); ?>
        </div>
    </div>

	<?php if ( ! empty( $items ) && is_array( $items ) ) : ?>
        <div class="shape-item-list">
			<?php foreach ( $items as $item ) : ?>
                <div class="shape-item">
					<?php if ( ! empty( $item['list_icon'] ) ) : ?>
                        <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </span>
					<?php endif; ?>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</div>