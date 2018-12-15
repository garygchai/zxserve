<?php 

class case_comment extends WP_Widget {

	function case_comment()
	{
		$widget_ops = array('classname'=>'case_comment','description' => get_bloginfo('template_url').'/images/xuanxiang/8.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::__construct($id_base="case_comment",$name='产品调用热门评论模块',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
			 $title = esc_attr($instance['title']);
		
			
	
	$w_cat2 = esc_attr($instance['w_cat2']);
	 $zhiding = esc_attr($instance['zhiding']);
	 $titleseo= esc_attr($instance['titleseo']);
	
	 $titleseo3= esc_attr($instance['titleseo3']);
	
 $nnmber = esc_attr($instance['nnmber']);
	
	 $detects=esc_attr($instance['detects']);
	    $bac_color=esc_attr($instance['bac_color']);
		 $bac_imgage=esc_attr($instance['bac_imgage']);
		
	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>模块属性设置</strong></p>

 <p>
 <label  for="<?php echo $this->get_field_id('title'); ?>">文字模块-标题:</label>
 <input type="text" size="40" value="<?php echo $title ; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"/>
 </p>


    
 <label  for="<?php echo $this->get_field_id('w_cat2'); ?>">调用woocommerce商品:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat2'); ?>" name="<?php echo $this->get_field_name('w_cat2'); ?>" >
              <option value=''>不显示</option>
<?php 

		 $categorys2 = get_product_cat();
		
		foreach( $categorys2 AS $categorys ) { 
		 $category_id= $categorys->term_id;
		 $category_name=$categorys->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>   





<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认8):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>



<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">热评调用:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value=''<?php if ($zhiding == "" ) {echo "selected='selected'";}?> >显示评论最多的产品</option>
               <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?> >显示推荐（星标产品）</option>
	</select>

<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">调用热门评论的文章，可选某分类评论最多的文章，也可以选择推荐产品（星标产品）</em>




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
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">略缩图尺寸【文章 ：中等大小； 产品：目录图片】</em>
</p>



	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	
	    $title  = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		
		
		$w_cat2 = apply_filters('w_cat2', empty($instance['w_cat2']) ? __('') : $instance['w_cat2']);
        $nnmber = apply_filters('nnmber', empty($instance['nnmber']) ? __('4') : $instance['nnmber']);
	   
	
		$zhiding  = apply_filters('zhiding', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
		$titleseo=  apply_filters('titleseo', empty($instance['titleseo']) ? __('0') : $instance['titleseo']);
		$titleseo3=  apply_filters('titleseo3', empty($instance['titleseo3']) ? __('0') : $instance['titleseo3']);
		$titleseo2=  apply_filters('titleseo2', empty($instance['titleseo2']) ? __('0') : $instance['titleseo2']); 
		$autoplay = apply_filters('autoplay', empty($instance['autoplay']) ? __('0') : $instance['autoplay']); 
		$detects= apply_filters('detects', empty($instance['detects']) ? __('0') : $instance['detects']); 
		$bac_imgage=apply_filters('bac_imgage', empty($instance['bac_imgage']) ? __('') : $instance['bac_imgage']);
		$bac_color=apply_filters('bac_color', empty($instance['bac_color']) ? __('') : $instance['bac_color']);
		 $oder=$bac_imgages=$bac_colors=$sticky='';
		 
		if($bac_imgage){$bac_imgages=' center url('.$bac_imgage.')';}
		if($bac_color){$bac_colors='style="background:'.$bac_color.' '.$bac_imgages.'"';}
		
	
	$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('4') : $instance['nnmber']);
if($w_cat2){
global $wp_query, $post, $woocommerce,$query_string;

if ($zhiding == "1" ){	
	$args['meta_query'][] = array(
					'key'   => '_featured',
					'value' => 'yes'
				);
}else{
	$args['orderby']  = 'comment_count';
	
	}


	 $args = array(
 'tax_query' => array(
'relation' => 'OR',
 array(
  'taxonomy' => 'product_cat',
  'field' => 'id',
  'terms' => array( $w_cat2 ),
  ),       
  ),
   'posts_per_page' => $nnmber,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'no_found_rows'  => 1,
			'order'          => 'dsc',
			'meta_query'     => array()
  );
	
	
	
	
	$query= new WP_Query( apply_filters( 'woocommerce_products_widget_query_args', $args ) );
	}
	



	 
	
	 
	
     $stickys= get_option('mytheme_stickys');
	if($w_cat2){$w_cat_link= get_term_link( intval($w_cat2), 'product_cat' );}
	 $product_id_slug = get_term($w_cat2);


 ?>

<div id="case_index" <?php if($detects){echo 'class="'.$detects.'"' ;} echo $bac_colors;?> >
<div class="caseshow">

         <?php if($title){ ?>
<div class="case_title">

    <?php if($titleseo){echo '<'.$titleseo.'  class="mantitle">';}else{echo '<div  class="mantitle">';} ?>
	<?php echo '<a target="_blank" href="'.$w_cat_link.'">'. $title.'</a>' ; ?>
	<?php if($titleseo){echo '</'.$titleseo.'>';}else{echo '</div>';} ?>
    
  
</div>


 <?php } ?>
             
    
           <ul id="case_comments">
                     <?php 
					
					 if( $w_cat2&&$query->have_posts()) :         
					  while ( $query->have_posts() ) :$query->the_post();  
					shopshow_loop('shop_comment',$titleseo3,'');
					 
					 endwhile;  wp_reset_query();endif;?>
                      
       
                    </ul>
                  
                   
                
               </div> 

</div>

 
        <?php
 
	}
}
register_widget('case_comment');
?>