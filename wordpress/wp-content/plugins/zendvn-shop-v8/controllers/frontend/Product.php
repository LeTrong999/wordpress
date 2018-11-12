<?php
class Zendvn_Sp_Product_Controller{
	
	public function __construct(){
		//echo '<br/>' . __METHOD__;
		$this->display();
	}
	
	public function display(){
		//echo '<br/>' . __METHOD__;
		global $zController;
		
		$zController->getView('product/display.php','/frontend' );
	}
}