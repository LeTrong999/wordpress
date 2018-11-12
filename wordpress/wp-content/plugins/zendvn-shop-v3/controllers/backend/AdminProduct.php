<?php
class Zendvn_Sp_AdminProduct_Controller{
	
	
	public function __construct(){
		//echo '<br/>' . __METHOD__;
		add_action('init', array($this,'create'));

	}

	public function create(){
		
		$labels = array(
					'name' 				=> __('ZS Products'),
					'singular_name' 	=> __('ZS Product'),
					'menu_name'			=> __('ZS Product'),
					'name_admin_bar' 	=> __('ZS Product'),
					'add_new'			=> __('Add ZS Product'),
					'add_new_item'		=> __('Add New ZS Product'),
					'search_items' 		=> __('Search ZS Product'),
					'not_found'			=> __('No products found.'),
					'not_found_in_trash'=> __('No products found in Trash'),
					'view_item' 		=> __('View product'),
					'edit_item'			=> __('Edit product'),
				);
		$args = array(
				'labels'               => $labels,
				'description'          => translate('Show product list'),
				'public'               => true,
 				'hierarchical'         => true,
// 				'exclude_from_search'  => null, //public
// 				'publicly_queryable'   => null, //public
// 				'show_ui'              => null, //public
// 				'show_in_menu'         => null, 
 				'show_in_nav_menus'    => true, //public
 				'show_in_admin_bar'    => true, //public
 				'menu_position'        => 5,
 				//'menu_icon'            => ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png',
 				'capability_type'      => 'post',
// 				'capabilities'         => array(),
// 				'map_meta_cap'         => null,
 				'supports'             => array('title' ,'editor','author','custom-fields' ,'comments'),
// 				'register_meta_box_cb' => null,
 				'taxonomies'           => array('zs_category'),
 				'has_archive'          => true,
 				'rewrite'              => array('slug'=>'zsproduct'),
// 				'query_var'            => true,
// 				'can_export'           => true,
// 				'delete_with_user'     => null,
// 				'_builtin'             => false,
 				'_edit_link'           => 'post.php?post=%d',
		);
		
		register_post_type('zsproduct',$args);
		
	}
}