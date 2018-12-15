<?php
/**
 * 主题选项副菜单-初始化设置
 * 初始化设置，包括seO设置、网站安全设置等。

 * @see 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/themeoption
 * @version     1.o
 */

function theme_cat_search_option_function(){

	
	
	
	
	
theme_themepark_video('【付费版解锁】付费版本的分类、文章、产品、页面等等有不同的展示形式可以控制，此处可以控制一个统一的样式，升级付费版可解锁此内容，获得更多的展示结构，此选项仅供参考对比付费版，并不具有实际的效果。')
?>

 

<h3>【付费版解锁】文章系统和产品系统分类默认数据设置</h3>
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>

  <form method="post" action=""class="xuanxiangka">
  
  
  <table class="form-table">
      <tbody>
      
      
     
            
          
             <tr>
               <th scope="row"><h2>文章系统筛选[付费版解锁]</h2>
                </th>
                <td>
                 <p>文章筛选模块教程请看（这是wordpress文章的筛选系统，和产品筛选不同，请注意）：<a target="_blank" href="http://www.themepark.com.cn/wordpressdzsxgnjs.html">WEB主题公园多筛选功能教程</a></p>
                </td>
            </tr>
          
          
           <tr>
               <th scope="row"><label >多重筛标签筛选模式选项:</label>
                </th>
                <td>
                
                  <select >
                   <option value=''>并集</option>
                    <option value=''>交集栏</option>
                   
	             </select>
                </td>
            </tr>
            
               <tr>
               <th scope="row"><label  >多重筛选清空返回分类:</label>
                </th>
                <td>
                
                   
                  <select >
                      <option value=''>请选择<?php echo $shaixuancat; ?></option>
                
                   
	             </select> <br />
 
<em>当所有筛选结果清空之将会跳转的分类，如果不设置则跳转首页</em>
                </td>
            </tr>
          
          
               <tr>
               <th scope="row"><h2>【付费版解锁】文章系统默认列表风格设置</h2>
                </th>
                <td>
                 <p>文章系统的默认列表指的是默认的分类样式（每个分类可独立设置样式，若在此设置了全局样式，那么没有设置样式的分类将会显示如下设置），<br />
此外，标签结果页面、搜索结果页面以及归档、作者等等其他列表页面的样式也会使用下面的设置。</p>
                </td>
            </tr>
          
            
            
             <tr>
               <th scope="row"><label >文章分类显示</label>
                </th>
                <td>
              <select >
			 <option  value="">两栏默认</option>
			 <option  value="">通栏</option>
			 </select>
                </td>
            </tr>
            
            
        <tr>  
          <th scope="row"><label>显示结构选项</label></th>  
            <td> 
		   <select>
	         
			 <option  value="">默认图文结构（左图右文）</option>
             <option  value="">纯文字结构</option>
			 <option  value="">图片模式（可弹出播放视频）</option>
			
			
			 </select>
			 <br />
            <p>选择图片模式后，若有文章中填写了视频代码，那么则会弹出播放视频，若没有视频，则显示图片排版模式（图上文下，下面的选项可以选择一排显示多少篇文章）</p>
            </td>  
        </tr>   
        
        	<tr class="form-field">  
          <th scope="row"><label>显示列数</label></th>  
            <td> 
		   <select>
	     
			
			 <option  value="">一行显示4个产品（默认）</option>
			  <option  value="">一行显示3个</option>
			 <option  value="">一行显示5个</option>
			 <option value="">一行显示6个</option>
			 
			
			 </select>
			
  
            </td>  
        </tr>   
        
        
        
          <tr>
               <th scope="row"><h2>【付费版解锁】产品系统风格设置</h2>
                </th>
                <td>
                 <p>woocommerce产品系统的风格统一设置，包括woocommerce自带的“商店页面”风格设置，如果你单独设置了一些产品分类的风格，那么单独设置的风格将会覆盖掉下面的设置</p>
                </td>
            </tr>
        
        
          
    <tr class="form-field">  
          <th scope="row"><label>是否加入对比</label></th>  
            <td> 
		  
             <input type="checkbox"  />
			
             
       <p>【付费版具有产品对比功能，点击此处亲自试一试对比产品的效果：[<a target="_blank" href="http://woo.themepark.com.cn/shop/">亲自试一试</a>]】</p>
			
  
            </td>  
        </tr>   
        
        
         <tr class="form-field">  
          <th scope="row"><label >对比页面设置</label></th>  
            <td> 
		  
             
             
              <select >
	            <option value=''>请选择</option>
		
	</select>
			
             
       <p>如果你有产品分类（不仅是上面的默认的设置，其他具体的产品分类如果有加入对比的设置，那么请创建一个对比页面，并选择“woocommerce产品对比页面模板”，创建完成之后在上面选择这个页面，则可以点击加入对比了。）</p>
			
  
            </td>  
        </tr>   
        
        <tr class="form-field">  
          <th scope="row"><label for="product_mr_catce">侧边栏选择</label></th>  
            <td> 
		 <select>
	        <option value="">默认的侧边栏目</option>
		
			 
			 </select>
			 <br />
  <p>付费版可以创建、删除小工具位置，用来输出不同的侧栏，比如新闻侧栏输出一个内容，建立另一个侧栏在产品页面输出推荐的产品</p>
            </td>  
            
        </tr>   
        
        
        <tr >  
          <th scope="row"><label>模式选择</label></th>  
            <td> 
		   <select >
	        
			 <option   value="">两栏默认</option>
			 <option  value="">通栏</option>
			
			
			 </select>
			 <br />
  
            </td>  
        </tr>   
	
		<tr >  
          <th scope="row"><label for="images">显示选项</label></th>  
            <td> 
		   <select>
	         
			 <option   value="">默认带有购物车按钮</option>
             <option   value="n">不显示购物车按钮</option>
			 <option value="">显示相册略缩图（小图切换）</option>
			
			
			 </select>
			 <br />
  <p>付费版有丰富的内页列表展示方式，解锁可以获得</p>
            </td>  
        </tr>   
	
	<tr >  
          <th scope="row"><label >显示列数</label></th>  
            <td> 
		   <select >
	        
			
			 <option  value="">一行显示4个产品（默认）</option>
			  <option  value="">一行显示3个</option>
			 <option   value="">一行显示5个</option>
			 <option  >一行显示6个</option>
			 <option>一行显示1个(横向排版)</option>
			
			 </select>
			
  
            </td>  
        </tr>   
	
	<tr >  
          <th scope="row"><label>显示列数</label></th>  
            <td> 
		  <label>只在移动版显示一行一个（横向排版） <input type="checkbox" value=""  /></label> 
	   <p>显示行数会在屏幕缩小时自动换行排列，若勾选只在移动版显示一行一个，那么移动版会自动切换排版模式，而pc版不受影响</p>
			 
  
            </td>  
        </tr>   
        
         
          <tr>
               <th scope="row"><h2>产品筛选默认显示数量</h2>
                </th>
                <td>
                 <p>产品筛选是使用woocommerce的属性进行筛选的，而产品的属性如果比较多的话就会造成筛选菜单过长，你可以选择默认筛选的属性菜单显示多少条，超过的数量将会被隐藏，并且会出现一个展开的按钮</p>
                </td>
            </tr>
        
        
        
	<tr >  
          <th scope="row"><label>默认显示数量</label></th>  
            <td> 
		   <select>
	        
			
			 <option  value="">默认全部显示</option>
			  <option value="">默认显示3条</option>
               <option value="">默认显示4条</option>
                <option  value="">默认显示5条</option>
                 <option value="">默认显示6条</option>
			
			 </select>
			
  
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