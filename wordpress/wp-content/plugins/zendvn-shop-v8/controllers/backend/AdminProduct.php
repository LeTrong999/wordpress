<?php
class Zendvn_Sp_AdminProduct_Controller{
	
	private $_meta_box_id = 'zendvn-sp-zaproduct';
	
	private $_prefix_id = 'zendvn-sp-zaproduct-';
	
	private $_prefix_key = '_zendvn_sp_zaproduct_';
	
	public function __construct(){
		//echo '<br/>' . __METHOD__;
		global $zController;
		$model = $zController->getModel('Product');
		add_action('init', array($model,'create'));
		
		preg_match('#(?:.+\/)(.+)#', $_SERVER['SCRIPT_NAME'],$matches);
		$phpFile = $matches[1];
		if($zController->getParams('post_type') == 'zaproduct'){
			add_action('admin_enqueue_scripts', array($this,'add_css_file'));
			
			if($phpFile == 'post.php' || $phpFile == 'post-new.php'){
				add_action('add_meta_boxes', array($this,'display'));				
				
				add_action('admin_enqueue_scripts', array($this,'media_button_js_file'));
				
				if($zController->isPost()){
					add_action('save_post', array($this,'save'));
				}
			
			}
			
			if($phpFile == 'edit.php'){
				add_filter('manage_posts_columns', array($this,'add_column'));
				
				add_action('manage_zaproduct_posts_custom_column', array($this,'display_value_column'),10,2);
				
				add_filter('manage_edit-zaproduct_sortable_columns', array($this,'sortable_cols'));
				
				add_action('pre_get_posts', array($this,'modify_query'));
				
				add_action('restrict_manage_posts', array($this,'za_category_list'));
			}
		}
		
	}
	
	public function za_category_list(){
		global $zController;
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All ZS Category"),
			'taxonomy'			=> 'za_category',
			'name'				=> 'za_category',
			'orderby'			=> 'name',
			'selected'			=> $zController->getParams('za_category'),
			'hierarchical'		=> true,
			'depth'				=> 3,
			'show_count'		=> true,
			'hide_empty'		=> true,
			
		));
	}
	
	public function modify_query($query){
		global $zController;
		if($zController->getParams('orderby') == ''){
			$query->set('orderby','ID');
			$query->set('order','DESC');
		}
		
		$orderby = $query->get('orderby');
		
		if($orderby == 'view'){
			$query->set('meta_key',$this->create_key('view'));
			$query->set('orderby','meta_value_num');
		}
		
		
		if($zController->getParams('za_category') > 0){
			/* $query->tax_query->queries[0]['field'] = 'term_id';
			$query->tax_query->queries[0]['terms'] = $zController->getParams('za_category'); */
			$tax_query = array(
						'relation' => 'OR',
						array(
								'taxonomy' => 'za_category',
								'field'		=> 'term_id',
								'terms'		=> $zController->getParams('za_category'),
							));
			$query->set('tax_query',$tax_query);
		}
	
	}
	
	public function sortable_cols($columns){
		/* echo '<pre>';
		print_r($columns);
		echo '</pre>'; */
		$columns['id'] 		= 'ID';
		$columns['view'] 	= 'view';
		return $columns;
	}
	
	public function display_value_column($column,$post_id){
		/* echo '<pre>';
		print_r($column);
		echo '</pre>';
		echo '<pre>';
		print_r($post_id);
		echo '</pre>'; */
		if($column == 'id'){
			echo $post_id;
		}
		if($column == 'view'){
			$view  = get_post_meta($post_id, $this->create_key('view'),true);
			if($view == null){
				update_post_meta($post_id, $this->create_key('view'), 0);
				echo '0';
			}else{
				echo $view;
			}
			
		}
		
		if($column == 'category'){
			echo get_the_term_list($post_id, 'za_category','', ', ');
		}
	}
	
	public function add_column($columns){
		/* echo '<pre>';
		print_r($columns);
		echo '</pre>'; */
		$newArr = array();
		foreach ($columns as $key => $title){
			$newArr[$key] = $title;
			if($key == 'author'){
				$newArr['category'] = __('Category');
			}
		}
		
		$new_columns = array(
					'view'=> __('View'),
					'id' => __('ID')
				);
		$newArr = array_merge($newArr,$new_columns);
		return $newArr;
	}

	public function display(){
		add_meta_box($this->_meta_box_id, 'Images of product', array($this,'product_images'),'zaproduct');
		add_meta_box($this->_meta_box_id .'-detail', 'Detail product', array($this,'detail_product'),'zaproduct');
	}
	
	public function save($post_id){
		global $zController;
		
		$arrParam = $zController->getParams();
		$wpnonce_name = $this->_meta_box_id . '-nonce';
		$wpnonce_action = $this->_meta_box_id;
		
		//zendvn-sp-zaproduct-nonce
		if(!isset($arrParam[$wpnonce_name])) return $post_id;
		
		if(!wp_verify_nonce($arrParam[$wpnonce_name],$wpnonce_action)) return $post_id;
		
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
		
		if(!current_user_can('edit_post')) return $post_id;
		
		
		$arrData =  array(
					'img-ordering' 	=> array_map('absint',$arrParam[$this->create_id('img-ordering')]),
					'img-url' 		=> $arrParam[$this->create_id('img-url')],
					'rotate360' 	=> esc_textarea($arrParam[$this->create_id('rotate360')]),
					'price' 		=> filter_var($arrParam[$this->create_id('price')],FILTER_VALIDATE_FLOAT),
					'sale-off' 		=> filter_var($arrParam[$this->create_id('sale-off')],FILTER_VALIDATE_FLOAT),
					'manufacturer' 	=> absint($arrParam[$this->create_id('manufacturer')]),
					'gift' 			=> esc_textarea($arrParam[$this->create_id('gift')]),
				);

		if(!isset($arrParam['save'])){
			$arrData['view'] = 0;
		}
		foreach ($arrData as $key => $val){
			update_post_meta($post_id, $this->create_key($key), $val);
		}
		
	}

	public  function detail_product(){
		echo '<br/>' . __METHOD__;
		global $zController;
		wp_nonce_field($this->_meta_box_id,$this->_meta_box_id . '-nonce');
		
		$zController->_data['controller'] = $this;
		$zController->getView('product/detail_product.php','/backend');
	}
	
	public function product_images(){
		
		global $zController;
		wp_nonce_field($this->_meta_box_id,$this->_meta_box_id . '-nonce');
		$zController->_data['controller'] = $this;
		$zController->getView('product/product_images.php','/backend');
	}
	
	public function media_button_js_file(){
		global $zController;
		
		wp_enqueue_media();
		wp_register_script('zendvn_sp_product_media_button', $zController->getJsUrl('media_button.js'),
							array('jquery'),'1.0',true);
		wp_enqueue_script('zendvn_sp_product_media_button');							
	}
	
	public function add_css_file(){
		global $zController;
		
		wp_register_style('zendvn_sp_product_product_bk', $zController->getCssUrl('product-bk.css'), array(),'1.0');
		wp_enqueue_style('zendvn_sp_product_product_bk');
	}
	
	public function create_id($val){
		return $this->_prefix_id . $val;
	}
	
	public function create_key($val){
		return $this->_prefix_key . $val;
	}
}