<?php
function mytheme_footer_form_options($wp_customize){
		$wp_customize->add_section('mytheme_footer_form_options', array(
        'title'    => __('网站表单设置', 'mytheme'),
        'description' => '这个表单需要你安装超级留言板插件才能正常留言</br>  <a href="http://www.themepark.com.cn/wordpressbdcjcjlyb.html" target="_blank">超级留言板插件详细介绍</a>  </br>',
        'priority' => 80,
    ));












 $wp_customize->add_setting('mytheme_footer_post_title', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_post_title', array(
         'label'      => __('表单标题', 'mytheme_footer_post_title'),
         'section'    => 'mytheme_footer_form_options',
         'settings'   => 'mytheme_footer_post_title',

      ));
	  
	  

 $wp_customize->add_setting('mytheme_footer_post_name', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_post_name', array(
         'label'      => __('表单上的姓名', 'mytheme_footer_post_name'),
         'section'    => 'mytheme_footer_form_options',
         'settings'   => 'mytheme_footer_post_name',
  'description' => '默认显示的姓名，不可删除，你可以将“姓名”替换成你想要的称呼',
      ));	  
	  
	  
	 
 $wp_customize->add_setting('mytheme_footer_post_mail', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_footer_post_mail', array(
         'label'      => __('电子邮箱', 'mytheme_footer_post_mail'),
         'section'    => 'mytheme_footer_form_options',
         'settings'   => 'mytheme_footer_post_mail',
         'description' => '默认显示的电子邮箱，如果你想要取消邮箱的填写，请填写1，并在设置--讨论勾选去除必须填写邮箱的选项',
      )); 


 $wp_customize->add_setting('mytheme_footer_post_liuyan', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( 'mytheme_footer_post_liuyan', array(
         'label'      => __('留言', 'mytheme_footer_post_liuyan'),
         'section'    => 'mytheme_footer_form_options',
         'settings'   => 'mytheme_footer_post_liuyan',
         'description' => '默认显示的留言模块，如果你想要取消留言的填写，请填写1',
      )); 





  $wp_customize->add_setting('mytheme_footer_post_from', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new Ari_Customize_select_pages($wp_customize, 'mytheme_footer_post_from', array(
        'label'    => __('底部表单选择页面', 'mytheme_footer_post_from'),
        'section'  => 'mytheme_footer_form_options',
        'settings' => 'mytheme_footer_post_from',
		'description' => '你需要选择一个页面，作为保存表单数据的基础，因为wordpress不允许留言数据保存在首页上',
     )
    )); 




   $wp_customize->add_setting('mytheme_footer_post_code', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_footer_post_code', array(
         'label'      => __('超级留言板代码', 'mytheme_footer_box3_text'),
         'section'    => 'mytheme_footer_form_options',
         'settings'   => 'mytheme_footer_post_code',
   'description' => '在超级留言板插件获取表单代码，填写在这里',
      )));






  $wp_customize->add_setting('mytheme_fengexian2', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_fengexian_Control($wp_customize, 'mytheme_fengexian2', array(
         'label'      => __('分隔线', 'mytheme_searchkey'),
         'section'    => 'mytheme_footer_form_options',
         'settings'   => 'mytheme_fengexian2',
  
      )));

	
	
	
};
add_action('customize_register', 'mytheme_footer_form_options');
?>