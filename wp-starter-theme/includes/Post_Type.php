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

class Post_Type
{

	/**
	 * Run the actions
	 */
	public function run()
	{

		add_action('init', array($this, 'wpstarter_unregister_cpt'));
		add_action('init', array($this, 'wpstarter_register_cpt'), 0);
	}

	/**
	 * Unregister CPT
	 */
	function wpstarter_unregister_cpt()
	{
		// unregister_post_type('project');
	}

	/*
	*
	*  Post Tutoriales
	*
	*/

	function wpstarter_register_cpt()
	{

		$labels = array(
			'name'                  => _x( 'Post Types', 'Post Type General Name', 'wpstarter' ),
			'singular_name'         => _x( 'Post Type', 'Post Type Singular Name', 'wpstarter' ),
			'menu_name'             => __( 'Post Types', 'wpstarter' ),
			'name_admin_bar'        => __( 'Post Type', 'wpstarter' ),
			'archives'              => __( 'Item Archives', 'wpstarter' ),
			'attributes'            => __( 'Item Attributes', 'wpstarter' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wpstarter' ),
			'all_items'             => __( 'All Items', 'wpstarter' ),
			'add_new_item'          => __( 'Add New Item', 'wpstarter' ),
			'add_new'               => __( 'Add New', 'wpstarter' ),
			'new_item'              => __( 'New Item', 'wpstarter' ),
			'edit_item'             => __( 'Edit Item', 'wpstarter' ),
			'update_item'           => __( 'Update Item', 'wpstarter' ),
			'view_item'             => __( 'View Item', 'wpstarter' ),
			'view_items'            => __( 'View Items', 'wpstarter' ),
			'search_items'          => __( 'Search Item', 'wpstarter' ),
			'not_found'             => __( 'Not found', 'wpstarter' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wpstarter' ),
			'featured_image'        => __( 'Featured Image', 'wpstarter' ),
			'set_featured_image'    => __( 'Set featured image', 'wpstarter' ),
			'remove_featured_image' => __( 'Remove featured image', 'wpstarter' ),
			'use_featured_image'    => __( 'Use as featured image', 'wpstarter' ),
			'insert_into_item'      => __( 'Insert into item', 'wpstarter' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpstarter' ),
			'items_list'            => __( 'Items list', 'wpstarter' ),
			'items_list_navigation' => __( 'Items list navigation', 'wpstarter' ),
			'filter_items_list'     => __( 'Filter items list', 'wpstarter' ),
		);
		$args = array(
			'label'                 => __( 'Post Type', 'wpstarter' ),
			'description'           => __( 'Post Type Description', 'wpstarter' ),
			'labels'                => $labels,
			'supports'              => false,
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'post_type', $args );

	}

}

(new \WPStarter\Theme\Post_Type())->run();
