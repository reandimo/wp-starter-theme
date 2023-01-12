<?php

/**
 * Class.
 * General functions to be used everywhere
 * All functions must be declared as static
 * 
 * @package    EscaleTheme
 */

namespace Escale\Theme;
use Escale\Theme\Common_Helper; 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Queue
{

	/**
	 * Run the actions
	 */
	public function run()
	{

		add_action('wp_enqueue_scripts', array($this,'enqueue_front_scripts'));
		add_action('admin_enqueue_scripts', array($this,'enqueue_admin_scripts'));
		add_action('login_enqueue_scripts', array($this,'enqueue_admin_scripts'));

	}

	function enqueue_front_scripts()
	{

		wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/public/css/frontend.css', [], filemtime( get_stylesheet_directory() . '/public/css/frontend.css' ) );
		wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/public/js/frontend.js', [], filemtime( get_stylesheet_directory() . '/public/js/frontend.js' ) , true );

	}

	public function enqueue_admin_scripts()
	{
		
		wp_enqueue_style( 'admin-app', get_stylesheet_directory_uri() . '/public/css/admin.css', [], filemtime( get_stylesheet_directory() . '/public/css/admin.css' ) );
		wp_enqueue_script( 'admin-app', get_stylesheet_directory_uri() . '/public/js/admin.js', [], filemtime( get_stylesheet_directory() . '/public/js/admin.js' ) , true );

	} 

}

(new \Escale\Theme\Queue())->run();
