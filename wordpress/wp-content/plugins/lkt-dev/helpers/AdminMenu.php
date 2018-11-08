<?php
class LKT_AdminMenu_Helper{
	
	public function __construct(){
		add_action('admin_menu', array($this,'modify_admin_menus'));
		// if(isset($_GET['post_type']) && $_GET['post_type'] == 'zsproduct'){
		// 	add_action('admin_enqueue_scripts', array($this,'add_js'));
		// }
	}
	
	public function add_js(){
		global $zController;
		
		wp_enqueue_script('zendvn_sp_admin_menu',$zController->getJsUrl('admin_menu.js'),
						array('jquery'),'1.0.0',false);
	}

	function modify_admin_menus(){
	
		global $menu, $submenu;
	
		$lkt_manager = $submenu['lkt-manager'];
		foreach ($lkt_manager as $key => $val){
			if($val[2] == 'lkt-manager-categories'){
				$lkt_manager[$key][2] = 'edit-tags.php?taxonomy=lkt_category&post_type=lktproduct';
			}
				
			if($val[2] == 'lkt-manager-products'){
				$lkt_manager[$key][2] = 'edit.php?post_type=lktproduct';
			}
		}
		$submenu['lkt-manager'] = $lkt_manager;
		remove_menu_page('edit.php?post_type=lktproduct');
	}
	
	
}