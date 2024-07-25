<?php
/**
 * Plugin Name: King of app embed plugin
 * Plugin URI: https://kingofapp.com/
 * Description: Add css to your page when custom url parameter is detected and allow your page to be embedded into iframes.
 * Version: 2.2.0
 * Author: King of app
 * Author URI: https://kingofapp.com/
 */
/* init */
if(true){
    if ( is_admin() ) { // admin actions
        require_once plugin_dir_path(__FILE__).'config-form.php';
    } else {
        require_once plugin_dir_path(__FILE__).'addkoastyle.php'; 
    }
}


