<?php
function mytheme_header_options($wp_customize){
		$wp_customize->add_section('mytheme_header_options', array(
        'title'    => __('网站顶部设置', 'mytheme'),
        'description' => '通过这个选项设置网站顶部的样式和内容
		</br> </br>需要帮助？<a target="_blank" href="https://www.themepark.com.cn/wkscwoocommercegjztspjc.html">[观看视频教程]</a>',
        'priority' => 60,
    ));

	class Ari_Customize_Textarea_Control extends WP_Customize_Control {
  public $type = 'textarea';
  public function render_content() {

 ?>
  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value()); ?></textarea>
  </label>
  <p><?php echo esc_html( $this->description); ?></p>
<?php 
  }
}



class Ari_Customize_select_nav_Control extends WP_Customize_Control {
  public $type = 'select_nav';
  public function render_content() {

 ?>
  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   
    
    <select style="width:100%;" <?php $this->link(); ?>>
			<option value="0">请选择一个菜单</option>
		<?php
		$big_pic_nav= $this->value();
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $big_pic_nav, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select> 
    
    
    
  </label>
  <p><?php 
  if(!$big_pic_nav){$big_pic_nav=0;};
  $url='href="'.admin_url().'/nav-menus.php?action=edit&menu='.$big_pic_nav.'"';
  echo esc_html( $this->description); echo'<br><a '.$url.' class="button" >进入菜单进行编辑或者创建</a>';?></p>
<?php 
  }
}

class Ari_Customize_select_pages extends WP_Customize_Control {
  public $type = 'select_pages';
  public function render_content() {
$page_ids=esc_textarea( $this->value()); 
 ?>
  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   

             <select <?php $this->link(); ?> >
              <option value=''<?php if ($page_ids == "" ) {echo "selected='selected'";}?> >请选择</option>
             <?php 
			
		$pages = get_pages();
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		?>
       
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $page_ids == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
   
	</select></label>
  <p><?php echo esc_html( $this->description); ?></p>
<?php 
  }
}



class Ari_Customize_fengexian_Control extends WP_Customize_Control {
  public $type = 'fengexian';
  public function render_content() {

 ?>
 <div style="width:100%; background:#333; margin:15px 0; height:1px;"></div>
  
<?php 
  }
}


 $wp_customize->add_setting('mytheme_tonggao_woo_color', array(
	    'default'        => '#6db2b1',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_tonggao_woo_color', array(
        'label'    => __('[全站]woocommerce整站公告背景颜色', 'mytheme_tonggao_woo_color'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_tonggao_woo_color',
		'description' => '如果你启用了woocommerce--设置--店铺通告，那么你可以调整他的背景颜色',
    )));
	
	 $wp_customize->add_setting('mytheme_tonggao_woo_color2', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_tonggao_woo_color2', array(
        'label'    => __('[全站]woocommerce整站公告文字颜色', 'mytheme_tonggao_woo_color2'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_tonggao_woo_color2',
		'description' => 'woocommerce整站通告文字颜色',
    )));



 $wp_customize->add_setting('mytheme_gonggao', array(
        'default'        => '请在此输出公告文字，若不想显示请输入1',
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_gonggao', array(
         'label'      => __('顶部公告文字', 'mytheme_gonggao'),
         'section'    => 'mytheme_header_options',
         'settings'   => 'mytheme_gonggao',

      )));


  $wp_customize->add_setting('mytheme_logo', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_logo', array(
        'label'    => __('电脑版本logo上传[尺寸高度：79px，宽度不要超过200px]', 'mytheme_logo'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_logo',
     )
    )); 
	
	
 $wp_customize->add_setting('mytheme_logo2', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_logo2', array(
        'label'    => __('手机版本logo上传[尺寸高度：70px*70px]', 'mytheme_logo2'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_logo2',
     )
    )); 	
//----------------------------logo------------------------------------------------	
	
	 $wp_customize->add_setting('mytheme_form_pic', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_form_pic', array(
        'label'    => __('整个顶部背景图片(电脑版)', 'mytheme_form_pic'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_form_pic',
		'description' => '整个顶部的背景图片，高度147px，宽度平铺，一般上传一像素宽度即可，也可以上传最大分辨率1920宽度，若非全尺寸宽度，请上传可连续的图片以免出现缝隙',
     )
    )); 
	
	
	
	
	 $wp_customize->add_setting('mytheme_header_color', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_color', array(
        'label'    => __('[pc]整个顶部背景颜色', 'mytheme_header_color'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_color',
		'description' => '注意：背景图片会覆盖掉背景颜色，二者设置其一即可',
    )));
	
	
	
	
	 $wp_customize->add_setting('mytheme_form_pic2', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_form_pic2', array(
        'label'    => __('整个顶部背景图片(移动版)', 'mytheme_form_pic2'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_form_pic2',
		'description' => '整个顶部的背景图片，高度53px，平铺（同pc版本），若设置了背景图片，那么背景颜色将会被覆盖',
     )
    )); 
	
	
	
	 $wp_customize->add_setting('mytheme_header_color2', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_color2', array(
        'label'    => __('[手机]整个顶部背景颜色', 'mytheme_header_color2'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_color2',
		'description' => '注意：背景图片会覆盖掉背景颜色，二者设置其一即可',
    )));
	
//----------------------------header------------------------------------------------		

	
	 $wp_customize->add_setting('mytheme_header_top', array(
	    'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_top', array(
        'label'    => __('[pc]顶部最上背景颜色', 'mytheme_header_top'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_top',
		'description' => '注意：背景颜色会覆盖掉整个顶部的背景设置',
    )));
	
	
	
	
		 $wp_customize->add_setting('mytheme_header_in', array(

        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_in', array(
        'label'    => __('[pc]顶部中间背景颜色', 'mytheme_header_in'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_in',
		'description' => '注意：背景颜色会覆盖掉整个顶部的背景设置',
    )));
	
	
	
	
	
 $wp_customize->add_setting('mytheme_header_bottom', array(

        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_bottom', array(
        'label'    => __('[pc]顶部最下背景颜色', 'mytheme_header_bottom'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_bottom',
		'description' => '注意：背景颜色会覆盖掉整个顶部的背景设置',
    )));

   
//----------------------------pc header------------------------------------------------	
	 
$wp_customize->add_setting('mytheme_header_nav', array(
        'default'        => '#6db2b1',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_nav', array(
        'label'    => __('[pc]全部商品分类背景颜色', 'mytheme_header_nav'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_nav',
	
    )));

//----------------------------pc nav------------------------------------------------	

$wp_customize->add_setting('mytheme_header_top_title', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_top_title', array(
        'label'    => __('最顶部公告以及右侧菜单文字颜色', 'mytheme_header_top_title'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_top_title',
	
    )));
	
	
$wp_customize->add_setting('mytheme_header_title', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_title', array(
        'label'    => __('中间导航标题颜色', 'mytheme_header_title'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_title',
	
    )));	
	
$wp_customize->add_setting('mytheme_header_title2', array(
        'default'        => '#ff4800',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_title2', array(
        'label'    => __('中间导航副标题颜色', 'mytheme_header_title2'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_title2',
	
    )));	
	
$wp_customize->add_setting('mytheme_header_title3', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_title3', array(
        'label'    => __('底部文字颜色（登陆注册等）', 'mytheme_header_title3'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_title3',
	
    )));		
	
 //----------------------------pc text------------------------------------------------	  
};
add_action('customize_register', 'mytheme_header_options');
?>