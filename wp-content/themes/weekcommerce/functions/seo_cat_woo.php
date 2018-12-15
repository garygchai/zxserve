<?php

function add_product_seo_format(){  
  
		

		  
		  
   echo '
   
   
      <h3>显示产品数量</h3>
   <div class="form-field">  
            <label for="cat_nummber">这个产品分类显示多少数量？</label>  
            <input name="cat_nummber" id="cat_nummber" type="text" value="" size="10">  
            <p>若填写了这个数量，那么就会按照这个数量显示产品数量，若不填写则显示后台--设置--阅读中设置的文章显示数量</p>  
          </div>     
   
   
   <h3>【付费版解锁】侧边栏选择</h3>
   <div class="form-field">  
            <select name="catce" id="catce">
	        
			 <option value="">默认的侧边栏目</option>
			
			 </select>
          </div>   
		  
		 
    
	 
	  <h3>【付费版解锁】继承默认</h3>
	   <div class="navm">  
             
			 <label for="navm">不继承默认设置</label>
			   <input type="checkbox" value="no" name="cat_mr_jic" id="cat_mr_jic" />
			
             
       <p>在主题选项--默认列表和筛选可以设置默认的产品分类样式，如果你不希望让这个产品分类继承那个设置，可以勾选此处，将不会使用主题选项中的设置</p>
          </div>  
		  
		  
		 <h3>【付费版解锁】产品对比</h3>  
		   
	   <div class="navm">  
             
			 <label for="duibi">开启产品对比</label>
			    <input type="checkbox" value="no" name="duibi" id="duibi" />
			
             
         <p>如果你的产品参数需要给用户进行对比，那么勾选这个设置，在产品分类中即可出现对比的按钮，最多可放入4个对比的产品进行对比</p>
          </div>
		  
		 <h3>【付费版解锁】模式选择</h3>  
		     
   <div class="cat_modle">  
            <select name="cat_modle" id="cat_modle">
	        
			 <option value="">两栏默认</option>
			 <option value="tong">通栏</option>
			
			
			 </select>
          </div>   
		  
	 <h3>【付费版解锁】显示选项</h3>
	 
	 
   <div class="cat_modle2">  
            <select name="cat_modle2" id="cat_modle2">
	        
			 <option value="">默认带有购物车按钮</option>
			 <option value="no">不显示购物车按钮</option>
			  <option  value="shop_thumbnail">显示相册略缩图（小图切换）</option>
			 </select>
          <p>列表中的尺寸统一设置为：woocommerce设置--产品--显示中的目录图片 尺寸</p>
		  </div> 
	 <h3>【付费版解锁】显示列数</h3>
   <div class="cat_modle3">  
            <select name="cat_modle3" id="cat_modle3">
	        
			 <option value="">一行显示4个产品（默认）</option>
			  <option value="cat_line3">一行显示3个</option>
			 <option value="cat_line5">一行显示5个</option>
			 <option value="cat_line6">一行显示6个</option>
			 <option value="cat_lineso">一行显示1个(横向排版)</option>
			 </select>
      
		  </div> 	  
  <label for="cat_modle4">【付费版解锁】只在移动版显示一行一个（横向排版） <input type="checkbox" value="move_only_line" name="cat_modle4" id="cat_modle4"  /></label> 
	   <p>显示行数会在屏幕缩小时自动换行排列，若勾选只在移动版显示一行一个，那么移动版会自动切换排版模式，而pc版不受影响</p>
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
add_action('product_cat_add_form_fields','add_product_seo_format',10,2);  
  
  
function edit_product_seo_format($tag){  
   
  ?>
	 	<tr class="form-field">  
          <th scope="row"><label for="cat_nummber">这个产品分类显示多少数量？</label>  </th>  
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
			 <br />
  
            </td>  
        </tr>   
	
    
    
    <tr class="form-field">  
          <th scope="row"><label for="duibi">【付费版解锁】是否加入对比</label></th>  
            <td> 
		  
             <input type="checkbox" value="no" name="duibi" id="duibi"  />
			
             
       <p>如果你的产品参数需要给用户进行对比，那么勾选这个设置，在产品分类中即可出现对比的按钮，最多可放入4个对比的产品进行对比</p>
			
  
            </td>  
        </tr>   
    
    
    
	
    <tr class="form-field">  
          <th scope="row"><label for="cat_mr_jic">【付费版解锁】不继承默认设置</label></th>  
            <td> 
		  
             <input type="checkbox" value="no" name="cat_mr_jic" id="cat_mr_jic" />
			
             
       <p>在主题选项--默认列表和筛选可以设置默认的产品分类样式，如果你不希望让这个产品分类继承那个设置，可以勾选此处，将不会使用主题选项中的设置</p>
			
  
            </td>  
        </tr>   
    
	
	
		<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】模式选择</label></th>  
            <td> 
		   <select name="cat_modle" id="cat_modle">
	        
			 <option value="">两栏默认</option>
			 <option value="tong">通栏</option>
			
			
			 </select>
			 <br />
  
            </td>  
        </tr>   
	
		<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】显示选项</label></th>  
            <td> 
		   <select name="cat_modle2" id="cat_modle2">
	         
			 <option  value="">默认带有购物车按钮</option>
             <option  value="no">不显示购物车按钮</option>
			 <option  value="shop_thumbnail">显示相册略缩图（小图切换）</option>
			
			
			 </select>
             
			 <br />
  
            </td>  
        </tr>   
	
	<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】显示列数</label></th>  
            <td> 
		   <select name="cat_modle3" id="cat_modle3">
	         <?php $cat_modle3= get_option('cat_modle3_'.$tag->term_id); ?> 
			
			 <option  value="">一行显示4个产品（默认）</option>
			  <option  value="cat_line3">一行显示3个</option>
			 <option  value="cat_line5">一行显示5个</option>
			 <option   value="cat_line6">一行显示6个</option>
			 <option  value="cat_lineso">一行显示1个(横向排版)</option>
			
			 </select>
			
    <p>列表中的尺寸统一设置为：woocommerce设置--产品--显示中的目录图片 尺寸</p>
            </td>  
        </tr>   
	
	<tr class="form-field">  
          <th scope="row"><label for="images">【付费版解锁】显示列数</label></th>  
            <td> 
		  <label for="cat_modle4">只在移动版显示一行一个（横向排版） <input type="checkbox" value="move_only_line" name="cat_modle4" id="cat_modle4"  /></label> 
	   <p>显示行数会在屏幕缩小时自动换行排列，若勾选只在移动版显示一行一个，那么移动版会自动切换排版模式，而pc版不受影响</p>
			 
  
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
add_action('product_cat_edit_form_fields','edit_product_seo_format',10,2);  
  
  
function taxonomy_product_seo_format($term_id){  
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
  
add_action('created_product_cat','taxonomy_product_seo_format',10,1);  
add_action('edited_product_cat','taxonomy_product_seo_format',10,1);  



?>