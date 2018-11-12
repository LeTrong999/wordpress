<?php
class LKT_AdminManufacturer_Controller{
	public function __construct(){

	}

	public function display(){
		echo '<br/>'.__METHOD__;
		global $zController;
		$zController->getView('/manufacturer/display.php','/backend');
	}

	public function add(){
		echo '<br/>'.__METHOD__;
	}

	public function edit(){
		echo '<br/>'.__METHOD__;
	}

	public function delete(){
		echo '<br/>'.__METHOD__;
	}

	public function status(){
		echo '<br/>'.__METHOD__;
	}

	public function no_access(){
		echo '<br/>'.__METHOD__;
	}
}