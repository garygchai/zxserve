<?php
get_header();
get_template_part( 'top/top' ); 
$id=get_the_id();
$catce = get_post_meta($id,"catce", true); 
$modle_single=get_post_meta($id,"modle_single", true);
if(!$catce){ $widget_id='sidebar-widgets4';}else{$widget_id=$catce;}
if(get_post_meta($id, "customize",true)==='modle1'){
?>



<div class="content">

<?php dynamic_sidebar('customize-'.$id);?>
</div>


 <?php }else{ ?>
<div class="content_page">
<?php if(!$modle_single){ ?><div class="left_mian" id="per27"><?php dynamic_sidebar($widget_id);?></div><?php } ?>



<div id="right_shop" class="right_mian <?php if($modle_single){echo 'full_main'; }?>">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="enter"> 
<div class="title_page"><h1><?php the_title();?></h1><div class="des_page"> 
</div>
</div>
<div class="single_contents">
<?php the_content(); ?>

</div>



 <?php 

 if(get_option('mytheme_fenxiang')&&show_fenxang('page')=='page'){echo '<div class="single_contents"><div class="guding">'.wpautop(trim(stripslashes(get_option('mytheme_fenxiang')))).'</div>  </div>'; }?>
 
 
  
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

<?php } get_footer();?>