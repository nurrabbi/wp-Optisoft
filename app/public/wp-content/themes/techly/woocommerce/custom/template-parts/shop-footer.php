<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


use RT\Techly\Helpers\Fns;


?>
		</main>
			</div>
				<?php
				if ( is_active_sidebar( Fns::default_sidebar('woo-archive') ) ) {
					techly_sidebar( Fns::default_sidebar('woo-archive')  );
				} else {
					techly_sidebar( Fns::default_sidebar('main') );
				}
				?>
			</div>
		</div>
	</div>
</div>
