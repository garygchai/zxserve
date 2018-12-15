<?php


 function viewed_products() {
       $id ='';
		
		if(is_product()){ $id =get_the_ID(); }
		
			if(!empty($_COOKIE['recentlys_viewed'])){
				
				$old_cookies=$_COOKIE['recentlys_viewed'];
				$old_cookies_id=explode( '|',$old_cookies);
				 foreach ($old_cookies_id as $a){
					if( $a==$id){ $tong='yes';}
					 
					 }
				if( !$tong){$the_cookies=$old_cookies.'|'.$id;}else{$the_cookies=$old_cookies;}
				setcookie("recentlys_viewed",$the_cookies, time()+3600*24,'/');
				
				}else{
					
					setcookie("recentlys_viewed",$id, time()+3600*24,'/');
					}
			
			
		$viewed_products = ! empty( $_COOKIE['recentlys_viewed'] ) ? (array) explode( '|', $_COOKIE['recentlys_viewed'] ) : array();
		$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );

		if ( empty( $viewed_products ) ) {
			return;
		}

		ob_start();

		

		$query_args = array( 'posts_per_page' => 10, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'post__in' => $viewed_products, 'orderby' => 'rand' );

		

		$r = new WP_Query( $query_args );

		if ( $r->have_posts() ) {

			

			echo '<ul class="product_list_widget">';

			while ( $r->have_posts() ) {
				$r->the_post();
				wc_get_template( 'content-widget-product.php' );
			}

			echo '</ul>';

			
		}

		wp_reset_postdata();

		$content = ob_get_clean();

		echo $content;
	}

