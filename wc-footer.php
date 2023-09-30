<?php

/*
Plugin Name: Woocommerce Footer
Description: This plugin use for footer design for woo-commerce website.
Version: 1.0
Author: Rubel Mahmud (Sujan)
Author URI: https://www.linkedin.com/in/vxlrubel
*/

// Plugin code goes here


defined('ABSPATH') OR exit('directly access denied');


class Woocommerce_Footer{
    // create singletone instance
    private static $instance;


    /**
     * initialize all the default methods
     */
    public function __construct(){

        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }


    /**
     * enqueue script for Woocommerce Footer Design
     *
     * @return void
     */
    public function enqueue_scripts(){
        
        // enqueue style for footer style
        wp_enqueue_style( 'wcf-style', plugin_dir_url(__FILE__) . 'assets/css/wcf-style.css' );

        // enqueue script for footer style
        wp_enqueue_script( 'wcf-script', plugin_dir_url(__FILE__) . 'assets/js/wcf-custom.js', ['jquery'], '1.0', true );

    }

    /**
     * create singletone instance of Woocommerce_Footer
     *
     * @return void
     */
    public static function init(){

        if( is_null( self::$instance )){
            self::$instance = new self();
        }
        return self::$instance;
    }
}



if( ! function_exists( 'woocommerce_footer_design' ) ){
    function woocommerce_footer_design(){
        return Woocommerce_Footer::init();
    }
    woocommerce_footer_design();
}
