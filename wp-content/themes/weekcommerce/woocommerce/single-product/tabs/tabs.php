<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
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
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
    <div class="tabs_out" id="tabs_out">
    <p class="move_show_p"><?php echo  get_themepark_option('product_l15','商品描述'); ?></p>
       <div class="tabs_out_fixed">
          <div class="tabs_out_fixed_in">
		<ul class="tabs wc-tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
            <div class="tabs_goto_top"><a href="#top"><?php echo  get_themepark_option('product_l17','购买商品'); ?></a></div>
		</ul>
       </div> </div>
       </div> 
		<?php foreach ( $tabs as $key => $tab ) :  if($key!=''){?>
        
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
		<?php } endforeach; ?>
	</div>

<?php endif; if(get_option('mytheme_fenxiang')&&show_fenxang('product')=='product'){echo '<div class="single_contents"><div class="guding">'.wpautop(trim(stripslashes(get_option('mytheme_fenxiang')))).'</div>  </div>'; }

?>
