<?php
class Zendvn_Sp_Category_Controller{
	
	public function __construct(){
		//echo '<br/>' . __METHOD__;
		$this->display();
	}
	
	public function display(){
		//echo '<br/>' . __METHOD__;
		global $zController;
		
		$zController->getView('category/display.php','/frontend' );
	}
}