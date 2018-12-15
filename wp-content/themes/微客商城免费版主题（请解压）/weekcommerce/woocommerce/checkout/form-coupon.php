<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
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
 * @version 2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! wc_coupons_enabled() ) {
	return;
}

include(dirname(dirname(dirname(__FILE__)))."/options/data_cache.php"); 

?>
<div class="my_info_cart">
<div class="my_info_cart_title">
       <a class="actives"><?php echo $woo_language_cart8; ?></a>
       <div class="boder_greee"></div>
     </div>

<form class="checkout_coupon" method="post">


		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />



		<input type="submit" class="button" name="apply_coupon" value="<?php echo $woo_language_cart8; ?>" />
	

	
</form>
</div>