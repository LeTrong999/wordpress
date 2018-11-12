<?php
class Zendvn_Sp_Frontend{
	
	private $_cssFlag = false;
	
	public function __construct(){
		echo '<br/>' . __METHOD__;
		global $zController;
		//$model = $zController->getModel('Category');
		add_action('init', array($zController->getModel('Category'),'create'));
		add_action('init', array($zController->getModel('Product'),'create'));
		add_action('wp_enqueue_scripts', array($this,'add_css_file'));
		add_action('wp_enqueue_scripts', array($this,'add_js_file'));
		add_filter('template_include', array($this,'load_template'));
	}
	
	public function add_js_file(){
		global $zController;
		if(get_query_var('zaproduct') != ''){
			wp_register_script('zendvn_sp_product_fe', $zController->getJsUrl('product.js'),
								array('jquery'),'1.0',true);
			wp_enqueue_script('zendvn_sp_product_fe');
		}
	}
	
	public function add_css_file(){
		if($this->_cssFlag == true){
			global $zController;
			wp_register_style('zendvn_sp_product_fe', $zController->getCssUrl('product_fe.css'), array(), '1.0');
			wp_enqueue_style('zendvn_sp_product_fe');
		}
	}
	
	public function load_template($templates){
		global $wp_query, $post;
		
		
		if(is_page() == 1){
			
			$page_template = get_post_meta($post->ID,'_wp_page_template', true);
			
			$file = ZENDVN_SP_TEMPLATE_PATH . '/frontend/' . $page_template;
			if(file_exists($file)){
				$this->_cssFlag = true;
				return $file;
			}
		
		}
		
		if(get_query_var('za_category') != ''){
			
			$file = ZENDVN_SP_TEMPLATE_PATH . '/frontend/' . 'za_category.php';
			if(file_exists($file)){
				$this->_cssFlag = true;
				return $file;
			}			
		}
		
		if(get_query_var('zaproduct') != ''){
				
			$file = ZENDVN_SP_TEMPLATE_PATH . '/frontend/' . 'zaproduct.php';
			if(file_exists($file)){
				$this->_cssFlag = true;
				return $file;
			}
		}
		
		return $templates;
	}
}
