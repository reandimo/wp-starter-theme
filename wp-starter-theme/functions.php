<?php

    // Exit if accessed directly.
    defined( 'ABSPATH' ) || exit;

    define( 'THEME_SITENAME', get_bloginfo( 'name' ) );
    define( 'THEME_VERSION', '1.0.0' );
    define( 'THEME_FILE', __FILE__ ); // this file
    define( 'THEME_DIR', get_stylesheet_directory_uri() ); // our directory

    ## INCLUDE COMPOSER
    $theme_autoload = THEME_DIR . '/vendor/autoload.php';
    if( file_exists( $theme_autoload ) ){
        include_once( $theme_autoload );
    }

    ## INCLUDES
    include_once(THEME_DIR.'/includes/Common_Helper.php');
    include_once(THEME_DIR.'/includes/WP_Admin.php');
    include_once(THEME_DIR.'/includes/TGM.php');
    include_once(THEME_DIR.'/includes/Queue.php');
    include_once(THEME_DIR.'/includes/Post_Type.php');
    include_once(THEME_DIR.'/includes/Woocommerce.php');
    include_once(THEME_DIR.'/includes/Woocommerce_Admin.php');
    include_once(THEME_DIR.'/includes/Custom.php');
