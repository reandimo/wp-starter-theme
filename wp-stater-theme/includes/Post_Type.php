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

class Post_Type
{

	/**
	 * Run the actions
	 */
	public function run()
	{

		add_action('init', array($this, 'escale_unregister_cpt'));
		add_action('init', array($this, 'escale_register_cpt'), 0);
	}

	/**
	 * Unregister CPT
	 */
	function escale_unregister_cpt()
	{
		// unregister_post_type('project');
	}

	/*
	*
	*  Post Tutoriales
	*
	*/

	function escale_register_cpt()
	{

		$labels = array(
			'name'                  => _x( 'Post Types', 'Post Type General Name', 'escale' ),
			'singular_name'         => _x( 'Post Type', 'Post Type Singular Name', 'escale' ),
			'menu_name'             => __( 'Post Types', 'escale' ),
			'name_admin_bar'        => __( 'Post Type', 'escale' ),
			'archives'              => __( 'Item Archives', 'escale' ),
			'attributes'            => __( 'Item Attributes', 'escale' ),
			'parent_item_colon'     => __( 'Parent Item:', 'escale' ),
			'all_items'             => __( 'All Items', 'escale' ),
			'add_new_item'          => __( 'Add New Item', 'escale' ),
			'add_new'               => __( 'Add New', 'escale' ),
			'new_item'              => __( 'New Item', 'escale' ),
			'edit_item'             => __( 'Edit Item', 'escale' ),
			'update_item'           => __( 'Update Item', 'escale' ),
			'view_item'             => __( 'View Item', 'escale' ),
			'view_items'            => __( 'View Items', 'escale' ),
			'search_items'          => __( 'Search Item', 'escale' ),
			'not_found'             => __( 'Not found', 'escale' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'escale' ),
			'featured_image'        => __( 'Featured Image', 'escale' ),
			'set_featured_image'    => __( 'Set featured image', 'escale' ),
			'remove_featured_image' => __( 'Remove featured image', 'escale' ),
			'use_featured_image'    => __( 'Use as featured image', 'escale' ),
			'insert_into_item'      => __( 'Insert into item', 'escale' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'escale' ),
			'items_list'            => __( 'Items list', 'escale' ),
			'items_list_navigation' => __( 'Items list navigation', 'escale' ),
			'filter_items_list'     => __( 'Filter items list', 'escale' ),
		);
		$args = array(
			'label'                 => __( 'Post Type', 'escale' ),
			'description'           => __( 'Post Type Description', 'escale' ),
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

(new \Escale\Theme\Post_Type())->run();
