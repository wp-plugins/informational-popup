
	function deploy_info_popup_js(pop_id_num, pop_animation_type, pop_animate_left, message_height){

        
        

        $(document).ready(function(){
	$(".clicked_text_"+pop_id_num).click(function(){
	
           if (  $("#sidebar")  ){
         $("#sidebar").css("opacity", ".20");  
}
         if ( $("#secondary") ){
         $("#secondary").css("opacity", ".20");  

}
         //Append the popup to the body. Otherwise it will be hidden behind other elements in certain themes.
        $("#popup_div_"+pop_id_num).appendTo("body");

        
        //get the offset positions of the scrollbar, clicked text, and popup box.  
        var scroll_top = $(document).scrollTop();
        var clicked_offset = $(".clicked_text_"+pop_id_num).offset();
        var popup_offset = $("#popup_div_"+pop_id_num).offset();    
   
	//get the window height and set the default y position for the popup box
	var win_height = $(window).height();
        $("#popup_div_"+pop_id_num).css({"top": clicked_offset+"px", "padding": "10px"});
	$("#popup_div_"+pop_id_num).fadeIn("100");

        //get the height of an image or video passed to the popup box
        var img_width = $("#img_tag_"+pop_id_num).outerWidth();
	var img_height = $("#img_tag_"+pop_id_num).outerHeight();
	var video_width = $("#video_div_"+pop_id_num).children().outerWidth();
        var video_height = $("#video_div_"+pop_id_num).children().outerHeight();
   
	//increase the width of the popup box to accomodate any video or image
	if (img_width > 300){
      		var  img_or_video_width = img_width + 40;

}	else if(video_width > 300){
		var  img_or_video_width = video_width + 40;

}	else {
     		var img_or_video_width = 300;
}

	if(img_height){       
		img_or_video_height = img_height +100;    
 
}	else if(video_height){
		img_or_video_height = video_height +100; 
        
}	else{
    img_or_video_height = 150;
}
      
        //now we have the dimensions of the popup box
	var width_of_popup = $("#popup_div_"+pop_id_num).width();
	var height_of_popup = $("#popup_div_"+pop_id_num).height() + message_height;
        var clicked_top = clicked_offset.top;
	var popup_bottom = clicked_top + height_of_popup;
	var window_bottom = win_height + scroll_top;

	//detect if part of the box will fall below the viewport, if so, get the amount we need to correct it by
	if (popup_bottom > window_bottom){
		var popup_correction = popup_bottom - window_bottom + 70;
}	else{
		var popup_correction = 0;
}

	var popup_top_coord = clicked_top - popup_correction; 

        if(popup_top_coord < scroll_top){
        	popup_top_coord = scroll_top + 10;

}

        //reset the position of the popup box with the correction
	$("#popup_div_"+pop_id_num).offset({top: popup_top_coord});
	var pop_message_height = message_height;
	
 	//animation
        //if the animation is set to whoosh...
        if(pop_animation_type == 100){
		$("#popup_div_"+pop_id_num).css("display", "none");
		$("#popup_div_"+pop_id_num).animate({
		height: height_of_popup+"px", 
		width: img_or_video_width+"px"}, 10,
		function(){ 
				$("#popup_div_"+pop_id_num).css("display", "block");
				$("#popup_div_"+pop_id_num).animate({ 
				left: pop_animate_left+"px"}, 500);
		});
        }
        //if the animation is set to fade...
        else if(pop_animation_type == 10){
       
         
        $("#popup_div_"+pop_id_num).css("display", "block");
        var img_src = $("#img_tag_"+pop_id_num).attr('src');
               
        //This fixes a problem with the fade animation if the user were to repeatedly open and close a box several times 		   in a row. 
	
	if (img_width==0 && img_src!='no_image') {
                img_or_video_width = 410;
                
                  
}

   //some themes need more height for the popup box

      
	//move the popup within the viewport and fade it in
	$("#popup_div_"+pop_id_num).css({"left":"800px", "height": height_of_popup+"px", "width":   img_or_video_width+"px"});
	$("#popup_div_"+pop_id_num).fadeIn(1000);
}

        //set the close button to undo whichever animation you selected
	$("#close_btn_"+pop_id_num).click(function(){
       
        if($("#sidebar")){
	$("#sidebar").css("opacity", "1");   
}

         if($("#secondary")){
         $("#secondary").css("opacity", "1");  
}   

        //if the animation is set to whoosh...
        if(pop_animation_type==100){
        $("#popup_div_"+pop_id_num).animate({left: "-2000px"});
	$("#popup_div_"+pop_id_num).fadeOut();
}
       //if the animation is set to fade...
       else{
       $("#video_div"+pop_id_num).fadeOut(100);
       $("#popup_div_"+pop_id_num).fadeOut(500, function(){
       $("#popup_div_"+pop_id_num).css({"left": "-"+pop_animate_left+"px"});
 });
       
       }


});

});
				});
}
