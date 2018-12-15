<?php
/**
 * 主题选项副菜单-初始化设置
 * 初始化设置，包括seO设置、网站安全设置等。

 * @see 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/themeoption
 * @version     1.o
 */

function theme_main_opting(){

	if($_POST['Submit']) {
	
	

	$mytheme_title = trim($_POST['mytheme_title']);
    $mytheme_keywords  =trim($_POST['mytheme_keywords']);
    $mytheme_description  = trim($_POST['mytheme_description']);
	$code_in_head= trim($_POST['code_in_head']);
	$code_in_foot= trim($_POST['code_in_foot']);
	
	
	
	$update_main_queries = array();
	$update_main_text    = array();
	
	

	 
	 $update_main_queries[] = update_option('mytheme_title', $mytheme_title);
	 $update_main_queries[] = update_option('mytheme_keywords', $mytheme_keywords);
	 $update_main_queries[] = update_option('mytheme_description', $mytheme_description);
	 $update_main_queries[] = update_option('code_in_head', $code_in_head);
	 $update_main_queries[] = update_option('code_in_foot', $code_in_foot);
	 
	 $update_main_text[] = '首页标题替换';
	 $update_main_text[] = '首页关键词';
	  $update_main_text[] = '首页描述';

	 $update_main_text[] = '顶部代码';
	 $update_main_text[] = '底部代码';
	 
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

$mytheme_title = get_option('mytheme_title');
$mytheme_keywords  = get_option('mytheme_keywords');
$mytheme_description  = get_option('mytheme_description');
	$code_in_head= stripslashes(get_option('code_in_head'));
	$code_in_foot= stripslashes(get_option('code_in_foot'));
theme_themepark_video('这个选集成了一些主题的附加功能选项，在开始进行主题设置之前，你可以首先阅读一下这个选项中的内容，以确保一些设置能够被找到。')

?>
<h3>主题初始化设置</h3>
 
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>

  <form method="post" action="<?php echo admin_url('admin.php?page=themepark_theme'); ?>"class="xuanxiangka">
  
  
  <table class="form-table">
      <tbody>
      
      
       <tr>
               <th scope="row"><h2>首页seo设置</h2>
                </th>
                <td>
               
                </td>
            </tr>
      
       <tr>
         <th scope="row"><label for="mytheme_title">首页标题替换</label>
                </th>
                <td>
               <input  type="text" size="60"  name="mytheme_title" id="mytheme_title" value="<?php echo $mytheme_title; ?>"/>  <br />

                 <p>主题默认会调用wordpress默认的站点标题和副标题（设置--常规中），在此处你可以直接替换掉首页的标题（title）
</p>
                </td>
            </tr>
      
      
      
       <th scope="row"><label for="mytheme_keywords">首页关键词</label>
                </th>
                <td>
               <input  type="text" size="60"  name="mytheme_keywords" id="mytheme_keywords" value="<?php echo $mytheme_keywords; ?>"/>  <br />

                 <p>首页的关键词，分类、页面以及文章都可以独立设置关键词和描述</p>
                </td>
            </tr>
      
      
      
       <th scope="row"><label for="mytheme_description">首页描述</label>
                </th>
                <td>
               <input  type="text" size="60"  name="mytheme_description" id="mytheme_description" value="<?php echo $mytheme_description; ?>"/>  <br />

                 <p>首页的关键词，分类、页面以及文章都可以独立设置关键词和描述</p>
                </td>
            </tr>
      
      
      
       <tr>
               <th scope="row"><h2>网站安全</h2>
                </th>
                <td>
               <p>付费版解锁：付费版可以设置一个管理员和编辑权限用户专用登陆地址，以区分和普通顾客登陆，保证你的网站安全。</p>
                </td>
            </tr>
      
      
      
            
            
         
            
          
          
              <tr>
               <th scope="row"><h2>第三方代码添加选项</h2>
                </th>
                <td>
               
                </td>
            </tr>
          
          
            
        <tr>
               <th scope="row"><label for="code_in_head">头部加载的第三方代码</label>
                </th>
                <td>
                <textarea name="code_in_head" rows="10" cols="50" id="code_in_head" class="code"><?php echo $code_in_head ; ?></textarea> <br />

                 <p>如果你需要使用第三方代码，比如百度统计代码，或者其他的一些监控代码，可以在此输出。这个选项是输出在网站头部的，也就是在head中，需要你参考第三方代码规范填写。<br />
请注意，这些选项的代码只支持前端代码（html/js/css）,请勿填写php代码</p>
                </td>
            </tr>
            
            
                    
        <tr>
               <th scope="row"><label for="code_in_foot">底部加载的第三方代码</label>
                </th>
                <td>
                <textarea name="code_in_foot" rows="10" cols="50" id="code_in_foot" class="code"><?php echo $code_in_foot ; ?></textarea> <br />

                 <p>这个选项输出的代码将会在底部，也就是在body标签最后</p>
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