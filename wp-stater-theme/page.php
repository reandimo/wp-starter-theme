<?php

	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site will use a
	 * different template.
	 *
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	get_header();

?>

<div class="wrapper" id="page-wrapper">

	<div class="content" id="content" tabindex="-1">

		<div class="row"> 

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php the_content(); ?> 

			</div> 

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
