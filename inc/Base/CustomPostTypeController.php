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

class CustomPostTypeController extends BaseController
{
    public function register()
    {
        add_action('init', array($this, 'create_subdivision'));
        add_action('init',  array($this, 'create_plan'));
        add_action('init',  array($this, 'create_homes'));

    }


    public function create_subdivision()
    {
        $labels = [
            'name' => __('Communities', 'texdomain'),
            'menu_name' => __('Communities', 'textdomain'),
            'singular_name' => 'Communities',
            'all_items' => 'All Communities',
            "add_new" => __( "Add Community", "textdomains" ),
            "add_new_item" => __( "Add New Community", "textdomains" ),
            "edit_item" => __( "Edit Community", "textdomains" ),
            "new_item" => __( "New Community", "textdomains" ),
            "view_item" => __( "View Community", "textdomains" ),
            "view_items" => __( "View Communities", "textdomains" ),
            "archives" => __( "communities archives", "textdomain" ),
            "search_items" => __( "Search Communities", "textdomains" ),
            "not_found" => __( "No Communities Found", "textdomains" ),
            "not_found_in_trash" => __( "No Communities Found in Trash", "textdomains" ),
            "parent" => __( "Parent Communities", "textdomains" ),
            "featured_image" => __( "Featured Image for this Community", "textdomains" ),
            "set_featured_image" => __( "Set Featured Image for this Community", "textdomains" ),
            "remove_featured_image" => __( "Remove Featured Image for this Community", "textdomains" ),
            "use_featured_image" => __( "Use Featured Image for this Community", "textdomains" ),
            "parent_item_colon" => __( "Parent Community", "textdomains" ),
        ];
        $args = [
            "label" => __( "Communities", "textdomains" ),
            "labels" => $labels,
            "description" => "This component displays a list of communities",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => 'communities',
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            'rewrite' => array( 'slug' => 'communities/%area%/', 'with_front' => true ),
            "query_var" => true,
            "menu_position" => 10,
            "menu_icon" => "dashicons-admin-multisite",
            "supports" => [ "title", ],
            "taxonomies" => [ "area" ],
        ];
        register_post_type( "communities", $args );
    }

    public function create_plan()
    {
        /**
         * POst Type:  plan individual plan for each community
         */

        $labels = [
            "name" => __( "plan", "textdomain" ),
            "singular_name" => __( "Plan", "textdomain" ),
            "menu_name" => __( "Plans", "textdomain" ),
            "all_items" => __( "All plans", "textdomain" ),
            "add_new" => __( "Add new", "textdomain" ),
            "add_new_item" => __( "Add new plan", "textdomain" ),
            "edit_item" => __( "Edit plan", "textdomain" ),
            "new_item" => __( "New plan", "textdomain" ),
            "view_item" => __( "View plan", "textdomain" ),
            "view_items" => __( "View plans", "textdomain" ),
            "search_items" => __( "Search plans", "textdomain" ),
            "not_found" => __( "No plans found", "textdomain" ),
            "not_found_in_trash" => __( "No plans found in trash", "textdomain" ),
            "parent" => __( "Parent plan:", "textdomain" ),
            "featured_image" => __( "Featured image for this plan", "textdomain" ),
            "set_featured_image" => __( "Set featured image for this plan", "textdomain" ),
            "remove_featured_image" => __( "Remove featured image for this plan", "textdomain" ),
            "use_featured_image" => __( "Use as featured image for this plan", "textdomain" ),
            "archives" => __( "plan archives", "textdomain" ),
            "insert_into_item" => __( "Insert into plan", "textdomain" ),
            "uploaded_to_this_item" => __( "Upload to this plan", "textdomain" ),
            "filter_items_list" => __( "Filter plans list", "textdomain" ),
            "items_list_navigation" => __( "plans list navigation", "textdomain" ),
            "items_list" => __( "plans list", "textdomain" ),
            "attributes" => __( "plans attributes", "textdomain" ),
            "name_admin_bar" => __( "plan", "textdomain" ),
            "item_published" => __( "plan published", "textdomain" ),
            "item_published_privately" => __( "plan published privately.", "textdomain" ),
            "item_reverted_to_draft" => __( "plan reverted to draft.", "textdomain" ),
            "item_scheduled" => __( "plan scheduled", "textdomain" ),
            "item_updated" => __( "plan updated.", "textdomain" ),
            "parent_item_colon" => __( "Parent plan:", "textdomain" ),
        ];

        $args = [
            "label" => __( "plan", "textdomain" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => 'plans',
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => [ "slug" => "plans/%community%", "with_front" => false ],
            "query_var" => true,
            "menu_position" => 11,
            "menu_icon" => "dashicons-text",
            "supports" => [ "title", ],
            "taxonomies" => [ "community" ],
            "show_in_graphql" => false,
        ];

        register_post_type( "plans", $args );
    }

    public function create_homes()
    {
        /**
         * POst Type:
         */
        $labels = [
            'name' => __('Available Homes', 'texdomain'),
            'menu_name' => __('Available Homes', 'textdomain'),
            'singular_name' => 'Available home',
            'all_items' => 'All Available homes',
            "add_new" => __( "Add New  Home", "textdomains" ),
            "add_new_item" => __( "Add New home", "textdomains" ),
            "edit_item" => __( "Edit home", "textdomains" ),
            "new_item" => __( "New home", "textdomains" ),
            "view_item" => __( "View home", "textdomains" ),
            "view_items" => __( "View home", "textdomains" ),
            "search_items" => __( "Search home", "textdomains" ),
            "not_found" => __( "No home", "textdomains" ),
            "not_found_in_trash" => __( "No home Found in Trash", "textdomains" ),
            "parent" => __( "Parent home", "textdomains" ),
            "archives" => __( "homes archives", "textdomains" ),
            "featured_image" => __( "Featured Image for this Available home", "textdomains" ),
            "set_featured_image" => __( "Set Featured Image for this Available home", "textdomains" ),
            "remove_featured_image" => __( "Remove Featured Image for this Available home", "textdomains" ),
            "use_featured_image" => __( "Use Featured Image for this Available home", "textdomains" ),
            "parent_item_colon" => __( "Parent Available home", "textdomains" ),
        ];
        $args = [
            "label" => __( "Homes", "textdomains" ),
            "labels" => $labels,
            "description" => "This component displays a list of Available homs",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => 'homes',
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            'rewrite' => array( 'slug' => 'homes/%community%/', 'hierarchical' => true, 'with_front' => false ),
            "query_var" => true,
            "menu_position" => 11,
            "menu_icon" => "dashicons-admin-home",
            "supports" => [ "title", "revisions" ],
            "taxonomies" => [ "community" ],
        ];
        register_post_type( "homes", $args );


    }


}