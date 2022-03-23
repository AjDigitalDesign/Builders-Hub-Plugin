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

class AdminDashboardLayout extends BaseController
{
    public function register()
    {
        add_action( 'admin_menu', array($this, 'removeAdminCommentMenu'));
        add_action( 'wp_before_admin_bar_render', array($this, 'remove_comments') );
    }

    public function removeAdminCommentMenu($wp_admin_bar){
        remove_menu_page( 'edit-comments.php' );          //Comments
    }

    function remove_comments(){
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }



}