<?php

/**
 * BaseController
 *
 * @link       ajardiah.dev
 * @since      1.0.0
 *
 * @package    Builders_Hub
 * @subpackage Builders_Hub/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Builders_Hub
 * @subpackage Builders_Hub/includes
 * @author     AJ Jardiah Jr <ajardiahjr@gmail.com>
 */

namespace Inc\Base;
use  Inc\Base\BaseController;

class CustomTaxonomies extends BaseController
{
    public function register()
    {
        add_action('init',  array($this, 'create_area_taxonomies'));
        add_action('init',  array($this, 'create_plan_community_taxonomy'));

    }

    public function create_area_taxonomies()
    {
        register_taxonomy( 'area', array( 'communities' ),
            array(
                'labels' => array(
                    'name' => 'Area',
                    'menu_name' => 'Areas',
                    'singular_name' => 'area',
                    'all_items' => 'All Areas',
                    'add_new_item' => 'Add New Area',
                    'new_item_name' => 'New Area Name'
                ),
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_ui' => true,
                'rewrite' => array( 'slug' => 'area', 'hierarchical' => true, 'with_front' => false ),
            )
        );
    }
    public function create_plan_community_taxonomy()
    {
        register_taxonomy( 'community', array( 'plans' ),
            array(
                'labels' => array(
                    'name' => 'Community',
                    'menu_name' => 'Community',
                    'singular_name' => 'Community',
                    'all_items' => 'All Community'
                ),
                'public' => true,
                'hierarchical' => true,
                'meta_box_cb'  => false,
                'show_admin_column' => true,
                'query_var' => true,
                'show_ui' => true,
                'rewrite' => array( 'slug' => 'community', 'hierarchical' => true, 'with_front' => false ),
            )
        );
    }
}