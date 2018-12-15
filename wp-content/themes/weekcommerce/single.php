<?php
get_header();
get_template_part( 'top/top' ); 
$id =get_the_ID();
include("options/data_cache.php");


$widget_id='sidebar-widgets4';
?>

 
<div class="content_page">
<div class="left_mian" id="per27"><?php dynamic_sidebar($widget_id);?></div>



<div class="right_mian <?php if($modle_single){echo 'full_main'; }?>">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  




  <div class="enter"> 
  
  <div class="title_page"><h1><?php the_title();?></h1><div class="des_page">


         <?php
		 $id =get_the_ID();
		 
		 if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
		  if(!get_post_meta($id,"bbs_shoppingbox", true)){?>
            <p class="infot"><em><?php echo $language_c3.':'.get_the_time('Y/m/d') ; ?></em>
            <em><?php echo $language_c4.':'.$getPostViews; ?>  </em>
            <em> <?php   foreach((get_the_category()) as $category) { echo $language_s1.'<a href="'. get_category_link($category->cat_ID).'">' .$category->cat_name .'</a> ';} }?></em>
            </p>
          
          
        
</div></div>

<div class="single_contents">

  <?php the_content(); ?>
  
  <div class="single_tag"><?php $posttags = get_the_tags(); if ($posttags) {echo $language_s5; foreach($posttags as $tag) { echo '<a target="_blank" id="tagss" href="'.get_bloginfo('url').'/tag/'.$tag->slug.'">' .$tag->name .'</a>';}}?></div>
  
  
<div class="next_post">
 <p><?php if (get_previous_post()) { previous_post_link($language_s3.': %link','%title',true);}?> </p>  
 <p><?php if (get_next_post()) { next_post_link($language_s4.': %link','%title',true);} ?></p> 
</div>
</div>



<div id="vedio_like">

<?php get_template_part( 'top/relevant_text' );  ?>


</div>









 <?php 

 if(get_option('mytheme_fenxiang')&&show_fenxang('single')=='single'){echo '<div class="single_contents"><div class="guding">'.wpautop(trim(stripslashes(get_option('mytheme_fenxiang')))).'</div>  </div>'; }?>
 
 
  
 </div>

 <?php endwhile; endif;
 

 ?>





 <?php if ( comments_open() ){?>
<div id="respond">
 <?php comments_template(); ?>
</div>
 <?php  } ?>



</div>
<div style="clear:both;"></div>
</div>
<?php get_footer();?>