<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$a_prettyPhoto='';
$attachment_ids = $product->get_gallery_image_ids();
if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="thumbnails <?php echo 'columns-' . $columns; ?> thumbnails_<?php echo get_the_id(); ?>"><div class="thumbnail_swiper swiper-container">
    <div class="swiper-wrapper"><?php

		
		
		if ( $attachment_ids && has_post_thumbnail() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
		$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
		$image_title     = get_post_field( 'post_excerpt', $attachment_id );

		$attributes = array(
			'title'                   => $image_title,
			'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
		);

		$html = '<a  class="swiper-slide"  >';
		$html .= wp_get_attachment_image( $attachment_id, 'shop_thumbnail', false, $attributes );
 		$html .= '</a>';


	    $html2 = '<a  class="swiper-slide" class="swiper-slide" href="'.$full_size_image[0].'"   data-rel="prettyPhoto[product-gallery]" rel="nofollow" >';
		$html2 .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
 		$html2 .= '</a>';

     $a_prettyPhoto .=apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html2, $attachment_id );

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
	}
}
		
		
		
	

	?></div></div>
    
     <a class="thumbnail_next"></a>
     <a class="thumbnail_prve"></a>
    
    </div>
    
   <?php if(is_product()){ ?> <div class="hiiden swiper-container">     <div class="swiper-wrapper"> <?php echo   $a_prettyPhoto;?></div><div class="paginations_hiiden"></div></div><?php } ?>
   
    <script>
    var swipers_thumbnails<?php echo get_the_id(); ?> = new Swiper('.thumbnails_<?php echo get_the_id(); ?> .thumbnail_swiper',{
     speed:800,
     slidesPerView :5,
     slidesPerGroup : 1,
     calculateHeight : true
   }) ;
    $('.thumbnails_<?php echo get_the_id(); ?> .thumbnail_prve').on('click', function(e){
    e.preventDefault()
    swipers_thumbnails<?php echo get_the_id(); ?>.swipeNext() 
  });
  $('.thumbnails_<?php echo get_the_id(); ?>  .thumbnail_next').on('click', function(e){
    e.preventDefault()
    swipers_thumbnails<?php echo get_the_id(); ?>.swipePrev() 
  });
    </script>
   
	<?php
}else{echo '<div class="zhangaodu"></div>';}
