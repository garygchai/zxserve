<?php
function mytheme_initialization_options($wp_customize){
		$wp_customize->add_section('mytheme_initialization_options', array(
        'title'    => __('主题整站风格调整', 'mytheme'),
        'description' => '首页、分类、文章、产品等等页面的背景与颜色都可以在此调整
</br> </br>需要帮助？<a target="_blank" href="https://www.themepark.com.cn/wkscwoocommercegjztspjc.html">[观看视频教程]</a>',        'priority' => 70,
    ));
	
	
	
	
	 $wp_customize->add_setting('mytheme_index_bac', array(
	    'default'        =>   '#f5f5f5',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_index_bac', array(
        'label'    => __('【首页】背景颜色', 'mytheme_index_bac'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_index_bac',
    )));	
	
	
	$wp_customize->add_setting('mytheme_index_bac_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_index_bac_img', array(
        'label'    => __('【首页】背景图片', 'mytheme_index_bac_img'),
         'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_index_bac_img',
		'description' => '如果上传了背景图片，那么背景颜色将会被覆盖掉，如果不设置其他如分类目录等等区域的背景，那么整站将会继承上面两个设置',
     )
    )); 



 $wp_customize->add_setting('mytheme_index_title', array(
	    'default'        =>   '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_index_title', array(
        'label'    => __('【首页】各个模块标题颜色', 'mytheme_index_title'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_index_title',
    )));	
//----------------------------index------------------------------------------------		
	$wp_customize->add_setting('mytheme_onsale', array(
	    'default'        =>   '#f00000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_onsale', array(
        'label'    => __('【全站】促销中背景颜色', 'mytheme_onsale'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_onsale',
    )));	
	
	
	
		$wp_customize->add_setting('mytheme_case_pic_bottom', array(
	    'default'        =>   '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_case_pic_bottom', array(
        'label'    => __('【全站】查看全部和加入购物车背景', 'mytheme_case_pic_bottom'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_case_pic_bottom',
    )));
	
	
	
	$wp_customize->add_setting('mytheme_screening_color', array(
	    'default'        =>   '#f00000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_screening_color', array(
        'label'    => __('【全站】筛选按钮（包括文章筛选和产品筛选）', 'mytheme_screening_color'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_screening_color',
    )));
	
	
	
	
	
	$wp_customize->add_setting('mytheme_page_muen_nav', array(
	    'default'        =>   '#ececec',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_page_muen_nav', array(
        'label'    => __('【全站】面包屑背景颜色', 'mytheme_page_muen_nav'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_page_muen_nav',
    )));
	
	
		$wp_customize->add_setting('mytheme_page_muen_nav2', array(
	    'default'        =>   '#666666',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_page_muen_nav2', array(
        'label'    => __('【全站】面包屑文字颜色', 'mytheme_page_muen_nav2'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_page_muen_nav2',
    )));
	
	
	
//----------------------------all------------------------------------------------	


 $wp_customize->add_setting('mytheme_product_bac', array(
	    'default'        =>   '#f5f5f5',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_product_bac', array(
        'label'    => __('【woo产品列表】背景颜色', 'mytheme_index_bac'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac',
    )));	
	
	
	$wp_customize->add_setting('mytheme_product_bac_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_product_bac_img', array(
        'label'    => __('【woo产品列表】背景图片', 'mytheme_product_bac_img'),
         'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac_img',
		'description' => 'woocommerce的产品列表背景设置：如果上传了背景图片，那么背景颜色将会被覆盖掉',
     )
    )); 
	
	


 $wp_customize->add_setting('mytheme_product_bac2', array(
	    'default'        =>   '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_product_bac2', array(
        'label'    => __('【woo产品详细】背景颜色', 'mytheme_index_bac2'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac2',
    )));	
	
	
	$wp_customize->add_setting('mytheme_product_bac_img2', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_product_bac_img2', array(
        'label'    => __('【woo产品详细】背景图片', 'mytheme_product_bac_img2'),
         'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac_img2',
		'description' => 'woocommerce的产品详细背景设置：如果上传了背景图片，那么背景颜色将会被覆盖掉',
     )
    )); 	
	
	
	



 $wp_customize->add_setting('mytheme_product_bac3', array(

        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_product_bac3', array(
        'label'    => __('【文章分类列表】背景颜色', 'mytheme_index_bac3'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac3',
    )));	
	
	
	$wp_customize->add_setting('mytheme_product_bac_img3', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_product_bac_img3', array(
        'label'    => __('【文章分类列表】背景图片', 'mytheme_product_bac_img3'),
         'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac_img3',
		'description' => '文章分类列表背景设置：如果上传了背景图片，那么背景颜色将会被覆盖掉',
     )
    )); 		
	
	
	
	
 $wp_customize->add_setting('mytheme_product_bac4', array(

        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_product_bac4', array(
        'label'    => __('【文内详细】背景颜色', 'mytheme_index_bac4'),
        'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac4',
    )));	
	
	
	
	
	$wp_customize->add_setting('mytheme_product_bac_img4', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_product_bac_img4', array(
        'label'    => __('【文章详细】背景图片', 'mytheme_product_bac_img4'),
         'section'  => 'mytheme_initialization_options',
        'settings' => 'mytheme_product_bac_img4',
		'description' => '文章详细页面（包括页面普通模式）背景设置：如果上传了背景图片，那么背景颜色将会被覆盖掉',
     )
    )); 		

//---------------------------product&cat&single------------------------------------------------	

	
};
add_action('customize_register', 'mytheme_initialization_options');
?>