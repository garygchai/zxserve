<?php include(dirname(dirname(__FILE__))."/options/data_cache.php"); ?>

<div id="page_muen_nav">
<div class="page_muen_nav_in">

<?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('woo_breadcrumbs')){woo_breadcrumbs() ;}}

	$url='href="'.get_bloginfo('home').'"';
	

?>
</div>  
</div>

<div id="blank">
<a class="blank blank_url" href="<?php echo get_bloginfo('home'); ?>" ><i></i><?php echo  $language_c7;?></a>

</div>