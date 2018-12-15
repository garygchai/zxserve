<?php

if (!function_exists('woothemes_queue_update'))
	require_once( 'woo-includes/woo-functions.php' );

/**
 * Plugin updates
 */


if (is_woocommerce_active()) {

	/**
	 * Localisation
	 * */


	/**
	 * woocommerce_product_addons class
	 * */
	if (!class_exists('WC_SwatchesPlugin')) {

		class WC_SwatchesPlugin {
			private $product_attribute_images;

			public function __construct() {
				
				define( 'WC_SWATCHES_VERSION', '1.5.3' );
				
				require 'woocommerce-swatches-template-functions.php';
				
				require 'classes/class-wc-swatches-compatibility.php';
				require 'classes/class-wc-swatch-term.php';
				require 'classes/class-wc-swatch-product-term.php';
				require 'classes/class-wc-swatches-product-attribute-images.php';
				require 'classes/class-wc-ex-product-data-tab.php';
				require 'classes/class-wc-swatches-product-data-tab.php';
				require 'classes/class-wc-swatch-picker.php';

				add_action('init', array(&$this, 'on_init'));
				
				add_action('wc_quick_view_enqueue_scripts', array($this, 'on_enqueue_scripts'));
				add_action('wp_enqueue_scripts', array(&$this, 'on_enqueue_scripts'));
				
				
				add_action('admin_head', array(&$this, 'on_enqueue_scripts'));

				add_action('woocommerce_locate_template', array(&$this, 'locate_template'), 10, 3);

				$this->product_attribute_images = new WC_Swatches_Product_Attribute_Images('swatches_id', 'swatches_image_size');
				$this->product_data_tab = new WC_Swatches_Product_Data_Tab();

				//Swatch Image Size Settings
				add_filter('woocommerce_catalog_settings', array(&$this, 'swatches_image_size_setting')); // pre WC 2.1
				add_filter('woocommerce_product_settings', array(&$this, 'swatches_image_size_setting')); // WC 2.1+
			}

			public function on_init() {
				global $woocommerce;

				$image_size = get_option('swatches_image_size', array());
				$size = array();

				$size['width'] = isset($image_size['width']) && !empty($image_size['width']) ? $image_size['width'] : '32';
				$size['height'] = isset($image_size['height']) && !empty($image_size['height']) ? $image_size['height'] : '32';
				$size['crop'] = isset($image_size['crop']) ? $image_size['crop'] : 1;

				$image_size = apply_filters('woocommerce_get_image_size_swatches_image_size', $size);

				add_image_size('swatches_image_size', apply_filters('woocommerce_swatches_size_width_default', $image_size['width']), apply_filters('woocommerce_swatches_size_height_default', $image_size['height']), $image_size['crop']);
			}

			public function on_enqueue_scripts() {
				global $pagenow, $wp_scripts;

				if (!is_admin()) {
					wp_enqueue_style('swatches-and-photos', get_bloginfo('template_url') . '/swatches/assets/css/swatches-and-photos.css');
					wp_enqueue_script('swatches-and-photos', get_bloginfo('template_url') . '/swatches/assets/js/swatches-and-photos.js', array('jquery'));
				}

				if (is_admin() && ( $pagenow == 'post-new.php' || $pagenow == 'post.php' || $pagenow == 'edit.php' || 'edit-tags.php')) {
					wp_enqueue_style('swatches-and-photos', get_bloginfo('template_url') . '/swatches/assets/css/swatches-and-photos.css');
					wp_enqueue_script('swatches-and-photos-admin', get_bloginfo('template_url') . '/swatches/assets/js/swatches-and-photos-admin.js', array('jquery'), '1.0', true);

					wp_enqueue_style('colourpicker', get_bloginfo('template_url') . '/swatches/assets/css/colorpicker.css');
					wp_enqueue_script('colourpicker', get_bloginfo('template_url') . '/swatches/assets/js/colorpicker.js', array('jquery'));
				}
			}

			public function locate_template($template, $template_name, $template_path) {
				global $product;

				if (strstr($template, 'variable.php') && get_post_meta($product->id, '_swatch_type', true) == 'pickers') {


					// Look within passed path within the theme - this is priority
					$template = locate_template(
						array(
						    trailingslashit('woocommerce-swatches') . 'single-product/variable.php',
						    $template_name
						)
					);

					// Get default template
				
						$template = get_stylesheet_directory() . '/swatches/templates/single-product/variable.php';
					
				}

				return $template;
			}

			public function plugin_url() {
				return untrailingslashit(get_bloginfo('template_url'));
			}

			public function plugin_dir() {
				return get_bloginfo('template_url');
			}

			public function swatches_image_size_setting($settings) {
				$setting = array(
				    'name' => __('Swatches and Photos', 'wc_swatches_and_photos'),
				    'desc' => __('The default size for color swatches and photos.', 'wc_swatches_and_photos'),
				    'id' => 'swatches_image_size',
				    'css' => '',
				    'type' => 'image_width',
				    'std' => '32',
				    'desc_tip' => true,
				    'default' => array(
					'crop' => true,
					'width' => 32,
					'height' => 32
				    )
				);
				
				$index = count($settings) - 1;

				$settings[$index + 1] = $settings[$index];
				$settings[$index] = $setting;
				return $settings;
			}

		}

	}

	$GLOBALS['woocommerce_swatches'] = new WC_SwatchesPlugin();
}
?>
