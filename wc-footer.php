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

        add_action( 'wp_head', [ $this, 'custom_style'] );

    }

    public function custom_style(){
        ?>
        <style>
            .custom_style{
                display: inline;
            }
        </style>
        
        <?php
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
