<?php 


include("options/data_cache.php"); ?>
<div class="footer">

<div class="footer_in">
   
    
   
	   <?php if($mytheme_footer_sever_nav){  
	  echo ' <ul class="footer_service">';
	   wp_nav_menu(array( 'walker' => new  header_menu(),'container' => false,'menu' => $mytheme_footer_sever_nav ,'items_wrap' => '%3$s' ) ); 
	   echo '</ul>';
	   }
	   ?>
    </ul>

<?php if($mytheme_footer_tel||$mytheme_footer_contact_s||$mytheme_footer_fax||$mytheme_footer_contact||$mytheme_footer_btn){?>

<div class="footer_contact">
<p class="tell"><?php echo $mytheme_footer_tel; ?></p>
<p><?php echo $mytheme_footer_contact_s; ?></p>
<p><?php echo $mytheme_footer_fax; ?></p>
<p><?php echo $mytheme_footer_contact; ?></p>
<a href="<?php  echo $mytheme_footer_btn_url; ?>"><?php echo $mytheme_footer_btn; ?></a>
</div>
<?php }else{?>
<div class="footer_contact">
<p class="tell">400-800-8822</p>
<p>周一至周日 8:00-18:00（仅售市话费用）</p>
<p>传真 ：0731-8858855</p>
<p>联系地址：湖南省长沙市天心区芙蓉中路235号</p>
<a>联系在线客服</a>
</div>
<?php } ?>
</div>
</div>


<div class="footer_bottom">
<div class="footer_in">

    
      <?php  
	   if($mytheme_footer_sever_nav2){ 
	   echo '<ul class="footer_menu">';
	   wp_nav_menu(array( 'walker' => new  header_menu(),'container' => false,'menu' => $mytheme_footer_sever_nav2 ,'items_wrap' => '%3$s' ) );
	   echo '</ul>';
	   } ?>
   
    
    <p class="bq"><?php if($mytheme_footer_bqba_ts){echo $mytheme_footer_bqba_ts;}else{echo '版权所有 ©'.date("Y").'-'.get_bloginfo('name');} ?> 
    
     <?php if($mytheme_footer_bqba_ts2){?> | <a target="_blank" rel="nofollow" href="http://www.miitbeian.gov.cn/"><?php echo $mytheme_footer_bqba_ts2; ?></a> <?php } ?>
     
      <?php if($mytheme_footer_bqba_ts3){?> 
    |  <a class="gonganwb" target="_blank" rel="nofollow" href="<?php echo $mytheme_footer_bqba_ts4; ?>"><?php echo $mytheme_footer_bqba_ts3; ?></a>
       <?php } ?>
        
      |  <a class="banquan" target="_blank" href="http://www.themepark.com.cn">wordpress主题</a> </p>
  
   <?php  
	 if($mytheme_footer_sever_nav3){ 
	  echo '  <ul class="footer_menu">';
	  wp_nav_menu(array( 'walker' => new  header_menu(),'container' => false,'menu' => $mytheme_footer_sever_nav3 ,'items_wrap' => '%3$s' ) ); 
	  echo '</ul>';
	  }?>
    
</div>

 
      <?php if($mytheme_footer_sever_nav4){  
	  echo '<ul class="yq_link">';
	   wp_nav_menu(array( 'walker' => new  header_menu(),'container' => false,'menu' => $mytheme_footer_sever_nav4 ,'items_wrap' => '%3$s' ) ); 
	   echo '</ul>';
	   }?>


</div>
<?php  get_template_part( 'toolbar/toolbar' ); ?>



<?php wp_footer(); echo  stripslashes(get_option('code_in_foot')); ?>
</body>
<!--<?php echo get_num_queries() . ' queries in ' . timer_stop(0) . ' seconds.'; ?>-->	
</html>