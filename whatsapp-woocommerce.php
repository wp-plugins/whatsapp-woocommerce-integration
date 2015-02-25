<?php
/*
Plugin Name: WhatsApp - Woocommerce Integration
Plugin URI: http://www.wassame.com/plugins/whatsapp-woocommerce/
Description: Configure WhatsApp notification alerts for your woocommerce plugin
Author: Ben Van Nimmen
Author URI: http://www.vnbenny.com/
Version: 1.0
*/

define( 'WAWOO__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WAWOO__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if(!class_exists('WhatsProt')){
	require_once(WAWOO__PLUGIN_DIR.'whatsapp/whatsprot.class.php');
}
require_once(WAWOO__PLUGIN_DIR.'whatsapp-woocommerce-send.php');

if(is_admin()){
	require_once('class.whatsapp-woocommerce-admin.php');
	add_action( 'init', array( 'WhatsAppWoocommerce_Admin', 'init' ) );
}
