<?php
/*
Plugin Name: Redel Core
Plugin URI: https://victorthemes.com/themes/redel
Description: Plugin to contain shortcodes and custom post types of the Redel theme.
Author: VictorThemes
Author URI: https://victorthemes.com/
Version: 1.4.1
Text Domain: redel-core
*/

if( ! function_exists( 'theme_block_direct_access' ) ) {
	function theme_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'VCTS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'VCTS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'VCTS_PLUGIN_ASTS', VCTS_PLUGIN_URL . 'assets' );
define( 'VCTS_PLUGIN_INC', VCTS_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Redel Shortcode Path
define( 'VCTS_SHORTCODE_BASE_PATH', VCTS_PLUGIN_PATH . 'visual-composer/' );
define( 'VCTS_SHORTCODE_PATH', VCTS_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function is_cs_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Redel');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('redel-core/redel-core.php')) {

	// Custom Post Types
	require_once( VCTS_PLUGIN_INC . '/custom-post-type.php' );

  /* One Click Install */
  require_once( VCTS_PLUGIN_INC . '/import/init.php' );

  // Shortcodes
  require_once( VCTS_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  require_once( VCTS_SHORTCODE_BASE_PATH . '/lib/lib.php' );
  require_once( VCTS_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( VCTS_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Widgets
  require_once( VCTS_PLUGIN_INC . '/widgets/widget-extra-fields.php' );
  require_once( VCTS_PLUGIN_INC . '/widgets/recent-posts.php' );
	require_once( VCTS_PLUGIN_INC . '/widgets/mailchimp-widget.php' );
	require_once( VCTS_PLUGIN_INC . '/widgets/text-widget.php' );

}

/**
 * Plugin language
 */
function redel_plugin_language_setup() {
  load_plugin_textdomain( 'redel-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'redel_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'redel_set_wpautop' ) ) {
  function redel_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Login Form Forgot Password */
add_filter('login_form_middle','redel_login_form_middle');
function redel_login_form_middle($content){
  $url=wp_lostpassword_url();
  $forgot_content='<span class="forgot-link"><a href="'.$url.'">FORGOT PASSWORD?</a></span>';
  return $forgot_content;
}

/* WP Registration form in Shortcode */
add_shortcode( 'appldr_registration', 'appldr_registration' );
function appldr_registration() {
    ob_start();
    appldr_registration_function();
    return ob_get_clean();
}

/* Registration Form Function */
function appldr_registration_function() {
  $first_name = $password = $email = '';
  if ( isset($_POST['wp-submit'] ) ) {
    registration_validation(
    $_POST['first_name'],
    $_POST['email'],
    $_POST['password']
    );

    // sanitize user form input
    global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;

    $username   =   sanitize_email( $_POST['email'] );
    $password   =   esc_attr( $_POST['password'] );
    $email      =   sanitize_email( $_POST['email'] );
    $first_name =   sanitize_text_field( $_POST['first_name'] );
    // call @function complete_registration to create the user
    // only when no WP_error is found
    complete_registration($username,$password,$email,$first_name
    );
  }

  registration_form($first_name,$email,$password );
}

/* Complete Resgistration Form s*/
function complete_registration() {
  global $reg_errors, $first_name, $email, $password;
  if ( 1 > count( $reg_errors->get_error_messages() ) ) {
    $userdata = array(
    'user_login'    =>   $email,
    'user_email'    =>   $email,
    'user_pass'     =>   $password,
    'first_name'    =>   $first_name,
    );
    $user = wp_insert_user( $userdata );
    //print_r($user);
    if($user)
      echo __('Registration complete. ','redel');
    else
      echo __('Problem in Registration . ','redel');
  }
}

/* WP Registration Form Output */
function registration_form( $first_name, $email, $password ) {
  echo '
  <form name="loginform" id="loginform" action="'.( is_ssl() ? 'https://' : 'http://' ).$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" method="post">
  <p class="login-username">
            <label for="full_name">Full Name</label>
            <input name="first_name" id="full_name" class="input" placeholder="Your Name" size="20" type="text" value="'.( isset( $_POST['first_name']) ? $first_name : null ).'">
          </p>
          <p class="login-password">
            <label for="email_address">Email Address</label>
            <input name="email" id="email_address" class="input" placeholder="Your Email" size="20" type="email" value="'.( isset( $_POST['email']) ? $email : null ).'">
          </p>
          <p class="login-password">
            <label for="password">Password</label>
            <input name="password" id="password" class="input" placeholder="Your Password" size="20" type="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
          </p>
          <p class="login-submit">
            <input name="wp-submit" id="wp-submit" class="button-primary" value="Sign up Free" type="submit">
            <input name="redirect_to" value="" type="hidden">
          </p>
  </form>
  ';
}

/* Registration Form Validation */
function registration_validation( $first_name, $email, $password )  {
  global $reg_errors;
  $reg_errors = new WP_Error;
  if ( empty( $first_name ) || empty( $password ) || empty( $email ) ) {
    $reg_errors->add('first_name', __('Required form field is missing','redel'));
  }
  if ( 5 > strlen( $password ) ) {
    $reg_errors->add( 'password', __('Password length must be greater than 5','redel') );
      }
  if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', __('Email is not valid','redel') );
  }
  if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', __('Email Already in use','redel') );
  }
  if ( is_wp_error( $reg_errors ) ) {

    foreach ( $reg_errors->get_error_messages() as $error ) {
      echo '<div>';
      echo '<strong>'.__('ERROR','redel').'</strong>:';
      echo $error . '<br/>';
      echo '</div>';
    }
  }
}
/* end code for registration form*/

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}