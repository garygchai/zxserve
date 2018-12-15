<?php 
$customize_box2 =
array(

   

		
	"xiaoliang" => array(
        "name" => "xiaoliang",
        "std" => "",
        "title" => "累计销量"),
		
			
	"xiaoliang_x" => array(
        "name" => "xiaoliang_x",
        "std" => "",
        "title" => "累计销量"),
			
		"tabs_meta_title" => array(
        "name" => "tabs_meta_title",
        "std" => "",
        "title" => "剪短描述标题"),
		
		"p_tabs1_title" => array(
        "name" => "p_tabs1_title",
        "std" => "",
        "title" => "常见问题标题"),
		
		"p_tabs1" => array(
        "name" => "p_tabs1",
        "std" => "",
        "title" => "常见问题"),
		
		
		"p_tabs2_title" => array(
        "name" => "p_tabs2_title",
        "std" => "",
        "title" => "售后保障标题"),
		
		"p_tabs2" => array(
        "name" => "p_tabs2",
        "std" => "",
        "title" => "售后保障"),
	
);
function new_customize_box2() {
    global $post, $customize_box2;
  
       
	    $meta_box_value = get_post_meta($post->ID,"xiaoliang", true);
		$meta_box_value2 = get_post_meta($post->ID,"xiaoliang_x", true);
		

       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
 echo '<input type="hidden" name="xiaoliang_noncename" id="xiaoliang_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
echo '<input type="hidden" name="xiaoliang_x_noncename" id="xiaoliang_x_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

 ?>

 <input type="hidden" name="modle_single_noncename" id="modle_single_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
            <input type="hidden" name="catce_noncename" id="catce_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) );?>" />
            
            
            
            
            
            <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">

     <label style=" float:left; width:100px;">【付费版解锁】显示模式：</label> 
  <select name="modle_single" id="modle_single">
	        
			 <option  value="">两栏默认</option>
			 <option   value="tong">通栏</option>
			
			
			 </select>
       
	 </div>
	  
	  <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">

     <label style=" float:left; width:100px;">【付费版解锁】侧边栏选择：</label> 
  <select name="catce" id="catce">
	        
			 <option   value="">默认继承分类选择</option>
             <option   value="sidebar-widgets4">默认侧边栏</option>
	     
			
			
			 </select>
       
	 </div>
            
            
            
            
            
       <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">       
            
            
  <input type="checkbox" value="xiaoliang" name="xiaoliang" id="open" <?php if($meta_box_value=="open"){echo "checked='checked'";} ?> />
 <label for="cache_open">隐藏销量和评价数</label><br />   
   <label for="xiaoliang_x"><strong>自定义增加显示的销量：</strong>
        <input  style="border:1px #ccc solid; width:99%;"  name="xiaoliang_x" id="xiaoliang_x" value="<?php echo $meta_box_value2; ?>" />
  </label><br />
  <em style="font-size:12px; color:#F60;">你可以自定义增加销量，如真实销量为5，在上面填写200，则显示销量为205</em>
  
	 </div>
  
  <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">       
            
            
<label for="tabs_meta_title"><strong>【付费版解锁】将产品描述加入切换菜单标题</strong>
 <input  style="border:1px #ccc solid; width:99%;"  name="tabs_meta_title" id="tabs_meta_title" value="<?php echo $meta_box_value3; ?>" />
  </label>
  <em style="font-size:12px; color:#F60;">填写标题如“商品视频”，填写了标题之后，第二个编辑器“产品剪短描述”将会显示在切换菜单而不是显示在标题下方了</em><br />
</div>
 <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">       
            
            
<label for="p_tabs1_title"><strong>【付费版解锁】常见问题调用</strong>
 <input  style="border:1px #ccc solid; width:99%;"  name="p_tabs1_title" id="p_tabs1_title" value="<?php if($p_tabs1_title){ echo $p_tabs1_title;}else{echo '常见问题';} ?>" />
  </label>
  </div>
      
      <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">       
            
             
       <label  for="p_tabs1">调用一个页面的内容：</label><br />
             <select id="p_tabs1" name="p_tabs1" >
              <option value=''<?php if ($p_tabs1 == "" ) {echo "selected='selected'";}?> >选择和默认默认相同</option>
               <option value='nones'<?php if ($p_tabs1 == "nones" ) {echo "selected='selected'";}?> >不显示</option>
            
   
	</select></div>
     <div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">       
            
            
    <label for="p_tabs2_title"><strong>【付费版解锁】售后保障调用</strong>
 <input  style="border:1px #ccc solid; width:99%;"  name="p_tabs2_title" id="p_tabs2_title" value="<?php if($p_tabs2_title){ echo $p_tabs2_title;}else{echo '售后保障';} ?>" />
  </label><br />
      
      
       <label  for="p_tabs1">调用一个页面的内容：</label><br />
             <select id="p_tabs2" name="p_tabs2" >
              <option value=''<?php if ($p_tabs2 == "" ) {echo "selected='selected'";}?> >选择和默认默认相同</option>
               <option value='nones'<?php if ($p_tabs2 == "nones" ) {echo "selected='selected'";}?> >不显示</option>
           
	</select><br />
      <em style="font-size:12px; color:#F60;">这里将会调用2个页面显示“常见问题”和“售后保障”，你可以在主题选项中的woocommerce选择一个全局通用的页面，也可以单独设置</em>
      </div>
      <?php   
  
 }

function create_meta_box_customize2() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
      
		
		 
			add_meta_box( 'new_customize_box2', '产品模板显示选项', 'new_customize_box2', 'product', 'side', 'high' );
    }
}

function save_postdata_customize2( $post_id ) {
    global $post, $customize_box2;
  
    foreach($customize_box2 as $meta_box) {
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
add_action('admin_menu', 'create_meta_box_customize2');
add_action('save_post', 'save_postdata_customize2');

?>
