
 
	
$(document).ready(function() {
	
	
	
	$(".goto_duibi").on("click",function(){
		if($("#duibi_ul > li").size()<2){
			$(".duibi_erro2").fadeIn(500);
			return false;
			}
		
		
	});
	
	if($.cookie('duibi')){
		$('.duibi_box').show();
		$('.padding_slide').children($.cookie('duibi')).children('.product_duibi_btn').each(function(){
			$(this).addClass('activ_d');
ids=$(this).parent('.product_duibi').attr("id");	
ppid=	$(this).attr("data-product_id");		
pics=$(this).parent('.product_duibi').prev('.case_text').prev('.case_pic').children("a").html();
texts=$(this).parent('.product_duibi').prev('.case_text').html();
html= '<li  class="new_duibi_li" id="'+ids+'"><div data_ids="'+ids+'"data_id="'+ppid+'" class="delet_duibi_li">X</div>'+pics+'<span class="text_duibi">'+texts+'</span></li>';
$('#duibi_ul').append(function(n){
    return html;
	  
    });
				
		});
		}
	
	$('.duibi_box_title').children("a").on("click",function(){
		
		$('.duibi_box,.duibi_erro2,.duibi_erro').fadeOut(500);
		
	});
	
	
	
	
	
$('a.clear_duibi').on("click",function(){
		$('.duibi_box,.duibi_erro2,.duibi_erro').fadeOut(500);
		$('#duibi_ul').children("li").remove();
		 $.cookie('duibi',  '',{ path: '/' });  
		  $.cookie('duibi_id',  '',{ path: '/' });  
		 $('.padding_slide').children($.cookie('duibi')).children('.product_duibi_btn').removeClass('activ_d'); 
		
	});
		
	
	
$(".product_duibi_btn").on("click",function(){
ids=$(this).parent('.product_duibi').attr("id");
p_ids=$(this).attr("data-product_id");

$('.duibi_box').fadeIn(500);
	if($(this).hasClass('activ_d')){
		$(this).removeClass('activ_d'); 
	$('#duibi_ul').children('#'+ids).remove();
	
	d_cookies=$.cookie('duibi');
	p_cookies=$.cookie('duibi_id');
	
	 if(d_cookies){
		 
	  d_cookies2=$.cookie('duibi')+',';
	  p_cookies2=$.cookie('duibi_id')+',';
	  
	  ids2='#'+ids+','
	  p_ids2=p_ids+','
	  
     d_cookies3= d_cookies2.replace(ids2, '');
	 p_cookies3= p_cookies2.replace(p_ids2, '');

	 d_cookies4=  d_cookies3.substring(0,d_cookies3.length-1);
	 p_cookies4=  p_cookies3.substring(0,p_cookies3.length-1);
	 
		 $.cookie('duibi',  d_cookies4,{ path: '/' });  
		 $.cookie('duibi_id',  p_cookies4,{ path: '/' });  
		 }
	
	
	
		
		}else{
			

if($("#duibi_ul > li").size()<=3){
	
$(this).addClass('activ_d');
	
pics=$(this).parent('.product_duibi').prev('.case_text').prev('.case_pic').children("a").html();
texts=$(this).parent('.product_duibi').prev('.case_text').html();
  html= '<li class="new_duibi_li" id="'+ids+'"><div data_ids="'+ids+'"data_id="'+p_ids+'" class="delet_duibi_li">X</div>'+pics+'<span class="text_duibi">'+texts+'</span></li>';
 d_cookies=$.cookie('duibi');
 p_cookies=$.cookie('duibi_id');
 if(d_cookies){
  $.cookie('duibi', d_cookies+',#'+ids,{ path: '/' }); 
  $.cookie('duibi_id', p_cookies+','+p_ids,{ path: '/' }); 
 }else{
	 
	  $.cookie('duibi', '#'+ids,{ path: '/' }); 
	  $.cookie('duibi_id', p_ids,{ path: '/' }); 
	 }
  
$('#duibi_ul').append(function(n){
    return html;
	  
    });
	

	
	
}else{
	$('.duibi_erro').fadeIn(500);
	}
}



});


$('#duibi_ul').on("click",".new_duibi_li .delet_duibi_li",function(){
	delet_ids=$(this).attr('data_ids');
	delet_id=$(this).attr('data_id');
	
	d_cookies=$.cookie('duibi');
	p_cookies=$.cookie('duibi_id');
	ids3='#'+delet_ids;
	
	 if(d_cookies){
		 
	  d_cookies2=$.cookie('duibi')+',';
	  p_cookies2=$.cookie('duibi_id')+',';
	  
	  ids2='#'+delet_ids+','
	  p_ids2=delet_id+','
	  
     d_cookies3= d_cookies2.replace(ids2, '');
	 p_cookies3= p_cookies2.replace(p_ids2, '');

	 d_cookies4=  d_cookies3.substring(0,d_cookies3.length-1);
	 p_cookies4=  p_cookies3.substring(0,p_cookies3.length-1);
	 
		 $.cookie('duibi',  d_cookies4,{ path: '/' });  
		 $.cookie('duibi_id',  p_cookies4,{ path: '/' });  
		 }
	$(this).parent("li").remove();
	$(ids3).children(".product_duibi_btn").removeClass('activ_d');
	
	});



  });
  
	
