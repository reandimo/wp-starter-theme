<?php

    // Exit if accessed directly.
    defined( 'ABSPATH' ) || exit;

    define( 'THEME_SITENAME', 'Name' );
    define( 'THEME_VERSION', '1.0.0' );
    define( 'THEME_FILE', __FILE__ ); // this file
    define( 'THEME_URL', get_stylesheet_directory_uri() ); // our directory
    define( 'THEME_PATH', get_stylesheet_directory() ); // our directory

    ## INCLUDE COMPOSER
    $theme_autoload = THEME_PATH . '/vendor/autoload.php';
    if( file_exists( $theme_autoload ) ){
        include_once( $theme_autoload );
    }

    ## INCLUDES
    include_once(THEME_PATH.'/includes/Common_Helper.php');
    include_once(THEME_PATH.'/includes/WP_Admin.php');
    include_once(THEME_PATH.'/includes/TGM.php');
    include_once(THEME_PATH.'/includes/Queue.php');
    include_once(THEME_PATH.'/includes/Post_Type.php');
    include_once(THEME_PATH.'/includes/Woocommerce.php');
    include_once(THEME_PATH.'/includes/Woocommerce_Admin.php');
    include_once(THEME_PATH.'/includes/Custom.php');
