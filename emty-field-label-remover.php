<?php
/*
Plugin Name: Empty Fields Remover For CF7 Email
Plugin URI: http://plugins.wrpsolution.com
Description: Remove blank form fields label on contact form 7 email.
Author: Naresh Goyani
Version: 1.0.0
Author URI: http://plugins.wrpsolution.com
Textdomain: efr_cf7
*/


/*  Global Options Settings */
$prefix = 'efr_cf7_'; 
$efr_cf7_constants = array(
	'version'           => $version,
	'dir'               => plugin_dir_path( __FILE__ ),
	'url'               => plugin_dir_url( __FILE__ ),
	'prefix'            => 'efr_cf7_'
);

foreach ( $efr_cf7_constants as $const_name => $constant_val ) {
	if ( ! defined( $prefix . $const_name ) ) {
		define( $prefix . $const_name, $constant_val );
	}
}

if ( in_array( 'contact-form-7/wp-contact-form-7.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if ( ! class_exists( 'efremover_cf7_addon' ) ) {
		require_once efr_cf7_dir . 'admin/admion-settings.php';
		require_once efr_cf7_dir . 'front/contact-email-actions.php';
		class efremover_cf7_addon{
			
			function __construct(){
				$this->init();
			}
			
			/* Initialize Plugins Links */
			public function init(){
				add_action('admin_menu', array('efr_cf7_admin','add_wcals_admin_menu'));
				add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this,'efr_cf7_setting_link') );
				register_activation_hook( __FILE__, array( 'efremover_cf7_addon', 'add_defaukt_setting_option' ) );
			}
			
			
			/* Setting Link */
			public function efr_cf7_setting_link($links){
				$settng_link = array(
				 '<a href="' . admin_url( 'admin.php?page=efr_cf7_settings' ) . '">'.__('Setting','efr_cf7').'</a>',
				 );
				return array_merge( $links, $settng_link );
			}
		
			/*  Store Default Setting */
			public function add_defaukt_setting_option(){
				update_option('efr_cf7_settings','yes');
			}

		}
		
		/* Load plugin data */
		new efremover_cf7_addon();
	}	
}else{
	add_action( 'admin_notices', 'add_dependency_notice_on_admin' );
}

function add_dependency_notice_on_admin(){
	$class = 'notice notice-error';
	$message = __( '<b>Empty Fields Remover For CF7 Email</b> requires <a href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> to be installed & activated!', 'sample-text-domain' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
}

