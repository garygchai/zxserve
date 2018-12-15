<?php 
function case_loop($modlie,$titleseo3){

					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 $content= get_the_content();
					 $linkss=get_post_meta($id,"hoturl", true); 
					 $vedio=get_post_meta($id,"vedios", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					if(get_post_meta($id ,"links_p", true)){ $contact_btn_url=get_post_meta($id ,"links_p", true);}else{$contact_btn_url=get_option('mytheme_btn_url');}
					  if( $modlie=='like'){$show=40;}else{$show=100;}
					  ?>          
                              <li class="swiper-slide">
                              <div class="padding_slide">
                    <div class="case_pic">   <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
						<a <?php if(!$vedio||$modlie=='like'){ echo 'href="'.$links1.'"target="_blank" ' ;}else{echo 'id="vedio_link"';}; ?>  ><?php  themepark_thumbnails('medium'); ?></a>
							<?php  if($vedio&&$modlie!='like'){echo '<div class="vedio_code"><noscript>'.stripslashes($vedio).'</noscript></div>
							<div class="vedio_btn"></div>';} ?>
							
                            </div>
                     <div class="case_text post_text">
                       <?php if($titleseo3){echo '<'.$titleseo3.'  class="posts_title">';}else{echo '<div  class="posts_title">';} ?>
                        <a href="<?php echo $links1 ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf-8'); ?></a>
                         <?php if($titleseo3){echo '</'.$titleseo3.'>';}else{echo '</div>';} ?>
                     
           <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$show,"...",'utf-8'); ?></p>
                       
                  </div>
                     </div>
                </li>
<?php } ?>