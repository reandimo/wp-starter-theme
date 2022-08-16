<?php

/**
 * Class.
 * General functions to be used everywhere
 * All functions must be declared as static
 * 
 * @package    EscaleTheme
 */

namespace Escale\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Woocommerce
{

    /**
     * Run the actions
     */
    public function run()
    {

        // add_action('woocommerce_after_shop_loop', array($this, 'before_shop_banner'), 15);

    }

}

(new \Escale\Theme\Woocommerce())->run();
