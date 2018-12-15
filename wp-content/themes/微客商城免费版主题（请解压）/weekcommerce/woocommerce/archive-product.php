<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
include(dirname(dirname(__FILE__))."/options/data_cache.php"); 

 global $wp_query,$product;
            $cat_obj = $wp_query->get_queried_object_id();
			$term_id = $cat_obj;
			if($term_id){$blank_url=get_permalink( woocommerce_get_page_id( 'shop' ) );}
			else if(is_shop()){$blank_url=get_bloginfo('url');}

$widget_id='sidebar-widgets4';
get_header( 'shop' );

 ?>
<div id="page_muen_nav">  

<div class="page_muen_nav_in">
<?php if( function_exists( 'woocommerce_breadcrumb') ) woocommerce_breadcrumb();?>
</div>
</div>
<div id="blank">
<a <?php if($blank_url){ echo 'href="'.$blank_url.'" '; }?>class="blank <?php echo $blank_class; ?>"><i></i><?php echo  $product_l1; ?></a>
<p id="sx_btn"><i></i><?php echo  $product_l2; ?></p>
</div>
 
<div class="content_page">
<?php get_template_part( 'woocommerce/single-product/screening' );if(!$cat_modle ){ ?>

<div class="left_mian" id="per27"><?php dynamic_sidebar($widget_id);?></div>

<?php } ?>

<div class="right_mian" id="right_shop">

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		
		
	?>

<div class="caseshow"id="case_index">

<div class="loop_before" >

<?php woocommerce_product_subcategories();do_action( 'woocommerce_before_shop_loop' );?>
</div>
<ul>

		<?php if ( have_posts() ) :	?>

				

				<?php while ( have_posts() ) : the_post(); 
				global $product; 
				
				
				 shopshow_loop($cat_modles,'h2',$duibi);
				  endwhile; // end of the loop. ?>

		

		</ul> 
        <div style="clear:both;"></div>
        
        </div>   
		

		<?php endif; ?>

	<?php woocommerce_product_loop_end(); do_action( 'woocommerce_after_shop_loop' );?>

	
   


    </div>    <div style="clear:both;"></div>
    </div>
    
    
  
<?php get_footer( 'shop' ); ?>
