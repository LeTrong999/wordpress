<?php
class Zendvn_Sp_AdminShopping_Controller{
	
	public function __construct(){
		$this->display();
	}
	
	public function display(){
		echo '<br/>' . __METHOD__;
		
		global $zController;
		
		
		
		$zController->getView('shopping/display.php','/backend');
	}
}