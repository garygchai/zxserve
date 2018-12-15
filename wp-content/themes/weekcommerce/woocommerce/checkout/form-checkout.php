<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();
include(dirname(dirname(dirname(__FILE__)))."/options/data_cache.php"); 

?>



<?php
// If checkout registration is disabled and not logged in, the user cannot checkout


?>
<?php wc_get_template( 'checkout/form-coupon.php');?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php 
	$customer_id = get_current_user_id();
	$name='billing';
	$address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
					'first_name'  => get_user_meta( $customer_id, $name . '_first_name', true ),
					'last_name'   => get_user_meta( $customer_id, $name . '_last_name', true ),
					'company'     => get_user_meta( $customer_id, $name . '_company', true ),
					'address_1'   => get_user_meta( $customer_id, $name . '_address_1', true ),
					'address_2'   => get_user_meta( $customer_id, $name . '_address_2', true ),
					'city'        => get_user_meta( $customer_id, $name . '_city', true ),
					'state'       => get_user_meta( $customer_id, $name . '_state', true ),
					'postcode'    => get_user_meta( $customer_id, $name . '_postcode', true ),
					'phone'     => get_user_meta( $customer_id, $name . '_phone', true ),
					'country'     => get_user_meta( $customer_id, $name . '_country', true )
				), $customer_id, $name );
				
				$address2 = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
				
					'address_1'   => get_user_meta( $customer_id, $name . '_address_1', true ),
					'address_2'   => get_user_meta( $customer_id, $name . '_address_2', true ),
					'city'        => get_user_meta( $customer_id, $name . '_city', true ),
					'state'       => get_user_meta( $customer_id, $name . '_state', true ),
				
				
					'country'     => get_user_meta( $customer_id, $name . '_country', true )
				), $customer_id, $name );

				$formatted_address = WC()->countries->get_formatted_address( $address2 );
			
	if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
<div class="my_info_cart">
<div class="my_info_cart_title">
       <a class="actives"><?php echo $woo_language_carts5; ?></a>
       <div class="boder_greee"></div>
     </div>
		<div class="col2-set" id="customer_details">
 
        <?php if($formatted_address){	echo  '<div class="morenbell"><p>'.$woo_language_carts6.$address['first_name'].'<br />
		'.$woo_language_carts7.$address['phone'].'<br />
		'.$woo_language_carts8.$formatted_address.'<br />
		'.$woo_language_carts9.$address['postcode'].'<br />
</p><a class="eitor_thiso">['.$woo_language_carts0.']</a></div>';} ?>
        
        
			<div class="col-1" <?php if($formatted_address){ ?>style="display:none;" <?php } ?>>
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>
</div>
		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<div class="my_info_cart">
    <div class="my_info_cart_title">
       <a class="actives"><?php echo $woo_language_ds3; ?></a>
       <div class="boder_greee"></div>
     </div>


	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>
</div>
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
