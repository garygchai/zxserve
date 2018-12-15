<?php

/* 
Template Name:woocommerce产品对比页面模板
*/ 
if(empty($_COOKIE['duibi_id'])){wp_die("你还没有添加任何对比产品");}
get_header();
get_template_part( 'top/top' ); 

?>



<div class="content_page">




<div id="right_shop" class="right_mian full_main">

<div class="duiibi_page" >
<div id="case_index">
<div class="woocommerce">

  <table class="duibi-table">
      <tbody>
       <tr>
<?php
global $post, $product;
$post_ids = ! empty( $_COOKIE['duibi_id'] ) ? (array) explode( ',', $_COOKIE['duibi_id'] ) : array();
$post_ids = array_filter( array_map( 'absint', $post_ids) );
 $i=0;
foreach($post_ids as $nunb){
	$i++;
	
	}


$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => 4,
	'orderby'             => $orderby,
	'post__in'            => $post_ids,

	
);

$query= new WP_Query(apply_filters( 'woocommerce_products_widget_query_args', $args ) );
 if($query->have_posts()) :         
while ( $query->have_posts() ) :$query->the_post();  
 $tit= get_the_title();
$id =get_the_ID(); 
 $content= get_the_content();
global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
 ?>
 

 <td class="duibi_list_<?php echo $i; ?>  woocommerce-tabs" valign="top">
 <div class="duibi_table_up">
 <div class="case_pics" <?php if($attachment_ids){echo 'id="has_thumbnails"';}else{$has_thumbnails_div='<div class="has_not_thumbnails"></div>';} ?>>
<a href="<?php echo  get_permalink(); ?>" target="_blank"  ><?php  themepark_thumbnails('full'); ?></a>

<?php get_template_part( 'woocommerce/single-product/product-thumbnails' );?>	

 </div>
 
 <div class="case_text">
                       <div  class="posts_title">
                        <a href="<?php echo get_permalink() ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf-8'); ?></a>
                        </div>
                     
             
                       
                     <?php if ( $price_html = $product->get_price_html() ) : ?>
	                <div class="black_price_out <?php echo $zuhep; ?>"><?php echo $price_html; ?></div>
                    <?php endif; ?>
                     <?php if($modlie=='cat_lineso'){echo '<p class="comments_p excerp">'.$excerp.'</p>'; }?>
                     <?php if($modlie){echo '<p class="comments_p">'.$review_count.$language_i5.'</p>'; } echo $has_thumbnails_div;?>
                    
                     </div>
                    </div>
    <div class="duibi_table_bottom">                 
<div class="product_meta">
	<h2><?php echo get_themepark_option('product_l14','详细参数'); ?></h2>
<?php $product->list_attributes(); ?>
</div>
</div>
</td>

 
 
 <?php   endwhile;  wp_reset_query();endif; ?>
 </tr>
  </tbody>
      </table>
</div>
</div>
</div>


</div>
<div style="clear:both;"></div>
</div>

<?php  get_footer();?>