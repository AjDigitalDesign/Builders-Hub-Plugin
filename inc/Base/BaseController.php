<?php

/**
 * BaseController
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

class BaseController
{

    public $plugin_path;

    public function __construct(){
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 2));

        if ( defined( 'BUILDERS_HUB_VERSION' ) ) {
            $this->version = BUILDERS_HUB_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'builders-hub';
    }
}

