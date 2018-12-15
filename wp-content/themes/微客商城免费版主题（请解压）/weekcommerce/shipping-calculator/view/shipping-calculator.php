<div id="rp_shipping_calculator">
   
 
    <p class="btn_shipping"><?php echo get_themepark_option('product_l18','配送到'); ?></p>
    <div class="rp_shiiping_form">
        <?php if ($this->get_setting("display_message") != 1): ?>
            <div class="rp_message"></div>
        <?php endif; ?>

        <form class="woocommerce-shipping-calculator" action="" method="post">
            <section class="shipping-calculator-form">
                <?php
                if (is_product()) {
                    global $post;
                    ?>
                    <input type="hidden" name="product_id" value="<?php echo $post->ID; ?>" />
                <?php } ?>
                <p class="form-row form-row-wide">
                    <select style="display:none;" name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
                        <option value=""><?php _e('Select a country', 'woocommerce'); ?></option>
                        <?php
                        foreach (WC()->countries->get_shipping_countries() as $key => $value)
                            echo '<option value="' . esc_attr($key) . '"' . selected(WC()->customer->get_shipping_country(), esc_attr($key), false) . '>' . esc_html($value) . '</option>';
                        ?>
                    </select>
                </p>

                <p class="form-row form-row-wide shipping_state">
                    <?php
					global $current_user;    wp_get_current_user();
	              	 
		             $Address = $current_user->shipping_state;
	                global $woocommerce;
                    $current_cc = WC()->customer->get_shipping_country();
                    $current_r = WC()->customer->get_shipping_state();
                    $states = WC()->countries->get_states($current_cc);

                    if (is_array($states) && empty($states)) {
                        ?>
                        <input type="hidden" name="calc_shipping_state" class="text-state" id="calc_shipping_state" placeholder="<?php _e('State / county', 'woocommerce'); ?>" />
                        <?php
                    } elseif (is_array($states)) {
                        ?>

                        <select  name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e('State / county', 'woocommerce'); ?>">
                           
                      <?php 	if(is_user_logged_in()){ ?>
                            <option value="<?php echo $Address ?>"><?php echo  $current_user->shipping_city; ?></option>
                            <?php }else{?>
                            
                            
                            <?php }
                             foreach ($states as $ckey => $cvalue)
                                echo '<option value="' . esc_attr($ckey) . '" ' . selected($current_r, $ckey, false) . '>' . __(esc_html($cvalue), 'woocommerce') . '</option>';
                            ?>
                        </select>

                        <?php
                    } else {
                        ?>
                        <input type="text" class="input-text" value="<?php echo esc_attr($current_r); ?>" placeholder="<?php _e('State / county', 'woocommerce'); ?>" name="calc_shipping_state" id="calc_shipping_state" />
                        <?php
                    }
                    ?>
                </p>

                <?php if (apply_filters('woocommerce_shipping_calculator_enable_city', false)) : ?>

                    <p class="form-row form-row-wide">
                        <input type="text" class="input-text" value="<?php echo esc_attr(WC()->customer->get_shipping_city()); ?>" placeholder="<?php _e('City', 'woocommerce'); ?>" name="calc_shipping_city" id="calc_shipping_city" />
                    </p>

                <?php endif; ?>

                <?php if (apply_filters('woocommerce_shipping_calculator_enable_postcode', true)) : ?>

                   
                        <input type="hidden" class="input-text" value="<?php echo esc_attr(WC()->customer->get_shipping_postcode()); ?>" placeholder="<?php _e('Postcode / Zip', 'woocommerce'); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
                    

                <?php endif; ?>
                  <span class="loaderimage"><img src="<?php echo self::$plugin_url ?>assets/images/rp-loader.gif" alt=""></span>
                <p class="form-row form-row-wide shippingmethod_container">
               
                    <?php
                    $packages = WC()->cart->get_shipping_packages();
                    $packages = WC()->shipping->calculate_shipping($packages);
                    $available_methods = WC()->shipping->get_packages();
					 
                ?>
                 
              
                <?php if ($this->get_setting("display_message") == 1): ?>
                    <div class="rp_message"></div>
                <?php endif; ?>
                <?php wp_nonce_field('woocommerce-cart'); ?>
            </section>
        </form>
    </div>

</div>
