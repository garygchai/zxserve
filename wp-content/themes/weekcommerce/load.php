<?php
function themepark_init_css() {
 $id =get_the_ID();
if ( !is_admin()) {
	   wp_deregister_script('jquery');
	   wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery-1.11.0.js");
	   wp_enqueue_script('jquery');
	   
	    wp_deregister_script('easing');
	   wp_register_script( 'easing',get_template_directory_uri() ."/js/jquery.easing.1.3.js");
	   wp_enqueue_script('easing');
	      
	    wp_deregister_script('script');
	   wp_register_script( 'script',get_template_directory_uri() ."/js/script.js",false, '', true );
	   wp_enqueue_script('script');

       wp_deregister_script('swiper2');
	   wp_register_script( 'swiper2',get_template_directory_uri() ."/js/swiper2.min.js");
	   wp_enqueue_script('swiper2');
	
	
	
	
	
	    wp_deregister_style('stylesheet');
	   wp_register_style( 'stylesheet', get_template_directory_uri() .'/style.css');
	   wp_enqueue_style('stylesheet');
	   
	     wp_deregister_style('woocommerce-theme');
	   wp_register_style( 'woocommerce-theme', get_template_directory_uri() .'/css/woocommerce.css');
	   wp_enqueue_style('woocommerce-theme');
	   
	   
	   

	}}
add_action('wp_print_styles', 'themepark_init_css');
?>