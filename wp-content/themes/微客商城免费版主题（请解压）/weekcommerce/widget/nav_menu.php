<?php 
class nav_menu extends WP_Widget {

	function nav_menu()
	{
		$widget_ops = array('classname'=>'nav_menu','description' => get_bloginfo('template_url').'/images/xuanxiang/5.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::__construct($id_base="nav_menu",$name='[产品筛选]产品分类菜单',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
		
		 $id =esc_attr($instance['id']);
		
		  $title = esc_attr($instance['title']);
		 
	
	 $nav_menu = esc_attr($instance['nav_menu']);
	  $nav_menu_m = esc_attr($instance['nav_menu_m']);
	   $show = esc_attr($instance['show']);
	?>
    

<br />




<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>




<p>   
<?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="<?php echo $this->get_field_id('nav_menu'); ?>">选择一个产品菜单（支持多层菜单）</label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
				<option value="0">不显示</option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
</p>


<p>   

   <label for="<?php echo $this->get_field_id('show'); ?>">父级分类显示模式</label>
			<select id="<?php echo $this->get_field_id('show'); ?>" name="<?php echo $this->get_field_name('show'); ?>">
				<option <?php if(!$show){echo 'selected="selected" '; }?> value="0">默认所有产品分类和商店页面全部显示</option>
                <option <?php if($show==1){echo 'selected="selected" '; }?> value="1">只显示在商店页面</option>
		
			</select>
</p>
 
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	   
		$title= apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$show= apply_filters('show', empty($instance['show']) ? __('') : $instance['show']);

		
	$nav_menu = apply_filters('widget_title', empty($instance['nav_menu']) ? __('') : $instance['nav_menu']);
	
		 
	if($nav_menu){	
	if($show==1&&!is_shop()){}else{
	?>
 <div class="widget woocommerce nav_menu" >       
    <div class="widget_title_t"><?php echo $title ?></div>    


 
   <?php   wp_nav_menu(array('container' => false,'menu' => $nav_menu ,'items_wrap' => '<ul id="menu_widgetss" class="menu_widgetss">%3$s</ul>' ) ); 
   echo '</div>';}
   if(is_product_category()){
	 global $wp_query;
	 $cats=$wp_query->queried_object;
	$cat= get_category_root_id($cats->term_id);

	if(get_categories("child_of=".$cat."&taxonomy=product_cat")){
	
   echo '<div class="widget woocommerce widget_nav_product"><div class="widget_title_t">'.'下属分类：</div><ul>';
   wp_list_categories("child_of=".$cat. "&depth=0&hide_empty=0&title_li=&hierarchical=0&taxonomy=product_cat&show_option_none=");
   
  echo '</ul></div>';
	}
   }
   }
	}
}
register_widget('nav_menu');
?>