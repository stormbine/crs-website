<?php
	add_action('init', 'product_type_register');
	
	function product_type_register() {
		//Arguments to create post type.
	    $args = array(  
	        'label' => __('Products'),  
	        'singular_label' => __('Product'),  
	        'public' => true,  
	        'show_ui' => true,  
	        'capability_type' => 'post',  
	        'hierarchical' => true,  
	        'has_archive' => false,
	        'supports' => array('title', 'editor', 'page-attributes'),
			'rewrite' => true,
			'menu_icon' => 'dashicons-products',
			'show_in_rest' => true,
	       );  

	    register_post_type( 'products' , $args );
	}		
?>