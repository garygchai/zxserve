<?php 
/* 
Template Name:woocommerce购物车和结算模板
*/ 
get_header();


?>
<?php
get_header();
get_template_part( 'top/top' ); 
$id=get_the_id();
$catce = get_post_meta($id,"catce", true); 
$modle_single=get_post_meta($id,"modle_single", true);
if(!$catce){ $widget_id='sidebar-widgets4';}else{$widget_id=$catce;}
?>



 <div class="MyAccounts_page">
  <div class="content_page MyAccount"> 
<?php if(!$modle_single){ ?><div class="left_mian" id="per27"><?php do_action( 'woocommerce_account_navigation' );dynamic_sidebar($widget_id);?></div><?php } ?>



<div id="right_shop" class="right_mian <?php if($modle_single){echo 'full_main'; }?>">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="enter"> 
<div class="title_page"><h1><?php the_title();?></h1><div class="des_page"> 
</div>
</div>
<div class="single_contents">
<?php the_content(); ?>

</div>


 </div>

 <?php endwhile; endif; ?>


</div>
<div style="clear:both;"></div>
</div>

<?php  get_footer();?>