<?php 

class news_index extends WP_Widget {

	function news_index()
	{
		$widget_ops = array('classname'=>'news_index','description' => get_bloginfo('template_url').'/images/xuanxiang/2.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::__construct($id_base="news_index",$name='新闻模块【内容排版区模块】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
	     $w_cat = esc_attr($instance['w_cat']);
		 $title = esc_attr($instance['title']);
 $detects=esc_attr($instance['detects']);
	    $bac_color=esc_attr($instance['bac_color']);
		 $bac_imgage=esc_attr($instance['bac_imgage']);
		 
		  $titleseo= esc_attr($instance['titleseo']);
	 $titleseo3= esc_attr($instance['titleseo3']);
     $nnmber = esc_attr($instance['nnmber']);
	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>模块属性设置</strong></p>







<p>
 <label  for="<?php echo $this->get_field_id('title'); ?>">标题:</label> 
<input type="text" size="40" value="<?php echo $title ; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"/>
</p>



<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">选择分类1:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
              <option value=''>不显示</option>
<?php 
		 $categorys = get_categories();
		$sigk_cat2= $w_cat;
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $sigk_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

</p>


<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认4):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>



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




<p>

    <label  for="<?php echo $this->get_field_id('titleseo3'); ?>">文章标题seo标签</label><br />
             <select id="<?php echo $this->get_field_id('titleseo3'); ?>" name="<?php echo $this->get_field_name('titleseo3'); ?>" >
               <option value=''<?php if ($titleseo3 == "" ) {echo "selected='selected'";}?> > div标签</option>
              <option value='h2'<?php if ($titleseo3 == "h2" ) {echo "selected='selected'";}?> > 	H2标签</option>
              <option value='h3'<?php if ($titleseo3 == "h3" ) {echo "selected='selected'";}?> > H3标签</option>
               <option value='h4'<?php if ($titleseo3 == "h4" ) {echo "selected='selected'";}?> > H4标签</option>
                  <option value='h5'<?php if ($titleseo3 == "h5" ) {echo "selected='selected'";}?> > H5标签</option>
                <option value='strong'<?php if ($titleseo3 == "strong" ) {echo "selected='selected'";}?> > strong标签</option>
              
             
             
           
                 
	          
	</select>
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
<label for="<?php echo $this->get_field_id('detects'); ?>">设备识别</label>
			<select id="<?php echo $this->get_field_id('detects'); ?>" name="<?php echo $this->get_field_name('detects'); ?>">
				<option <?php if($detects==''){echo 'selected="selected"';} ?>value="">移动端和PC端都显示</option>
                <option <?php if($detects=='PcOnly'){echo 'selected="selected"';} ?>value="PcOnly">只显示在PC端</option>
                <option <?php if($detects=='MovePnly'){echo 'selected="selected"';} ?> value="MovePnly">只显示在移动端</option>

</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">通过这个选项，你可以让某些模块只显示在某一个设备类型上，或者都显示，你可以在自定义--初始化中，设置输出的技术规则，响应式适配或者是代码适配</em>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">ps.这个模块的略缩图尺寸在媒体库--缩略图大小中设置。</em>

</p>

	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	   
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
	    $nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('4') : $instance['nnmber']);
	  $titleseo=  apply_filters('titleseo', empty($instance['titleseo']) ? __('0') : $instance['titleseo']);
		$titleseo3=  apply_filters('titleseo3', empty($instance['titleseo3']) ? __('0') : $instance['titleseo3']);
		$title  = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
	$detects= apply_filters('detects', empty($instance['detects']) ? __('0') : $instance['detects']); 
		$bac_imgage=apply_filters('bac_imgage', empty($instance['bac_imgage']) ? __('') : $instance['bac_imgage']);
		 $bac_color=apply_filters('bac_color', empty($instance['bac_color']) ? __('') : $instance['bac_color']);
		 
		 $oder=$bac_imgages=$bac_colors=$sticky='';
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber ,  );     $query = new WP_Query( $args );  
	 	if($bac_imgage){$bac_imgages=' center url('.$bac_imgage.')';}
		if($bac_color){$bac_colors='style="background:'.$bac_color.' '.$bac_imgages.'"';}
		
		 if($w_cat){$w_cat_link= get_category_link( $w_cat);}
	

 ?> 




<div  class="news_tuoch"<?php if($detects){echo 'class="'.$detects.'"' ;} echo $bac_colors;?>>
             
             
             
             <div class="news_touch_in">
             <?php if($title){ ?>
<div class="case_title">

    <?php if($titleseo){echo '<'.$titleseo.'  class="mantitle">';}else{echo '<div  class="mantitle">';} ?>
	<?php echo '<a target="_blank" href="'.$w_cat_link.'">'. $title.'</a>' ; ?>
	<?php if($titleseo){echo '</'.$titleseo.'>';}else{echo '</div>';} ?>
 
</div>


 <?php } ?>
             
             <ul>
             
                <?php  while ( $query->have_posts() ) :$query->the_post();  
					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					
					  ?>     
                <li>
                <a class="news_pics" href="<?php echo $links1 ; ?>" target="_blank"><?php themepark_thumbnails("thumbnail"); ?></a>
               <div class="news_textss">
               <?php if($titleseo3){echo '<'.$titleseo3.'  class="posts_title">';}else{echo '<div  class="posts_title">';} ?>
                        <a href="<?php echo $links1 ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf-8'); ?></a>
                         <?php if($titleseo3){echo '</'.$titleseo3.'>';}else{echo '</div>';} ?>
                <em><?php echo get_the_time('Y/m/d') ; ?></em>
               <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,120,"...",'utf-8'); ?></p>
                </div>
                </li>
                
                
               <?php endwhile; ?>
             
             </ul>
             
             
             
             
             
             </div>
             
             
             
 </div>
 
        <?php
	}
}
register_widget('news_index');
?>