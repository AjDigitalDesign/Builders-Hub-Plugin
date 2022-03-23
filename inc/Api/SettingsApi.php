<?php

/**
 * Settings API
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

namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = array();

    public $admin_subpages = array();

    public $settings = array();

    public $sections = array();

    public $fields = array();

    public function register()
    {
        if ( ! empty($this->admin_pages) ) {
            add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
        }

        if(!empty($this->settings)){
            add_action('admin_init', array($this, 'registerCustomFields'));
        }
    }

    public function addPages( array $pages )
    {
        $this->admin_pages = $pages;

        return $this;
    }

    public function withSubPage( string $title = null )
    {
        if ( empty($this->admin_pages) ) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $subpage = array(
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            )
        );

        $this->admin_subpages = $subpage;

        return $this;
    }

    public function addSubPages( array $pages )
    {
        $this->admin_subpages = array_merge( $this->admin_subpages, $pages );

        return $this;
    }

    public function addAdminMenu()
    {
        foreach ( $this->admin_pages as $page ) {
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
        }

        foreach ( $this->admin_subpages as $page ) {
            add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );
        }
    }

    public function setSettings( array $settings )
    {
        $this->settings = $settings;

        return $this;
    }

    public function setSections( array $sections )
    {
        $this->sections = $sections;

        return $this;
    }

    public function setFields( array $fields )
    {
        $this->fields = $fields;

        return $this;
    }

    public function registerCustomFields(){
        // Register Setting
        foreach ( $this->settings as $setting ) {
            register_setting($setting['option_group'], $setting['option_name'], ($setting['callback'] ?? ''));
        }

        // Add Setting Section
        foreach ( $this->sections as $section ) {
            add_settings_section($section['id'], $section['title'], ($section['callback'] ?? ''), $section['page']);
        }

        // Add Setting Fields
        foreach ( $this->fields as $field ) {
            add_settings_field($field['id'], $field['title'], ($field['callback'] ?? ''), $field['page'], $field['section'], ($field['args'] ?? ''));
        }
    }

}