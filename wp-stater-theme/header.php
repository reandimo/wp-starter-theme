<?php

	/**
	 * The header for our theme
	 *
	 * Displays all of the <head> section and everything up till <div id="content">
	 *
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body data-page="<?= is_front_page() ? 'home' : get_post_field( 'post_name' ) ?>" <?php body_class(); ?>">

	<?php do_action( 'wp_body_open' ); ?>

	<div class="site" id="page">
