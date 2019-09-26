<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'redel_scripts_styles' ) ) {
  function redel_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', REDEL_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap-css', REDEL_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'redel-own-carousel', REDEL_CSS .'/owl.carousel.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'magnific-popup-styles', REDEL_CSS . '/magnific-popup.css', array(), REDEL_THEME_VERSION, 'all' );
    wp_enqueue_style( 'themify-icons-styles', REDEL_CSS . '/themify-icons.css', array(), REDEL_THEME_VERSION, 'all' );
    wp_enqueue_style( 'redel-style', REDEL_CSS .'/styles.css', array(), REDEL_THEME_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap-js', REDEL_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'redel-plugins', REDEL_SCRIPTS . '/plugins.js', array( 'jquery' ), REDEL_THEME_VERSION, true );
    wp_enqueue_script( 'redel-scripts', REDEL_SCRIPTS . '/scripts.js', array( 'jquery' ), REDEL_THEME_VERSION, true );
    wp_enqueue_script( 'jquery-fitvids', REDEL_SCRIPTS . '/jquery.fitvids.js', array( 'jquery' ), REDEL_THEME_VERSION, true );

    // Comments
    wp_enqueue_script( 'redel-validate-js', REDEL_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'redel-validate-js', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $viewport = cs_get_option('theme_responsive');
    if($viewport == 'on') {
      wp_enqueue_style( 'redel-responsive', REDEL_CSS .'/responsive.css', array(), REDEL_THEME_VERSION, 'all' );
    }
    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'redel_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'redel_admin_scripts_styles' ) ) {
  function redel_admin_scripts_styles() {
    wp_enqueue_style('admin-main', REDEL_CSS . '/admin-styles.css', __FILE__);
    wp_enqueue_script('admin-scripts', REDEL_SCRIPTS . '/admin-scripts.js', __FILE__);
    wp_enqueue_style('themify-icons-styles', REDEL_CSS . '/themify-icons.css', array(), REDEL_THEME_VERSION, 'all');
  }
  add_action( 'admin_enqueue_scripts', 'redel_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'redel_framework_wp_enqueue_styles' ) ) {
  function redel_framework_wp_enqueue_styles() {
    redel_framework_google_fonts();
    add_action( 'wp_head', 'redel_framework_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'redel_framework_wp_enqueue_styles' );
}
