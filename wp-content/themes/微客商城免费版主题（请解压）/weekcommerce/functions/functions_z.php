<?php 

/**
 * 文章系统函数
 * 函数清单：
 * 文章页面底部固定文字输出判断;
 * option获取和默认函数;
 * 多作者时，只显示自己的文章;
 * 特定的meta—key在qeury进行筛选；
 * 如果有Memcached或者Memcache，缓存菜单;
 * 排除搜索敏感字;
 * Gravatar缓存头像;
 * 排除搜索敏感字;
 * 开启安全登录链接,以及管理员和编辑权限不得从默认woocommerce登陆;
 * 如果打开了安全key,那么woocommerce的登录将会被拦截;
 * 移动端去除掉adminbar，因为会影响悬浮的顶部;
 * 仪表盘提示
   
 * @author url 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/functions
 * @version     1.o
 */



//文章页面底部固定文字输出判断
function  show_fenxang($option){
	
$mytheme_fenxiang_show = substr(get_option('mytheme_fenxiang_show'), 0, -1);
$mytheme_fenxiang_show_away=explode(',',$mytheme_fenxiang_show);
if(in_array("page", $mytheme_fenxiang_show_away)&&$option=='page'){return'page'; }	
elseif(in_array("single", $mytheme_fenxiang_show_away)&&$option=='single'){return'single'; }	
elseif(in_array("product", $mytheme_fenxiang_show_away)&&$option=='product'){return'product'; }	
	} 

//option获取和默认函数
function get_themepark_option($show,$default){
	
	if(get_option($show)){return get_option($show);}
	else{
		return $default;
		}
	

	}

//多作者时，只显示自己的文章
function mypo_parse_query_useronly( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
        if ( !current_user_can( 'manage_options' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->id );
        }
    }
}
 add_filter('parse_query', 'mypo_parse_query_useronly' );

//特定的meta—key在qeury进行筛选
add_filter('query_vars', 'metakey_queryvars' );
function metakey_queryvars( $qvars )
{
$qvars[] = 'not_meta_key';
return $qvars;
}

add_filter('posts_where', 'metakey_where' );
function metakey_where( $where )
{
global $wp_query;
global $wpdb;

if( isset( $wp_query->query_vars['not_meta_key'] )) {
$where .= $wpdb->prepare(" AND $wpdb->posts.ID NOT IN ( SELECT post_id FROM $wpdb->postmeta WHERE ($wpdb->postmeta.post_id = $wpdb->posts.ID) AND meta_key = %s) ", $wp_query->query_vars['not_meta_key']);
}

return $where;
}


//如果有Memcached或者Memcache，缓存菜单
if ( class_exists( 'Memcached' ) || class_exists( 'Memcache' ) ) {
add_filter( 'pre_wp_nav_menu', 'themepark_get_nav_menu_cache', 10, 2 );
function themepark_get_nav_menu_cache( $nav_menu, $args ) {
    $cache_key      = themepark_get_nav_menu_cache_key($args);
    $cached_menu    = get_transient( $cache_key );
    if ( ! empty( $cached_menu ) )
        return $cached_menu;

    return $nav_menu;
}

add_filter( 'wp_nav_menu', 'themepark_set_nav_menu_cache', 10, 2 );
function themepark_set_nav_menu_cache( $nav_menu, $args ) {
    $cache_key      = themepark_get_nav_menu_cache_key($args);
    set_transient( $cache_key, $nav_menu, 86400 );
    
    return $nav_menu;
}

function themepark_get_nav_menu_cache_key($args){
    $timestamp = get_transient('nav-menu-cache-timestamp');
    if($time === false){
        $timestamp = time();
        set_transient( 'nav-menu-cache-timestamp', $time, 86400 );
    }
    return apply_filters( 'nav_menu_cache_key' , 'nav-menu-' . md5( serialize( $args ).serialize(get_queried_object()) ) . $timestamp );
}

// 更新菜单，清理缓存
add_action( 'wp_update_nav_menu', 'themepark_delete_nav_menu_cache' );
function themepark_delete_nav_menu_cache( $menu_id, $menu_data){
    set_transient( 'nav-menu-cache-timestamp', time(), 86400 );
}
//Gravatar缓存头像
function themepark_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),
"0.bsdev.cn",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'themepark_get_avatar', 10, 3 );
//缓存头像END
}




//移动端去除掉adminbar，因为会影响悬浮的顶部	
if(wp_is_mobile()){	
add_filter('show_admin_bar', '__return_false');
}

//仪表盘提示
add_action( 'wp_dashboard_setup', 'themepark_wellcome' );
function themepark_wellcome() {
   add_meta_box( 'themepark_wellcome', '帮助、教程和建站资源', 'themepark_wellcome_box', 'dashboard', 'side', 'high' );
}
function themepark_wellcome_box(){
?>	

<p>嗨！欢迎使用WEB主题公园出品的高级woocommerce主题，我们为你准备了一些建立网站所需要的资源，你可以看看是否需要呢！<br />你也可以直接进入<a target="_blank" href="https://www.themepark.com.cn">WEB主题公园</a></p>
<ul class="community-events" >
<li class="event-none">【woocommerce付费版主题教程】主题可以导入演示数据，这样你就可以参考演示数据中的设置和视频进行修改和学习了<br />
<a target="_blank" href="http://woo.themepark.com.cn">[真实主题建立的演示网站]</a> |  <a target="_blank" href="https://www.themepark.com.cn/wkscmfbwoocommerceztdrsj.html">[进入主题配套视频教程]</a></li>

<li class="event-none"><a target="_blank" href="https://www.themepark.com.cn/category/news/design/">[建立网站找不到合适的素材？点击这里看看！]</a> </li>
<li class="event-none"><a target="_blank" href="https://www.themepark.com.cn/category/themes/woocommerce-theme-advanced-payment/">[看看更多其他的woocommerce高级主题]</a> </li>

</ul>

	
	<?php 
	}
	
	
//截断字数函数	
function custom_excerpt_length( $length ) {
	return 700;    //填写需要截取的字符数，1个汉字=2个字符
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//移除谷歌字体
function remove_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );
//清理header输出
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link',10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action( 'wp_head', 'rel_canonical' ); 
remove_action ( 'pre_post_update', 'wp_save_post_revision' );
//移除版本号
function themepark_remove_cssjs_ver( $src ) {
	if( strpos( $src, 'ver='. get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'themepark_remove_cssjs_ver', 999 );
add_filter( 'script_loader_src', 'themepark_remove_cssjs_ver', 999 );
	
//获取产品分类
function get_product_cat( $args = '' ) {
	        $defaults = array( 'taxonomy' => 'product_cat' );
	        $args = wp_parse_args( $args, $defaults );

	        $taxonomy = $args['taxonomy'];
	     
	        $taxonomy = apply_filters( 'get_categories_taxonomy', $taxonomy, $args );

	        if ( isset($args['type']) && 'link' == $args['type'] ) {
	                _deprecated_argument( __FUNCTION__, '3.0', '' );
	                $taxonomy = $args['taxonomy'] = 'link_category';
	        }
	
	        $categories = (array) get_terms( $taxonomy, $args );
	
        foreach ( array_keys( $categories ) as $k )
	                _make_cat_compat( $categories[$k] );

	        return $categories;
	};
?>