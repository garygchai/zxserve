<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$is_admin_huifu="";
$orderid=get_comment_meta($comment->comment_ID,'_orderid', true);
$rating=get_comment_meta($comment->comment_ID,'rating', true);

if($rating&&$orderid){$is_admin_huifu="true";}
?>
<li itemprop="review" itemscope itemtype="http://schema.org/Review"  class="comment byuser <?php if(!$is_admin_huifu){echo 'huifu_g';} ?>" id="li-comment-<?php comment_ID() ?>">
<?php 
$author_namen=get_comment_meta($comment->comment_ID,'author_namen', true);
$timess=get_comment_meta($comment->comment_ID,'times', true);
$city_m =get_comment_meta($comment->comment_ID,'city_m', true);

if($timess){$times_ds=$timess;}else{$times_ds=get_comment_date('Y年m月d日');}
if($city_m){$city=$city_m;}else{$city=get_usermeta($comment->user_id,'shipping_city');}

if($is_admin_huifu){ ?>
<div class="review_user">
<?php  if($author_namen){$author_name=$author_namen;}else{$author_name =get_comment_author();}

 $names_hidden=  cut_str($author_name, 1, 0).'***'.cut_str($author_name, 1, -1);
 do_action( 'woocommerce_review_before', $comment );
 echo '<span class="commet_name">'.$names_hidden.'</span>';
 echo '<span class="adresss">'.$times_ds.'</br>'.$city.'</span>';
 ?>
 	
</div>
<?php  }?>

	<div class="comment_container ">

	<?php 
	if(!$is_admin_huifu){echo "<p>官方回复：</p>";}
	do_action( 'woocommerce_review_before_comment_meta', $comment );
	      do_action( 'woocommerce_review_comment_text', $comment );
		  ?>
 <p class="tleme"><?php if(!$is_admin_huifu){ echo get_comment_date('Y年m月d日'); }else{echo get_comment_meta( $comment->comment_ID, 'itemmeta', true );} ?></p>
	</div>
