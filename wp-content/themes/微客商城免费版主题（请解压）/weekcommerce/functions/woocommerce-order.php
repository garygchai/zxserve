<?php 
/**
 * woocommerce订单系统函数   
 * @author url 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/functions
 * @version     1.o
 */
 
function is_order_completed($order_id){
	$status_no_done=array( 'wc-shipped' => '已经发货' );
	$rsult='';
	$order = wc_get_order( $order_id );
	    global $wpdb;
		foreach( $order->get_items() as $item_id => $item ) {	 
	if(!woo_order_comment_yes($item['product_id'],$order_id)) {
		
		$rsult.="没有";
		
		}else{

			}
	}
	if($rsult){return $rsult;}
	}

//未完成的订单
 function  order_no_done(){ 
 	$order_list='';
 include(dirname(dirname(__FILE__))."/options/data_cache.php");
	  global $woocommerce;
	$status_no_done=array( 'wc-pending' =>'待付款' ,'wc-processing' => '正在处理', 'wc-shipped' => '已经发货', 'wc-on-hold' => '保留' , 'wc-cancelled' => '已取消' ,'wc-refunded' => '已退款' ,'wc-failed' => '失败订单' );
	
	
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
	 'paged' => 5,
    'post_status' => array_keys($status_no_done)
	
        )));  
$total_records = count($customer_orders1);
$posts_per_page = 5;
$total_pages = ceil($total_records / $posts_per_page);
$paged = isset( $_GET['orderpage'] ) ? absint( $_GET['orderpage'] ) : 1;
$customer_orders = get_posts(array(
    'meta_key' => '_customer_user',
    'meta_value' => get_current_user_id(),
    'post_type' => wc_get_order_types('view-orders'),
    'posts_per_page' => 5,
    'paged' => $paged,
    'post_status' => array_keys($status_no_done)
    ));
  $cart = get_permalink( wc_get_page_id( 'cart' ) );
    $order_urls = get_permalink( wc_get_page_id( 'myaccount' ) );
	$str2 = 'page_id';

	if(strpos($order_urls,$str2) === false ){$order_urls2=  $order_urls ."/orders";}else{$order_urls2=  $order_urls ."&orders";}
$order_list.='<ul class="order_list" >';

	  foreach ( $customer_orders as $customer_order ){ 
		$order      = wc_get_order( $customer_order );
                $item_count = $order->get_item_count();
				
				if($order->get_status()=="pending"){$btn_orders_go='<a class="cancel_order" href="'.$order->get_cancel_order_url( wc_get_page_permalink( 'myaccount' ) ).'">'.$woo_language_ds6.'</a><a href="'.$order->get_checkout_payment_url().'">'.$woo_language_ds5.'</a>';}
				else{$btn_orders_go='<a href="'.$order->get_view_order_url().'">'.$woo_language_ds3.'</a>';}
				$view_url=$order->get_view_order_url();

		$order_list.= '<li class="order_list_li">
		<div class="order_list_head">
		 		<time datetime="'.date( 'Y-m-d', strtotime( $order->get_date_created() ) ).'" title="'.esc_attr( strtotime( $order->get_date_created()  ) ).'">'.date( 'Y-m-d', strtotime( $order->get_date_created()  ) ).'</time>
				<span class="order_number">'.$woo_language_ds1.$order->get_order_number().'</span>
				<span class="order_status">'.$woo_language_d8.order_state_translate( $order->get_status() ).'</span>
				<span class="contact_kefu"><a href="#">'.$woo_language_ds2.'</a><a href="'.$view_url.'">'.$woo_language_ds3.'</a></span>
		</div>
		<ul class="order_details_list">'.order_details_in($order->get_order_number()).'</ul>
		<div class="order_list_footer">
		  
		  <span>'.$item_count.$woo_language_ds4.$order->get_formatted_order_total().$btn_orders_go.'</span>
		
		</div>
		</li>';
		  }global $wp_query;
 

		
		 $args = array(
                'base' => add_query_arg( 'orderpage', '%#%' ),
                'format' => '',
                'total' => $total_pages,
                'current' => $paged,
                'prev_text' => __( '«', 'aag' ),
                'next_text' => __( '»', 'aag' ),
            ); 
		$order_list.='<div class="order_paginate">'.paginate_links($args).'</div>';  
		  
	 $order_list.='</ul>' ;
	if($order){ return $order_list;}else{return '<div class="no_order_in_here"><p>'.$woo_language_dz18.'</p><p><a href="'.$order_urls2.'">'.$woo_language_a4.'</a><a href="'.$cart.'">'.$woo_language_a5.'</a></p></div> ';};
	 }
//调用订单详细
function  order_details_in($order_number){
	$order_details='';
	 $order = wc_get_order( $order_number );
	 foreach( $order->get_items() as $item_id => $item ) {
		 
		 $product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
		 $is_visible        = $product && $product->is_visible();
		 $image   = get_the_post_thumbnail( $item['product_id'], apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), array('title'	 => $item['name'],'alt'    => $item['name']) );
	     $product_permalink = get_permalink( $item['product_id'] );
		 ob_start(); 
	wc_display_item_meta( $item );
	$item_meta= ob_get_contents();
	ob_end_clean();
		 
		 
		$order_details.='<li class="order_details_list_li">
		      <a class="order_details_pic" target="_blank" href="'.$product_permalink.'">'.$image.'</a>
		      <span class="product_txt"><a  target="_blank" href="'.$product_permalink.'" class="order_details_title">'.$item['name'].'</a>
			  '.$item_meta.'
			  </span>
			  <span class="order_product_number" title="数量：'.$item['qty'].'">X'.$item['qty'].'</span>
			  '.$order->get_formatted_line_subtotal( $item ).'
		</li>';
		 
		 };
	return $order_details;
	 }
	 
	 
	 

	 
function my_info_in_myaccount(){
	global $current_user;    wp_get_current_user();
	if(get_option('mytheme_myaccount_gonggao')){$mytheme_myaccount_gonggao=stripslashes(get_option('mytheme_myaccount_gonggao'));}else{$mytheme_myaccount_gonggao='欢迎访问WEB主题公园官方商城<br>最新公告：商城目前支持微信和支付宝付款，手机刷一刷即可付款哦，你可以进入新手帮助查看购物流程';};//个人中心公
	
$mytheme_myaccount_kefu=get_option('mytheme_myaccount_kefu');
$mytheme_myaccount_kefu_url=get_option('mytheme_myaccount_kefu_url');	

$mytheme_myaccount_help=get_option('mytheme_myaccount_help');
$mytheme_myaccount_help_url=get_option('mytheme_myaccount_help_url');
	
	$timezoom=get_option("timezone_string");
	date_default_timezone_set($timezoom);
$h=date('H');
$woo_language_wh1=get_themepark_option('woo_language_wh1','早上好');
$woo_language_wh3=get_themepark_option('woo_language_wh3','中午好');
$woo_language_wh4=get_themepark_option('woo_language_wh4','下午好');
$woo_language_wh5=get_themepark_option('woo_language_wh5','晚上好');


if ($h<11) {$hello= $woo_language_wh1;}
else if ($h<13) {$hello= $woo_language_wh3;}
else if($h<18) { $hello= $woo_language_wh4;}
else if($h<24) { $hello= $woo_language_wh5;}
?>

<div class="my_info">
      <div class="my_info_name">
      
         <?php $default=''; echo get_avatar(  $current_user->ID, 60, $default, $current_user->display_name ); ?>
         <span>
         <p><?php echo $hello; ?></p>
         <b><?php echo $current_user->display_name ;?></b>
         </span>
      </div>
      
      <div class="info_shop">
       <p><?php echo  $mytheme_myaccount_gonggao ?></p>
       <p>
       <?php if($mytheme_myaccount_kefu){ echo '<a target="_blank" href="'.$mytheme_myaccount_kefu_url.'">'.$mytheme_myaccount_kefu.'</a>'; } ?>   
       <?php if($mytheme_myaccount_help){ echo '<a target="_blank" href="'.$mytheme_myaccount_help_url.'">'.$mytheme_myaccount_help.'</a>'; } ?>  
         </p>
      
      </div>
</div>
	
	
	
	<?php
	
	}
	
//清除结算页面的一些信息
    add_filter( 'woocommerce_checkout_fields' , 'unset_checkout_fields' );  
    function unset_checkout_fields( $fields ) {  
 
      unset( $fields['shipping']['shipping_last_name'] );  
      unset( $fields['shipping']['shipping_company'] );  
	 unset( $fields['shipping']['shipping_postcode'] ); 
      unset( $fields['shipping']['shipping_address_2'] );     
      unset( $fields['billing']['billing_last_name'] );  
      unset( $fields['billing']['billing_company'] ); 
      unset( $fields['billing']['billing_address_2'] );  
 
	   
	  $fields['billing']['billing_phone']['priority'] =20;
	  $fields['billing']['billing_email']['priority'] =30;
	  $fields['billing']['billing_phone']['class'] =array( 'form-row-last' );
	  $fields['billing']['billing_email']['class'] =array( 'form-row-first' );
	   
    return $fields;  
    }  
//修改结算页面地址的信息顺序
add_filter( 'woocommerce_default_address_fields' , 'priority_checkout_fields' );
function 	priority_checkout_fields( $address_fields){
	 
	 unset( $address_fields['last_name'] );  
      unset( $address_fields['company'] );  

      unset( $address_fields['address_2'] );     
	 
	   $address_fields['country']['priority'] = 40; 
	   $address_fields['state']['priority'] = 50;  
	   $address_fields['city']['priority'] = 60;
	    $address_fields['address_1']['priority'] = 80;
		$address_fields['country']['class'] = array( 'form-row-last' );
		$address_fields['state']['class'] = array( 'form-row-first' );
		 $address_fields['city']['class'] = array( 'form-row-last' );
	
	    return $address_fields;  
	}
		 

?>