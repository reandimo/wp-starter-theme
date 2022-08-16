<?php

	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after
	 *
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

?>

		<?php if (has_nav_menu('footer-menu')) : ?>

			<div id="footer-nav">
				<div class="container">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-menu',
						'depth'          => '1',
						'menu_class'     => 'bottom-nav',
						'container'      => '',
						'fallback_cb'    => '',
					));
					?>
				</div>
			</div>

		<?php endif; ?>
		
		</div>

		<?php wp_footer(); ?>

	</body>

</html>