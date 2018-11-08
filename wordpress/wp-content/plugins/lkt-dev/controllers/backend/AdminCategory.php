<?php
class LKT_AdminCategory_Controller{
	public function __construct(){
		//echo '<br/>' . __METHOD__;
		add_action('init',array($this,'create'));
	}
	
	public function create(){
	
		$labels = array(
				'name'				=> 'LKT categories',
				'singular' 			=> 'LKT category',
				'menu_name'			=> 'Categories',
				//'all_items'		=> chua xac dinh
				//'view_item'		=> chua xac dinh
				'edit_item'			=> 'Edit lkt category',
				'update_item'		=> 'Update lkt categor',
				'add_new_item'		=> 'Add new lkt category',
				//'new_item_name'	=> chua xac dinh
				//'parent_item'		=> chua xac dinh
				//'parent_item_colon'	=> chua xac dinh
				'search_items'		=> 'Search lkt categories',
				'popular_items'		=> 'LKT categories are using',
				'separate_items_with_commas' => 'Separate tags with commas 123',
				'choose_from_most_used' => 'Choose from the most used tags 123',
				'not_found'			=> 'No book category found',
	
		);
		$args = array(
				'labels' 				=> $labels,
				'public'				=> true,
				//'show_ui'				=> false,
				//'show_in_nav_menus'	=> false,
				'show_tagcloud'			=> true,
				'hierarchical'			=> true,
				'show_admin_column'		=> false,
				'query_var'				=> true,
				'rewrite'				=> array('slug' => 'zs_category'),
		);
		register_taxonomy('lkt_category', 'lktproduct',$args);
	
	}
}