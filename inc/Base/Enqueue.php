<?php

/**
 * Fired during plugin activation
 *
 * @link       ajardiah.dev
 * @since      1.0.0
 *
 * @package    Builders_Hub
 * @subpackage Builders_Hub/inc
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Builders_Hub
 * @subpackage Builders_Hub/inc
 * @author     AJ Jardiah Jr <ajardiahjr@gmail.com>
 */

namespace Inc\Base;
use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }


    public function enqueue() {
        wp_enqueue_style( $this->plugin_name, $this->plugin_url . 'assets/dist/css/app.css', array(), $this->version, 'all' );
        wp_enqueue_script( $this->plugin_name, $this->plugin_url . 'assets/dist/js/app.js', array( 'jquery' ), $this->version, true );
    }
}