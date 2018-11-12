<?php
class Zendvn_Sp_Cart_Controller{
	
	public function __construct(){
		echo '<br/>' . __METHOD__;
		$this->display();
	}
	
	public function display(){
		echo '<br/>' . __METHOD__;
		global $zController;
		
		$zController->getView('cart/display.php','/frontend' );
	}
}