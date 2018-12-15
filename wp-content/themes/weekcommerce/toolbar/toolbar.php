<?php include(dirname(dirname(__FILE__))."/options/data_cache.php");$thiscss='';; ?>
<div class="toolbar">
<div class="toolbar_line">
  <div class="toolbar_line_in"><?php if(class_exists('Woocommerce')){ ?>
    <a <?php if(!is_account_page()){ echo ' href="'.get_permalink( wc_get_page_id( 'myaccount' ) ).'"';}else{$thiscss='s_account_page';} ?> class="my_tool_box mycenter_tool <?php echo $thiscss; ?>"><i></i><span class="pc_tool"><?php echo $mytheme_toolbar_t1; ?></span><span class="move_tool"><?php echo $mytheme_toolbar_tm1; ?></span></a>
    
    <a  class="my_tool_box tool_cat_btn"><i></i><span class="move_tool"><?php echo $mytheme_toolbar_tm2; ?></span></a>
    
   <?php if(!is_cart()){?> <a  class="my_tool_box mycart_tool"><i><?php if(get_cart_number()){ ?><div id="cart_numbers"></div><?php } ?></i><span class="all_tool"><?php echo $mytheme_toolbar_t2;  if(get_cart_number()){ echo '('.get_cart_number().')';} ?></span></a><?php };?>
    <a class="my_tool_box myhistory_tool"><i><?php if(!empty($_COOKIE['recentlys_viewed'])){?><div id="cart_numbers"></div><?php } ?></i><span class="pc_tool"><?php echo $mytheme_toolbar_t3; ?></span><span class="move_tool">足记</span></a>
   
   <?php } ?>
    <div class="my_tool_box mysever_tool">
     <i></i>
    <span id="severs_tool" class="all_tool">
    <p class="severs_tool_head"><?php echo $mytheme_toolbar_t4; ?><a class="close_severs_tool">x</a></p>
    <div class="severs_tool_qq">
   
   <?php echo $mytheme_qq_code;?>
   
   
    <a  class="toobar_tell_btn" href="tel://<?php echo $mytheme_toolbar_tel_b2; ?>"><?php echo $mytheme_toolbar_tel_b. $mytheme_toolbar_tel_b2; ?></a>
 <a class="toobar_tell_btn" href="mailto:<?php echo $mytheme_toolbar_tel_b4; ?>"><?php echo $mytheme_toolbar_tel_b3; ?>：<br /><?php echo $mytheme_toolbar_tel_b4; ?></a>
   
    </div>
  

  <p class="severs_tool_footer">
   
<?php echo $mytheme_toolbar_sm_text; ?>

    
    </p>
    </span>
   <span class="move_tool"><?php echo $mytheme_toolbar_tm3; ?></span>
    </div>
    
    
    <?php if($mytheme_toolbar_wechat){ ?>
    <a class="my_tool_box myweixin_tool">  
    <i></i>
    <span id="severs_tool"  class="pc_tool">
    <p class="severs_tool_head"><?php echo $mytheme_toolbar_t5; ?></p>
    <div class="weixin_img"><img src="<?php echo $mytheme_toolbar_wechat; ?>" /></div>
    </span>
    </a>
    <?php } ?>
    
    
    <a class="my_tool_box mytop_tool" href="#top"><i></i><span class="pc_tool"><?php echo $mytheme_toolbar_t6; ?></span></a>
   </div>
</div>

<div  class="my_tool_fox_hidden">

<?php if(class_exists('Woocommerce')){ if( !is_cart() || !is_checkout() ){ ?>
<div id="per27" class="my_tool_fox carttoll">
<div class="my_tool_fox_head">
<p><?php echo $mytheme_toolbar_t2; ?></p><a>X</a>
</div>
<?php $Carts = new WC_Widget_Carts(); echo $Carts->widget( '', '' );  ?>
</div>
<?php } }?>

<?php if(class_exists('Woocommerce')){ ?>
<div id="per27" class="my_tool_fox historytoll">
<div class="my_tool_fox_head">
<p><?php echo $mytheme_toolbar_t3; ?></p><a>X</a>
</div>
<?php viewed_products(); ?>
</div>
<?php }?>

</div>

</div>