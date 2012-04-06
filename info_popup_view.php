<?php 

 include  "<?php echo bloginfo('wpurl');?> /wp-blog-header.php" ;
	//get all user selected options
	$pop_text_color = get_option('pop_text_color');
	$pop_border_color = get_option('pop_border_color');
	$pop_animate_left =  get_option('pop_animate_left');
	$pop_bg_color = get_option('pop_bg_color');
	$pop_border_width = get_option('pop_border_width');
	$pop_post_text_color = get_option('pop_post_text_color');
	$pop_animation_type = get_option('pop_animation_type');

?>

	<!--<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
	<title>popup style</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo bloginfo('wpurl');?>/wp-content/plugins/informational-popup/farbtastic.js"></script>

 	<script type="text/javascript">
	
	$(document).ready(function() {
		$(function () {
	   
		$('#colorpicker_pop_border').farbtastic({ callback: '#pop_border_color_input', width: 150 });
		$('#colorpicker_pop_bg').farbtastic({ callback: '#pop_bg_color_input', width: 150 });
		$('#colorpicker_pop_text').farbtastic({ callback: '#pop_text_color_input', width: 150 });
		$('#colorpicker_pop_post_text').farbtastic({ callback: "#pop_post_text_color_input", width: 150});

                                   
	 });
});


        //preview box
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


</script>

	<link rel="stylesheet" type="text/css" href="info_popup.css" />
	</head>
	<body>
	<div id="wrapper">

	<form id="pop_style_form" method="POST" action="info_popup_set_options.php">
	<table>
	<tr>
	<td>

	<!--start form section-->
	<div id="border_color_form" class="pop_form">
	<p>choose a border color:</p>
	<div class="colorpicker">
	<div id="colorpicker_pop_border"></div>
	</div>
 
	<input type="text" size="7" name="pop_border_color" value="<?php echo $pop_border_color; ?>" id="pop_border_color_input" />
 	<br />
 	</div><!--END bg_color_form-->
	</td>
 	<br />

 	<td>
 	<!--start  bg color section-->
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
	<br />

 	<tr>
 	<td>
 	<!--start animate left section-->
 	<div id="animate_left_form" class="pop_form">
 	<p>how many pixels left to animate:</p>

 	<input type="text" size="4" name="pop_animate_left" value="<?php echo $pop_animate_left; ?>"    id="pop_animate_left_input" />
 	<br />
 	</div><!--END animate left-->
 	</td>

 	<td>
 	<!--start border width section-->
 	<div id="border_width" class="pop_form">
 	<p>border width: </p>

 	<input type="text" size="4" name="pop_border_width" value="<?php echo $pop_border_width; ?>"   id="pop_border_width_input" />
 	<br />
 	</div><!--END border width-->
 	</td>

 	<td>
 	<!--start post text color---the text you click on in the post-->
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
	<input type="submit" id="submit_popup_options" value="save update" class="custom_button" />
	</div>
	
        <div id="option_report"> option report</div>
	</form>
	</div><!--END #wrapper-->

	<div id="preview_popup_box" style="background-color: <?php echo $pop_bg_color;?>; border: <?php echo $pop_border_color;?> solid <?php echo $pop_border_width;?>px; color:<?php echo $pop_text_color;?>">
	<div id="preview_title" >Your Title</div>
	<br /><br /><br />
	<div id="preview_message">This is more or less what your popup boxes will look like.</div>
	<br /><br /><br />
	</div>
	<br /><br />-->



