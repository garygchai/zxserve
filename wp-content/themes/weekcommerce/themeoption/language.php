<?php
/* 初始化设置*/

function language_option_function(){

	if($_POST['Submit']) {
	
	$language_th1  = trim($_POST['language_th1']);
	$language_th2  = trim($_POST['language_th2']);
	$language_th3  = trim($_POST['language_th3']);
	$language_th4  = trim($_POST['language_th4']);
    $language_th5  = trim($_POST['language_th5']);
	$language_th6  = trim($_POST['language_th6']);
	$language_th7  = trim($_POST['language_th7']);
			
	
	$language_t1  = trim($_POST['language_t1']);
	$language_t2  = trim($_POST['language_t2']);
	$language_t3  = trim($_POST['language_t3']);
	$language_t4  = trim($_POST['language_t4']);
	$language_t5  = trim($_POST['language_t5']);
	
	$language_c1  = trim($_POST['language_c1']);
	$language_c2  = trim($_POST['language_c2']);
	$language_c3  = trim($_POST['language_c3']);
	$language_c4  = trim($_POST['language_c4']);
	$language_c5  = trim($_POST['language_c5']);
	$language_c6  = trim($_POST['language_c6']);
	$language_c7  = trim($_POST['language_c7']);
	
	$language_s1  = trim($_POST['language_s1']);
	$language_s2  = trim($_POST['language_s2']);
	$language_s3  = trim($_POST['language_s3']);
	$language_s4  = trim($_POST['language_s4']);
	$language_s5  = trim($_POST['language_s5']);
	
	$language_i1  = trim($_POST['language_i1']);
	$language_i2  = trim($_POST['language_i2']);
	$language_i3  = trim($_POST['language_i3']);
	$language_i4  = trim($_POST['language_i4']);
	$language_i5  = trim($_POST['language_i5']);
	$language_i6  = trim($_POST['language_i6']);
	
	$update_main_queries = array();
	$update_main_text    = array();
	 $update_main_queries[] = update_option('language_th1', $language_th1);
	 $update_main_queries[] = update_option('language_th2', $language_th2);
	 $update_main_queries[] = update_option('language_th3', $language_th3);
	 $update_main_queries[] = update_option('language_th4', $language_th4);
	 $update_main_queries[] = update_option('language_th5', $language_th5);
	 $update_main_queries[] = update_option('language_th6', $language_th6);
	 $update_main_queries[] = update_option('language_th7', $language_th7);
	
	
	
	 $update_main_queries[] = update_option('language_t1', $language_t1);
	 $update_main_queries[] = update_option('language_t2', $language_t2);
	 $update_main_queries[] = update_option('language_t3', $language_t3);
	 $update_main_queries[] = update_option('language_t4', $language_t4);
	 $update_main_queries[] = update_option('language_t5', $language_t5);
	 
	 $update_main_queries[] = update_option('language_c1', $language_c1);
	 $update_main_queries[] = update_option('language_c2', $language_c2);
	 $update_main_queries[] = update_option('language_c3', $language_c3);
	 $update_main_queries[] = update_option('language_c4', $language_c4);
	 $update_main_queries[] = update_option('language_c5', $language_c5);
	 $update_main_queries[] = update_option('language_c6', $language_c6);
	 $update_main_queries[] = update_option('language_c7', $language_c7);
	 
	 $update_main_queries[] = update_option('language_s1', $language_s1);
	 $update_main_queries[] = update_option('language_s2', $language_s2);
	 $update_main_queries[] = update_option('language_s3', $language_s3);
	 $update_main_queries[] = update_option('language_s4', $language_s4);
	 $update_main_queries[] = update_option('language_s5', $language_s5);
	 
	 $update_main_queries[] = update_option('language_i1', $language_i1);
	 $update_main_queries[] = update_option('language_i2', $language_i2);
	 $update_main_queries[] = update_option('language_i3', $language_i3);
	 $update_main_queries[] = update_option('language_i4', $language_i4);
	  $update_main_queries[] = update_option('language_i5', $language_i5);
	  $update_main_queries[] = update_option('language_i6', $language_i6);
	 
	  $update_main_text[] = '找到标签';
	 $update_main_text[] = '搜索结果';
	 $update_main_text[] = '很遗憾，没有找到您的信息';
	 $update_main_text[] = '首页';
	 $update_main_text[] = '全站搜索';
	 $update_main_text[] = '文章搜索';
	 $update_main_text[] = '产品搜索';
	
	 
	 $update_main_text[] = '全部商品分类';
	 $update_main_text[] = '登录';
	 $update_main_text[] = '注册';
	 $update_main_text[] = '我的个人中心';
	 $update_main_text[] = '购物车';
	 
	 
	 $update_main_text[] = '文章检索';
	 $update_main_text[] = '文章检索副标题';
	 $update_main_text[] = '发布时间';
	 $update_main_text[] = '浏览次数';
	 $update_main_text[] = '搜索';
	 $update_main_text[] = '筛选';
	 $update_main_text[] = '返回';
	 
	 
	 $update_main_text[] = '分类';
	 $update_main_text[] = '相关推荐';
	 $update_main_text[] = '上一篇';
	 $update_main_text[] = '下一篇';
	 $update_main_text[] = '标签';
	 
	 $update_main_text[] = '详细信息';
	 $update_main_text[] = '加入购物车';
	 $update_main_text[] = '选择选项';
	 $update_main_text[] = '来自于';
     $update_main_text[] = '评价';
	  $update_main_text[] = '促销中';
	 
	 
	 $i = 0;
	 $text = '';
	 
	 
	 foreach($update_main_queries as $update_main_query) {
		if($update_main_query) {
			$text .= '<font color="green">'.$update_main_text[$i].' 更新成功！</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">您对设置没有做出任何改动...</font>';
	}
	
}
$language_t1 = get_option('language_t1');
$language_t2 = get_option('language_t2');
$language_t3 = get_option('language_t3');
$language_t4 = get_option('language_t4');
$language_t5 = get_option('language_t5');

$language_th1 = get_option('language_th1');
$language_th2 = get_option('language_th2');
$language_th3 = get_option('language_th3');
$language_th4 = get_option('language_th4');
$language_th5 = get_option('language_th5');
$language_th6 = get_option('language_th6');
$language_th7 = get_option('language_th7');

$language_c1 = get_option('language_c1');
$language_c2 = get_option('language_c2');
$language_c3 = get_option('language_c3');
$language_c4 = get_option('language_c4');
$language_c5 = get_option('language_c5');
$language_c6 = get_option('language_c6');
$language_c7 = get_option('language_c7');


$language_s1 = get_option('language_s1');
$language_s2 = get_option('language_s2');
$language_s3 = get_option('language_s3');
$language_s4 = get_option('language_s4');
$language_s5 = get_option('language_s5');

$language_i1 = get_option('language_i1');
$language_i2 = get_option('language_i2');
$language_i3 = get_option('language_i3');
$language_i4 = get_option('language_i4');
$language_i5 = get_option('language_i5');
$language_i6 = get_option('language_i6');
theme_themepark_video('一些固定的文字可以在此处更改，若你想要让网站显示为其他语言，那么在此处可以对这些文字进行替换，woocommerce的一些语言需要使用语言包才能更改，这里只提供主题的一些固定文字，并有区域提示，对照区域进行替换或者翻译吧。');		
?>
<h3>文章系统多语言替换</h3>
 
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>

  <form method="post" action="<?php echo admin_url('admin.php?page=language_option'); ?>"class="xuanxiangka">
  
  
  <table class="form-table">
      <tbody>
       <!-------------------------------title---------------------------------------------------------------->  
      <tr id="title">
               <th scope="row"><h2>【title自动调用】</h2>
                </th>
                <td>
               
                </td>
            </tr>
      <tr>
       <th scope="row"><label for="language_th1">找到标签</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th1" id="language_th1" value="<?php echo $language_th1; ?>"/>  <br />

                 <p>title中的文字，比如点击标签“红色”，网站标题会显示“找到标签-红色”</p>
                </td>
            </tr>
            
          <tr>  
        <th scope="row"><label for="language_th2">搜索结果</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th2" id="language_th2" value="<?php echo $language_th2; ?>"/>  <br />

                 <p>title中的文字，比如搜索“红色”，网站标题会显示“搜索结果-红色”</p>
                </td>
            </tr>
            <tr>
             <th scope="row"><label for="language_th3">很遗憾，没有找到您的信息</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th3" id="language_th3" value="<?php echo $language_th3; ?>"/>  <br />

                 <p>title中的文字，当404页面时，网站标题会显示“很遗憾，没有找到您的信息”</p>
                </td>
            </tr>
            
             <tr>
             <th scope="row"><label for="language_th4">首页</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th4" id="language_th4" value="<?php echo $language_th4; ?>"/>  <br />

                 <p>文章系统的面包屑显示的“首页”</p>
                </td>
            </tr>
            
            
              <tr>
             <th scope="row"><label for="language_th5">全站搜索</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th5" id="language_th5" value="<?php echo $language_th5; ?>"/>  <br />

                 <p>顶部搜索中的“全站搜索”</p>
                </td>
            </tr>
            
             <tr>
             <th scope="row"><label for="language_th6">搜索文章</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th6" id="language_th6" value="<?php echo $language_th6; ?>"/>  <br />

                 <p>顶部搜索中的“搜索文章”</p>
                </td>
            </tr>
            
            
            <tr>
             <th scope="row"><label for="language_th7">搜索商品</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_th7" id="language_th7" value="<?php echo $language_th7; ?>"/>  <br />

                 <p>顶部搜索中的“搜索商品”</p>
                </td>
            </tr>
            
            
      
    <!-------------------------------header---------------------------------------------------------------->  
      
       <tr id="header">
               <th scope="row"><h2>【网站顶部文字】</h2>
                </th>
                <td>
               
                </td>
            </tr>
      
       <tr>
         <th scope="row"><label for="language_t1">全部商品分类</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_t1" id="language_t1" value="<?php echo $language_t1; ?>"/>  <br />

                 <p>网站顶部左侧的折叠菜单标题文字</p>
                </td>
            </tr>
      
        <tr>
         <th scope="row"><label for="language_t2">登录</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_t2" id="language_t2" value="<?php echo $language_t2; ?>"/>  <br />

                 <p>顶部的登录文字（未登录）</p>
                </td>
            </tr>
     <tr> 
      <th scope="row"><label for="language_t3">注册</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_t3" id="language_t3" value="<?php echo $language_t3; ?>"/>  <br />

                 <p>顶部的注册文字（未登录）</p>
                </td>
            </tr>
 <tr>
  <th scope="row"><label for="language_t4">我的个人中心</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_t4" id="language_t4" value="<?php echo $language_t4; ?>"/>  <br />

                 <p>顶部的我的个人中心文字（已经登录）</p>
                </td>
            </tr>
 <tr>
  <th scope="row"><label for="language_t5">购物车</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_t5" id="language_t5" value="<?php echo $language_t5; ?>"/>  <br />

                 <p>顶部的购物车文字（已经登录）</p>
                </td>
            </tr>
 
 
           
      
    <!-------------------------------category---------------------------------------------------------------->  
      
       <tr id="category">
               <th scope="row"><h2>【文章分类】</h2>
                </th>
                <td>
                <p>文章分类区域，注意是文章分类不是商品分类</p>
                </td>
            </tr>
      
       <tr>
         <th scope="row"><label for="language_c1">文章检索</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c1" id="language_c1" value="<?php echo $language_c1; ?>"/>  <br />

                 <p>文章筛选的标题，注意是文章筛选不是商品筛选</p>
                </td>
            </tr>
            
            
  
 
            
            
            
            
      <tr>
            <th scope="row"><label for="language_c2">文章检索副标题</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c2" id="language_c2" value="<?php echo $language_c2; ?>"/>  <br />

                 <p>默认为：你可以选择下面的条件并可以输入关键词点击开始搜索进行筛选文章</p>
                </td>
            </tr>
            
            
                       <tr>
  <th scope="row"><label for="language_c5">搜索</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c5" id="language_c5" value="<?php echo $language_c5; ?>"/>  <br />

                 <p>文章筛选的搜索按钮</p>
                </td>
            </tr>
            
            
 <tr>
         <th scope="row"><label for="language_c3">发布时间</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c3" id="language_c3" value="<?php echo $language_c3; ?>"/>  <br />

                 <p>分类目录和文章内页中的图文模板显示的发布时间</p>
                </td>
            </tr>
            
              <tr>
               <th scope="row"><label for="language_c4">浏览次数</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c4" id="language_c4" value="<?php echo $language_c4; ?>"/>  <br />

                 <p>分类目录和文章内页中的图文模板显示的浏览次数</p>
                </td>
            </tr>
            
              <tr>
               <th scope="row"><label for="language_c6">筛选【移动版】</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c6" id="language_c6" value="<?php echo $language_c6; ?>"/>  <br />

                 <p>移动设备的筛选是折叠的，因此需要一个按钮打开，这是按钮的名称</p>
                </td>
            </tr>
 
 
             <tr>
               <th scope="row"><label for="language_c7">返回【移动版】</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_c7" id="language_c7" value="<?php echo $language_c7; ?>"/>  <br />

                 <p>移动设备中，会有返回按钮，这是移动设备上访问上的习惯</p>
                </td>
            </tr>
          
          
          
            <!-------------------------------single---------------------------------------------------------------->  
      
       <tr id="category">
               <th scope="row"><h2>【文章内页】</h2>
                </th>
                <td>
                <p>文章内页，注意是文章内页不是产品内页</p>
                </td>
            </tr>
          
          
          
          
            <tr>
               <th scope="row"><label for="language_s1">分类</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_s1" id="language_s1" value="<?php echo $language_s1; ?>"/>  <br />

                 <p>文章标题的顶部会显示所属分类，分类标题</p>
                </td>
            </tr>
          
           <tr>
               <th scope="row"><label for="language_s2">相关推荐</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_s2" id="language_s2" value="<?php echo $language_s2; ?>"/>  <br />

                 <p>文章会显示相关文章，可以修改此标题</p>
                </td>
            </tr>
          
           <tr>
               <th scope="row"><label for="language_s3">上一篇</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_s3" id="language_s3" value="<?php echo $language_s3; ?>"/>  <br />

                 <p>文章上一篇按钮文字</p>
                </td>
            </tr>
          
          
            <tr>
               <th scope="row"><label for="language_s4">下一篇</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_s4" id="language_s4" value="<?php echo $language_s4; ?>"/>  <br />

                 <p>文章下一篇按钮文字</p>
                </td>
            </tr>
          
          
             
            <tr>
               <th scope="row"><label for="language_s5">标签</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_s5" id="language_s5" value="<?php echo $language_s5; ?>"/>  <br />

                 <p>文章底部会显示当前文章所带的标签</p>
                </td>
            </tr>
         <!-------------------------------index---------------------------------------------------------------->   
              <tr id="index">
               <th scope="row"><h2>【首页模块 】</h2>
                </th>
                <td>
                <p>首页模块中的一些固定文字</p>
                </td>
            </tr>
          
            <tr>
               <th scope="row"><label for="language_i1">详细信息</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_i1" id="language_i1" value="<?php echo $language_i1; ?>"/>  <br />

                 <p>产品调用滚动模块中的详细信息按钮</p>
                </td>
            </tr>
            
            
             <tr>
               <th scope="row"><label for="language_i2">加入购物车</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_i2" id="language_i2" value="<?php echo $language_i2; ?>"/>  <br />

                 <p>所有模块中加入购物车按钮文字</p>
                </td>
            </tr>
            
            
             <tr>
               <th scope="row"><label for="language_i3">选择选项</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_i3" id="language_i3" value="<?php echo $language_i3; ?>"/>  <br />

                 <p>当woocommerce产品模式为可变商品、成组商品时，加入购物车会显示‘选择选项’</p>
                </td>
            </tr>
          
          
          <tr>
               <th scope="row"><label for="language_i4">来自于</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_i4" id="language_i4" value="<?php echo $language_i4; ?>"/>  <br />

                 <p>热门评论模块会显示来自于谁的评价，可修改这段文字</p>
                </td>
            </tr>
          
          
           <tr>
               <th scope="row"><label for="language_i5">评价</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_i5" id="language_i5" value="<?php echo $language_i5; ?>"/>  <br />

                 <p>产品调用的普通模式会显示有多少评价，如 5评价，你可以修改这个文字</p>
                </td>
            </tr>
          
          
          
           <tr>
               <th scope="row"><label for="language_i6">促销中</label>
                </th>
                <td>
               <input  type="text" size="60"  name="language_i6" id="language_i6" value="<?php echo $language_i6; ?>"/>  <br />

                 <p>如果有原价和促销价格，那么商品左侧会显示促销中的提示，你可以修改这个文字</p>
                </td>
            </tr>
          
      
      </tbody>
      </table>
     <table> <tr>
        <td><p class="submit">
      
            <input type="submit" name="Submit" value="提交" class="button-primary"/>
           
            </p>
        </td>

        </tr> </table>
  
  
  
  
  </form>


<?php }?>