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

class ManagerCallbacks extends BaseController
{

    public function buildersHubGroup($input){
        return $input;
    }

    public function buildersHubAdminManagerSection()
    {
        echo 'Welcome to Builders Hub Manager Settings';
    }

}