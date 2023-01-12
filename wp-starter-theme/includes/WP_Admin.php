<?php

/**
 * Class.
 * General functions to be used everywhere
 * All functions must be declared as static
 * 
 * @package    WPStarterTheme
 */

namespace WPStarter\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class WP_Admin
{

    /**
     * Run the actions
     */
    public function run()
    {

		add_filter('login_headerurl', array($this, 'my_login_logo_url'));
		add_filter('login_headertext', array($this, 'my_login_logo_url_title'));
    
	}
    
	/**
	 * Site URL in WP-Login
	 *
	 */
	public function my_login_logo_url()
	{
		return home_url();
	}

	/**
	 * Add Investor Name in the wp-login page
	 *
	 */
	public function my_login_logo_url_title()
	{
		return THEME_SITENAME;
	}

}

(new \WPStarter\Theme\WP_Admin())->run();
