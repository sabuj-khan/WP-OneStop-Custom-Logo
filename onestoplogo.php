<?php
/*
Plugin Name: OneStop Custom Logo
Plugin URI: https://sabuj.mokam24.com
Author: Sabuj Khan
Author URI: https://sabuj.mokam24.com
Description: OneStop custom logo is used to set the site logo on the header section. 
Requires at least: 5.9
Tested up to: 5.9
Requires PHP: 5.6
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: onestoplogo
*/

function onestoplogo_plugins_loaded(){
    load_plugin_textdomain( 'onestoplogo', false, dirname(__FILE__).'/languages' );
 }
 add_action( 'plugins_loaded', 'onestoplogo_plugins_loaded');

function onestoplogo_customizer_settings(){
     // Logo sections adding from customizer

     $wp_customize ->add_section('logo-section', array(
        'title'     => __('Logo Section', 'philosophy'),
        'description'   => __('Complete the logo setting from here', 'philosophy'),
        'priority'  => 20,
    ));
    $wp_customize ->add_setting('logo-upload', array(
        'type'          => 'theme_mod',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label'      => __( 'Upload a logo', 'philosophy' ),
                'section'    => 'logo-section',
                'settings'   => 'logo-upload',
            )
        )
    );

}
 add_action('customize_register', 'onestoplogo_customizer_settings');
