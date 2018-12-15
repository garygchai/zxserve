<?php
/**
 * 主题选项副菜单-侧边栏小工具设置
 * 建立不同的小工具提供给页面、产品、分类和文章进行选择，在此可以增加或者删除小工具。

 * @see 	    http://www.themepark.com.cn
 * @author 		themepark
 * @package 	theme/themeoption
 * @version     1.o
 */
function widget_option_function() {



theme_themepark_video('【付费版解锁】在付费版中，你可以创建任意数量的侧栏位置，为你的每一个分类、产品列表、页面、文章和产品输出侧栏，可以任意添加或者删除，此页面不具有真实的功能，仅提供付费版对比参考');		
?>


 
 
 <h3>【付费版解锁】主题边栏设置</h3>
 
    <form method="post" action=""class="xuanxiangka">
    
      <table class="form-table">
      <tbody>
        <tr>
               <th scope="row"><label for="themepark_theme_widget">添加侧边栏位置</label>
                </th>
                <td>
                <input  type="text" size="60"   value=""/> 
               <p >（小工具位置：请填写中文名称，如：全部商品侧边栏）</p>
                </td>
            </tr>
            
            
            <tr>
               <th scope="row"><label for="themepark_theme_widget_id">边栏ID</label>
                </th>
                <td>
                <input  type="text" size="60"  value=""/> 
               <p >（对应上面的名称填写id，id为英文字母组成，不可重复,请勿添加特殊字符，可使用拼音，可注意下方已经添加的内容，不要重复）</p>
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


 <table class="form-table">
      <tbody>
        <tr>
               <th scope="row"><label>还没有创建任何侧边栏，请在上面进行创建，创建完成之后此处会出现列表</label>
                </th>
                <td>
              
                </td>
            </tr>
          
            
          
            
      
      </tbody>
      </table>

<?php }?>