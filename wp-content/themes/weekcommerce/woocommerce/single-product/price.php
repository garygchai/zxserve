<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
include(dirname(dirname(dirname(__FILE__)))."/options/data_cache.php"); 

global $product, $woocommerce;
$id=get_the_id();
$out=$out_end='';
if(!$product->is_on_sale()){$magins='price_magin';}
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<div class="price">
    <?php if($product->is_on_sale()){ ?>
   <div class="price_title <?php echo $magins; ?>">
      
      <del><?php echo $product_l4 ; ?></del> 
       <ins><?php echo $product_l5 ; ?></ins>
  
   </div>
   <?php } ?>
	<div class="price_info  <?php echo $magins; ?>">
    
    <?php if($product->get_type()=='variable'&&$product->is_on_sale()){
		 echo '<del>'.woocommerce_price(get_woo_regular_price_t('min') ).'-'.woocommerce_price(get_woo_regular_price_t('max')).'</del><ins>'. $product->get_price_html().'</ins>';
		
		
		}else{  if(!$product->is_on_sale()){ $out='<ins>';$out_end="</ins>";} ?>

   
    
	<?php echo $out.$product->get_price_html().$out_end;}
	

	 ?>
    
    
    </div>
    
    <?php wc_product_sold_count(); ?>
    </div>


</div>

	

			