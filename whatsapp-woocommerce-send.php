<?php
function wawoo_whatsapp_payment_complete( $order_id ) {

	$wawoo_number = get_option('wawoo_msisdn');
	$wawoo_pass = get_option('wawoo_password');
	$wawoo_id = get_option('wawoo_id');
	$wawoo_display_name = get_option('wawoo_display_name');
	$wawoo_send_to = get_option('wawoo_send_to');
	
	if(empty($wawoo_number)){
		error_log('Number empty');
	}
	if(empty($wawoo_pass)){
		error_log('Password empty');
	}
	if(empty($wawoo_id)){
		error_log('Id empty');
	}
	if(empty($wawoo_display_name)){
		error_log('Display name empty');
	}
	if(empty($wawoo_send_to)){
		error_log('Sent to number is empty');
	}
	
	$blogInfo = get_bloginfo('wpurl');
	
	if(!empty($wawoo_number) && !empty($wawoo_pass) && !empty($wawoo_id) && !empty($wawoo_display_name) && !empty($wawoo_send_to)){
		$wa = new WhatsProt($wawoo_number, $wawoo_id, $wawoo_display_name, false);
        $connect = $wa->connect();
		if($connect){
	        $login = $wa->loginWithPassword($wawoo_pass);
			if($login){
				$wa->sendMessageComposing($wawoo_number);
				$result = $wa->sendMessage($wawoo_send_to, 'Somebody has made a purchase on your website '.$blogInfo.'!');
				if(!$result){
					error_log('Failed sent the message to '.$wawoo_send_to);
				}else{
					error_log('Successfully sent the message to '.$wawoo_send_to);
				}
			}
			else{
				error_log('Failed to log in with '.$wawoo_number);
			}
		}else{
			error_log('Failed to connect with '.$wawoo_number);
		}
	}
}

add_action( 'woocommerce_payment_complete', 'wawoo_whatsapp_payment_complete' );
?>