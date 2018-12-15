<?php
function mytheme_footer_options($wp_customize){
		$wp_customize->add_section('mytheme_footer_options', array(
       'title'    => __('网站底部数据和风格', 'mytheme'),
        'description' => '通过这个选项设置网站底部的样式和内容
</br> </br>需要帮助？<a target="_blank" href="https://www.themepark.com.cn/wkscwoocommercegjztspjc.html">[观看视频教程]</a>',        'priority' => 80,
    ));





 $wp_customize->add_setting('mytheme_footer_sever_nav', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new Ari_Customize_select_nav_Control($wp_customize, 'mytheme_footer_sever_nav', array(
        'label'    => __('底部的服务菜单', 'mytheme_footer_sever_nav'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_sever_nav',
		'description' => '底部带有图标的服务菜单选项，选择一个菜单，若不选择的话，那么就不会显示了。',
     )
    )); 



//----------------------------top_nav------------------------------------------------	




 $wp_customize->add_setting('mytheme_footer_tel', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_tel', array(
         'label'      => __('底部电话号码', 'mytheme_footer_tel'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_tel',
         'description' => '联系方式，如果不希望显示的话，可以不填写。',
      ));
	  


 $wp_customize->add_setting('mytheme_footer_contact_s', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_contact_s', array(
         'label'      => __('电话号码后提示文字', 'mytheme_footer_contact_s'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_contact_s',
         'description' => '电话后面的文字信息，可以这样写：周一至周日 8:00-18:00（仅售市话费用）',
      ));
	  



 $wp_customize->add_setting('mytheme_footer_fax', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_fax', array(
         'label'      => __('传真或者邮箱等', 'mytheme_footer_fax'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_fax',
         'description' => '可写传真或者邮箱，例如：传真：0731-85788888',
      ));
	  

 $wp_customize->add_setting('mytheme_footer_contact', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_contact', array(
         'label'      => __('联系地址', 'mytheme_footer_contact'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_contact',
         'description' => '联系地址，可填写联系地址',
      ));
	  
	  
	  
 $wp_customize->add_setting('mytheme_footer_btn', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_btn', array(
         'label'      => __('联系在线客服按钮', 'mytheme_footer_btn'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_btn',
         
      ));
	  	  
	  
	 $wp_customize->add_setting('mytheme_footer_btn_url', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_btn_url', array(
         'label'      => __('在线客服按钮弹出链接', 'mytheme_footer_btn_url'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_btn_url',
          'description' => '可获取qq、line等等的点击弹出链接填写至此处，即可点击弹出和你的客户聊天，也可以填写一般链接去一个任意的页面',
      ));
	    



 $wp_customize->add_setting('mytheme_footer_bqba_ts', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_bqba_ts', array(
         'label'      => __('版权所有©当前年份+网站标题', 'mytheme_footer_bqba_ts'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_bqba_ts',
          'description' => '如果不填写则自动显示版权搜有©当前年份+网站标题',
      ));
	    

 $wp_customize->add_setting('mytheme_footer_bqba_ts2', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_bqba_ts2', array(
         'label'      => __('ICP备案号码', 'mytheme_footer_bqba_ts2'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_bqba_ts2',
          'description' => '如：湘备：22222222，或者ICP备案：湘备：22222222',
      ));
	  
	   $wp_customize->add_setting('mytheme_footer_bqba_ts3', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_bqba_ts3', array(
         'label'      => __('公安备案', 'mytheme_footer_bqba_ts3'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_bqba_ts3',
          'description' => '如：公安网备：湘100000 ',
      ));
	  
	  
	     $wp_customize->add_setting('mytheme_footer_bqba_ts4', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_bqba_ts4', array(
         'label'      => __('公安备案url', 'mytheme_footer_bqba_ts4'),
         'section'  => 'mytheme_footer_options',
         'settings'   => 'mytheme_footer_bqba_ts4',
          'description' => '按照公安备案的要求填写url',
      ));



 $wp_customize->add_setting('mytheme_footer_bqba_ts5', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));	
 $wp_customize->add_control('mytheme_footer_bqba_ts5', array(
        'label'      => __('技术支持是否显示', 'mytheme_footer_bqba_ts5'),
        'section'  => 'mytheme_footer_options',
        'settings'   => 'mytheme_footer_bqba_ts5',
		'type'    => 'select',
		 'choices'    => array(
            '' => '显示:技术支持： WEB主题公园 ',
            'theme by themepark' => '显示：theme by themepark',
			'none' => '不显示',
          
        ),
    )); 


//----------------------------bottom_text------------------------------------------------	




$wp_customize->add_setting('mytheme_footer_sever_nav2', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
$wp_customize->add_control( new Ari_Customize_select_nav_Control($wp_customize, 'mytheme_footer_sever_nav2', array(
        'label'    => __('底部文字菜单', 'mytheme_footer_sever_nav2'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_sever_nav2',
		'description' => '底部版权所有上面的文字菜单，如果不选择菜单的话，这个菜单将不会显示。',
     )
    )); 


$wp_customize->add_setting('mytheme_footer_sever_nav3', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
$wp_customize->add_control( new Ari_Customize_select_nav_Control($wp_customize, 'mytheme_footer_sever_nav3', array(
        'label'    => __('底部认证图标菜单', 'mytheme_footer_sever_nav3'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_sever_nav3',
		'description' => '如果你的网站有一些资格认证，那么你可以使用这个图标菜单将这些认证信息显示出来，也可以使用这个图标菜单显示其他的内容，不选择的话，这个菜单将不会显示。',
     )
    )); 



$wp_customize->add_setting('mytheme_footer_sever_nav4', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
$wp_customize->add_control( new Ari_Customize_select_nav_Control($wp_customize, 'mytheme_footer_sever_nav4', array(
        'label'    => __('友情链接菜单', 'mytheme_footer_sever_nav4'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_sever_nav4',
		'description' => '友情链接只显示在首页，这样不会输出全站权重，在此处选择一个友情链接菜单，若不选择则不显示。',
     )
    ));

//----------------------------more_nav------------------------------------------------	

$wp_customize->add_setting('mytheme_footer_text_p', array(
	    'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_footer_text_p', array(
        'label'    => __('底部所有黑色文字', 'mytheme_footer_text_p'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_text_p',
    )));	
	
	
$wp_customize->add_setting('mytheme_footer_text_hover', array(
	    'default'        => '#ff6700',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_footer_text_hover', array(
        'label'    => __('底部所有橘色文字和鼠标经过的橘色', 'mytheme_footer_text_hover'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_text_hover',
    )));	
		
//----------------------------text_color------------------------------------------------		
		
	 $wp_customize->add_setting('mytheme_footer_pic', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_footer_pic', array(
        'label'    => __('底部上部背景图片', 'mytheme_footer_pic'),
         'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_pic',
		'description' => '背景的上半部分背景图片，建议上传一些可连续的纹理图片，而不要上传带有完整图案的图片，否则在不同分辨率显示的效果会不同，也可以直接设置背景颜色。',
     )
    )); 
		
	$wp_customize->add_setting('mytheme_footer_color', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_footer_color', array(
        'label'    => __('底部上部背景颜色', 'mytheme_footer_color'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_color',
		'description' => '若上传了背景图片，那么背景颜色将会被覆盖掉。',
    )));	
		
		
		
		
		
		
	 $wp_customize->add_setting('mytheme_footer_pic2', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_footer_pic2', array(
        'label'    => __('底部下部背景图片', 'mytheme_footer_pic2'),
         'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_pic2',
		'description' => '背景的上半部分背景图片，建议上传一些可连续的纹理图片，而不要上传带有完整图案的图片，否则在不同分辨率显示的效果会不同，也可以直接设置背景颜色。',
     )
    )); 
		
	$wp_customize->add_setting('mytheme_footer_color2', array(
	    'default'        => '#fafafa',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_footer_color2', array(
        'label'    => __('底部下部背景颜色', 'mytheme_footer_color2'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_color2',
		'description' => '若上传了背景图片，那么背景颜色将会被覆盖掉。',
    )));	

		
//----------------------------footer_bac------------------------------------------------		
		
	
};
add_action('customize_register', 'mytheme_footer_options');
?>