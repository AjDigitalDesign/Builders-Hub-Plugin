<?php

/**
 * Plugin Custom links
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


class SettingLinks extends BaseController
{


    public function register(){
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="options-general.php?page=builders_hub">Settings</a>';
        $links[] = $settings_link;
        return $links;
    }

}