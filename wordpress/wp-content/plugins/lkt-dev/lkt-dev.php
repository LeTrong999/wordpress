<?php
/*
Plugin Name: LKT Shopping
Plugin URI: https://www.aegoweb.com/
Description: Xay dung shopping
Author: LKT Company
Version: 1.0
Author URI: https://www.aegoweb.com/
*/

require_once 'define.php';

require_once LKT_INCLUDE_PATH . '/Controller.php';
global $zController;
$zController = new zController();

if(is_admin()){
	require_once 'backend.php';
	new LKT_Backend();
}else{
	require_once 'frontend.php';
	new LKT_Frontend();
}