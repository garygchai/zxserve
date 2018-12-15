<?php
ob_start();
include_once("load.php");
include_once("functions/functions_z.php");
include_once("options/data_cache.php");
include_once("themeoption/themeoption.php"); 
include_once("functions/seo.php");
include_once("functions/breadcrumbs.php");
include_once("functions/ajax_comments_fun.php");
include_once("widget.php"); 
include_once("options/customize_css.php");
include_once("ajax/get_cartnunber.php"); 

include_once("customize_box2.php"); 
include_once("customize_box3.php"); 
include_once("loop/shopshow.php"); 
include_once("loop/caseshow.php"); 


require  'theme-updates/theme-update-checker.php';
	    $example_update_checker = new ThemeUpdateChecker(	
		  'weekcommerce_free', 
         'http://www.themepark.com.cn/free_themes/2017/weekcommerce_free.json'  
);


?>