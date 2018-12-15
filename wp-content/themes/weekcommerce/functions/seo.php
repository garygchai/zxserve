<?php
/**
 * 主题文章系统相关函数
 * 主题文章系统的先关函数：小工具、特色图片，分类目录设置、分类父级获取
 * 函数清单：
 *  自定义添加小工具位置获取id函数
 *  清除函数
 *  注册菜单位置
 *  略缩图获取以及默认图片
 *  get略缩图函数
 *  分类目录的设置输出和保存
 *  关键词设置和输出
 *  描述设置和输出
 *  去除wordpress头部输出的一些样式和脚本
 *  滑块锚点
 *  获取父级分类
 *  分页函数
 *  获取略缩图url
 *  增强编辑器开始
 *  获取附件图片链接
 *  阅读量统计   
 * @author url 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/functions
 * @version     1.o
 */



include_once("seo_box.php");
include_once("seo_cat_woo.php");
include_once("woocommerce.php");
include_once("woocommerce-order.php");
include_once("woocommerce-order_box.php");
//清除函数
function DeleteHtml($str) 
{ 
$str = trim($str); //清除字符串两边的空格
$str = preg_replace("/\t/","",$str); //使用正则表达式替换内容，如：空格，换行，并将替换为空。
$str = preg_replace("/\r\n/","",$str); 
$str = preg_replace("/\r/","",$str); 
$str = preg_replace("/\n/","",$str); 
$str = preg_replace("/ /","",$str);
return trim($str); //返回字符串
}
//注册菜单位置
register_nav_menus(
array(
'top-menu' => __( '最顶部菜单' ),
'header-menu' => __( '菜单导航' ),
'cat-menu' => __( '导航下分类折叠菜单' ),
)
);
//略缩图获取以及默认图片
if ( function_exists( 'add_theme_support' ) ) {add_theme_support( 'post-thumbnails' );}
 function themepark_thumbnails($thumbnail_size){
	  $id =get_the_ID(); 
	  if(get_option('mytheme_'.$thumbnail_size.'_thumbnails')){$case_thumbnails=get_option('mytheme_'.$thumbnail_size.'_thumbnails');}else{$case_thumbnails= get_bloginfo('template_url').'/thumbnails/'.$thumbnail_size.'.jpg';} 
		 
		  $tit= get_the_title();

		 if (has_post_thumbnail()) { the_post_thumbnail($thumbnail_size ,array('alt'=>$tit, 'title'=> $tit ));}else{
			 echo '<img alt="'.$tit.'" title="'.$tit.'" src="'.$case_thumbnails.'" />';
			 }
	 
	 }
//get略缩图函数	 
 function get_themepark_thumbnails($thumbnail_size){
	  $id =get_the_ID(); 
	  if(get_option('mytheme_'.$thumbnail_size.'_thumbnails')){$case_thumbnails=get_option('mytheme_'.$thumbnail_size.'_thumbnails');}else{$case_thumbnails= get_bloginfo('template_url').'/thumbnails/'.$thumbnail_size.'.jpg';} 
		 
		  $tit= get_the_title();

		 if (has_post_thumbnail()) { return get_the_post_thumbnail($thumbnail_size ,array('alt'=>$tit, 'title'=> $tit ));}else{
			 return '<img alt="'.$tit.'" title="'.$tit.'" src="'.$case_thumbnails.'" />';
			 }
	  
	 
	 }	 
	 
//分类目录的设置输出和保存
function add_category_seo_format(){  

   echo '
   
      <h3显示文章数量</h3>
   <div class="form-field">  
            <label for="cat_nummber">这个分类显示多少数量？</label>  
            <input name="cat_nummber" id="cat_nummber" type="text" value="" size="10">  
            <p>若填写了这个数量，那么就会按照这个数量显示文章数量，若不填写则显示后台--设置--阅读中设置的文章显示数量</p>  
          </div>     
   
   
   <h3>【付费版解锁】侧边栏选择</h3>
   <div class="form-field">  
            <select name="catce" id="catce">
	        
			 <option value="">默认的侧边栏目</option>
			
			 </select>
          </div>   
		  
		   <div class="navm">  
             <input type="checkbox" value="show" name="navm" id="navm"  />
			 <label for="navm">【付费版解锁】显示文章多重筛选</label>
			 <p>这个多重筛选是针对普通文章的，请和woocommerce的产品筛选区分开</p>
          </div>   
		  
		 
     <h3>模式选择</h3>
	 
	 
	  <div class="navm">  
             
			 <label for="navm">【付费版解锁】不继承默认设置</label>
			   <input type="checkbox" value="no" name="cat_mr_jic" id="cat_mr_jic" />
			
             
       <p>在主题选项--默认列表和筛选可以设置默认的分类样式，如果你不希望让这个分类继承那个设置，可以勾选此处，将不会使用主题选项中的设置</p>
          </div>   
		  
	 
   <div class="cat_modle">  
            <select name="cat_modle" id="cat_modle">
	        
			 <option value="">两栏默认</option>
			 <option value="tong">通栏</option>
			
			
			 </select>
          </div>   
		  
	 <h3>【付费版解锁】显示选项</h3>
   <div class="cat_modle2">  
            <select name="cat_modle2" id="cat_modle2">
	        
			 <option  value="">默认图文结构（左图右文）</option>
             <option  value="no">纯文字结构</option>
			 <option value="shop_thumbnail">图片模式（可弹出播放视频）</option>
			 </select>
          <p>列表中的略缩图尺寸统一设置为：媒体库--中等尺寸，可自行设置</p>
		  </div> 
	 <h3>【付费版解锁】显示列数</h3>
   <div class="cat_modle3">  
            <select name="cat_modle3" id="cat_modle3">
	        
			 <option value="">一行显示4个产品（默认）</option>
			  <option value="cat_line3">一行显示3个</option>
			 <option value="cat_line5">一行显示5个</option>
			 <option value="cat_line6">一行显示6个</option>
		
			 </select>
      
		  </div> 	  
 
	<h3>分类目录SEO选项</h3>
	<div class="form-field">  
            <label for="cat_title">标题替换</label>  
            <input name="cat_title" id="cat_title" type="text" value="" size="40">  
            <p>填写这个选项，将会替换默认调用的标题</p>  
          </div>     
         <div class="form-field">  
            <label for="cat_keword">关键词</label>  
            <input name="cat_keword" id="cat_keword" type="text" value="" size="40">  
            <p>使用英文输入法的逗号分隔，一般不超过80个字符</p>  
          </div>
		   <div class="form-field">  
            <label for="cat_description">描述</label>   
			<textarea id="cat_description" cols="40" rows="5" name="cat_description"></textarea>
            <p>一般不超过200个字符</p>  
          </div>
		  
	
		  
		  ';            
            
}  
add_action('category_add_form_fields','add_category_seo_format',10,2);  
  
  
function edit_category_seo_format($tag){  
    ?>
	
	<h3>显示文章数量</h3>
   <div class="form-field">  
            
           
           
          </div>   
          
          	<tr class="form-field">  
          <th scope="row"><label for="cat_nummber">这个分类显示多少数量？</label>  </th>  
            <td> 
		 <input name="cat_nummber" id="cat_nummber" type="text" value="<?php echo get_option('cat_nummber_'.$tag->term_id) ?>" size="10">  <br />

			
   <p>若填写了这个数量，那么就会按照这个数量显示文章数量，若不填写则显示后台--设置--阅读中设置的文章显示数量</p>  
            </td>  
        </tr>   
	
          
           
	<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】侧边栏选择</label></th>  
            <td> 
		 <select name="catce" id="catce">
	        <option value="">默认的侧边栏目</option>
	
			 
			 </select>
			
  
            </td>  
        </tr>   
	
	
	
		<tr class="form-field">  
          <th scope="row"><label for="navm">【付费版解锁】文章多重筛选</label></th>  
            <td> 
		  
             <input type="checkbox" value="show" name="navm" id="navm"  />
			 显示文章多重筛选
             
       <p>这个多重筛选是针对普通文章的，请和woocommerce的产品筛选区分开</p>
			
  
            </td>  
        </tr>   
	
    
    
		<tr class="form-field">  
          <th scope="row"><label for="cat_mr_jic">【付费版解锁】不继承默认设置</label></th>  
            <td> 
		  
             <input type="checkbox" value="no" name="cat_mr_jic" id="cat_mr_jic"  />
			
             
       <p>在主题选项--默认列表和筛选可以设置默认的分类样式，如果你不希望让这个分类继承那个设置，可以勾选此处，将不会使用主题选项中的设置</p>
			
  
            </td>  
        </tr>   
    
    
		<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】模式选择</label></th>  
            <td> 
		   <select name="cat_modle" id="cat_modle">
	        
			 <option  value="">两栏默认</option>
			 <option   value="tong">通栏</option>
			
			
			 </select>
			 <br />
  
            </td>  
        </tr>   
	
		<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】显示结构选项</label></th>  
            <td> 
		   <select name="cat_modle2" id="cat_modle2">
	         
			 <option  value="">默认图文结构（左图右文）</option>
             <option  value="no">纯文字结构</option>
			 <option  value="shop_thumbnail">图片模式（可弹出播放视频）</option>
			
			
			 </select>
			 <br />
                <p>列表中的略缩图尺寸统一设置为：媒体库--中等尺寸，可自行设置</p>
            <p>选择图片模式后，若有文章中填写了视频代码，那么则会弹出播放视频，若没有视频，则显示图片排版模式（图上文下，下面的选项可以选择一排显示多少篇文章）</p>
            </td>  
        </tr>   
	
	<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】显示列数</label></th>  
            <td> 
		   <select name="cat_modle3" id="cat_modle3">
	        
			
			 <option  value="">一行显示4个产品（默认）</option>
			 <option  value="cat_line3">一行显示3个</option>
			 <option  value="cat_line5">一行显示5个</option>
			 <option  value="cat_line6">一行显示6个</option>
			 
			
			 </select>
			
  
            </td>  
        </tr>   
	
	
	<tr class="form-field">  
            <th scope="row"><label for="cat_title">标题替换</label></th>  
            <td>  
                <input name="cat_title" id="cat_title" type="text" value="<?php echo get_option('cat_title_'.$tag->term_id) ;?>" size="40"/><br>  
              
            </td>  
        </tr>    
    <tr class="form-field">  
            <th scope="row"><label for="cat_keword">关键词</label></th>  
            <td>  
                <input name="cat_keword" id="cat_keword" type="text" value="<?php echo get_option('cat_keword_'.$tag->term_id);?>" size="40"/><br>  
               
            </td>  
        </tr>
		  <tr class="form-field">  
            <th scope="row"><label for="cat_description">描述</label></th>  
            <td>  
                
                 
              <textarea id="cat_description" cols="40" rows="5" name="cat_description"><?php echo get_option('cat_description_'.$tag->term_id);?></textarea>
            </td>  
        </tr>
		
		
	<?php   
          
}  
add_action('category_edit_form_fields','edit_category_seo_format',10,2);  
  
  
function taxonomy_metadate_seo_format($term_id){  
    if(isset($_POST['cat_title']) || isset($_POST['cat_keword'])|| isset($_POST['cat_description'])||isset($_POST['cat_title_p']) || isset($_POST['cat_keword_p'])|| isset($_POST['cat_description_p'])|| isset($_POST['navm'])){  
      
        if(!current_user_can('manage_categories')){  
            return $term_id;  
        }
		

		
		$cat_nummber ='cat_nummber_'.$term_id;
		$cat_nummber_value =$_POST['cat_nummber']; 
		

	
        $cat_title = 'cat_title_'.$term_id; 
        $title_value = $_POST['cat_title'];
        $cat_keword = 'cat_keword_'.$term_id;  
        $keword_value = $_POST['cat_keword'];   
        $cat_description = 'cat_description_'.$term_id;  
        $description_value = $_POST['cat_description']; 
		
		
		 
		
		 update_option( $cat_nummber, $cat_nummber_value );     
    
	
        update_option( $cat_title, $title_value );   
        update_option( $cat_keword, $keword_value );  
		 update_option( $cat_description, $description_value );  
	
    }  
}  
  
add_action('created_category','taxonomy_metadate_seo_format',10,1);  
add_action('edited_category','taxonomy_metadate_seo_format',10,1);  
//关键词设置和输出

function theme_keyworeds(){
	global $wp_query;
	 $id =get_the_ID(); 
	
  
            $cat_obj = $wp_query->get_queried_object();
			 $term_id = $cat_obj->term_id;
   $cat_keword=get_option('cat_keword_'.$term_id);
   $cat_keword_p=get_option('cat_keword_p_'.$term_id);
    if(is_front_page() || is_home()) { 
	
		  $theme_keword= get_option('mytheme_keywords');
		
		 }
		 
	  elseif( is_page()||is_single()) {
			
			 if(get_post_meta($id, "关键字",true)){  $theme_keword= get_post_meta($id, "关键字",true);}elseif($theme_kewordss){$theme_keword=$theme_kewordss;}else{  $theme_keword= get_option('mytheme_keywords');}
				 
	} 	
	elseif(is_category()){
		
			 if($cat_keword){  $theme_keword= $cat_keword;}else{  $theme_keword= get_option('mytheme_keywords');}
				 	
	} else{$theme_keword= get_option('mytheme_keywords');} 
	echo $theme_keword;
	}
//描述设置和输出	
function theme_description(){
   global $wp_query;
    $id =get_the_ID(); 
  
   $cat_obj = $wp_query->get_queried_object();
			 $term_id = $cat_obj->term_id;
   $cat_description=get_option('cat_description_'.$term_id);
   $cat_description_p=get_option('cat_description_p_'.$term_id);
      if(is_front_page() || is_home()) { 
$theme_description= get_option('mytheme_description');}
		
		 
		 
	  elseif( is_page()||is_single()) {
		  
		 $excerps=mb_strimwidth(strip_tags(apply_filters('the_excerp', get_post($id)->post_content)),0,200,"。",'utf-8');
	
	  $excerpk=DeleteHtml($excerps) ;
	  $excerp= preg_replace('/\[.*?\]/', '', $excerpk);
	
			
			 if(get_post_meta($id, "描述",true)){  $theme_description= get_post_meta($id, "描述",true);}elseif($excerp){$theme_description=$excerp;}else{  $theme_description= get_option('mytheme_description');}
				 
	} 	
	elseif(is_category()){
	
			 if($cat_description){  $theme_description= $cat_description;}else{  $theme_description= get_option('mytheme_description');}
				 	
	} else{$theme_description= get_option('mytheme_description');} 
	echo $theme_description;
}	
//去除wordpress头部输出的一些样式和脚本
if(!is_user_logged_in()){
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );
function my_deregister_styles()    { 

   wp_deregister_style( 'amethyst-dashicons-style' ); 
   wp_deregister_style( 'dashicons' ); 
 wp_deregister_script('thickbox');}
if ( !function_exists( 'disable_embeds_init' ) ) :
function disable_embeds_init(){
global $wp;
$wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
remove_action('rest_api_init', 'wp_oembed_register_route');
add_filter('embed_oembed_discover', '__return_false');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');

}
add_action('init', 'disable_embeds_init', 9999);

endif;
}
//滑块锚点
function qhbtn_themepark(){
$id =get_the_ID(); 
$qhbtn=get_post_meta($id,"qhbtn", true); 
 
	  if($qhbtn){$qhbtns=$qhbtn;}else{$qhbtns=get_option('mytheme_qhbtn');}
	  
	   $qhbtn_themepark= preg_split("/[\s,]+/",$qhbtns); 
	  $qhbtn_themeparks.='
	  <div id="qhbtn_themepark_top"></div>
	  <div class="qhbtn_themepark_out">
	  <div class="qhbtn_themepark">';
	  
			 $ii=0;
			 for($i=$ii;$i<count($qhbtn_themepark);$i++) {
				 if($i=="0"){$nows='nows';}else{$nows='';}
				 $qhbtn_themeparks.='<a class="qh_btns_'.$i.' '.$nows.'" rel=".qh_themepark_'.$i.'">'.$qhbtn_themepark[$i].'</a>';
				 
			 } 
			
			 
			 $qhbtn_themeparks.='</div></div>';	
	  
	  
	  
return  $qhbtn_themeparks;
  };
add_shortcode('qhbtn', 'qhbtn_themepark');

//获取父级分类
function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}


//分页函数
    add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
    function my_page_excerpt_meta_box() {
        add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
    }
	
function par_pagenavi($range = 10){
$word_t3='<<';
$word_t4='<';
$word_t5='>';
$word_t6='>>';
global $paged, $wp_query;
$max_page='';
if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}

if($max_page > 1){if(!$paged){$paged = 1;}

if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend'

title=' ".$word_t3."'> ".$word_t3." </a>";}

previous_posts_link($word_t4);

if($max_page > $range){

if($paged < $range){for($i = 1; $i <= ($range + 1); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= ($max_page - ceil(($range/2)))){

for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){

for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}

else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

next_posts_link($word_t5);

if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend'

title='".$word_t6."'>".$word_t6." </a>";}}

}
/*分页函数*/

//获取略缩图url
function get_post_thumbnail_url($post_id){
        $post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        if($thumbnail_id ){
                $thumb = wp_get_attachment_image_src($thumbnail_id, 'news-vedio-thumb');
                return $thumb[0];
        }else{
                return false;
        }
}
//增强编辑器开始
add_editor_style('/css/editor-style.css');  
function add_editor_buttons($buttons) {

$buttons[] = 'fontselect';

$buttons[] = 'fontsizeselect';

$buttons[] = 'cleanup';

$buttons[] = 'styleselect';

$buttons[] = 'hr';

$buttons[] = 'del';

$buttons[] = 'sub';

$buttons[] = 'sup';

$buttons[] = 'copy';

$buttons[] = 'paste';

$buttons[] = 'cut';

$buttons[] = 'undo';

$buttons[] = 'image';

$buttons[] = 'anchor';

$buttons[] = 'backcolor';

$buttons[] = 'wp_page';

$buttons[] = 'charmap';

return $buttons;

}

add_filter("mce_buttons_3", "add_editor_buttons");
//获取附件图片链接
function get_attachment_id_from_src ($link) {
    global $wpdb;
    $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
    return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
};
 //阅读量统计 
function set_post_views() {   
  
    global $post;   
  
    $post_id = $post -> ID;   
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if (is_single() || is_page()) {   
  
        if ($count == '') {   
            delete_post_meta($post_id, $count_key);   
            add_post_meta($post_id, $count_key, '0');   
        } else {   
            update_post_meta($post_id, $count_key, $count + 1);   
        }   
  
    }   
  
}   
	add_action('get_header', 'set_post_views');  

?>