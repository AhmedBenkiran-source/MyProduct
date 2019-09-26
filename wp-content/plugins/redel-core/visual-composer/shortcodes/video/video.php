<?php
/* ==========================================================
  Video
=========================================================== */
if ( !function_exists('redl_video_function')) {
  function redl_video_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'poster_image'  => '',
      'video_type'  => '',
      'video_id'  => '',
      'class'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    if($poster_image){
      $image_url = wp_get_attachment_url( $poster_image );
      $video_image = $image_url ? '<img src="'. esc_url($image_url) .'" alt="" class="video-poster" />' : '';
    } else {
      $video_image = '';
    }

    if($video_type === "vimeo") {
      $framecode = '<iframe id="click-video" src="https://player.vimeo.com/video/' . esc_attr($video_id) . '?title=0&byline=0&portrait=0&" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    } elseif($video_type === "dailymotion") {
      $framecode = '<iframe id="click-video" frameborder="0" width="480" height="270" src="//www.dailymotion.com/embed/video/' . esc_attr($video_id) . '?" allowfullscreen></iframe>';
    } elseif($video_type === "youtube") {
      $framecode = '<iframe id="click-video" width="560" height="315" src="https://www.youtube.com/embed/' . esc_attr($video_id) . '?" frameborder="0" allowfullscreen></iframe>';
    }

    $output = '<div class="redl-video video-class '. $class .'">';
    $output .= '<a href="javascript:void(0);" class="play-btn" id="play-btn"><i></i></a>';
    $output .= $video_image;
    $output .= $framecode;
    $output .= '</div>';

    return $output;
  }
}
add_shortcode( 'redl_video', 'redl_video_function' );
