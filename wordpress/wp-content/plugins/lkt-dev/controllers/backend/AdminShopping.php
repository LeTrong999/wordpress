<?php
class LKT_AdminShopping_Controller{
	
	public function __construct(){
		
	}
	
	public function display(){
		echo '<br/>' . __METHOD__;
		
		global $zController;
		
		
		
		$zController->getView('/shopping/display.php','/backend');
	}
}