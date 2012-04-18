=== Informational Popup Plugin ===
Contributors: joshkeen
Donate link: none right now
Tags: popup,simple,window,shortcode,video,images
Requires at least: 2.8
Tested up to: 3.3.1
Stable tag: trunk  

Wrap any text in this shortcode. Click that text and a popup animates onto the screen with text, image and/or links.
  

== Description ==

Informational Popup shortcode to create animated popup windows. It supports text, images and links. Create dynamic foot notes, explore digressions, extend your posts.  

example: 
[info_popup pop_title="Headline at the Top of the Window" message="This is the main text" pop_image="example.jpg"]clickable text in your post or page.[/info_pop]

Here's a template you can copy and paste:

[info_popup pop_title='PASTE THE WINDOW'S HEADLINE HERE' message='PASTE THE MAIN TEXT HERE' pop_image='example.jpg']THIS TEXT WILL SHOW AS BEING CLICKABLE IN YOUR POST BECAUSE IT'S WRAPPED IN THE SHORTCODE[/info_popup]

Upload the images you want to use in your popups to (YOUR DOMAIN)/wp-content/plugins/informational-popup/pop-images

You can add <a href=""></a> tags anywhere in the message="". 

Example:

[info_popup pop_title="Here's a Headline!" message="Here's a message! And here is <a href='http://www.theonion.com'>a link to the onion.</a>" pop_image="example.jpg"]Click me![/info_popup]   


Use the code above in any page or post.

To set colors and animation for the popups, go to Appearance->info popup options.

== License ==
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details:

http://www.gnu.org/licenses/gpl.html.



== Installation ==

Installation for General Use


1. Upload the whole `informational-popup` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the Plugins menu in WordPress.
3. In a post or page use the shortcode [info_popup pop_title='Headline at the Top of the Window' message='This is the main text']clickable text in your post or page.[/info_popup] to create a popup link.
4. Go to the dashboard, select appearance->info popup options, choose styles and click set style options.


== FAQs ==

Here are some common gotchas:

*If you get a weird break in your post after inserting a shortcode, try wrapping the entire post in a <h4></h4> tag.

*Remember, you can't have double quotes inside double quotes or single quotes inside single quotes. You must alternate double and single quotes. If your message contains an apostrophe, make sure your message is wrapped in double quotes.  

*Sometimes wordpress loops are set to only print experts of the posts. These loops often leave out shortcodes. A common example would be search results pages. 

*A quick work-around to get your popups working in the search results:

Go to your theme's search.php page. Find the main loop and look for the_excerpt(). Comment out whatever code is associated with the_excerpt()---probablly just the rest of the statement. In other words, comment out everything between the_excerpt() and the terminating ';'. Replace it with the_content(). This will get the full post complete with shortcodes. 




== Screenshots ==

1. The options page.

2. A screenshot of a window that has animated into the viewport.


== Changelog ==

No changes yet.


== Upgrade Notice ==

No upgrades yet.
