<?php 
    /*
    Plugin Name: Axcelerate Link Utility
    Plugin URI: http://www.tide.com.au
    Description: This plugin has been developed by <a href="http://www.tide.com.au">TIDE Training Pty Ltd</a> to link a wordpress website to the <a href="http://www.axcelerate.com.au">Axcelerate student management database</a>. Axceleratete is owned and operated by VM Learning.
    Author: <a href="https://plus.google.com/u/0/106348228952008823179/posts">Andrew Russell</a>, <a href="https://plus.google.com/u/0/113458527902427375473/posts">Chris Eames</a> and <a href="#">Loremuel Gadrinab</a>
    Version: 1.3.1.2
    Author URI: http://www.tide.com.au
    */
	/* 
		Desc: add CSS for plugin
		Auth: Loremuel Gadrinab 
	*/
require 'plugin-update-checker/plugin-update-checker.php';
$className = PucFactory::getLatestClassVersion('PucGitHubChecker');
$myUpdateChecker = new $className(
	'https://github.com/loremuelgadrinab/axcelerate-link-test/',
	__FILE__,
	'master'
);

	include_once 'axcelerate-link-dbdata.php';

	add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );
	function register_plugin_styles() {
		wp_register_style( 'axcelerate-link', plugins_url( 'axcelerate-link/css/style.css' ) );
		wp_enqueue_style( 'axcelerate-link' );

	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_styles2' );
	function register_plugin_styles2() {
	        wp_register_style( 'axcelerate-link-tablesort', plugins_url('axcelerate-link/js/tablesorter/css/theme.default.min.css'));
	        wp_enqueue_style( 'axcelerate-link-tablesort' );
	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_styles3' );
	function register_plugin_styles3() {
	        wp_register_style( 'axcelerate-link-fontawsome', plugins_url('axcelerate-link/css/font-awesome/css/font-awesome.min.css'));
	        wp_enqueue_style( 'axcelerate-link-fontawsome' );
	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_styles4' );
	function register_plugin_styles4() {
	        wp_register_style( 'axcelerate-link-tooltip', plugins_url('axcelerate-link/css/tooltipster.css'));
	        wp_enqueue_style( 'axcelerate-link-tooltip' );
	}
	//add_action( 'wp_enqueue_scripts', 'register_plugin_styles4' );
	//function register_plugin_styles4() {
	//        wp_register_style( 'axcelerate-link-lightbox1', plugins_url('axcelerate-link/css/screen.css'));
	//        wp_enqueue_style( 'axcelerate-link-lightbox1' );
	//}
	add_action( 'wp_enqueue_scripts', 'register_plugin_styles5' );
	function register_plugin_styles5() {
	        wp_register_style( 'axcelerate-link-lightbox2', plugins_url('axcelerate-link/css/lightbox.css'));
	        wp_enqueue_style( 'axcelerate-link-lightbox2' );
	}

	// admin css
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
	function load_custom_wp_admin_style() {
	        wp_register_style( 'axcelerate-link-admin-css', plugins_url() . '/axcelerate-link/css/admin-style.css', false, '1.0.0' );
	        wp_enqueue_style( 'axcelerate-link-admin-css' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style2' );
	function load_custom_wp_admin_style2() {
	        wp_register_style( 'axcelerate-link-admin-css2', plugins_url() . '/axcelerate-link/css/font-awesome/css/font-awesome.min.css', false, '1.0.0' );
	        wp_enqueue_style( 'axcelerate-link-admin-css2' );
	}
	
	
	/* 
		Description: add JQuery Script
		Auth: Loremuel Gadrinab 
	*/
	add_action( 'wp_enqueue_scripts', 'register_plugin_script4' );
	function register_plugin_script4() {		
		wp_register_script( 'axcelerate-link4', plugins_url( '/js/lightbox.js', __FILE__ ),array('jquery'), null, true );
	    wp_enqueue_script( 'axcelerate-link4' );
	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_script' );
	function register_plugin_script() {		
	    wp_register_script( 'axcelerate-link', plugins_url( '/js/script.js', __FILE__ ),array('axcelerate-link4'), null, true );
		wp_enqueue_script( 'axcelerate-link' );
		wp_localize_script('axcelerate-link', 'ajax_url', admin_url('admin-ajax.php'));
	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_script2' );
	function register_plugin_script2() {		
		wp_register_script( 'axcelerate-link2', plugins_url( '/js/tablesorter/js/jquery.tablesorter.min.js', __FILE__ ),array('axcelerate-link'), null, true );
	    wp_enqueue_script( 'axcelerate-link2' );
	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_script3' );
	function register_plugin_script3() {		
		wp_register_script( 'axcelerate-link3', plugins_url( '/js/tablesorter/js/jquery.tablesorter.widgets.min.js', __FILE__ ),array('axcelerate-link2'), null, true );
	    wp_enqueue_script( 'axcelerate-link3' );
	}
	add_action( 'wp_enqueue_scripts', 'register_plugin_script5' );
	function register_plugin_script5() {		
		wp_register_script( 'axcelerate-link5', plugins_url( '/js/jquery.tooltipster.min.js', __FILE__ ),array('axcelerate-link3'), null, true );
	    wp_enqueue_script( 'axcelerate-link5' );
	}
	

	function uploaded_files() {
 
	    $upload = wp_upload_dir();
	    $upload_dir = $upload['basedir'];
	    $upload_dir = $upload_dir . '/axcelerate-files';
	    if (! is_dir($upload_dir)) {
	       mkdir( $upload_dir, 0775 );
	    }
	}
	 
	register_activation_hook( __FILE__, 'uploaded_files' );
	

	// Register Administration menu

	add_action('admin_menu', 'axcelerate_link_admin_actions');

	

	//Register the Axcelerate Newsletter Signup Widget

	require_once('axcelerate-link-widget-newsletter.php');

	add_action('widgets_init', create_function('', 'return register_widget("axcelerate_newsletter_signup_widget");'));

	

	//Add shortcode for Newsletter Signup so it can be placed anywhere in the code.

	require_once('axcelerate-link-shortcodes.php');

	add_shortcode("newsletter-signup", "newsletter_signup_handler");

	

	//Register the hook to access form data prior to sending email notification

	remove_all_filters ('wpcf7_before_send_mail'); //Remove all previous loaded filters for Contact Form 7

	include_once('axcelerate-link-frontend.php');	

	add_action('wpcf7_before_send_mail', 'extract_data_from_form');


	// php custom functions and other hooks
	include_once('axcelerate-link-functions.php');	

	// php custom login widget
	include_once('axcelerate-link-login-widget.php');

	/* Add admin options page. Takes into consideration the older versions of Wordpress. */	

	function axcelerate_link_admin_actions() {

		global $wp_version;

	

		// Modern WP?

		if (version_compare($wp_version, '3.0', '>=')) {

			add_menu_page('Axcelerate Client Link', 'Axcelerate Client Link', 'manage_options', 'Axcelerate_Link_Admin', 'axcelerate_link_admin_page');
			//add_submenu_page('tools.php', 'Axcelerate_Link_Admin','Link Admin','Link Admin', 'manage_options','Axcelerate_Link_Admin','axcelerate_link_admin_page');
			add_submenu_page('Axcelerate_Link_Admin','Axcelerate Client Link','Link Admin', 'manage_options','Axcelerate_Link_Admin','axcelerate_link_admin_page');

			add_submenu_page('Axcelerate_Link_Admin','Page Setup','Page Setup', 'manage_options','Axcelerate_Link_Admin_Pages_Setup','axcelerate_link_admin_pages_setup_page');

			add_submenu_page('Axcelerate_Link_Admin','Client Form Setup','Client Form Setup', 'manage_options','Axcelerate_Link_Admin_SRMS_Form_Setup','axcelerate_link_admin_srms_form_page');

			add_submenu_page('Axcelerate_Link_Admin','Google Drive Sync Handler', 'Google Drive Sync Handler','manage_options', 'Axcelerate_Link_Admin_SRMS_GoogleDrive_Handler', 'axcelerate_link_admin_srms_google_upload_handler');

			// add_submenu_page('Axcelerate_Link_Admin','SRMS Contact Attachment Lists','SRMS Contact Attachment Lists', 'manage_options','Axcelerate_Link_Admin_SRMS_Contact_Attachment_Lists','axcelerate_link_admin_srms_contact_attachment_list');

			add_submenu_page('Axcelerate_Link_Admin','Login Widget Redirect Settings','Login Widget Redirect Settings', 'manage_options','Axcelerate_Link_Admin_Login_widget','axcelerate_link_admin_srms_login_widget');

			// add_submenu_page('Axcelerate_Link_Admin','Payment Settings','Payment Settings', 'manage_options','Axcelerate_Link_Admin_Payment','axcelerate_link_admin_srms_payment_page');

			return;

		}

	

		// Older WPMU?

		if (function_exists("get_current_site")) {

			add_submenu_page('wpmu-admin.php', 'Axcelerate Link Admin', 'Axcelerate Link Admin', 9, 'Axcelerate_Link_Admin', 'axcelerate_link_admin_page');

			return;

		}



		//Older WP

		add_options_page('Axcelerate Link Admin', 'Axcelerate Link Admin', 9, 'Axcelerate_Link_Admin', 'axcelerate_link_admin_page');	

	}



	/* Actual admin page */

	function axcelerate_link_admin_page() {

		if (!current_user_can('manage_options')) {

			wp_die('Sorry, but you do not have permissions to change settings.');

		}



		include_once('axcelerate-link-admin.php');

	}

	

	/* Actual admin pages setup page */

	function axcelerate_link_admin_pages_setup_page() {

		if (!current_user_can('manage_options')) {

			wp_die('Sorry, but you do not have permissions to change settings.');

		}



		include_once('axcelerate-link-admin-pages-setup.php');

	}

	function axcelerate_link_admin_srms_form_page(){
		if (!current_user_can('manage_options')) {

			wp_die('Sorry, but you do not have permissions to change settings.');

		}



		include_once('axcelerate-link-admin-srms-form-setup.php');

	}

	function axcelerate_link_admin_srms_google_upload_handler(){
		if (!current_user_can('manage_options')) {

			wp_die('Sorry, but you do not have permissions to change settings.');

		}



		include_once('axcelerate-link-admin-srms-google-upload-handler.php');

	}

	function axcelerate_link_admin_srms_contact_attachment_list(){
		if (!current_user_can('manage_options')) {

			wp_die('Sorry, but you do not have permissions to change settings.');

		}

		
		include_once('axcelerate-link-admin-srms-contact-attachment-list.php');
	}

	function axcelerate_link_admin_srms_login_widget(){
		if (!current_user_can('manage_options')) {

			wp_die('Sorry, but you do not have permissions to change settings.');

		}

		
		include_once('axcelerate-link-admin-login-widget-settings.php');
	}

	function axcelerate_link_admin_srms_payment_page(){
		include_once('axcelerate-link-admin-payment-settings.php');
	}


function newsletter_signup_handler() {



	$lph_output = add_newsletter_signup();

	echo $lph_output;

	

	return ($lph_output);

	

}



add_action('init', 'myStartSession', 1);

add_action('wp_logout', 'myEndSession');

add_action('wp_login', 'myEndSession');

$isexisted = get_option('axcelerate-check-course-vacancy');
if(!$isexisted){

	update_option('axcelerate-check-course-vacancy', array());
}


function myStartSession() {

 //   if(!session_id()) {

//        session_start();

//    }

}



function myEndSession() {

    // session_destroy ();

}


?>