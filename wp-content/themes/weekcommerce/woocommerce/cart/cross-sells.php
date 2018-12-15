<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
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
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop;

if ( ! $crosssells = WC()->cart->get_cross_sells() ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => apply_filters( 'woocommerce_cross_sells_total', $posts_per_page ),
	'orderby'             => $orderby,
	'post__in'            => $crosssells,
	'meta_query'          => WC()->query->get_meta_query()
);

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'cross-sells';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );

if ( $products->have_posts() ) : ?>

		<div class="up-sells my_info_cart upsells products">

		 <div class="my_info_cart_title">
       <a class="actives">也许你也喜欢</a>
       <div class="boder_greee"></div>
     </div>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post();global $product;  ?>

		
          <li>
                    <div class="case_pic">   <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
						<a href="<?php  echo get_permalink() ; ?>" target="_blank"  ><?php  themepark_thumbnails('shop_thumbnail'); ?></a>
							
							
                            </div>
                     <div class="case_text">
                      
                        <a href="<?php echo get_permalink() ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title',get_the_title())),  0,50,"...",'utf-8'); ?></a>
                     
                     
                  
                     
                     <?php if ( $price_html = $product->get_price_html() ) : ?>
	                <div class="price_cat"><?php echo $price_html; ?></div>
                    <?php endif; ?>
                    </div>
                    
                    
                    <div class="price_cat_btn">
                             
					<?php
					
					if($product->get_type()=="simple"){$ajax="add_to_cart_button ajax_add_to_cart";}else{$ajax="";}
					 echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s contact_btn button product_type_simple '.$ajax.'">
	<div class="cart_zt"></div>
	%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
	),
$product )  ?>
                            
                            
                            </div>
                    </li>
        
        

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
