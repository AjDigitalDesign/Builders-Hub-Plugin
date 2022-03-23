<?php

/**
 * Fired during plugin activation
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

namespace Inc\Pages;
use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;



class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register()
    {

        $this->settings = new SettingsApi();

        $this->callbacks = new  AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }


    public function setPages(){
        $this->pages = array(
            array(
                'page_title' => 'Builders Hub',
                'menu_title' => 'Builders Hub',
                'capability' => 'manage_options',
                'menu_slug' => 'builders_hub',
                'callback' => array($this->callbacks, 'AdminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubPages(){
        $this->subpages = array(
            array(
                'parent_slug' => 'builders_hub',
                'page_title' => 'Feeds Settings',
                'menu_title' => 'Feeds',
                'capability' => 'manage_options',
                'menu_slug' => 'builders_feed',
                'callback' => array($this->callbacks, 'BuildersFeedDashboard')
            ),
            array(
                'parent_slug' => 'builders_hub',
                'page_title' => 'Builders Guide',
                'menu_title' => 'Builders Guide',
                'capability' => 'manage_options',
                'menu_slug' => 'builders_guide',
                'callback' => array($this->callbacks, 'BuildersGuide')
            ),
        );
    }



    public function setSettings(){
        $args = array(
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'text_example',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'First Name',
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections(){
        $args = array(
            array(
                'id'            => 'builder_hub_admin_index',
                'title'          => 'Setting Manager',
                'callback'      => array($this->callbacks_mngr, 'buildersHubAdminManagerSection'),
                'page' => 'builders_hub'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields(){
        $args = array(
            array(
                'id'            => 'builders_name',
                'title'          => 'Builder\'s Name',
                'callback'      => array($this->callbacks, 'buildersHubTextExample'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'Builder\'s Name',
                    'class' => 'form-input form-control',
                )
            ),
            array(
                'id'            => 'first_name',
                'title'          => 'First Name',
                'callback'      => array($this->callbacks, 'buildersHubFirstName'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'form-input',
                )
            )
        );

        $this->settings->setFields($args);
    }

}
