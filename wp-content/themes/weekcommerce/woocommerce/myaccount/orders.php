<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include(dirname(dirname(dirname(__FILE__)))."/options/data_cache.php"); 
$order_list=$actives=$actives1=$actives2=$actives3=$actives4=$actives5='';
my_info_in_myaccount();

 global $woocommerce;
 if(isset($_GET['no_done']) ){$actives1='class="actives"';
	$status_no_done=array( 'wc-pending' =>$woo_language_d9 ,'wc-processing' => $woo_language_d4, 'wc-shipped' =>$woo_language_d3, 'wc-on-hold' =>$woo_language_d11, 'wc-cancelled' => $woo_language_d0 ,'wc-refunded' => $woo_language_d5 ,'wc-failed' => $woo_language_d12 );}else if(isset($_GET['shipped'])){$actives2='class="actives"';
	$status_no_done=array(  'wc-shipped' => $woo_language_d3 );}else if(isset($_GET['processing'])){$actives3='class="actives"';
	$status_no_done=array(  'wc-processing' => $woo_language_d4 );}else if(isset($_GET['refunded'])){$actives4='class="actives"';
	$status_no_done=array(  'wc-refunded' =>$woo_language_d5 );}else if(isset($_GET['completed'])){$actives5='class="actives"';
		$status_no_done=array(  'wc-completed' => $woo_language_d6 );}else{
			$actives='class="actives"';
			$status_no_done=wc_get_order_statuses();
			}
  
		

$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
    'order-number'  => __( 'ID', 'woocommerce' ),
    'order-date'    => __( 'Date', 'woocommerce' ),
    'order-total'   => __( 'Packages', 'woocommerce' ),
    'order-total'   => __( 'Price', 'woocommerce' ),
    'order-status'  => __( 'Status', 'woocommerce' ),
    'order-actions' => '&nbsp;',
) );
$customer_orders1 = get_posts(apply_filters('woocommerce_my_account_my_orders_query', array(
    'numberposts' => -1,
    'meta_key' => '_customer_user',
    'meta_value' => get_current_user_id(),
    'post_type' => wc_get_order_types('view-orders'),
    'post_status' => array_keys($status_no_done)
        )));
$total_records = count($customer_orders1);
$posts_per_page = 8;
$total_pages = ceil($total_records / $posts_per_page);
$paged = isset( $_GET['orderpage'] ) ? absint( $_GET['orderpage'] ) : 1;
$customer_orders = get_posts(array(
    'meta_key' => '_customer_user',
    'meta_value' => get_current_user_id(),
    'post_type' => wc_get_order_types('view-orders'),
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'post_status' => array_keys($status_no_done)
    ));
 $args = array(
                'base' => add_query_arg( 'orderpage', '%#%' ),
                'format' => '',
                'total' => $total_pages,
                'current' => $paged,

                'prev_text' => __( '«', 'aag' ),
                'next_text' => __( '»', 'aag' ),
            ); 
		$order_list.='<div class="order_paginate">'.paginate_links($args).'</div>';  
		
		
$order_urls = get_permalink( wc_get_page_id( 'myaccount' ) );
	$str2 = 'page_id';
	if(strpos($order_urls,$str2) === false ){$order_urls2=  $order_urls ."/orders";$andthis="?";}else{$order_urls2=  $order_urls ."&orders";$andthis="&";}				
		
 ?>
<div class="my_info_cart">

 <div class="my_info_cart_title orders_btns">
       <a href="<?php echo $order_urls2 ?>"<?php echo $actives; ?> ><?php echo $woo_language_d1; ?></a>
       <a href="<?php echo $order_urls2.$andthis.'no_done=yes' ?>" <?php echo $actives1; ?>><?php echo $woo_language_d2; ?></a>
       <a href="<?php echo $order_urls2.$andthis.'shipped=yes' ?>"<?php echo $actives2; ?>><?php echo $woo_language_d3; ?></a>
       <a href="<?php echo $order_urls2.$andthis.'processing=yes' ?>"<?php echo $actives3; ?>><?php echo $woo_language_d4; ?></a>
       <a href="<?php echo $order_urls2.$andthis.'refunded=yes' ?>"<?php echo $actives4; ?>><?php echo $woo_language_d5; ?></a>
       <a href="<?php echo $order_urls2.$andthis.'completed=yes' ?>"<?php echo $actives5; ?>><?php echo $woo_language_d6; ?></a>
       
       <div class="boder_greee"></div>
	   </div>

	<ul class="order_list" >
	
			<?php   foreach ( $customer_orders as $customer_order ):
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
					if($order->get_status()=="pending"){$btn_orders_go='<a class="cancel_order" href="'.$order->get_cancel_order_url( wc_get_page_permalink( 'myaccount' ) ).'">'.$woo_language_ds6.'</a><a href="'.$order->get_checkout_payment_url().'">'.$woo_language_ds5.'</a>';}
				else{$btn_orders_go='<a href="'.$order->get_view_order_url().'">'.$woo_language_ds3.'</a>';}
				$view_url=$order->get_view_order_url();
				?>
			
				
						<?php echo '<li class="order_list_li">
		<div class="order_list_head">
		 		<time datetime="'.date( 'Y-m-d', strtotime($order->get_date_created()  ) ).'" title="'.esc_attr( strtotime($order->get_date_created()  ) ).'">'.date( 'Y-m-d', strtotime($order->get_date_created() ) ).'</time>
				<span class="order_number">'.$woo_language_ds1.$order->get_order_number().'</span>
				<span class="order_status">'.$woo_language_d8.order_state_translate( $order->get_status() ).'</span>
				<span class="contact_kefu"><a href="#">'.$woo_language_ds2.'</a><a href="'.$view_url.'">'.$woo_language_ds3.'</a></span>
		</div>
		<ul class="order_details_list">'.order_details_in($order->get_order_number()).'</ul>
		<div class="order_list_footer">
		  
		  <span>'.$item_count.$woo_language_ds4.$order->get_formatted_order_total().$btn_orders_go.'</span>
		
		</div>
		</li>'; ?>
		<?php endforeach; ?>
		
</ul>
<?php echo $order_list;?>
	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $total_pages ) : ?>
		<div class="woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( $current_page !== intval( $total_pages ) ) : ?>
				<a class="woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>



<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
</div>