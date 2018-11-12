<?php
class Zendvn_Sp_CreatePage_Helper{
	
	private $_templatePage;
	
	public function __construct(){
		
		add_filter('page_attributes_dropdown_pages_args', array($this,'register_template'));
		
		add_filter('wp_insert_post_data', array($this,'register_template'));
		
		$this->_templatePage = array(
					'page-zshopping.php' => 'Show all products',
					'page-zcart.php' => 'ZShopping cart'
				);	
	}
	
	public function register_template($attrs){
		//echo '<br/>' . __METHOD__;
		
		$cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());
		
		$templates = wp_get_theme()->get_page_templates();
		
		$templates = array_merge($templates,$this->_templatePage);
		
		wp_cache_delete($cache_key,'themes');
		
		wp_cache_add($cache_key, $templates,'themes', 1800);
		
		return $attrs;
	}
}