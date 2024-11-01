<?php
/**
 * Plugin Name:		   TC FlexSlider
 * Plugin URI:		   http://themescode.com/tc-flexslider
 * Description:		   TC flexslider
 * Version: 		     1.0.0
 * Author: 			   Imran Emu < imran@themescode.com >
 * Author URI: 		   http://themescode.com/tc-flexslider
 * Text Domain:        tc-flexslider
 * License:          GPL-2.0+
 * License URI:      http://www.gnu.org/licenses/gpl-2.0.txt
 * License: GPL2
 */
// include files

 include(plugin_dir_path( __FILE__ ).'/lib/tc-flexslider-cpt.php');
 include(plugin_dir_path( __FILE__ ).'/lib/tc-flexslider-column.php');
 include(plugin_dir_path( __FILE__ ).'/public/tc-flexslider-view.php');

 function tc_flexslider_enqueue_scripts() {
   // Vendors style & scripts
   // flexslider
    wp_enqueue_style('flexslider-css', plugins_url('tc-flexslider/vendors/flexslider/flexslider.css'));
    wp_enqueue_style('tc-flexslider-css', plugins_url('tc-flexslider/assets/css/tc-flexslider.css'));
    wp_enqueue_script('flexslider-js', plugins_url('vendors/flexslider/jquery.flexslider.js', __FILE__ ), array('jquery'), 1.0, true);
  }

 add_action( 'wp_enqueue_scripts', 'tc_flexslider_enqueue_scripts' );

 if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
 }


 // Sub Menu Page


 add_action('admin_menu', 'tc_flexslider_menu_init');



 function tc_flexslider_menu_help(){
 	include('lib/tc-flexslider-help-upgrade.php');
 }





 function tc_flexslider_menu_init()
 	{

 		add_submenu_page('edit.php?post_type=tcflexslider', __('Help & Upgrade','tc-flexslider'), __('Help & Upgrade','tc-flexslider'), 'manage_options', 'tc_flexslider_menu_help', 'tc_flexslider_menu_help');

 	}
