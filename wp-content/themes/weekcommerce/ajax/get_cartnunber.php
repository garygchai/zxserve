<?php
function get_cart_number(){
wc_print_notices();	
	$i=0;
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		
		$i++;
		}
		
	return $i;

	}


 ?>