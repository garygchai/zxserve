<?php get_header();

include("options/data_cache.php");

global $wp_query;$term_id = get_query_var('cat');

	
	

 $widget_id='sidebar-widgets4';
?>	

<div id="page_muen_nav">
<div class="page_muen_nav_in">

<?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('woo_breadcrumbs')){woo_breadcrumbs() ;}}?>
</div>  
</div>

<div id="blank">
<a class="blank blank_url"><i></i><?php echo  $language_c7;?></a>
<p id="sx_btn"><i></i><?php echo  $language_c6;?></p>
</div>

<div class="content_page">

<div class="left_mian" id="per27"><?php dynamic_sidebar($widget_id);?></div>
<div class="right_mian" id="right_shop">

  <div <?php if($cat_modle2=='shop_thumbnail'){echo 'class="caseshow"id="case_index"';}else{echo 'id="category"';} ?>>

  
  
 <ul class="default">
 
  
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
        <?php 
		$tagerts =$per_colorc2 =$per_colorc3=$modlie ='';
		   $tit= get_the_title();
		    $id =get_the_ID();
			$stickys= get_option('mytheme_stickys');
			if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
		   $linkss=get_post_meta($id,"hoturl", true); 
		   if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		   $target =get_post_meta($id,"hots_tlye", true);
		     
		 ?>
               <li>
                <?php if($cat_modle2!='no'){ ?>  <a <?php echo $tagerts ; ?> href="<?php echo $links1 ?>" class="picdsa">
                  <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
                   <?php  themepark_thumbnails('medium'); ?> </a>
                   <?php } ?>
                  <span <?php if($cat_modle2=='no'){ echo 'class="full_text_span"'; }?>  >
                    <h2>  <a class="titels" <?php echo $tagerts .$per_colorc2; ?> href="<?php echo $links1 ?>"><?php the_title(); ?></a></h2>
                      <p class="infot"><em><?php echo $language_c3;?>：<?php echo get_the_time('Y/m/d') ; ?></em><em></em><em><?php echo $language_c4;?>：<?php echo $getPostViews; ?>  </em> </p>
                      <p <?php echo $per_colorc3; ?>> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,200,"...",'utf-8'); ?></p>
                  </span>
               </li>
               
          
             <?php  endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>      

           </ul> 
           
             <div class="pager">   <?php par_pagenavi(6); ?>  </div>  
</div>
</div>
</div>  
    
<?php get_footer(); ?>
