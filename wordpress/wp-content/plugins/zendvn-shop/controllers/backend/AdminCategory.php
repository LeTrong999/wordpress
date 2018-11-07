<?php
class Zendvn_Sp_AdminCategory_Controller{
	
	public function __construct(){
		
	}
	
	public function display(){
		echo '<br/>' . __METHOD__;
		global $zController;
		
		echo '<br/>' . $zController->getJsUrl('abc.js');
		
		$zController->getView('/category/display.php','/backend');
	}
}