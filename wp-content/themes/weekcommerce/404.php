<?php
get_header();
get_template_part( 'top/top' ); 
include("options/data_cache.php");

?>

 
<div class="content_page">
<?php if(!$modle_single){ ?><div class="left_mian" id="per27"><?php dynamic_sidebar('sidebar-widgets4');?></div><?php } ?>



<div class="right_mian <?php if($modle_single){echo 'full_main'; }?>">



  




  <div class="enter"> 
  
  <div class="title_page"><h1><?php echo $language_th3;?></h1></div>

<div class="single_contents">
  <?php if(get_option('mytheme_error_404_move')){ echo '<div class="move_404">'. wpautop(trim(stripslashes(get_option('mytheme_error_404_move')))).'</div>' ;$pc_move_t='pc_404';}else{$pc_move_t='tongyong404';};?>
  <?php if(get_option('mytheme_error_404_pc')){ echo '<div  class="'.$pc_move_t.'">'. wpautop(trim(stripslashes(get_option('mytheme_error_404_pc')))).'</div>' ;};?>

 
  
  
<div class="next_post">
 <p><?php if (get_previous_post()) { previous_post_link($language_s3.': %link','%title',true);}?> </p>  
 <p><?php if (get_next_post()) { next_post_link($language_s4.': %link','%title',true);} ?></p> 
</div>
</div>









 
 
  
 </div>

 







</div>
<div style="clear:both;"></div>
</div>
<?php get_footer();?>