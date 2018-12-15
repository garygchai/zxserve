<?php
if (function_exists('register_sidebar')) {
		register_sidebar(array(
    		'name' => '首页内容排版区',
    		'id'   => 'index_content',
    		'description'   => '默认首页的内容排版模块，只能放入内容排版区模块',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		register_sidebar(array(
    		'name' => '默认侧边栏',
    		'id'   => 'sidebar-widgets4',
    		'description'   => '默认两栏内页的侧边栏',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
	
				
	
	
	
		
    };
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget'); 
	
	
};

add_action('widgets_init', 'unregister_default_wp_widgets');


include_once("widget/case.php");
include_once("widget/nav_poket.php");
include_once("widget/nav_poket_ul.php");
include_once("widget/news.php");


if (class_exists('Woocommerce')) { 
include_once("woo-widgets/class-wc-widget-cart.php");
include_once("woo-widgets/class-wc-widget-recently-viewed.php");
};
class  check_walker extends Walker_Nav_Menu {
  	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
	 
	  if($item->object == 'post_tag'){
		  $tags = get_term_by( 'id', $item->object_id, 'post_tag');
		   	$attributes .= ' id="' . $tags->slug.'"';
		 	$attributes .= ' rel="' . $tags->slug.'"';
	 
		  }else{
			   	$attributes .= ' id="' . $item->object_id.'"';
		$attributes .= ' rel="' . esc_attr( $item->object_id).'"';
		  }

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . ' title="'.  apply_filters( 'the_title', $item->title, $item->ID ) .'">';
		 $item_output .=   apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_before . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
};
 class  header_menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$imgclasss=$attributes=$images_full=$imgclass='';
		$class_names = $value = ' ';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		if(!$item->attr_title){$imgclass='class="imgclass"';$imgclasss=' noft';}
	
		$class_names = ' class="' . esc_attr( $class_names ) .$imgclasss. '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		
		if($item->url!='#' ){$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';}
       if($item->attr_title =="1"){$images_full='class="images_fullss"';}
		$item_output = $args->before;
		$item_output .= '<a '. $attributes.$imgclass.'>';
		$item_output .= $args->link_before . $args->link_after;
		 if(! empty( $item->description )){$item_output .= '<img '.$images_full.' src=' .'"' . $item->description .'"'.'alt="'.  apply_filters( 'the_title', $item->title, $item->ID ) . '"/>';}
		if($item->attr_title !="1"){
		 $item_output .=  '<div class="nave_spaen"><div>'. apply_filters( 'the_title', $item->title, $item->ID ).'</div>';
		 if($item->attr_title){  $item_output .=  '<p>'.  esc_attr( $item->attr_title ).'</p>';}
		$item_output .= '</div>';}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
};

class pic_full extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value =	$imgclasss=$attributes=$images_full=$mrfull=$onetitle=$urlss=' ';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		if($item->title=="1"){ $mrfull="adpic";};
		if(! $item->description&&!$item->attr_title){ $onetitle='onetitle';}
		$class_names = ' class="' . esc_attr( $class_names ) .' '.$mrfull.' '.$onetitle.' "';
        
		$output .= $indent . '<div class="swiper-slide">';
     
		
		if($item->url!="#"){$urlss= ' href="' . esc_attr( $item->url ).'"' ;}
		$attributes .= ! empty( $item->url ) ?  $urlss  : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		
		$item_output = $args->before;
		$bage='style="background:center url('.$item->description.')"';
		$item_output .= '<a'. $attributes.' '.$bage.'>';
		$item_output .= $args->link_before . $args->link_after;
		$imgs_alt= $item->attr_title;
		
		 $item_output .= '<img src=' .'"' . $item->description .'"'.'alt="'. $imgs_alt . '"/>';
		
		$item_output .= '</a>';
		
		$item_output .= '</div>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
};
 function wptuts_add_color_picker( $hook ) {
        if( is_admin() ) { 
		    wp_enqueue_media();
            wp_enqueue_style( 'wp-color-picker' ); 
            wp_enqueue_script( 'custom-script-handle', get_template_directory_uri().'/js/custom-script.js', array( 'wp-color-picker' ), false, true ); 
			

        };

    };
add_filter( 'sidebar_admin_page', 'wptuts_add_color_picker' );
add_filter( 'customize_controls_print_scripts', 'wptuts_add_color_picker' );

add_filter( 'admin_head-nav-menus.php', 'menu_image_edit_nav_menu_walker_filter', 10, 2 );
 function menu_image_edit_nav_menu_walker_filter() {
			wp_enqueue_media();
			wp_enqueue_script( 'menu-image-admin', get_template_directory_uri() ."/js/widget_upload.js" );
	};

function first_img_as_thumbnail() {
$current_tag = single_tag_title('', false);
$tags = get_tags();
foreach($tags as $tag) {
if($tag->name == $current_tag) return $tag->term_id; 
};
};
function firstimgasthumbnail() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches[1][0];
if(empty($first_img)){ 
$first_img = get_bloginfo('template_url').'/images/demo/vedio.gif';
}
$attachment_id = get_attachment_id_from_src(  $first_img );
return $attachment_id ;
} ;?>