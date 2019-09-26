<?php
/* ==========================================================
  counter
=========================================================== */
if ( !function_exists('redl_counter_function')) {
  function redl_counter_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'counter_title'  => '',
      'counter_value'  => '',
      'counter_value_in'  => '',
      'class'  => '',

      // Style
      'counter_title_color'  => '',
      'counter_value_color'  => '',
      'counter_value_in_color'  => '',
      'counter_title_size'  => '',
      'counter_value_size'  => '',
      'counter_value_in_size'  => '',
    ), $atts));

    // Style
    $counter_title_color = $counter_title_color ? 'color:'. $counter_title_color .';' : '';
    $counter_value_color = $counter_value_color ? 'color:'. $counter_value_color .';' : '';
    $counter_value_in_color = $counter_value_in_color ? 'color:'. $counter_value_in_color .';' : '';
    // Size
    $counter_title_size = $counter_title_size ? 'font-size:'. $counter_title_size .';' : '';
    $counter_value_size = $counter_value_size ? 'font-size:'. $counter_value_size .';' : '';
    $counter_value_in_size = $counter_value_in_size ? 'font-size:'. $counter_value_in_size .';' : '';

    // Counter Title
    $counter_title = $counter_title ? '<h6 style="'. $counter_title_color . $counter_title_size .'">'. $counter_title .'</h6>' : '';

    // Value In
    $counter_value_in = $counter_value_in ? '<span class="counter-value" style="'. $counter_value_in_color . $counter_value_in_size .'">'. $counter_value_in .'</span>' : '';

    // Value
    $counter_value = $counter_value ? '<div class="counter"><span class="counter-number count" style="'. $counter_value_color . $counter_value_size .'">'. $counter_value .'</span>' .  $counter_value_in . '</div>' : '';

    // Counters
    $output = '<div class="redl-status-info">' . $counter_value . $counter_title . '</div>';

    // Output
    return $output;
  }
}
add_shortcode( 'redl_counter', 'redl_counter_function' );
