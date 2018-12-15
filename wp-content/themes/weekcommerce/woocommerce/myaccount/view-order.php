<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
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
	exit;
}
include(dirname(dirname(dirname(__FILE__)))."/options/data_cache.php"); 

my_info_in_myaccount();
$order_status= $order->get_status() ;

?>

<div class="my_info_cart">


<div class="order_pic_status">

<div class="order_p"><p class="order_p_l">

<?php
	echo	$woo_language_ds1.'#<mark class="order-number">' . $order->get_order_number() . '</mark>
		'.$woo_language_dz1.'<mark class="order-date">' . date( 'Y-m-d', strtotime( $order->get_date_created() ) ). '</mark>
		'.$woo_language_dz2.'<mark class="order-status">' . order_state_translate( $order->get_status() ) . '</mark>';

 $payment_method=  $order->get_order_item_totals();
 $payments=$payment_method['payment_method']['value']; 
?></p>

</div>



</div>




</div>




<div class="my_info_cart">
<?php if ( $notes = $order->get_customer_order_notes() ) : ?>
	<div class="my_info_cart_title">
       <a class="actives"><?php echo $woo_language_dz17; ?></a>
       
       
       <div class="boder_greee"></div>
	   </div>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
</div>