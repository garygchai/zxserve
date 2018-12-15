<?php 


function ajax_themepark_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	  extract($args, EXTR_SKIP);
	  $postid=$comment->post_id;
	  $authorid=$comment->user_id;
	 $thempark_commont= get_comment_meta( $comment->comment_ID, 'thempark_commont', true );
	$id = get_the_ID();
      $themepark_comment_box_show =get_post_meta($id, 'themepark_comment_box_show', true);  
	   $author_name =get_comment_author();
	
		 $default='';
		 $avatar_bbs_avatar = $bbs_admin_avatar=  get_avatar(  $current_user->ID, 60, $default, $current_user->display_name ); 

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
      <div class="tutle_li">
          <a class="avatar_comment_li"><?php if(is_admin_comment($comment->comment_ID)){echo $bbs_admin_avatar; } else{ echo $avatar_bbs_avatar;} ?></a>
      </div>
      <div id="ajax_commont_tex_li">
             <span class="top_ajax_span"><?php if(is_admin_comment($comment->comment_ID)){echo '<b class="admin_red">'.$bbs_admin; }else{ echo  '<b>'.$author_name;} ?></b> 
             <?php if ( $comment->comment_approved == '0' ) {echo '<a class="admin_red">[评论审核中]</a>';}else{ ?>
             <?php if(!$thempark_commont){ ?><a class="hfpl" rel="<?php comment_ID() ?>">回复</a> <?php } ?>
		      <?php } edit_comment_link('编辑',''); ?>
           </span>
            <?php comment_text()  ;
			if($themepark_comment_box_show=='showall'&&$thempark_commont){
			 echo '<div class="comment_meta">'.get_comment_meta( $comment->comment_ID, 'thempark_commont', true ).'</div>'; };?>
           
             <br />
           <em><?php comment_date('Y年m月d日') ?><?php comment_time() ?></em> 

     </div>
    
</li>
<?php
}

function disable_emoji9s_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}
 
function remove_emoji9s() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emoji9s_tinymce' );
}
 
add_action( 'init', 'remove_emoji9s' );
 
function custom_smilie9s_src( $old, $img ) {
    return get_stylesheet_directory_uri().'/smilies/'.$img;
}
 
function init_smilie9s(){
 global $wpsmiliestrans;
 //默认表情文本与表情图片的对应关系(可自定义修改)
 $wpsmiliestrans = array(
 ':mrgreen:' => 'icon_mrgreen.gif',
 ':neutral:' => 'icon_neutral.gif',
 ':twisted:' => 'icon_twisted.gif',
   ':arrow:' => 'icon_arrow.gif',
   ':shock:' => 'icon_eek.gif',
   ':smile:' => 'icon_smile.gif',
     ':???:' => 'icon_confused.gif',
    ':cool:' => 'icon_cool.gif',
    ':evil:' => 'icon_evil.gif',
    ':grin:' => 'icon_biggrin.gif',
    ':idea:' => 'icon_idea.gif',
    ':oops:' => 'icon_redface.gif',
    ':razz:' => 'icon_razz.gif',
    ':roll:' => 'icon_rolleyes.gif',
    ':wink:' => 'icon_wink.gif',
     ':cry:' => 'icon_cry.gif',
     ':eek:' => 'icon_surprised.gif',
     ':lol:' => 'icon_lol.gif',
     ':mad:' => 'icon_mad.gif',
     ':sad:' => 'icon_sad.gif',
       '8-)' => 'icon_cool.gif',
       '8-O' => 'icon_eek.gif',
       ':-(' => 'icon_sad.gif',
       ':-)' => 'icon_smile.gif',
       ':-?' => 'icon_confused.gif',
       ':-D' => 'icon_biggrin.gif',
       ':-P' => 'icon_razz.gif',
       ':-o' => 'icon_surprised.gif',
       ':-x' => 'icon_mad.gif',
       ':-|' => 'icon_neutral.gif',
       ';-)' => 'icon_wink.gif',
        '8O' => 'icon_eek.gif',
        ':(' => 'icon_sad.gif',
        ':)' => 'icon_smile.gif',
        ':?' => 'icon_confused.gif',
        ':D' => 'icon_biggrin.gif',
        ':P' => 'icon_razz.gif',
        ':o' => 'icon_surprised.gif',
        ':x' => 'icon_mad.gif',
        ':|' => 'icon_neutral.gif',
        ';)' => 'icon_wink.gif',
       ':!:' => 'icon_exclaim.gif',
       ':?:' => 'icon_question.gif',
 );
 //移除WordPress4.2版本更新所带来的Emoji前后台钩子同时挂上主题自带的表情路径
 remove_action( 'wp_head' , 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts' , 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles' , 'print_emoji_styles' );
 remove_action( 'admin_print_styles' , 'print_emoji_styles' );
 remove_filter( 'the_content_feed' , 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss' , 'wp_staticize_emoji' );
 remove_filter( 'wp_mail' , 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins' , 'disable_emoji9s_tinymce' );
 
 add_filter( 'smilies_src' , 'custom_smilie9s_src' , 10 , 2 );
}
add_action( 'init', 'init_smilie9s', 5 );
//取消添加表情样式
function disable_emojis_tinymce( $plugins ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
}
