<?php
function mytheme_woocommerce_options($wp_customize){
		$wp_customize->add_section('mytheme_woocommerce_options', array(
        'title'    => __('woocommerce模板风格', 'mytheme'),
        'description' => '调整woocommerce的登录注册、个人中心等等woocommerce页面风格调整
</br> </br>需要帮助？<a target="_blank" href="https://www.themepark.com.cn/wkscwoocommercegjztspjc.html">[观看视频教程]</a>',
        'priority' => 70,
    ));
	
	
	
	
	 $wp_customize->add_setting('mytheme_login_color', array(
	    'default'        =>   '#FBB67D',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_login_color', array(
        'label'    => __('【登录注册】背景颜色', 'mytheme_login_color'),
        'section'  => 'mytheme_woocommerce_options',
        'settings' => 'mytheme_login_color',
		'description' => '登录注册需要在非登录状态才能看到，你可以新开一个浏览器，进行预览',
    )));	
	
	
	$wp_customize->add_setting('mytheme_login_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_login_img', array(
        'label'    => __('【登录注册】背景图片', 'mytheme_login_img'),
         'section'  => 'mytheme_woocommerce_options',
        'settings' => 'mytheme_login_img',
		'description' => '尺寸为1920*560，登录注册的背景图片，背景图片只在500像素以上的设备才会显示，而500像素一下的设备则显示背景颜色即可',
     )
    )); 
	
	
	
	
	
	$wp_customize->add_setting('mytheme_login_img2', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_login_img2', array(
        'label'    => __('【登录注册】悬浮图片', 'mytheme_login_img2'),
         'section'  => 'mytheme_woocommerce_options',
        'settings' => 'mytheme_login_img2',
		'description' => '尺寸为640*560，这个图片将会悬浮在注册登录的右侧，这个图片只会在1024以上的分辨率显示',
     )
    )); 
	
	



	 $wp_customize->add_setting('mytheme_myaccount_color', array(
	    'default'        =>   '#f56600',
         'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_myaccount_color', array(
        'label'    => __('【个人中心、购物车、结算】橘色的字体颜色', 'mytheme_myaccount_color'),
        'section'  => 'mytheme_woocommerce_options',
        'settings' => 'mytheme_myaccount_color',
		'description' => '在个人中心、结算以及购物车页面，所有的橘色字体颜色可以通过这个选项统一设置好。',
    )));









	  $wp_customize->add_setting('mytheme_myaccount_gonggao', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_myaccount_gonggao', array(
         'label'      => __('【个人中心】顶部公告', 'mytheme_myaccount_gonggao'),
         'section'  => 'mytheme_woocommerce_options',
         'settings'   => 'mytheme_myaccount_gonggao',
         'description' => '可使用<br>进行分段',
      )));





$wp_customize->add_setting('mytheme_myaccount_kefu', array(
        'default'        => '联系在线客服',
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_myaccount_kefu', array(
         'label'      => __('【个人中心】顶部链接：联系在线客服', 'mytheme_myaccount_kefu'),
         'section'  => 'mytheme_woocommerce_options',
         'settings'   => 'mytheme_myaccount_kefu',
         'description' => '个人中心的顶部固定区域公告下方的联系在线客服链接标题',
      ));
	  
	  
	  

$wp_customize->add_setting('mytheme_myaccount_kefu_url', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_myaccount_kefu_url', array(
         'label'      => __('【个人中心】联系在线客服自定义链接', 'mytheme_myaccount_kefu_url'),
         'section'  => 'mytheme_woocommerce_options',
         'settings'   => 'mytheme_myaccount_kefu_url',
         'description' => '你可以填写弹出qq链接，或者填写其他的链接',
      ));
	  
	 
	 
	 
	 
	$wp_customize->add_setting('mytheme_myaccount_help', array(
        'default'        => '获取更多帮助',
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_myaccount_help', array(
         'label'      => __('【个人中心】顶部链接：获取更多帮助', 'mytheme_myaccount_help'),
         'section'  => 'mytheme_woocommerce_options',
         'settings'   => 'mytheme_myaccount_help',
         'description' => '个人中心的顶部固定区域公告下方的获取更多帮助链接标题',
      ));
	  
	  
	  

$wp_customize->add_setting('mytheme_myaccount_help_url', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_myaccount_help_url', array(
         'label'      => __('【个人中心】获取更多帮助自定义链接', 'mytheme_myaccount_help_url'),
         'section'  => 'mytheme_woocommerce_options',
         'settings'   => 'mytheme_myaccount_help_url',
         'description' => '你可以填写你的网站中的帮助中心链接，或者填写其他的链接',
      ));
  


	
};
add_action('customize_register', 'mytheme_woocommerce_options');
?>