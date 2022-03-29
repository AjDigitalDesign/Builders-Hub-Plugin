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



class FeedDashboard extends BaseController
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
                'option_name'   => 'builders_hub_name',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_email',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_email',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_phone',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_address1',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_address2',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_city',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_state',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_zip',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_fb',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),
            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_instagram',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),

            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_twitter',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),

            array(
                'option_group'  => 'builders_hub_settings',
                'option_name'   => 'builders_hub_youtube',
                'callback'      => array($this->callbacks, 'buildersHubGroup')
            ),

            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'Activate_feed',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),

            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'corporate_name',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),
            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'corporate_builder_number',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),

            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'corporate_builder_state',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),
            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'builder_number',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),
            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'reporting_name',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),
            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'default_lead_email',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),

            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'builder_website',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeed')
            ),

            array(
                'option_group'  => 'builders_hub_settings_feed',
                'option_name'   => 'builder_logo',
                'callback'      => array($this->callbacks, 'buildersHubGroupFeedLogo')
            ),

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
            ),

            array(
                'id'            => 'builder_hub_admin_index_one',
                'title'          => 'XML Feed Settings',
                'callback'      => array($this->callbacks_mngr, 'buildersHubAdminManagerSectionFeed'),
                'page' => 'builders_hub_feed'
            ),
        );

        $this->settings->setSections($args);
    }

    public function setFields(){
        $args = array(
            array(
                'id'            => 'builders_hub_name',
                'title'          => "Builder's Name",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSetting'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_name',
                    'class' => 'builders-dashboard-area contact-info',
                    'type' => 'text',
                    'placeHolder' => 'Enter Builders Name',
                    'isRequire' => '0',
                )
            ),

            array(
                'id'            => 'builders_hub_email',
                'title'          => "Email",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSetting'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'builders_hub_email',
                    'class' => 'builders-dashboard-area contact-info',
                    'type' => 'email',
                    'placeHolder' => 'Enter Email',
                    'isRequire' => '0',
                )
            ),
            array(
                'id'            => 'builders_hub_phone',
                'title'          => "Phone",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSetting'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_phone',
                    'class' => 'builders-dashboard-area contact-info',
                    'type' => 'tel',
                    'placeHolder' => 'Enter Phone Number',
                    'format' => '[0-9]{3}-[0-9]{3}-[0-9]{4}',
                    'isRequire' => '1'
                )
            ),

            array(
                'id'            => 'builders_hub_address1',
                'title'          => "Street 1",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSettingAddress'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_address1',
                    'class' => 'builders-dashboard-area address',
                    'type' => 'text',
                    'placeHolder' => 'Street Address 1',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builders_hub_address2',
                'title'          => "Street 2",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSettingAddress'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_address2',
                    'class' => 'builders-dashboard-area address',
                    'type' => 'text',
                    'placeHolder' => 'Street Address 2',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builders_hub_city',
                'title'          => "City",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSettingAddress'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_city',
                    'class' => 'builders-dashboard-area address',
                    'type' => 'text',
                    'placeHolder' => 'City',
                    'isRequire' => '0'
                )
            ),

            array(
                'id'            => 'builders_hub_zip',
                'title'          => "Postal Code",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSettingAddress'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_state',
                    'class' => 'builders-dashboard-area address',
                    'type' => 'number',
                    'placeHolder' => 'Postal Code',
                    'isRequire' => '0'
                )
            ),

            array(
                'id'            => 'builders_hub_fb',
                'title'          => "Facebook",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSocialMedia'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_fb',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'url',
                    'placeHolder' => 'Enter Facebook URL ',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builders_hub_instagram',
                'title'          => "Instagram",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSocialMedia'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_instagram',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'url',
                    'placeHolder' => 'Enter Instagram URL ',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builders_hub_twitter',
                'title'          => "Twitter",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSocialMedia'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_twitter',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'url',
                    'placeHolder' => 'Enter Twitter URL ',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builders_hub_youtube',
                'title'          => "Youtube",
                'callback'      => array($this->callbacks_mngr, 'buildersHubSocialMedia'),
                'page' => 'builders_hub',
                'section' => 'builder_hub_admin_index',
                'args' => array(
                    'label_for' => 'builders_hub_youtube',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'url',
                    'placeHolder' => 'Enter Youtube URL ',
                    'isRequire' => '0'
                )
            ),

            array(
                'id'            => 'builders_hub_feed',
                'title'          => "Activate Feed",
                'callback'      => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'builders_hub_active_feed',
                    'class' => 'active-xml-feed ui-toggle',
                    'type' => 'checkbox',
                    'isRequire' => '0'
                )
            ),

            array(
                'id'            => 'corporate_name',
                'title'          => "Corporate Name",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'corporate_name',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'text',
                    'placeHolder' => 'Corporate Name',
                    'isRequire' => '0'
                )
            ),

            array(
                'id'            => 'corporate_builder_number',
                'title'          => "Corporate Builder Number",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'corporate_builder_number',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'text',
                    'placeHolder' => 'Enter Youtube URL ',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'corporate_builder_state',
                'title'          => "Corporate State",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'corporate_builder_state',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'text',
                    'placeHolder' => 'Corporate State',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builder_number',
                'title'          => "Builder Number",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'builder_number',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'text',
                    'placeHolder' => 'Builder Number',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'reporting_name',
                'title'          => "Reporting Name",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'reporting_name',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'text',
                    'placeHolder' => 'Reporting Name',
                    'isRequire' => '0'
                )
            ),

            array(
                'id'            => 'default_lead_email',
                'title'          => "Default Leads Email",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'default_lead_email',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'text',
                    'placeHolder' => 'Default Leads Email',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builder_website',
                'title'          => "Builder Website",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'builder_website',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'website',
                    'placeHolder' => 'Builder Website ',
                    'isRequire' => '0'
                )
            ),
            array(
                'id'            => 'builder_logo',
                'title'          => "Brand Logo",
                'callback'      => array($this->callbacks_mngr, 'builders_corporate_info_logo'),
                'page' => 'builders_hub_feed',
                'section' => 'builder_hub_admin_index_one',
                'args' => array(
                    'label_for' => 'builder_logo',
                    'class' => 'builders-dashboard-area social-area',
                    'type' => 'file',
                    'placeHolder' => '',
                    'isRequire' => '0'
                )
            ),




        );

        $this->settings->setFields($args);
    }

}
