<?php 
$new_meta_boxes =
array(


			
	"vedios" => array(
        "name" => "vedios",
        "std" => "",
        "title" => "视频"),
		
		"modle_single" => array(
        "name" => "modle_single",
        "std" => "",
        "title" => "显示模式"),
		"catce" => array(
        "name" => "catce",
        "std" => "",
        "title" => "侧边栏选择"),

);
function new_meta_boxes() {
    global $post, $new_meta_boxes;
  
  
		$meta_box_value4 = get_post_meta($post->ID,"vedios", true); 
		$meta_box_value2 = get_post_meta($post->ID,"modle_single", true);
		$meta_box_value3 = get_post_meta($post->ID,"catce", true); 
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
      ?>
		
		
			<input type="hidden" name="vedios_noncename" id="vedios_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
			<input type="hidden" name="modle_single_noncename" id="modle_single_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
            <input type="hidden" name="catce_noncename" id="catce_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
		
	
	<div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">

     <label style=" float:left; width:100px;">视频地址：</label> 
   	 <textarea name="vedios" id="vedios" cols="86" rows="3"><?php echo stripslashes($meta_box_value4) ;?></textarea>  <br />
<em  style=" margin-left:100px; ">[复制视频代码至此，若添加了视频代码，那么文章将会以视频模式显示]</em></div> 

	<div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">

     <label style=" float:left; width:100px;">显示模式：</label> 
  <select name="modle_single" id="modle_single">
	        
			 <option <?php  if(!$meta_box_value2){echo 'selected="selected"';}; ?>  value="">两栏默认</option>
			 <option <?php  if($meta_box_value2){echo 'selected="selected"';}; ?>  value="tong">通栏</option>
			
			
			 </select>
       
	 </div>
	  
	  <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">

     <label style=" float:left; width:100px;">侧边栏选择：</label> 
  <select name="catce" id="catce">
	        
			 <option <?php  if(!$meta_box_value3){echo 'selected="selected"';}; ?>  value="">默认继承分类选择</option>
             <option <?php  if($meta_box_value3=='sidebar-widgets4'){echo 'selected="selected"';}; ?>  value="sidebar-widgets4">默认侧边栏</option>
	         <?php echo themepark_theme_widget_id($meta_box_value3) ?>
			
			
			 </select>
       
	 </div>
      
	      	


      
      <?php  
	   
  wp_enqueue_media();
	wp_enqueue_script( 'menu-image-admin', get_template_directory_uri() ."/js/custom-script.js" );
 }

function create_meta_box() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '文章显示选项', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}

function save_postdata( $post_id ) {
    global $post, $new_meta_boxes;
  
    foreach($new_meta_boxes as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }
  
        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        }
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }
  
        $data = $_POST[$meta_box['name']];
  
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>
