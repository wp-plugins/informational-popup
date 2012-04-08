<?php
           
           require('../../../wp-config.php');  
           $wp->init();  
           $wp->parse_request();  
           $wp->query_posts();  
           $wp->register_globals();  
    
/**
*This file is pretty self-explantory. It sets or updates the options.
*
*these lists of variables will need to be converted to one single array of attributes instead of writing the list out
*/
  
  //defaults
  
  $info_array = array(
		
				'pop_border_color',
				'pop_bg_color',
				'pop_text_color',
				'pop_animate_left',
				'pop_post_text_color',
				'pop_animation_type',
				'pop_border_width',

                           );

  $pop_border_color = '#000000';
  $pop_bg_color = '#ffffff';
  $pop_text_color = '#000000';
  $pop_animate_left = 600;
  $pop_post_text_color ='#ffffff';
  $pop_animation_type =666;

  //collect the user's choices sent from the dashboard page (info_pop_home.php)
  $pop_post_text_color = $_POST['pop_post_text_color']; 
  $pop_border_color = $_POST['pop_border_color'];
  $pop_bg_color = $_POST['pop_bg_color'];
  $pop_text_color = $_POST['pop_text_color'];
  $pop_animate_left = $_POST['pop_animate_left'];
  $pop_border_width = $_POST['pop_border_width'];
  $pop_post_text_color = $_POST['pop_post_text_color'];
  $pop_animation_type =  $_POST['pop_animation_type'];

 //add options to the database. If the options already exist, nothing happens here
 add_option('pop_text_color');
 add_option('pop_border_color');
 add_option('pop_animate_left');
 add_option('pop_bg_color');
 add_option('pop_border_width');
 add_option('pop_post_text_color');
 add_option('pop_animation_type');

 //update the options in the database

 update_option('pop_text_color', $pop_text_color);
update_option('pop_post_text_color', $pop_post_text_color);
$pop_post_update_result = get_option('pop_post_text_color');

//use this as a template to test updates
//$pop_post_update_result == $pop_post_text_color ? return : print('there was a problem with setting the post pop text color.'); 
 
update_option('pop_border_color', $pop_border_color);
 update_option('pop_animate_left', $pop_animate_left);
 update_option('pop_border_width', $pop_border_width);
 echo "<br />";
 update_option('pop_bg_color', $pop_bg_color);
$pop_bg_update_result = get_option('pop_bg_color');
//$pop_bg_update_result == $pop_bg_color ? return : print('there was a problem with setting the background color');

 update_option('pop_animation_type', $pop_animation_type);
 
 //$update_result = get_option('pop_post_text_color');



  //echo $update_result;
 if ($pop_post_update_result==$pop_post_text_color){
?>       
        <html>
        <head>
        <title>update popup styles</title>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('/');?>wp-content/plugins/informational-popup/info_popup.css" /> 
	</head>
	<body>
        <div id="set_options_wrapper">
	<h3 class="set_options_header">Updates were Successful</h3>
	<br />
	<h3 class="set_options_header"><a href="<?php echo site_url('/');?>"><span id="home_from_info_update">Return to homepage.</span></a></h3>
        <br />
         <h3 class="set_options_header"><a href="<?php echo site_url('/');?>wp-admin/themes.php?page=my-theme-options">Go back to infomational popup styles</a></h3>
</div>
</body>
</html>
<?php 
}

 
else{?>

<html>
        <head>
        <title>update popup styles</title>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('/');?>wp-content/plugins/informational-popup/info_popup.css" /> 
	</head>
	<body>
        <div id="set_options_wrapper">
	<h3 class="set_options_header">Sorry! there was a problem with updating your settings.</h3>
	<br />
	<h3 class="set_options_header"><a href="<?php echo site_url('/');?>"><span id="home_from_info_update">Return to homepage.</span></a></h3>
        <br />
         <h3 class="set_options_header"><a href="<?php echo site_url('/');?>wp-admin/themes.php?page=my-theme-options">Go back to infomational popup styles</a></h3>
</div>
</body>
</html>

 

<?php 
}





  
  

?>
