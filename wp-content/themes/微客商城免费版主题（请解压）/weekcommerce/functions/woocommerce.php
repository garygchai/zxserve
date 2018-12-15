<?php 
/**
 * woocommerce相关的一些函数
 * woocommerce相关的一些功能函数，以下为一些函数的归纳，描述各个函数的名称和特征，可使用查找模式查找函数标题便于维护
 * get_woo_regular_price_t：获取可变商品中原价的最高价格和最低价格，这个函数增加是因为woocommerce3.8之后不显示可变商品的原价导致主题结构不显示而不美观写的
 * order_state_translate： 订单状态文字替换函数（多语言功能）
 * MyAccount_navigation： 个人中心左侧导航文字替换函数
 * main_query_menbers wordpress文章部分的显示数量函数
 * product_query_menbers  woocommerce的产品分类数量函数
 * prettyPhotos 强制加载prettyPhotos脚本，让产品拥有点击放大的效果
 * get_product_cat_id 获取产品分类函数
 * wc_product_sold_count 在woocommerce产品详细页面输出累计销量和累计评价函数

 * custom_review_order_before_submit 为woocommerce增加一个已经发货的状态

 
 * wp_insert_order用户后台收货之后发布评分和评论的保存
 * woo_hot_comment_in_list调用热门评论小工具模块中的评论，评论如果加入了url值将优先显示，因为在后台用户自己评分的时候是不保存用户的url的。
 * woo_order_comment_yes woocommerce评分判断，这个会显示在个人中心的订单详细里面
 * woo_order_comment 商品没有评分的时候输出的评分表单，这个函数使用在订单循环中
 * register_already_shipped_order_status 注册一个已经发货的订单状态
 * add_already_shipped_to_order_statuses 增加状态到订单
 * cut_str 将用户的名称隐藏一下，以星号代替，保护隐私
 * is_admin_comment管理员回复判断
   
 * @see 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/functions
 * @version     1.o
 */
//声明对woocommerce的支持，开始woocommerce之旅吧~
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//获取可变商品中原价的最高价格和最低价格，这个函数增加是因为woocommerce3.8之后不显示可变商品的原价导致主题结构不显示而不美观写的
function get_woo_regular_price_t($price_name){
	global $product, $woocommerce;
	if($product->get_type()=='variable'){
$available_variations = $product->get_available_variations();
$i=0;
foreach ($available_variations  as $term) {$i++;}

$variation_id=$available_variations[0]['variation_id']; 
$ii=$i-1;
$variation_id2=$available_variations[$ii]['variation_id']; 

$variable_product1= new WC_Product_Variation( $variation_id );
$variable_product2= new WC_Product_Variation( $variation_id2 );
$min_regular_price = $variable_product1 ->regular_price;
$max_regular_price = $variable_product2 ->regular_price;
}
if($price_name=='min'){return $min_regular_price;}elseif($price_name=='max'){return $max_regular_price ;}
	
	}


/** 订单状态文字替换函数
*** id通过swich函数在循环中进行判断
**/
function order_state_translate($thie_sulg){
	
$woo_language_d3=get_themepark_option('woo_language_d3','已经发货');
$woo_language_d4=get_themepark_option('woo_language_d4','正在处理');
$woo_language_d5=get_themepark_option('woo_language_d5','已退款');
$woo_language_d6=get_themepark_option('woo_language_d6','已完成');
$woo_language_d9=get_themepark_option('woo_language_d9','待付款');
$woo_language_d0=get_themepark_option('woo_language_d0','已取消');
$woo_language_d11=get_themepark_option('woo_language_d11','保留');
$woo_language_d12=get_themepark_option('woo_language_d12','失败订单');

$woo_language_or5=get_themepark_option('woo_language_or5','购物小计：');
$woo_language_or6=get_themepark_option('woo_language_or6','配送:');
$woo_language_or7=get_themepark_option('woo_language_or7','付款方式：');
$woo_language_or2=get_themepark_option('woo_language_or2','合计：');
$woo_language_a7=get_themepark_option('woo_language_a7','账单地址');
$woo_language_a8=get_themepark_option('woo_language_a8','配送地址');
	switch ($thie_sulg){
		
		case 'pending':
		return $woo_language_d9;
		break;
		
		case 'processing':
		return $woo_language_d4;
		break;
		
		case 'shipped':
		return $woo_language_d3;
		break;
		
	    case 'on-hold':
		return $woo_language_d11;
		break;
		
		case 'cancelled':
		return $woo_language_d0;
		break;
		
		case 'refunded':
		return $woo_language_d5;
		break;
		
		case 'failed':
		return $woo_language_d12;
		break;
		
		case 'completed':
		return $woo_language_d6;
		break;
	
	    case 'cart_subtotal':
		return $woo_language_or5;
		break;
		
		 case 'shipping':
		return $woo_language_or6;
		break;
		
		case 'payment_method':
		return $woo_language_or7;
		break;
		
		case 'order_total':
		return $woo_language_or2;
		break;
		
		case 'billingadress':
		return $woo_language_a7;
		break;
		
		case 'shippingadress':
		return $woo_language_a8;
		break;
	
	
	}
	}




/** 个人中心左侧导航文字替换函数 
*** id通过swich函数在循环中进行判断
**/
function MyAccount_navigation($thie_sulg){
$woo_language_p2=get_themepark_option('woo_language_p2','资料概览');
$woo_language_p3=get_themepark_option('woo_language_p3','我的订单');
$woo_language_p4=get_themepark_option('woo_language_p4','我的下载');
$woo_language_p5=get_themepark_option('woo_language_p5','收货地址');
$woo_language_p6=get_themepark_option('woo_language_p6','我的资料');
$woo_language_p7=get_themepark_option('woo_language_p7','退出登录');
	
	
	switch ($thie_sulg){
		
		case 'dashboard':
		echo $woo_language_p2;
		break;
		
		case 'orders':
		echo $woo_language_p3;
		break;
		
		case 'downloads':
		echo $woo_language_p4;
		break;
		
		case 'edit-address':
		echo $woo_language_p5;
		break;
		
		case 'edit-account':
		echo $woo_language_p6;
		break;
		
		case 'customer-logout':
		echo $woo_language_p7;
		break;
		
		
		}
	
	
	
	}



/**  main_query_menbers wordpress文章部分的显示数量函数
     product_query_menbers  woocommerce的产品分类数量函数
**/

add_action( 'pre_get_posts', 'main_query_menbers' );
add_action( 'loop_shop_per_page', 'product_query_menbers' );
function main_query_menbers( $query ) {
    if(!$query->is_main_query()) {
        return;
    }
	$categorys = get_categories();
	foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;

	$cat_nummber= get_option('cat_nummber_'.$category_id);
	if($cat_nummber){
		 if ( is_category($category_id)) {
        $query->set('posts_per_page',$cat_nummber);
    }}}};
	
	
/**  main_query_menbers wordpress文章部分的显示数量函数
     product_query_menbers  woocommerce的产品分类数量函数
**/	
if(class_exists('Woocommerce')){function product_query_menbers($cols){
	 $categorys2 = get_product_cat();
		
		foreach( $categorys2 AS $categoryss ) { 
		 $category_id= $categoryss->term_id;
		
		$cat_nummber= get_option('cat_nummber_'.$category_id);
	if($cat_nummber){
		 if ( is_product_category($category_id)) {
       return $cat_nummber;
    }}}}}

/* 分类和产品分别控制数量   */

//prettyPhotos 强制加载prettyPhotos脚本，让产品拥有点击放大的效果
add_action( 'wp_enqueue_scripts', 'prettyPhotos' );
function prettyPhotos() {
global $woocommerce;
$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
{
wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
wp_enqueue_script( 'prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
}
}


/** get_product_cat_id 获取产品分类函数
**/


function get_product_cat_id($post_id){
	
global $post;
$terms = get_the_terms( $post_id, 'product_cat' );
foreach ($terms as $term) {
    $product_cat_id = $term->term_id;
    break;
}
	return $product_cat_id;
	}

// wc_product_sold_count 在woocommerce产品详细页面输出累计销量和累计评价函数

 function wc_product_sold_count() {
	 global $product,$woocommerce,$post;
	  $id =get_the_ID(); 
$product_l6 = get_themepark_option('product_l6','累计销量：');
$product_l7 = get_themepark_option('product_l7','累计评价：');

   
	$xiaoliang = get_post_meta($id,"xiaoliang", true);
	$xiaoliang_x = get_post_meta($id,"xiaoliang_x", true);
    $units_sold = get_post_meta( $id, 'total_sales', true );
	$comments_number=$product->get_rating_count();
	if(!$xiaoliang){
    echo '<div class="product_summary_xl"><span class="product_summary_xl_1">'.$product_l6 .'<div>' . sprintf( __( '%s', 'woocommerce' ), $units_sold+$xiaoliang_x   ) . '</div></span><span>'.$product_l7 .'<div>'.$comments_number.'</div></span></div>';}
}








//custom_review_order_before_submit 为woocommerce增加一个已经发货的状态
add_action( 'woocommerce_review_order_before_submit','custom_review_order_before_submit');
function custom_review_order_before_submit() {
    $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping = $chosen_methods[0]; 
    if( "FOB" == $chosen_shipping ) {
        WC()->customer->is_vat_exempt = true;
    } else {
        WC()->customer->is_vat_exempt = false;
    }    
}


//delet_description_header去除产品描述自动添加的标题
add_filter( 'woocommerce_product_description_heading','delet_description_header' );
function delet_description_header(){$heading='';return $heading;}







//wp_insert_order用户后台收货之后发布评分和评论的保存
add_action('wp_insert_comment','wp_insert_order',10,2);
function wp_insert_order($comment_ID,$commmentdata) {
    global $wpdb;
    $tel = isset($_POST['orderid']) ? $_POST['orderid'] : false;
	$itemmeta = isset($_POST['itemmeta']) ? $_POST['itemmeta'] : false;
	$author_namen = isset($_POST['author_namen']) ? $_POST['author_namen'] : false;
	$times = isset($_POST['times']) ? $_POST['times'] : false;
	$city_m = isset($_POST['times']) ? $_POST['city_m'] : false;
	$orderids=isset($_POST['orderids']) ? $_POST['orderids'] : false;
	update_comment_meta($comment_ID,'itemmeta',$itemmeta);
    update_comment_meta($comment_ID,'_orderid',$tel);
	update_comment_meta($comment_ID,'author_namen',$author_namen);
	update_comment_meta($comment_ID,'times',$times);
	update_comment_meta($comment_ID,'city_m',$city_m);
	
	if($orderids&&!is_order_completed($orderids)){
	$wpdb->update( $wpdb->posts, array( 'post_status' => 'wc-completed' ), array( 'ID' =>$orderids ) );}
}

//woo_hot_comment_in_list调用热门评论小工具模块中的评论，评论如果加入了url值将优先显示，因为在后台用户自己评分的时候是不保存用户的url的。



//register_already_shipped_order_status 注册一个已经发货的订单状态
function register_already_shipped_order_status() {
    register_post_status( 'wc-shipped', array(
        'label'                     => '已经发货',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'shipped <span class="count">(%s)</span>', '已经发货 <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_already_shipped_order_status' );
//add_already_shipped_to_order_statuses 增加状态到订单
function add_already_shipped_to_order_statuses( $order_statuses ) {
  
    $new_order_statuses = array();
  
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
  
        $new_order_statuses[ $key ] = $status;
  
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-shipped'] = '已经发货';
        }
    }
  
    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_already_shipped_to_order_statuses' );


//cut_str 将用户的名称隐藏一下，以星号代替，保护隐私
if (!function_exists( 'cut_str' ) ) {
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8')
{
    if($code == 'UTF-8')
    {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);

        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen));
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';

        for($i=0; $i< $strlen; $i++)
        {
            if($i>=$start && $i< ($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        //if(strlen($tmpstr)< $strlen ) $tmpstr.= "...";
        return $tmpstr;
    }
}
}


// is_admin_comment管理员回复判断
 function is_admin_comment( $comment_ID = 0 ) {
    $comment = get_comment( $comment_ID );
    $admin_comment = false; //设置一个布尔类型的变量用于判断该留言的ID是否为管理员的留言
    if($comment->user_id == 1){
    $admin_comment = true;
    }
    return$admin_comment;
    }
//yz







?>