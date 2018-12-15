<?php 
/* 
Template Name:woocommerce个人中心模板
*/ 
get_header();

if(!is_user_logged_in()){
$mytheme_login_img2 =get_option("mytheme_login_img2");
?>

 
<div class="login_out">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="login_in"> 
 
  <?php   
  if($mytheme_login_img2){echo '<img class="login_img_fidx" src="'.$mytheme_login_img2.'" alt="'.get_bloginfo('name').'" />' ;}
   the_content(); ?>
  </div>
 <?php endwhile; endif;?>
</div>
<?php }else{ get_template_part( 'top/top' ); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <div class="MyAccounts_page">
  <div class="content_page MyAccount"> 
  <?php the_content(); ?>
  </div>
  </div>
 <?php endwhile; endif;?>



<?php }get_footer();?>