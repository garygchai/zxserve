<?php
function mytheme_move_opion($wp_customize){
	
	  $wp_customize->add_section('mytheme_detects_scheme', array(
        'title'    => __('侧边工具栏设置', 'mytheme'),
        'description' => '右侧的工具栏设置，你可以在此设置边栏的风格以及数据设置
</br> </br>需要帮助？<a target="_blank" href="https://www.themepark.com.cn/wkscwoocommercegjztspjc.html">[观看视频教程]</a>',
        'priority' => 79,
    ));
	
	 
	 
	
	
	
 $wp_customize->add_setting('mytheme_toolbar_bac', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));	
 $wp_customize->add_control('mytheme_toolbar_bac', array(
        'label'      => __('[pc]工具栏背景选择', 'mytheme_toolbar_bac'),
        'section'  => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_bac',
		'type'    => 'select',
		 'choices'    => array(
            '' => '默认有背景',
            'none' => '无背景',
          
        ),
		'description' => '只针对PC工具栏默认会在右侧显示一整条背景，如果选择无背景的选项，那么只有按钮会有背景，背景的颜色可以在下方设置',
    )); 

	 $wp_customize->add_setting('mytheme_toolbar_color_m', array(
	    'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_toolbar_color_m', array(
        'label'    => __('[手机]工具栏背景设置（整体背景颜色）', 'mytheme_toolbar_color_m'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_color_m',
		'description' => '手机版没有那么复杂的风格，因此我们只需要设置整体风格和点击的风格',
    )));
	
	
	 $wp_customize->add_setting('mytheme_toolbar_color_m2', array(
	    'default'        => '#f30000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_toolbar_color_m2', array(
        'label'    => __('[手机]选中状态颜色', 'mytheme_toolbar_color_m2'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_color_m2',
		'description' => '选择选中状态的风格',
    )));
	

	
	
	 $wp_customize->add_setting('mytheme_toolbar_color', array(
	    'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_toolbar_color', array(
        'label'    => __('[pc]工具栏背景设置（整体背景颜色）', 'mytheme_toolbar_color'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_color',
    )));
	
	 
	 
	  $wp_customize->add_setting('mytheme_toolbar_images_b', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_toolbar_images_b', array(
        'label'    => __('[pc]工具栏背景图片（整体背景图片）', 'mytheme_toolbar_images_b'),
         'section'    => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_images_b',
		'description' => '上传一张背景图片，宽度为35像素，高度可为最大分辨率1024，也可以使用可连续的图片，可连续的图片高度不限',
     )
    )); 
	 
	 
	 
	  $wp_customize->add_setting('mytheme_toolbar_btn_color', array(
	    'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_toolbar_btn_color', array(
        'label'    => __('[pc]工具栏按钮背景设置（按钮颜色）', 'mytheme_toolbar_btn_color'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_btn_color',
    )));
	
	 
	 
	  $wp_customize->add_setting('mytheme_toolbar_btn_color2', array(
	    'default'        => '#f30000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_toolbar_btn_color2', array(
        'label'    => __('[pc]工具栏按钮选中状态背景设置（按钮颜色）', 'mytheme_toolbar_btn_color2'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_btn_color2',
    )));
	
	 
	 
	 
	  $wp_customize->add_setting('mytheme_qq_code', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_qq_code', array(
         'label'      => __('QQ客服代码', 'mytheme_qq_code'),
       'section'    => 'mytheme_detects_scheme',
         'settings'   => 'mytheme_qq_code',
  
      )));




	    $wp_customize->add_setting('mytheme_toolbar_tel_b', array(
        'default'        => '电话',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tel_b', array(
        'label'      => __('电话标题', 'mytheme_toolbar_tel_b'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tel_b',
		'description' => '填写电话标题',
    ));

	    $wp_customize->add_setting('mytheme_toolbar_tel_b2', array(
        'default'        => '0731-8578****',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tel_b2', array(
        'label'      => __('电话号码', 'mytheme_toolbar_tel_b2'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tel_b2',
		'description' => '填写电话号码，在手机上点击电话号码按钮可以直接拨号',
    ));




   

	





 $wp_customize->add_setting('mytheme_toolbar_tel_b3', array(
        'default'        => '邮箱',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tel_b3', array(
        'label'      => __('邮箱标题', 'mytheme_toolbar_tel_b3'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tel_b3',
		'description' => '填写邮箱标题',
    ));




 $wp_customize->add_setting('mytheme_toolbar_tel_b4', array(
        'default'        => 'info@******.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tel_b4', array(
        'label'      => __('邮箱地址', 'mytheme_toolbar_tel_b4'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tel_b4',
		'description' => '填写邮箱地址，在pc和手机上点击邮箱按钮，会自动启动相关的邮件软件进行发件',
    ));




  $wp_customize->add_setting('mytheme_toolbar_sm_text', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_toolbar_sm_text', array(
        'default'        => '客服在线时间：<br />周一~周六早9：:30--18:00<br />',
		 'label'      => __('底部说明', 'mytheme_toolbar_sm_text'),
       'section'    => 'mytheme_detects_scheme',
         'settings'   => 'mytheme_toolbar_sm_text',
  		'description' => '客服在线时间说明，可使用<br>进行断行',

      )));




 $wp_customize->add_setting('mytheme_toolbar_wechat', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_toolbar_wechat', array(
        'label'    => __('微信二维码图片', 'mytheme_toolbar_wechat'),
         'section'    => 'mytheme_detects_scheme',
        'settings' => 'mytheme_toolbar_wechat',
		'description' => '上传一张微信二维码图片，图片尺寸为170*170',
     )
    )); 


	
	
	    $wp_customize->add_setting('mytheme_toolbar_t1', array(
        'default'        => '个人中心',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_t1', array(
        'label'      => __('个人中心(pc)', 'mytheme_toolbar_t1'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_t1',
		'description' => '按钮名称，需要填写pc和移动版的按钮名称，pc上4个字，移动版2个字，自己可以通过预览决定输入多少按钮的字符',
    ));
	
	
	
	$wp_customize->add_setting('mytheme_toolbar_t2', array(
        'default'        => '购物车',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_t2', array(
        'label'      => __('购物车(通用)', 'mytheme_toolbar_t2'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_t2',
		'description' => '购物车按钮的名称，购物车在pc版本和移动版本都是调用一个数据',
    ));
	
	
	
	$wp_customize->add_setting('mytheme_toolbar_t3', array(
        'default'        => '我的足迹',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_t3', array(
        'label'      => __('我的足迹（pc）', 'mytheme_toolbar_t3'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_t3',
		'description' => '我的足迹只能在pc上显示',
    ));
	
	
	
	$wp_customize->add_setting('mytheme_toolbar_t4', array(
        'default'        => '在线客服',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_t4', array(
        'label'      => __('在线客服（PC）', 'mytheme_toolbar_t4'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_t4',
		'description' => '在线客服按钮的名称',
    ));
	
	
	$wp_customize->add_setting('mytheme_toolbar_t5', array(
        'default'        => '关注微信',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_t5', array(
        'label'      => __('关注微信（PC）', 'mytheme_toolbar_t5'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_t5',
		'description' => '关注微信二维码，这个选项只在pc上显示',
    ));
	
		$wp_customize->add_setting('mytheme_toolbar_t6', array(
        'default'        => '回到顶部',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_t6', array(
        'label'      => __('回到顶部（PC）', 'mytheme_toolbar_t6'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_t6',
		'description' => '回到顶部的pc版本的按钮名称',
    ));
	
	
	
//-------------pc按钮-------------------------	
	
	
	
	
	
	
	
	
    $wp_customize->add_setting('mytheme_toolbar_tm1', array(
        'default'        => '我的',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tm1', array(
        'label'      => __('我的（手机）', 'mytheme_toolbar_tm1'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tm1',
		'description' => '移动版的个人中心按钮文字',
    ));	
	
	
	 $wp_customize->add_setting('mytheme_toolbar_tm2', array(
        'default'        => '分类',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tm2', array(
        'label'      => __('分类（手机）', 'mytheme_toolbar_tm2'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tm2',
		'description' => '移动版中的分类按钮，点击展开和折叠分类菜单',
    ));	
	
	
	
	$wp_customize->add_setting('mytheme_toolbar_tm3', array(
        'default'        => '客服',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_toolbar_tm3', array(
        'label'      => __('客服（手机）', 'mytheme_toolbar_tm3'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_toolbar_tm3',
		'description' => '移动版中的分类按钮，点击展开和折叠分类菜单',
    ));	
	
	
	
};
add_action('customize_register', 'mytheme_move_opion');		
?>