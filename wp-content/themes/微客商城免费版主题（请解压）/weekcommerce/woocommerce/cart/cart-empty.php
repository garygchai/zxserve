<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
include(dirname(dirname(dirname(__FILE__)))."/options/data_cache.php"); 

wc_print_notices();

?>
<div id="woocommerce_cart_ajax" class="woocommerce">
<?php echo'<h2>'.$woo_language_cart1.'<b id="cart_number">'. get_cart_number().'</b> '.$woo_language_cart2.'</h2>'; ?>
<p class="cart-empty">
	<?php echo $woo_language_cart3; ?>
</p>
</div>
<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<div class="no_order_in_here">
		<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php echo $woo_language_cart4; ?>
		</a>
	</div>
<?php endif; ?>
