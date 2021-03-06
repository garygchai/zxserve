<?php

class WC_Swatches_Product_Data_Tab extends WC_EX_Product_Data_Tab_Swatches {

	public function __construct() {
		parent::__construct( array('swatches', 'show_if_variable'), 'swatches', 'Swatches', plugin_dir_url( (dirname( __FILE__ ) ) ) . 'assets/product-data-icon.png' );
	}

	public function on_admin_head() {
		global $woocommerce_swatches;
		parent::on_admin_head();
	}

	public function render_product_tab_content() {
		global $woocommerce, $post;
		global $_wp_additional_image_sizes;

		$post_id = $post->ID;

		if ( function_exists( 'get_product' ) ) {
			$product = get_product( $post->ID );
		} else {
			$product = new WC_Product( $post->ID );
		}

		$product_type_array = array( 'variable', 'variable-subscription' );

		if ( !in_array($product->product_type, $product_type_array) ) {
			return;
		}

		$swatch_type_options = get_post_meta( $post_id, '_swatch_type_options', true );
		$swatch_type = get_post_meta( $post_id, '_swatch_type', true );
		$swatch_size = get_post_meta( $post_id, '_swatch_size', true );


		if ( !$swatch_type_options ) {
			$swatch_type_options = array();
		}

		if ( !$swatch_type ) {
			$swatch_type = 'standard';
		}

		if ( !$swatch_size ) {
			$swatch_size = 'thumbnail';
		}

		echo '<div class="options_group">';
		?>

		<div class="fields_header">
			<table class="wcsap widefat">
				<thead>
				<th class="attribute_swatch_label">
					<?php _e( '产品属性名称', 'wc_swatches_and_photos' ); ?>
				</th>
				<th class="attribute_swatch_type">
					<?php _e( '产品属性显示方式', 'wc_swatches_and_photos' ); ?>
				</th>
				</thead>
			</table>
		</div>
		<div class="fields">

			<?php
			$woocommerce_taxonomies = WC_Swatches_Compatibility::wc_get_attribute_taxonomies();
			$woocommerce_taxonomy_infos = array();
			foreach ( $woocommerce_taxonomies as $tax ) {
				$woocommerce_taxonomy_infos[WC_Swatches_Compatibility::wc_attribute_taxonomy_name( $tax->attribute_name )] = $tax;
			}
			$tax = null;
			$attributes = $product->get_variation_attributes(); //Attributes configured on this product already.
			if ( $attributes && count( $attributes ) ) :
				$attribute_names = array_keys( $attributes );
				foreach ( $attribute_names as $name ) :
					$key = md5( sanitize_title( $name ) );
					$old_key = sanitize_title( $name );

					$key_attr = str_replace( '-', '_', sanitize_title( $name ) );

					$current_is_taxonomy = taxonomy_exists( $name );
					$current_type = 'text';
					$current_type_description = '默认下拉选框';
					$current_size = 'thumbnail';
					$current_layout = 'default';
					$current_size_height = '32';
					$current_size_width = '32';

					$current_label = 'Unknown';
					$current_options = false;

					if ( isset( $swatch_type_options[$key] ) ) {
						$current_options = ($swatch_type_options[$key]);
					} elseif ( isset( $swatch_type_options[$old_key] ) ) {
						$current_options = ($swatch_type_options[$old_key]);
					}


					if ( $current_options ) {

						$current_size = $current_options['size'];
						$current_type = $current_options['type'];
						$current_layout = isset( $current_options['layout'] ) ? $current_options['layout'] : 'default';

						if ( $current_type != 'default' ) {
							$current_type_description = ($current_type == 'term_options' ? __( '属性选项中的颜色和图像', 'wc_swatches_and_photos' ) : __( '单文章的颜色和图像', 'wc_swatches_and_photos' ));
						}
					}

					$the_size = isset( $_wp_additional_image_sizes[$current_size] ) ? $_wp_additional_image_sizes[$current_size] : $_wp_additional_image_sizes['thumbnail'];
					if ( isset( $the_size['width'] ) && isset( $the_size['height'] ) ) {
						$current_size_width = $the_size['width'];
						$current_size_height = $the_size['height'];
					} else {
						$current_size_width = 32;
						$current_size_height = 32;
					}

					$attribute_terms = array();
					if ( taxonomy_exists( $name ) ) :
						$tax = get_taxonomy( $name );
						$woocommerce_taxonomy = $woocommerce_taxonomy_infos[$name];
						$current_label = isset( $woocommerce_taxonomy->attribute_label ) && !empty( $woocommerce_taxonomy->attribute_label ) ? $woocommerce_taxonomy->attribute_label : $woocommerce_taxonomy->attribute_name;

$current_slug=$woocommerce_taxonomy->attribute_name;

						$terms = get_terms( $name, array('hide_empty' => false) );
						$selected_terms = isset( $attributes[$name] ) ? $attributes[$name] : array();
						foreach ( $terms as $term ) {
							if ( in_array( $term->slug, $selected_terms ) ) {
								$attribute_terms[] = array('id' => md5( $term->slug ), 'label' => $term->name, 'old_id' => $term->slug);
							}
						}
					else :
						$current_label = esc_html( $name );
						foreach ( $attributes[$name] as $term ) {
							$attribute_terms[] = array('id' => ( md5( sanitize_title( strtolower( $term ) ) ) ), 'label' => esc_html( $term ), 'old_id' => esc_attr( sanitize_title( $term ) ));
						}
					endif;
					?>
					<div class="field">
						<div class="wcsap_field_meta">
							<table class="wcsap widefat">
								<tbody>
									<tr>
										<td class="attribute_swatch_label">
											<strong><a class="wcsap_edit_field row-title" href="javascript:;"><?php echo $current_label; ?></a></strong>
										</td>
										<td class="attribute_swatch_type">
											<?php echo $current_type_description; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="field_form_mask">
							<div class="field_form">
								<table class="wcsap_input widefat wcsap_field_form_table">
									<tbody>
										<tr class="attribute_swatch_type">
											<td class="label">
												<label for="_swatch_type_options_<?php echo $key_attr; ?>_type">显示模式</label>
											</td>
											<td>
												<select class="_swatch_type_options_type" id="_swatch_type_options_<?php echo $key_attr; ?>_type" name="_swatch_type_options[<?php echo $key; ?>][type]">
													<option <?php selected( $current_type, 'text' ); ?> value="text">默认文字</option>
													<?php if ( $current_is_taxonomy ) : ?>
														<option <?php selected( $current_type, 'term_options' ); ?> value="term_options"><?php _e( '属性选项中的颜色和图像', 'wc_swatches_and_photos' ); ?></option>
													<?php endif; ?>
													<option <?php selected( $current_type, 'product_custom' ); ?> value="product_custom"><?php _e( '单文章的颜色和图像', 'wc_swatches_and_photos' ); ?></option>
												</select>
											</td>
										</tr>

										<tr class="field_option field_option_product_custom field_option_term_options" style="<?php echo $current_type != 'product_custom' && $current_type != 'term_options' ? 'display:none;' : ''; ?>">
											<td class="label">
												<label for="_swatch_type_options_<?php echo $key_attr; ?>_layout">附加选项</label>
											</td>
											<td>
												<?php $layouts = array('default' => __( '不显示提示文字', 'wc_swatches_and_photos' ), 'label_above' => __( '显示提示文字', 'wc_swatches_and_photos' )); ?>
												<select name="_swatch_type_options[<?php echo $key; ?>][layout]">
													<?php foreach ( $layouts as $layout => $layout_name ) : ?>
														<option <?php selected( $current_layout, $layout ); ?> value="<?php echo $layout; ?>"><?php echo $layout_name; ?></option>
													<?php endforeach; ?>
												</select>
											</td>
										</tr>

										<tr class="field_option field_option_product_custom" style="<?php echo $current_type != 'product_custom' ? 'display:none;' : ''; ?>">
											<td class="label">
												<label for="_swatch_type_options_<?php echo $key_attr; ?>_size">Size</label>
											</td>
											<td>
												<?php $image_sizes = get_intermediate_image_sizes(); ?>
												<select id="_swatch_type_options_pa_color_size" name="_swatch_type_options[<?php echo $key; ?>][size]">
													<?php foreach ( $image_sizes as $size ) : ?>
														<option <?php selected( $current_size, $size ); ?> value="<?php echo $size; ?>"><?php echo $size; ?></option>
													<?php endforeach; ?>
												</select>
											</td>
										</tr>

										<tr class="field_option field_option_term_default" style="<?php echo $current_type != 'default' ? 'display:none;' : ''; ?>">
											<td class="label">

											</td>
											<td>
												<p>
													<?php _e( 'WooCommerce default select boxes will be used for this product attribute', 'wc_swatches_and_photos' ); ?>
												</p>
											</td>
										</tr>

										<tr class="field_option field_option_term_options" style="<?php echo $current_type != 'term_options' ? 'display:none;' : ''; ?>">
											<td class="label">

											</td>
											<td>
												<p>
													以上选项将使用你在产品--属性中添加的【<?php echo $current_label; ?>】属性中的值所设置的图片或者颜色作为选项显示，若需要修改请进入产品--属性--【<?php echo $current_label; ?>】--配置类别中的值进行修改<a class="button" target="_blank" href="<?php echo admin_url().'/edit-tags.php?taxonomy=pa_'. $current_slug.'&post_type=product'; ?>">点击进行修改</a>
												</p>
											</td>
										</tr>

										<tr class="field_option field_option_product_custom" style="<?php echo $current_type != 'product_custom' ? 'display:none;' : ''; ?>">

											<td class="label">
												<label>单篇文章属性显示设置</label>
											</td>
											<td>
												<div class="product_custom">

													<div class="fields_header">
														<table class="wcsap widefat">
															<thead>
															<th class="attribute_swatch_preview">
																<?php _e( '预览', 'wc_swatches_and_photos' ); ?>
															</th>
															<th class="attribute_swatch_label">
																<?php _e( '属性名称', 'wc_swatches_and_photos' ); ?>
															</th>
															<th class="attribute_swatch_type">
																<?php _e( '显示模式', 'wc_swatches_and_photos' ); ?>
															</th>
															</thead>
														</table>
													</div>

													<div class="fields">
														<?php foreach ( $attribute_terms as $attribute_term ) : ?>
															<?php
															$attribute_term['id'] = ( $attribute_term['id'] );

															$current_attribute_type = 'color';
															$current_attribute_color = '#FFFFFF';
															$current_attribute_image_src = WC_Swatches_Compatibility::wc_placeholder_img_src();
															$current_attribute_image_id = 0;
															$current_attribute_options = false;
															if ( isset( $current_options['attributes'][$attribute_term['id']] ) ) {
																$current_attribute_options = isset( $current_options['attributes'][$attribute_term['id']] ) ? $current_options['attributes'][$attribute_term['id']] : false;
															} elseif ( isset( $current_options['attributes'][$attribute_term['old_id']] ) ) {
																$current_attribute_options = isset( $current_options['attributes'][$attribute_term['old_id']] ) ? $current_options['attributes'][$attribute_term['old_id']] : false;
															}

															if ( $current_attribute_options ) :
																$current_attribute_type = $current_attribute_options['type'];
																$current_attribute_color = $current_attribute_options['color'];
																$current_attribute_image_id = $current_attribute_options['image'];
																if ( $current_attribute_image_id ) :
																	$current_attribute_image_src = wp_get_attachment_image_src( $current_attribute_image_id, $current_size );
																	$current_attribute_image_src = $current_attribute_image_src[0];
																endif;
															elseif ( $current_is_taxonomy ) :

															endif;
															?>

															<div class="sub_field field">

																<div class="wcsap_field_meta">

																	<table class="wcsap widefat">

																		<tbody>
																		<td class="attribute_swatch_preview">
																			<div class="select-option swatch-wrapper">
																				<a id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo $attribute_term['id']; ?>_color_preview_image" href="javascript:;"
																				   class="image"
																				   style="width:16px;height:16px;<?php echo $current_attribute_type == 'image' ? '' : 'display:none;'; ?>">
																					<img src="<?php echo $current_attribute_image_src; ?>" class="wp-post-image" width="16px" height="16px" />
																				</a>
																				<a id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo $attribute_term['id']; ?>_color_preview_swatch" href="javascript:;"
																				   class="swatch"
																				   style="text-indent:-9999px;width:16px;height:16px;background-color:<?php echo $current_attribute_color; ?>;<?php echo $current_attribute_type == 'color' ? '' : 'display:none;'; ?>"><?php echo $attribute_term['label']; ?>
																				</a>
																			</div>
																		</td>
																		<td class="attribute_swatch_label">
																			<strong><a class="wcsap_edit_field row-title" href="javascript:;"><?php echo $attribute_term['label']; ?></a></strong>
																		</td>
																		<td class="attribute_swatch_type">
																			<?php _e( 'Color Swatch', 'wc_swatches_and_photos' ); ?>
																		</td>
																		<tbody>

																	</table>

																</div>

																<div class="field_form_mask">
																	<div class="field_form">
																		<table class="wcsap_input widefat">
																			<tbody>
																				<tr class="attribute_swatch_type">
																					<td class="label">
																						<label for="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo esc_attr( $attribute_term['id'] ); ?>">
																							<?php _e( '使用颜色或者图片', 'wc_swatches_and_photos' ); ?>
																						</label>
																					</td>
																					<td>
																						<select class="_swatch_type_options_attribute_type" id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo esc_attr( $attribute_term['id'] ); ?>_type" name="_swatch_type_options[<?php echo $key; ?>][attributes][<?php echo esc_attr( $attribute_term['id'] ); ?>][type]">
																							<option <?php selected( $current_attribute_type, 'color' ); ?> value="color">显示颜色</option>
																							<option <?php selected( $current_attribute_type, 'image' ); ?> value="image">显示图片</option>
																						</select>
																					</td>
																				</tr>

																				<tr class="field_option field_option_color" style="<?php echo $current_attribute_type == 'color' ? '' : 'display:none;'; ?>">
																					<td class="label">
																						<label><?php _e( '颜色', 'wc_swatches_and_photos' ); ?></label>
																					</td>
																					<td class="section-color-swatch">
																						<div id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo $attribute_term['id']; ?>_color_picker" class="colorSelector"><div></div></div>
																						<input class="woo-color" id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo $attribute_term['id']; ?>_color" type="text" class="text" name="_swatch_type_options[<?php echo $key; ?>][attributes][<?php echo esc_attr( $attribute_term['id'] ); ?>][color]" value="<?php echo $current_attribute_color; ?>" />
																					</td>
																				</tr>

																				<tr class="field_option field_option_image" style="<?php echo $current_attribute_type == 'image' ? '' : 'display:none;' ?>">
																					<td class="label">
																						<label><?php _e( '图片', 'wc_swatches_and_photos' ); ?></label>
																					</td>
																					<td>

																						<div style="line-height:60px;">
																							<div id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo $attribute_term['id']; ?>_image_thumbnail" style="float:left;margin-right:10px;">
																								<img src="<?php echo $current_attribute_image_src; ?>" alt="<?php _e( 'Thumbnail Preview', 'wc_swatches_and_photos' ); ?>" class="wp-post-image swatch-photopa_colour_swatches_id" width="<?php echo '16px'; ?>" height="<?php echo '16px'; ?>">
																							</div>
																							<input class="upload_image_id" type="hidden" id="_swatch_type_options_<?php echo $key_attr; ?>_<?php echo $attribute_term['id']; ?>_image" name="_swatch_type_options[<?php echo $key; ?>][attributes][<?php echo esc_attr( $attribute_term['id'] ); ?>][image]" value="<?php echo $current_attribute_image_id; ?>" />
																							<button type="submit" class="upload_image_button button" rel="<?php echo $post_id; ?>"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
																							<button type="submit" class="remove_image_button button" rel="<?php echo $post_id; ?>"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
																						</div>

																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>

															</div>
														<?php endforeach; ?>
													</div>

												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php
				endforeach;
			else :
				echo '<p>' . __( 'Add a at least one attribute / variation combination to this product that has been configured with color swatches or photos. After you add the attributes from the "Attributes" tab and create a variation, save the product and you will see the option to configure the swatch or photo picker here.', 'wc_swatches_and_photos' ) . '</p>';
			endif;
			?>


		</div>

		<?php
		echo '</div>';


		$this->do_javascript();
		parent::render_product_tab_content();
	}

	private function do_javascript() {
		global $woocommerce;
		ob_start();
		?>
		jQuery(document).ready(function($) {
		var current_field_wrapper;

		window.send_to_editor_default = window.send_to_editor;

		jQuery('#swatches').on('click', '.upload_image_button, .remove_image_button', function() {

		var post_id = jQuery(this).attr('rel');
		var parent = jQuery(this).parent();
		current_field_wrapper = parent;

		if (jQuery(this).is('.remove_image_button')) {

		jQuery('.upload_image_id', current_field_wrapper).val('');
		jQuery('img', current_field_wrapper).attr('src', '<?php echo woocommerce_placeholder_img_src(); ?>');
		jQuery(this).removeClass('remove');

		} else {

		window.send_to_editor = window.send_to_pidroduct;
		formfield = jQuery('.upload_image_id', parent).attr('name');
		tb_show('', 'media-upload.php?&amp;type=image&amp;TB_iframe=true');
		}

		return false;
		});

		window.send_to_pidroduct = function(html) {

		jQuery('body').append('<div id="temp_image">' + html + '</div>');

		var img = jQuery('#temp_image').find('img');

		imgurl 		= img.attr('src');
		imgclass 	= img.attr('class');
		imgid		= parseInt(imgclass.replace(/\D/g, ''), 10);

		jQuery('.upload_image_id', current_field_wrapper).val(imgid);
		jQuery('img', current_field_wrapper).attr('src', imgurl);
		var $preview = jQuery(current_field_wrapper).closest('div.sub_field').find('.swatch-wrapper');
		jQuery('img', $preview).attr('src', imgurl);
		tb_remove();
		jQuery('#temp_image').remove();

		window.send_to_editor = window.send_to_editor_default;
		}



		});

		<?php
		$javascript = ob_get_clean();
		WC_Swatches_Compatibility::wc_enqueue_js( $javascript );
	}

	public function render_attribute_images( $product_id, $name, $is_taxonomy ) {
		?>
		<div class="product_swatches_configuration">
			<table>
				<?php if ( $is_taxonomy ) : ?>
					<?php $terms = get_terms( $name, array('hide_empty' => false) ); ?>
					<?php foreach ( $terms as $term ) : ?>
						<?php $this->edit_attributre_thumbnail_field( $product_id, $term, $name ); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
		<?php
	}

	public function process_meta_box( $post_id, $post ) {
		parent::process_meta_box( $post_id, $post );


		$swatch_type_options = isset( $_POST['_swatch_type_options'] ) ? $_POST['_swatch_type_options'] : false;
		$swatch_type = 'text';

		if ( $swatch_type_options && is_array( $swatch_type_options ) ) {
			foreach ( $swatch_type_options as $options ) {
				if ( isset( $options['type'] ) && $options['type'] != 'default' ) {
					$swatch_type = 'pickers';
					break;
				}
			}

			update_post_meta( $post_id, '_swatch_type_options', $swatch_type_options );
		}

		update_post_meta( $post_id, '_swatch_type', $swatch_type );
	}

}
?>
