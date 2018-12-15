<?php 
class nav_poket extends WP_Widget {

	function nav_poket()
	{
		$widget_ops = array('classname'=>'nav_poket','description' => get_bloginfo('template_url').'/images/xuanxiang/4.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::__construct($id_base="nav_poket",$name='菜单幻灯片模块',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
         $title= esc_attr($instance['title']);
	     $nav_poket = esc_attr($instance['nav_poket']);
		
		 $modles=esc_attr($instance['modles']);
	     $pic_height=esc_attr($instance['pic_height']);
		 $detects=esc_attr($instance['detects']);
	?>

<br />
<p>
 <label  for="<?php echo $this->get_field_id('title'); ?>">幻灯片标题:</label><br />
 <input type="text" size="40" value="<?php echo $title ; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"/>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">幻灯片标题不会显示出来，但是在排版中可以根据这个命名区分</em>
</p>

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>输出模式</strong></p>
<p>
<label for="<?php echo $this->get_field_id('modles'); ?>">输出模式</label>
			<select id="<?php echo $this->get_field_id('modles'); ?>" name="<?php echo $this->get_field_name('modles'); ?>">
				<option <?php if($modles=='full_nav_pic'){echo 'selected="selected"';} ?> value="full_nav_pic">全屏通栏顶部无边距（1920宽度，高度自定义）</option>
                <option <?php if($modles=='full_nav_pic_b'){echo 'selected="selected"';} ?>value="full_nav_pic_b">全屏通栏顶部有边距（1920宽度，高度自定义）</option>
                <option <?php if($modles=='juzhong_nav_pic_b'){echo 'selected="selected"';} ?>value="juzhong_nav_pic_b">居中标准宽度（1226宽度，高度自适应）</option>

</select>
</p>
<p>
 <label  for="<?php echo $this->get_field_id('pic_height'); ?>">幻灯片高度:</label><br />
 <input type="text" size="40" value="<?php echo $pic_height; ?>" name="<?php echo $this->get_field_name('pic_height'); ?>" id="<?php echo $this->get_field_id('pic_height'); ?>"/>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">若使用全屏通栏的幻灯片，填写此高度值，那么图片将以背景图片显示。以背景图片显示的全屏通栏不会以为不同尺寸而自适应缩放，而是只显示中间的内容</em>
</p>
<p>   
<?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="<?php echo $this->get_field_id('nav_poket'); ?>">选择一个菜单</label>
			<select id="<?php echo $this->get_field_id('nav_poket'); ?>" name="<?php echo $this->get_field_name('nav_poket'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_poket, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">图片和文字都是通过菜单进行输出的，你需要在外观--菜单中新建一个全新的菜单，并在上面的选项指定他。【注意，在上传图片时，请务必保证所有的图片尺寸一致。】</em>
<?php if($nav_poket){ ?>
<a class="button-secondary" target="_blank"  href="<?php echo get_admin_url().'nav-menus.php?action=edit&menu='.$nav_poket; ?>">点击编辑菜单</a>
<?php }else{?>
<a class="button-secondary" target="_blank"  href="<?php echo get_admin_url().'nav-menus.php'; ?>">上面选择一个菜单或者创建菜单</a>
<?php } ?>
</p>

  <label  for="<?php echo $this->get_field_id('modle_bees_t'); ?>">幻灯片切换时间（默认5秒）:</label><br />
 <input type="text" size="40" value="<?php echo $modle_bees_t ; ?>" name="<?php echo $this->get_field_name('modle_bees_t'); ?>" id="<?php echo $this->get_field_id('modle_bees_t'); ?>"/>
 

 <p>   

<p>
<label for="<?php echo $this->get_field_id('detects'); ?>">设备识别</label>
			<select id="<?php echo $this->get_field_id('detects'); ?>" name="<?php echo $this->get_field_name('detects'); ?>">
				<option <?php if($detects==''){echo 'selected="selected"';} ?>value="">移动端和PC端都显示</option>
                <option <?php if($detects=='PcOnly'){echo 'selected="selected"';} ?>value="PcOnly">只显示在PC端</option>
                <option <?php if($detects=='MovePnly'){echo 'selected="selected"';} ?> value="MovePnly">只显示在移动端</option>

</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">通过这个选项，你可以让某些模块只显示在某一个设备类型上，或者都显示，你可以在自定义--初始化中，设置输出的技术规则，响应式适配或者是代码适配</em>
</p>



</p>



 

<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	   
	
        $nav_poket = apply_filters('nav_poket', empty($instance['nav_poket']) ? __('') : $instance['nav_poket']);
		$speed=apply_filters('speed', empty($instance['speed']) ? __('') : $instance['speed']);
	    $pic_height=apply_filters('pic_height', empty($instance['pic_height']) ? __('') : $instance['pic_height']);
		$title=apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$detects=apply_filters('detects', empty($instance['detects']) ? __('') : $instance['detects']);
	    $modles=apply_filters('modles', empty($instance['modles']) ? __('') : $instance['modles']);
		$pic_heights='';
		if($pic_height&&$modles!='juzhong_nav_pic_b'){$pic_heights='style="height:'.$pic_height.'px"';}
		
		?>
<div class="nav_poket_img <?php echo $modles.' '.$detects ?>" <?php if($detects){echo 'id="'.$detects.'"';} ?>>
 <div class="pics<?php echo $nav_poket; ?> swiper-container img_menu" <?php echo $pic_heights; ?>>
 <div class="swiper-wrapper" <?php echo $pic_heights; ?>>
   <?php   wp_nav_menu(array( 'walker' => new pic_full(),'container' => false,'menu' => $nav_poket ,'items_wrap' => '%3$s' ) ); ?>
  
   </div>

       
          <a class="index_next" ></a>
          <a class="index_prve"></a>
          <div class="img_menu_pagination pagination paginations<?php echo $nav_poket; ?>"></div>
          
</div>
</div>
<?php if($speed){ $speeds=$speed.'000';}else{ $speeds='5000';} ?>
 <script>

var nav_swipers<?php echo $nav_poket; ?> = new Swiper('.pics<?php echo $nav_poket; ?>',{
 speed:800,
  pagination:'.paginations<?php echo $nav_poket; ?>',
 calculateHeight : true,
 paginationClickable: true,
 loop:true
<?php if($modle_bees_t!=1){ ?> ,autoplay : <?php echo $speeds; ?><?php } ?>

   }) ;
    $('.index_prve').on('click', function(e){
    e.preventDefault()
    nav_swipers<?php echo $nav_poket; ?>.swipePrev()
  });
  $('.index_next').on('click', function(e){
    e.preventDefault()
    nav_swipers<?php echo $nav_poket; ?>.swipeNext()
  });
 </script>
<?php
	}
}
register_widget('nav_poket');
?>