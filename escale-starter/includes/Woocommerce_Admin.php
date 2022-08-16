<?php

/**
 * Register custom post types
 * 
 * @package    EscaleTheme
 */

namespace Escale\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Woocommerce_Admin
{

	/**
	 * Run the actions
	 */
	public function run()
	{
        // add_action('woocommerce_after_shop_loop', array($this, 'before_shop_banner'), 15);
	}

}

(new \Escale\Theme\Woocommerce_Admin())->run();
