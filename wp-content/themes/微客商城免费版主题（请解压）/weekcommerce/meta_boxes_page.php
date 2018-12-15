<?php 
$new_meta_boxes_p =
array(


			
	
	"hots_tlye" => array(
        "name" => "customize",
        "std" => "",
        "title" => "相册模式"),
		
		"modle_single" => array(
        "name" => "modle_single",
        "std" => "",
        "title" => "显示模式"),
		
		"catce" => array(
        "name" => "catce",
        "std" => "",
        "title" => "侧边栏选择"),
		
		

);
function new_meta_boxes_p() {
    global $post, $new_meta_boxes_p;
  
  

		$meta_box_value2 = get_post_meta($post->ID,"modle_single", true);
		$meta_box_value3 = get_post_meta($post->ID,"catce", true); 
		$customize = get_post_meta($post->ID,"customize", true); 
		
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
      ?>
		
		
		
			<input type="hidden" name="modle_single_noncename" id="modle_single_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
            <input type="hidden" name="catce_noncename" id="catce_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
            <input type="hidden" name="customize_noncename" id="customize_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
            
            
		<div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden; border-bottom:solid 1px #ccc;">
        <b>普通页面模式选项</b>
        
        </div>

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
	        
		
             <option <?php  if(!$meta_box_value3){echo 'selected="selected"';}; ?>  value="sidebar-widgets4">默认侧边栏</option>
	         <?php echo themepark_theme_widget_id($meta_box_value3) ?>
			
			
			 </select>
       
	 </div>
      
	   <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden; border-bottom:solid 1px #ccc;">
        <b>自定义页面模式选项</b>
       
        </div>
     <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">
	 <p>开启自定义选项，你可以获得一个和首页排版一样的页面，你可以用此构建一个产品专题、文章专题或者活动专题等独立的自定义排版页面，<strong>若需要删除，只需要关闭自定义模式即可，关闭之前请记得清空这个生成的小工具的所有项目，以避免数据残留</strong></p>
 <select name="customize" id="customize">
	        
			 <option value=''<?php if ( !$customize ) {echo "selected='selected'";}?>>默认普通页面</option>
             <option value='modle1'<?php if ($customize) {echo "selected='selected'";}?>>启用自定义模式页面</option>
           


	</select>
<p>启用自定义排版模式<strong>并保存页面</strong>之后，点击下面的按钮进入自定义开始排版</p>
<a class="button" target="_blank" href="<?php bloginfo('url') ?>/wp-admin/customize.php?url=<?php echo get_page_link($_GET['post']) ?>">进入自定义可视化模式</a>

</div>
      
      <?php  
	   
  wp_enqueue_media();
	wp_enqueue_script( 'menu-image-admin', get_template_directory_uri() ."/js/custom-script.js" );
 }

function create_meta_box_p() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '页面显示选项', 'new_meta_boxes_p', 'page', 'normal', 'high' );
    }
}

function save_postdata_p( $post_id ) {
    global $post, $new_meta_boxes_p;
  
    foreach($new_meta_boxes_p as $meta_box) {
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
add_action('admin_menu', 'create_meta_box_p');
add_action('save_post', 'save_postdata_p');

?>
