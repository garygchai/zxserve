<?php
/**
 * 主题选项汇总菜单
 * 针对主题选项建立选项菜单

 * @see 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/themeoption
 * @version     1.o
 */


add_action('admin_menu', 'themepark_theme_option');

function themepark_theme_option() {
	if(function_exists('add_menu_page')) {
		add_menu_page('初始化选项', '主题选项', 'administrator','themepark_theme', 'theme_main_opting',  get_bloginfo('template_url').'/images/themepark_theme_option.png',60);
	}
	
}
add_action('admin_menu', 'my_submenu_page');
function my_submenu_page() {
add_submenu_page( 'themepark_theme', '默认列表和筛选', '默认列表和筛选', 'edit_themes', 'theme_cat_search_option', 'theme_cat_search_option_function' );	
add_submenu_page( 'themepark_theme', '404和版权设置', '404和版权设置', 'edit_themes', 'bq_404_option', 'bq_404_option_function' );
add_submenu_page( 'themepark_theme', '侧边栏设置', '侧边栏设置', 'edit_themes', 'widget_option', 'widget_option_function' );
add_submenu_page( 'themepark_theme', '文章系统多语言', '文章系统多语言', 'edit_themes', 'language_option', 'language_option_function' );
add_submenu_page( 'themepark_theme', 'woocommerce产品系统多语言', '产品系统多语言', 'edit_themes', 'product_language_option', 'product_language_option_function' );
add_submenu_page( 'themepark_theme', 'woocommerce多语言', 'WOO多语言', 'edit_themes', 'woo_language_option', 'woo_language_option_function' );

}
//顶部输出函数
function theme_themepark_video($post){
$ct = wp_get_theme();
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';
$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;' ), $ct->display('Name') );
?>
<div id="message" class="update-nag"><p><strong><?php echo $post; ?></strong></p>
 <p>主题名称：<?php echo $ct->display('Name'); ?> |  版本：<?php echo $ct->display('Version'); ?> | <a target="_blank" href="https://www.themepark.com.cn/wkscmfbwoocommercewordpresszt.html">[主题介绍和演示]</a></p>
 <p>需要帮助？我们为你录制了细致的视频教程,点击前往：<br />
<a target="_blank" href=" https://www.themepark.com.cn/wkscmfbwoocommerceztdrsj.html">主题专用视频教程(关于这款主题专门录制的教程)</a><br />
<a target="_blank" href="https://www.themepark.com.cn/category/woocommerce/woocommercespjc/">woocommerce视频教程专区（woocommerce设置，woocommerce多重筛选、文章系统、产品系统的分段教程，那里不会看哪里）</a>
</p></div>	
	<?php 
	}
include_once("widget_option.php"); 
include_once("Initialization.php"); 
include_once("language.php");
include_once("woo-language.php");
include_once("bq_404_option.php");
include_once("product_language_option.php");
include_once("theme_cat_search_option_function.php");

?>