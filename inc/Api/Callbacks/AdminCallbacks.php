<?php

/**
 * Admin Callbacks
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

namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function AdminDashboard(){
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function BuildersFeedDashboard(){
        return require_once("$this->plugin_path/templates/builderFeedDashboard.php");
    }

    public function BuildersGuide(){
        return require_once("$this->plugin_path/templates/BuildersGuide.php");
    }


    public function buildersHubTextExample(){
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="form-control" name="text_example"  value="'. $value .'"  placeholder="Example Text"/>';
    }

    public function buildersHubFirstName(){
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="form-control" name="first_name"  value="'. $value .'"  placeholder="First Name"/>';
    }

}