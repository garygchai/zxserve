<?php 
class nav_poket_ul extends WP_Widget {

	function nav_poket_ul()
	{
		$widget_ops = array('classname'=>'nav_poket_ul','description' => get_bloginfo('template_url').'/images/xuanxiang/3.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::__construct($id_base="nav_poket_ul",$name='菜单图片/图标并列模块',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
         $title= esc_attr($instance['title']);
	     $nav_poket_ul = esc_attr($instance['nav_poket_ul']);
	
		 $modles=esc_attr($instance['modles']);
	     $bac_color=esc_attr($instance['bac_color']);
		 $bac_imgage=esc_attr($instance['bac_imgage']);
		 $detects=esc_attr($instance['detects']);
		   $titleseo= esc_attr($instance['titleseo']);
		   
		    $modles2=esc_attr($instance['modles2']);
	?>

<br />
<p>
 <label  for="<?php echo $this->get_field_id('title'); ?>">标题:</label><br />
 <input type="text" size="40" value="<?php echo $title ; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"/>
 
</p>

<b>seo标签设置</b><br />
   
    <label  for="<?php echo $this->get_field_id('titleseo'); ?>">模块标题seo标签</label><br />
             <select id="<?php echo $this->get_field_id('titleseo'); ?>" name="<?php echo $this->get_field_name('titleseo'); ?>" >
              <option value=''<?php if ($titleseo == "" ) {echo "selected='selected'";}?> > div标签</option>
              <option value='h2'<?php if ($titleseo == "h2" ) {echo "selected='selected'";}?> > 	H2标签</option>
              <option value='h3'<?php if ($titleseo == "h3" ) {echo "selected='selected'";}?> > H3标签</option>
               <option value='h4'<?php if ($titleseo == "h4" ) {echo "selected='selected'";}?> > H4标签</option>
                  <option value='h5'<?php if ($titleseo == "h5" ) {echo "selected='selected'";}?> > H5标签</option>
                <option value='strong'<?php if ($titleseo == "strong" ) {echo "selected='selected'";}?> > strong标签</option>
	          
	</select>

</p>

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>输出模式</strong></p>
<p>
<label for="<?php echo $this->get_field_id('modles'); ?>">输出模式</label>
			<select id="<?php echo $this->get_field_id('modles'); ?>" name="<?php echo $this->get_field_name('modles'); ?>">
				<option <?php if($modles==''){echo 'selected="selected"';} ?> value="">默认一排三个</option>
                <option <?php if($modles=='list_4'){echo 'selected="selected"';} ?>value="list_4">一排4个</option>
                <option <?php if($modles=='list_5'){echo 'selected="selected"';} ?>value="list_5">一排五个</option>
                 <option <?php if($modles=='list_6'){echo 'selected="selected"';} ?>value="list_6">一排六个</option>
                 <option <?php if($modles=='list_8'){echo 'selected="selected"';} ?>value="list_8">一排八个</option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('modles2'); ?>">图片/图标模式</label>
			<select id="<?php echo $this->get_field_id('modles2'); ?>" name="<?php echo $this->get_field_name('modles2'); ?>">
				<option <?php if($modles2==''){echo 'selected="selected"';} ?> value="">图片模式</option>
                <option <?php if($modles2=='icons_nav'){echo 'selected="selected"';} ?> value="icons_nav">图标模式</option>
             
</select><br />
图标模式一般用于移动设备上，图标尺寸100x100px
</p>

<p>
 <label  for="<?php echo $this->get_field_id('bac_color'); ?>">模块背景颜色:</label><br />
 <input type="text" size="40" value="<?php echo $bac_color; ?>" name="<?php echo $this->get_field_name('bac_color'); ?>" id="<?php echo $this->get_field_id('bac_color'); ?>"/>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">请填写色值如#f6f6f6</em>
</p>

<p>
 <label  for="<?php echo $this->get_field_id('bac_imgage'); ?>">模块背景图片:</label><br />
 <input type="text" size="40" value="<?php echo $bac_imgage ; ?>" name="<?php echo $this->get_field_name('bac_imgage'); ?>" id="<?php echo $this->get_field_id('bac_imgage'); ?>"/>
  <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a>
</p>

<p>   
<?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="<?php echo $this->get_field_id('nav_poket_ul'); ?>">选择一个菜单</label>
			<select id="<?php echo $this->get_field_id('nav_poket_ul'); ?>" name="<?php echo $this->get_field_name('nav_poket_ul'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_poket_ul, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">图片和文字都是通过菜单进行输出的，你需要在外观--菜单中新建一个全新的菜单，并在上面的选项指定他。【注意，在上传图片时，请务必保证所有的图片尺寸一致。】</em>
<?php if($nav_poket_ul){ ?>
<a class="button-secondary" target="_blank"  href="<?php echo get_admin_url().'nav-menus.php?action=edit&menu='.$nav_poket_ul; ?>">点击编辑菜单</a>
<?php }else{?>
<a class="button-secondary" target="_blank"  href="<?php echo get_admin_url().'nav-menus.php'; ?>">上面选择一个菜单或者创建菜单</a>
<?php } ?>
</p>

 
 

 

<p>
<label for="<?php echo $this->get_field_id('detects'); ?>">设备识别</label>
			<select id="<?php echo $this->get_field_id('detects'); ?>" name="<?php echo $this->get_field_name('detects'); ?>">
				<option <?php if($detects==''){echo 'selected="selected"';} ?>value="">移动端和PC端都显示</option>
                <option <?php if($detects=='PcOnly'){echo 'selected="selected"';} ?>value="PcOnly">只显示在PC端</option>
                <option <?php if($detects=='MovePnly'){echo 'selected="selected"';} ?> value="MovePnly">只显示在移动端</option>

</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">通过这个选项，你可以让某些模块只显示在某一个设备类型上，或者都显示，你可以在自定义--初始化中，设置输出的技术规则，响应式适配或者是代码适配</em>
</p>







 

<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	   
	    $bac_imgages='';
        $nav_poket_ul = apply_filters('nav_poket_ul', empty($instance['nav_poket_ul']) ? __('') : $instance['nav_poket_ul']);
		$speed=apply_filters('speed', empty($instance['speed']) ? __('') : $instance['speed']);
	    $bac_color=apply_filters('bac_color', empty($instance['bac_color']) ? __('') : $instance['bac_color']);
		$title=apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$detects=apply_filters('detects', empty($instance['detects']) ? __('') : $instance['detects']);
	    $modles=apply_filters('modles', empty($instance['modles']) ? __('') : $instance['modles']);
		$modles2=apply_filters('modles2', empty($instance['modles2']) ? __('') : $instance['modles2']);
		$bac_imgage=apply_filters('bac_imgage', empty($instance['bac_imgage']) ? __('') : $instance['bac_imgage']);
		
		if($bac_imgage){$bac_imgages=' center url('.$bac_imgage.')';}
		if($bac_color){$bac_colors='style="background:'.$bac_color.' '.$bac_imgages.'"';}
		
		?>
<div class="nav_poket_ul <?php echo $detects ?>" <?php if($detects){echo 'id="'.$detects.'"';}echo $bac_colors; ?>>
<div class="nav_poket_ul_in">
<?php if($title){ ?>
  <div class="modle_title">
  <?php if($titleseo){echo '<'.$titleseo.'  class="mantitle">';}else{echo '<div  class="mantitle">';} ?>
	<?php echo $title ; ?>
	<?php if($titleseo){echo '</'.$titleseo.'>';}else{echo '</div>';} ?>
  </div>
    <?php } ?>
 <ul class="nav_poket_ul_list <?php echo $modles; if(!$modles2){echo ' hidsxe_nav';} ?>" <?php if($modles2){echo 'id="'.$modles2.'"';} ?>>
   <?php   wp_nav_menu(array( 'walker' => new header_menu(),'container' => false,'menu' => $nav_poket_ul ,'items_wrap' => '%3$s' ) ); ?>
 </ul>
</div>
</div>

        <?php
	}
}
register_widget('nav_poket_ul');
?>