<?php
/**
 * Video - Shortcode Options
 */
add_action( 'init', 'redl_video_vc_map' );
if ( ! function_exists( 'redl_video_vc_map' ) ) {
  function redl_video_vc_map() {
    vc_map( array(
      "name" => __( "Video", 'redel-core'),
      "base" => "redl_video",
      "description" => __( "Video Shortcodes", 'redel-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

      // video poster image
        array(
          "type"      => 'attach_image',
          "heading"   => __('Poster Image', 'redel-core'),
          "param_name" => "poster_image",
          "value"      => "",
          "description" => __( "Select your poster image.", 'redel-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Select Type', 'redel-core' ),
          'value' => array(
            __('Select type', 'redel-core') => '',
            __('Vimeo', 'redel-core') => 'vimeo',
            __('YouTube', 'redel-core') => 'youtube',
            __('Dailymotion', 'redel-core') => 'dailymotion',
          ),
          'param_name' => 'video_type',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Video Id', 'redel-core'),
          "param_name"  => "video_id",
          "value"       => "",
          "description" => __( "Enter video id", 'redel-core')
        ),

        EvaluateLib::vt_class_option(),

      )
    ) );
  }
}
