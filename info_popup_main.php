<?php
/*
Plugin Name: Informational Popup

Description: shortcode for nice looking, easy popups. supports photos and video
Version: 1.0
Author: Josh Keen

License: GPL2
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details:

http://www.gnu.org/licenses/gpl.html.

*/


/********info_popup short code
*
* short code that slides or fades in box with a message you pass to the short code.
*Wrap any text in your post in the info_popup short tags. When you click on that text, a text box will slide in
*with a message you pass it in the short code tag.
*
*example: 
*Let's say you want a translation of the spanish word tortuga to slide in when you click tortuga:
*type this in your post: [info_popup pop_title="translation" message="tortuga means turtle in Spanish"]tortuga[/info_pop]
*
*This plugin does not support video in all browsers due to cross-domain restrictions. I've left in the video-related code 
*in case I ever find a work-around.
********/

$blog_url = get_bloginfo('wpurl');



function the_returned_content($more_link_text = null, $stripteaser = false) {
	$content = get_the_content(); 
	
	return $content;
}

function the_returned_search_query() {
	return get_search_query();
}
	function info_popup_handler( $atts, $content = null ) {
	//get the vars passed to the short tag in the post
		extract( shortcode_atts( array(
		'message' => ' ',
		'pop_title' => ' ',
		'pop_image'=>'no_image',
		'pop_video'=>' ',
		), $atts ) );
	
	//get options
	$pop_text_color = get_option('pop_text_color');
	$pop_border_color = get_option('pop_border_color');
	$pop_animate_left =  get_option('pop_animate_left');
	$pop_bg_color = get_option('pop_bg_color');
	$pop_border_width = get_option('pop_border_width');
	$pop_post_text_color = get_option('pop_post_text_color');
        $pop_animation_type = get_option('pop_animation_type');
        $pop_title_text = $pop_title;
        
	//get a random number to create a unique id for each popup box
        $pop_id_num = rand(1,1000);
       
	//get the size of the message to help size the box
        $message_char_count = strlen($message);
        
        if ($message_char_count > 40){
		$message_height = (($message_char_count/40) * 24);
}	else{
                $message_height = 24;
}
        	
        if($pop_image=='no_image'){
		$img_div = '<span></span>';
        
         
}	else{
	  
          $complete_img_path = $blog_url.$pop_image;
	  $img_div = '<img src="'.$complete_img_path.'" alt="popup image '.$pop_image.'" id="img_tag_'.$pop_id_num.'" />';
       
        
}
       //return the script, css and html that creates the poup box
       return '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" id="info_popup_script_tag_'.$pop_id_num.'">
      
        deploy_info_popup_js('.$pop_id_num.', '.$pop_animation_type.', '.$pop_animate_left.', '.$message_height.');
   
       
      
              </script>



	<span class="clicked_text_'.$pop_id_num.'">'.$content.'</span>
	<div id="popup_div_'.$pop_id_num.'">
	<h2 id="h2_'.$pop_id_num.'">'.$pop_title_text.'</h2>
	<br />
         '.$img_div.'
	<!--<img src="'.$pop_image.'" alt=" " class="'.$display_class.'" id="img_tag_'.$pop_id_num.'" />-->
	<br />
        <!--<div id="loading_video_'.$pop_id_num.'">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsploading your video...</div>-->
        <div id="video_div_'.$pop_id_num.'">'.$pop_video.'</div>
        <br />
        <div style="font-size:15px" id="h4_'.$pop_id_num.'">'.$message.'</div>
        <br />
        <div id="close_btn_'.$pop_id_num.'">close</div>
        <br />
        </div>

        <style>

	.clicked_text_'.$pop_id_num.'{color: '.$pop_post_text_color.'; font-weight: bold;cursor:pointer;}
	span.clicked_text_'.$pop_id_num.':hover{color:#666666;}
	
	#popup_div_'.$pop_id_num.'{display: block; color: '.$pop_text_color.'; font-style: italic;font-weight: bold; display: none; background-color: '.$pop_bg_color.'; border: '.$pop_border_width.'px '.$pop_border_color.' solid;position:absolute;left:-2500px; padding: 20px; z-index: 10005;}

	#close_btn_'.$pop_id_num.'{cursor:pointer; margin-bottom: 10px;} 
	.line_div{position: absolute; top: 83%; border-top: 1px #b7b1b1 solid; width: 290px;} 
	#img_tag_'.$pop_id_num.'{border: none;}
	.pop_title_class{display: none;}
	#h2_'.$pop_id_num.'{opacity:0%; border:0;color: '.$pop_text_color.'; background-color: '.$pop_bg_color.';}
	#h4_'.$pop_id_num.'{opacity:0%;color: '.$pop_text_color.';}
        #loading_video_'.$pop_id_num.'{z-index:9998;}
        #video_div_'.$pop_id_num.'{position: relative; top:-25px; z-index:10007;}
	</style>';
}


	add_shortcode( 'info_popup', 'info_popup_handler' );

       
/******END info_popup*****/



	function popup_dashboard_widget_function() {
	// Display whatever it is you want to show
?>
	<a href="<?php echo bloginfo('wpurl'); echo '/wp-content/plugins/informational-popup/tester.php'; ?>">info popup manager</a><br /><p>Choose styles for your shortcode popups.</p>
<?php } 

	// Create the function to use in the action hook

	function popup_add_dashboard_widgets() {
	wp_add_dashboard_widget('popup_dashboard_widget', 'info popup Dashboard Widget', 'popup_dashboard_widget_function');	
} 
	// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'popup_add_dashboard_widgets' );


function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );

$blog_url = get_bloginfo('wpurl');
 wp_deregister_script( 'jquery_ui' );
    wp_register_script( 'jquery_ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js');
    wp_enqueue_script( 'jquery_ui' );

  wp_deregister_script( 'farbtastic' );
    wp_register_script( 'farbtastic', "$blog_url /wp-content/plugins/informational-popup/farbtastic.js");
    wp_enqueue_script( 'farbtastic' );


    //wp_deregister_script( 'info_popup_js' );
    wp_register_script( 'info_popup_js', "$blog_url/wp-content/plugins/informational-popup/info_popup.js");
    wp_enqueue_script( 'info_popup_js' );

}    
 
add_action('wp_enqueue_scripts', 'my_scripts_method');


/******************popup style options******************/

        function my_admin_menu() {
             $page = add_theme_page( 'Info popup options', 'info popup options', 'edit_theme_options', 'my-theme-options', 'my_theme_options' );
    add_action( 'admin_print_styles-' . $page, 'my_admin_scripts' );
}
add_action( 'admin_menu', 'my_admin_menu' );

/*function my_admin_scripts() {
      wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
    wp_enqueue_script( 'my-theme-options', get_template_directory_uri() . '/js/theme-options.js', array( 'farbtastic', 'jquery' ) );
}*/

function my_theme_options() {
	
	
	//get all user selected options
	$pop_text_color = get_option('pop_text_color');
	$pop_border_color = get_option('pop_border_color');
	$pop_animate_left =  get_option('pop_animate_left');
	$pop_bg_color = get_option('pop_bg_color');
	$pop_border_width = get_option('pop_border_width');
	$pop_post_text_color = get_option('pop_post_text_color');
	$pop_animation_type = get_option('pop_animation_type');

        

	

	//set defaults for a fresh install
       if (!strlen($pop_bg_color)>0 ){
	$pop_text_color = '#666666';
	$pop_border_color = '#666666';
	$pop_animate_left =  800;
	$pop_bg_color = '#ffffff';
	$pop_border_width = 1;
	$pop_post_text_color = '#666666';
	$pop_animation_type = 100;
        }
        

?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('wpurl');?>/wp-content/plugins/informational-popup/info_popup.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('wpurl');?>/wp-content/plugins/informational-popup/farbtastic.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('wpurl');?>/wp-admin/css/farbtastic.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('wpurl');?>/wp-content/plugins/informational-popup/info_popup.css" />

<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function() {
		$(function () {
	   
		$('#colorpicker_pop_border').farbtastic('#pop_border_color_input');
		$('#colorpicker_pop_bg').farbtastic('#pop_bg_color_input');
		$('#colorpicker_pop_text').farbtastic('#pop_text_color_input');
		$('#colorpicker_pop_post_text').farbtastic('#pop_post_text_color_input');

                                   
	 });
});

        //set the preview box to the currently saved options
	$(document).ready(function() {
		$(function () {
		$("#preview_button").click(function(){
		var border_color = $("#pop_border_color_input").attr('value');
    

		var bg_color = $("#pop_bg_color_input").attr('value');
		$("#preview_popup_box").css("background-color", bg_color);

                var text_color = $("#pop_text_color_input").attr('value');
                $("#preview_popup_box").css("color", text_color);

		var border_width = $("#pop_border_width_input").attr('value');
		$("#preview_popup_box").css("border", border_width+"px solid "+border_color);

		var pop_text_color = $("#pop_post_text_color_input").attr('value');
    
     

      });
   });
});


//]]></script>



    <div id="wrapper">

	<form id="pop_style_form" method="POST" action="<?php echo bloginfo('wpurl');?>/wp-content/plugins/informational-popup/info_popup_set_options.php">
	<table>
	<tr>
	<td>

	<!--start border color section-->
	<div id="border_color_form" class="pop_form">
	<p>choose a border color:</p>
  
	<div class="colorpicker">
	<div id="colorpicker_pop_border"></div>
	</div>
        <div style="font-size:10px">If the field is blank, enter #000000 to get started.</div>
	<input type="text" size="7" name="pop_border_color" value="<?php echo $pop_border_color; ?>" id="pop_border_color_input" />
 	<br />
 	</div><!--END border color_form-->
	</td>
 	

 	<td>
 	<!--start bg color section-->
 	<div id="bg_color_form" class="pop_form">
 	<p>choose a background color:</p>
 	<div class="colorpicker">
 	<div id="colorpicker_pop_bg"></div>
 	</div>
 
	<input type="text" size="7" name="pop_bg_color" value="<?php echo $pop_bg_color; ?>" id="pop_bg_color_input" />
 	<br />
 	</div><!--END bg_color_form-->
 	</td>
 
 	<td>
 	<!--start text color section-->
 	<div id="text_color" class="pop_form">
 	<p>choose a text color:</p>
 	<div class="colorpicker">
 	<div id="colorpicker_pop_text"></div>
 	</div>
 
	<input type="text" size="7" name="pop_text_color" value="<?php echo $pop_text_color; ?>" id="pop_text_color_input" />
 	<br />
 	</div><!--END text color_form-->
 	</td>

 	</tr>
	

 	<tr>
 	<td>
 	<!--start animate left section-->
 	<div id="animate_left_form" class="pop_form">
 	<p>how many pixels left to animate:</p>

 	<input type="text" size="4" name="pop_animate_left" value="<?php echo $pop_animate_left; ?>"    id="pop_animate_left_input" />px
 	<br />
 	</div><!--END animate left form-->
 	</td>

 	<td>
 	<!--start border width section-->
 	<div id="border_width" class="pop_form">
 	<p>border width: </p>

 	<input type="text" size="4" name="pop_border_width" value="<?php echo $pop_border_width; ?>"   id="pop_border_width_input" />px
 	<br />
 	</div><!--END border width form-->
 	</td>

 	<td>
 	<!--start post test color---the color of the text that you click on in the post-->
 	<div id="post_text_color" class="pop_form">
 	<p>choose the color of the text you click to see the popup:</p>
 	<div class="colorpicker">
 	<div id="colorpicker_pop_post_text"> </div>
 	</div>
 
	<input type="text" size="7" name="pop_post_text_color" value="<?php echo $pop_post_text_color; ?>" id="pop_post_text_color_input" />
 	<br />
 	</div><!--END post text section  -->
 	</td>


	</tr>
	</table>

	<!--start animation type-->
	<div id="animation_type" class="pop_div">
	<p>animation type: </p>

	<input type="radio" name="pop_animation_type" value="100" checked="checked" /> Whoosh in.<br />
	<input type="radio" name="pop_animation_type" value="10" /> Fade in. 
	<br />
	</div><!--END animation type-->


	<div id="preview_or_submit">
	<div id="preview_button">preview</div>
	<br />
	<input type="submit" id="submit_popup_options" value="set popup options" class="custom_button" />
	</div>
	
       <div id="option_report"> <?php echo $pop_test_option;?></div>
	</form>
	</div><!--END #wrapper-->

	<div id="preview_popup_box" style="background-color: <?php echo $pop_bg_color;?>; border: <?php echo $pop_border_color;?> solid <?php echo $pop_border_width;?>px; color:<?php echo $pop_text_color;?>">
	<div id="preview_title" >Your Title</div>
	<br /><br /><br />
	<div id="preview_message">This is more or less what your popup boxes will look like.</div>
	<br /><br /><br />
	</div>
	<br /><br />



	

	</div>
    <?php
}


function my_admin_init() {
    register_setting( 'my-theme-options', 'my-theme-options' );
    add_settings_section( 'section_general', 'General Settings', 'my_section_general', 'my-theme-options' );
    add_settings_field( 'color', 'Color', 'my_setting_color', 'my-theme-options', 'section_general' );
}

add_action( 'admin_init', 'my_admin_init' );
function my_section_general() {
    _e( 'The general section description goes here.' );
}

function my_admin_scripts() {
    wp_enqueue_style( 'info_popup' );
    wp_enqueue_script( 'info_popup' );
    wp_enqueue_script( 'info_popup', "info_popup.js" );
}


?>
