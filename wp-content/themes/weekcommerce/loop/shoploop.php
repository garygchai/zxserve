  <?php 

function shop_loop($modlie,$titleseo3){
  include(dirname(dirname(__FILE__))."/options/data_cache.php");  

					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 $content= get_the_content();
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					if(get_post_meta($id ,"links_p", true)){ $contact_btn_url=get_post_meta($id ,"links_p", true);}else{$contact_btn_url=get_option('mytheme_btn_url');}
					 global $product;
					  $zuhep="";
						if($product->get_type()=="simple"){$ajax="add_to_cart_button ajax_add_to_cart"; $btn_text=$language_i2;}elseif($product->get_type()=="external"){$target='target="_blank"'; $btn_text= $product->add_to_cart_text();}else{$zuhep="zuhep";$btn_text=$language_i3;}
					$review_count = $product->get_review_count();
					  ?>          
                              <li class="swiper-slide">
                             


                              <div class="padding_slide">
                               <?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' .$language_i6 . '</span>', $post, $product ); ?>

<?php endif; ?>
                    <div class="case_pic">   <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
						<a href="<?php echo $links1 ; ?>" target="_blank"  ><?php  themepark_thumbnails('medium'); ?></a>
							
							
						<?php if($modlie=="shop_comment"&&woo_hot_comment_in_list($id)){?>	
							
							 <div id="comment_pic_bottom" class="case_text">
                       <?php if($titleseo3){echo '<'.$titleseo3.'  class="posts_title">';}else{echo '<div  class="posts_title">';} ?>
                        <a href="<?php echo $links1 ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf-8'); ?></a>
                         <?php if($titleseo3){echo '</'.$titleseo3.'>';}else{echo '</div>';} ?>
                     
             
                       
                     <?php if ( $price_html = $product->get_price_html() ) : ?>
	                <div class="black_price_out <?php echo $zuhep; ?>"><?php echo $price_html; ?></div>
                    <?php endif; ?>
                  
                     </div>
							
							<?php } ?>
							
							
							<?php if($modlie=='shop_thumbnail'){get_template_part( 'woocommerce/single-product/product-thumbnails' ); }elseif(!$modlie){ ?>
							<div class="case_pic_bottom">
                             <a id="casebtn" target="_blank" href="<?php echo $links1 ; ?>"><?php echo $language_i1;?></a> 
                      
                             <?php
					
					 echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a %s rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s contact_btn button product_type_simple '.$ajax.'">
	<div class="cart_zt"></div>
	%s</a>',
	esc_attr( $target ),
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $btn_text )
	),
$product )  ?>
					     
                            
                            </div>
							<?php } ?>
                            </div>
                            
                         <?php if($modlie=="shop_comment"&&woo_hot_comment_in_list($id)){echo woo_hot_comment_in_list($id);}else{ ?>   
                     <div class="case_text">
                       <?php if($titleseo3){echo '<'.$titleseo3.'  class="posts_title">';}else{echo '<div  class="posts_title">';} ?>
                        <a href="<?php echo $links1 ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf-8'); ?></a>
                         <?php if($titleseo3){echo '</'.$titleseo3.'>';}else{echo '</div>';} ?>
                     
             
                       
                     <?php if ( $price_html = $product->get_price_html() ) : ?>
	                <div class="black_price_out <?php echo $zuhep; ?>"><?php echo $price_html; ?></div>
                    <?php endif; ?>
                     <?php if($modlie){echo '<p class="comments_p">'.$review_count.$language_i5.'</p>'; }?>
                     </div>
                    
                    <?php } ?> 
                     </div>
                </li>
<?php } ?>