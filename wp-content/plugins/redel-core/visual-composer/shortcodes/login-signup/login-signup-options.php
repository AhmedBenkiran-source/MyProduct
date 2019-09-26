<?php
/**
 * Login signup - Shortcode Options
 */
add_action( 'init', 'login_signup_vc_map' );
if ( ! function_exists( 'login_signup_vc_map' ) ) {
  function login_signup_vc_map() {
    vc_map( array(
    "name" => __( "Login Signup", 'redel-core'),
    "base" => "redl_login_signup",
    "description" => __( "Login Signup form", 'redel-core'),
    "icon" => "fa fa-user color-red",
    "category" => EvaluateLib::evlt_cat_name(),
    "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Select Form', 'redel-core' ),
          'value' => array(
            __( 'Login Form', 'redel-core' ) => 'login',
            __( 'Signup Form', 'redel-core' ) => 'signup',

          ),
          'param_name' => 'form_type',
          'description' => __( 'Select form', 'redel-core' ),
          "admin_label"=> true,
        ),

        array(
        "type"        =>'textfield',
        "heading"     =>__('Text After Form', 'redel-core'),
        "param_name"  => "text_after",
        "value"       => "",
        "description" => __( "Enter the text after form", 'redel-core'),
        "admin_label"=> true,
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Link Text', 'redel-core'),
        "param_name"  => "link_text",
        "value"       => "",
        "description" => __( "Enter the text of the link", 'redel-core'),
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Link Url', 'redel-core'),
        "param_name"  => "link_url",
        "value"       => "",
        "description" => __( "Enter the url of the link", 'redel-core'),
        "admin_label"=> true,
        ),

      EvaluateLib::vt_class_option(),
       // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Design Options", 'redel-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'redel-core'),
        ),
      ),
    ) );
  }
}