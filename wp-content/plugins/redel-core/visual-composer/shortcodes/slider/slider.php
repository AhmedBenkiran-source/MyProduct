<?php
/* ==========================================================
  Slider
=========================================================== */
if ( !function_exists('redl_slider_function')) {
  function redl_slider_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'slides'  => '',
      'class'  => '',

      // Style
      'heading1_color'  => '',
      'heading2_color'  => '',
      'content_color'  => '',
    ), $atts));

    // Style
    $heading1_color = $heading1_color ? 'color:' . $heading1_color . ';' : '';
    $heading2_color = $heading2_color ? 'color:' . $heading2_color . ';' : '';
    $content_color = $content_color ? 'color:' . $content_color . ';' : '';

    // Group Field
    $list_items = (array) vc_param_group_parse_atts( $slides );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['slide_image'] = isset( $list_item['slide_image'] ) ? $list_item['slide_image'] : '';
      $each_list['slider_heading1'] = isset( $list_item['slider_heading1'] ) ? esc_attr($list_item['slider_heading1']) : '';
      $each_list['slider_heading2'] = isset( $list_item['slider_heading2'] ) ? esc_attr($list_item['slider_heading2']) : '';
      $get_each_list[] = $each_list;
    }

    $output = '
    <div class="redl-app-view">
    <div id="carousel-a" class="carousel slide carousel-sync" data-ride="carousel" data-nav="false" data-interval="false">
      <div class="carousel-inner"> ';
      $i=0;$next1=0;$next2=1;
      foreach ( $get_each_list as $index => $each_list ) {
      // start loop
      $active = ($i==0) ? " active" : "";
      $next1++;
      $next2++;
      if($next1 > (count($get_each_list)-1))$next1=0;
      if($next2 > (count($get_each_list)-1))$next2=0;
      $image_url1 = wp_get_attachment_url( $get_each_list[$next1]['slide_image']);
      $image_url2 = wp_get_attachment_url( $get_each_list[$next2]['slide_image']);
       $output .= '
        <div class="item '.$active.'">
          <img src="' . $image_url1 . '" alt="Slide"/>
          <img src="' . $image_url2 . '" alt="Slide"/>
        </div>';
      $i++;

      }//end loop
      $output .= '</div>
      <a class="left carousel-control" href="#carousel-c" data-slide="prev"><span class="ti-angle-left"></span></a>
      <a class="right carousel-control" href="#carousel-c" data-slide="next"><span class="ti-angle-right"></span></a>
    </div>';//end carousel a

    $output .= '<div id="carousel-b" class="carousel slide carousel-sync" data-nav="false" data-interval="false">
      <div class="carousel-inner">';
      $i=0;
      foreach ( $get_each_list as $each_list ) {
      //start loop
      $active = ($i==0) ? " active" : "";
        $image_url = wp_get_attachment_url( $each_list['slide_image']);
        $output .= '
        <div class="item '.$active.'">
          <img src="' . $image_url . '" alt="Slide"/>
        </div>
        ';
        $i++;
      }//end loop

      $output .= '</div>
    </div>';//end carousel b
    $output .= '<div id="carousel-c" class="carousel slide carousel-fade carousel-sync" data-interval="false">
      <div class="carousel-inner">';
      $i=0;
      foreach ( $get_each_list as $each_list ) {
      // start loop
      $active = ($i==0) ? " active" : "";
      $slider_heading1 = $each_list['slider_heading1'] ? '<span class="section-heading-line"><span class="section-heading-text" style="'.$heading1_color.'">'. $each_list['slider_heading1'] .'</span></span>' : '';
      $slider_heading2 = $each_list['slider_heading2'] ? '<span class="section-heading-line"><span class="section-heading-text" style="'.$heading2_color.'"><strong>'. $each_list['slider_heading2'] .'</strong></span></span>' : '';
      $slider_content = $each_list['slide_content'] ? do_shortcode($each_list['slide_content']) : '';

        $output .= '
        <div class="item '.$active.'">
          <div class="section-heading">
            ' . $slider_heading1 . '
            ' . $slider_heading2 . '
          </div>
          <div class="app-screen-info" style="'.$content_color.'">
            ' . $slider_content . '
          </div>
        </div>
        ';
        $i++;

  }//end loop
        $output .= '<a class="left carousel-control" href="#carousel-c" data-slide="prev"><span class="ti-angle-left"></span></a>
        <a class="right carousel-control" href="#carousel-c" data-slide="next"><span class="ti-angle-right"></span></a>
        <ol class="carousel-indicators">';
        $i=0;
        foreach ( $get_each_list as $each_list ) {
        //start loop
        $active = ($i==0) ? " active" : "";
          $output .= '
          <li data-slide-to="' . $i . '" class="'.$active.'"></li>
          ';
          $i++;
        }//end loop
        $output .= '</ol>
      </div>
    </div>
    </div>
    ';
    return $output;
  }
}
add_shortcode( 'redl_slider', 'redl_slider_function' );