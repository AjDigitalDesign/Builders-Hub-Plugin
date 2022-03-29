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

    public function buildersHubAdminManagerSection()
    {
        echo 'Welcome to Builders Hub Manager Settings';
    }


    public function buildersHubGroup($input){

        return sanitize_text_field(isset($input));
    }

    public function buildersHubGroupFeed($checkbox){

        $output = array();

        foreach ( $this->managers as $key => $value ) {
            $output[$key] = isset( $input[$key] ) ? true : false;
        }

        return $output;
    }

    public function buildersHubGroupFeedLogo($options){

        if(!empty($_FILES['builder_logo']['tmp_name'])){
            $url = wp_handle_upload($_FILES['builder_logo'], array('test_form' => false));
            return $url['url'];
        }
        return $options;
    }




    public function buildersHubSetting($args)
    {
        $class = $args['class'];
        $type = $args['type'];
        $place_holder = $args['placeHolder'];

        $isRequired = $args['isRequire'];
        if($isRequired == 1){
            $setRequired = 'required';
        }else {
            $setRequired = '';
        }

        $name = $args['label_for'];
        $value = sanitize_text_field(esc_attr(get_option($name)));

        echo '<input type="'.$type.'" class="'.$class.'" name="'.$name.'"  value="'. $value .'"  placeholder="'.$place_holder.'"  '. $setRequired.'/>';
    }

    
    public function buildersHubSettingAddress($args)
    {
        $class = $args['class'];
        $type = $args['type'];
        $place_holder = $args['placeHolder'];

        $isRequired = $args['isRequire'];
        if($isRequired == 1){
            $setRequired = 'required';
        }else {
            $setRequired = '';
        }

        $name = $args['label_for'];
        $value = sanitize_text_field(esc_attr(get_option($name)));

        echo '<div class="address-area">';
            echo '<input type="'.$type.'" class="'.$class.'" name="'.$name.'"  value="'. $value .'"  placeholder="'.$place_holder.'"  '. $setRequired.'/>';
        echo '</div>';
    }

    public function buildersHubSocialMedia($args)
    {
        $classes = $args['class'];

        $type = $args['type'];
        $place_holder = $args['placeHolder'];

        $isRequired = $args['isRequire'];
        if($isRequired == 1){
            $setRequired = 'required';
        }else {
            $setRequired = '';
        }

        $name = $args['label_for'];
        $value = sanitize_text_field(esc_attr(get_option($name)));

        echo '<div class="social_area">';
            echo '<input type="'.$type.'" class="'.$classes.'" name="'.$name.'"  value="'. $value .'"  placeholder="'.$place_holder.'"  '. $setRequired.'/>';
        echo '</div>';
    }



    public function buildersHubAdminManagerSectionFeed()
    {
        echo 'Welcome to Builders Hub Manager Settings';
    }


    public function checkboxField($args){
//        $classes = $args['class'];
//
//        $type = $args['type'];
//        $place_holder = $args['placeHolder'];
//
//        $isRequired = $args['isRequire'];
//        if($isRequired == 1){
//            $setRequired = 'required';
//        }else {
//            $setRequired = '';
//        }
//
//        $name = $args['label_for'];
//        $value = sanitize_text_field(esc_attr(get_option($name)));



        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option( $name );
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }

    public function builders_corporate_info($args){
        $classes = $args['class'];

        $type = $args['type'];
        $place_holder = $args['placeHolder'];

        $isRequired = $args['isRequire'];
        if($isRequired == 1){
            $setRequired = 'required';
        }else {
            $setRequired = '';
        }

        $name = $args['label_for'];
        $value = sanitize_text_field(esc_attr(get_option($name)));

        echo '<div class="social_area">';
        echo '<input type="'.$type.'" class="'.$classes.'" name="'.$name.'"  value="'. $value .'"  placeholder="'.$place_holder.'"  '. $setRequired.'/>';
        echo '</div>';
    }

    public function builders_corporate_info_logo($args){
        $classes = $args['class'];

        $type = $args['type'];
        $place_holder = $args['placeHolder'];

        $isRequired = $args['isRequire'];
        if($isRequired == 1){
            $setRequired = 'required';
        }else {
            $setRequired = '';
        }

        $name = $args['label_for'];
        $value = sanitize_text_field(esc_attr(get_option($name)));





        echo '<input type="'.$type.'" class="'.$classes.'" name="'.$name.'"  value="'. $value .'"  placeholder="'.$place_holder.'"  '. $setRequired.'/>';

    }
}
