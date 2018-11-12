<?php
/*
Plugin Name: ZendVN Shopping
Plugin URI: http://www.zend.vn
Description: Xay dung shopping don gian WP
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

require_once 'define.php';

require_once ZENDVN_SP_INCLUDE_PATH . '/Controller.php';
global $zController;
$zController = new zController();

if(is_admin()){
	if(!class_exists('ZendvnHtml')){
		require_once ZENDVN_SP_INCLUDE_PATH . '/html.php';
	}
	
	require_once 'backend.php';
	new Zendvn_Sp_Backend();
	
	$zController->getHelper('AdminMenu');
	$zController->getController('AdminCategory','/backend');
	$zController->getController('AdminProduct','/backend');
	
}else{
	global $zendvn_sp_settings;
	
	$zendvn_sp_settings = get_option('zendvn_sp_setting',array());
	if(count($zendvn_sp_settings) == 0){
		$zendvn_sp_settings = $zController->getConfig('Setting')->get();
	}
	
	
	require_once 'frontend.php';
	new Zendvn_Sp_Frontend();
}






