<?php
/* ==========================================================
  Tabs
=========================================================== */
if( ! function_exists( 'redl_vt_tabs_function' ) ) {
  function redl_vt_tabs_function( $atts, $content = '', $key = '' ) {

    global $vt_tabs;
    $vt_tabs = array();

    extract( shortcode_atts( array(
      'id'        => '',
      'tab_style' => '',
      'tab_bg_color' => '',
      'tab_text_color' => '',
      'active_tab_bg_color' => '',
      'active_tab_text_color' => '',
      'class'     => '',
      'active'    => 1,
    ), $atts ) );

    do_shortcode( $content );

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // tabs background Color
    if ( $tab_bg_color ) {
      $inline_style .= '.redl-tabs-'. $e_uniqid .'.redl-app-overview .nav-tabs{';
      $inline_style .= ( $tab_bg_color ) ? 'background-color:'. $tab_bg_color .';' : '';
      $inline_style .= '}';
    }
    // tabs text Color
    if ( $tab_text_color ) {
      $inline_style .= '.redl-tabs-'. $e_uniqid .'.redl-app-overview .nav-tabs > li > a{';
      $inline_style .= ( $tab_text_color ) ? 'color:'. $tab_text_color .';' : '';
      $inline_style .= '}';
    }
    // active tabs background Color
    if ( $active_tab_bg_color ) {
      $inline_style .= '.redl-tabs-'. $e_uniqid .'.redl-app-overview .nav-tabs > li.active > a{';
      $inline_style .= ( $active_tab_bg_color ) ? 'background-color:'. $active_tab_bg_color .';' : '';
      $inline_style .= '}';
    }
    // active tabs background Color
    if ( $active_tab_text_color ) {
      $inline_style .= '.redl-tabs-'. $e_uniqid .'.redl-app-overview .nav-tabs > li.active > a{';
      $inline_style .= ( $active_tab_text_color ) ? 'color:'. $active_tab_text_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' redl-tabs-'. $e_uniqid;

    // is not empty clients
    if( empty( $vt_tabs ) ) { return; }

    $output       = '';
    $id           = ( $id ) ? ' id="'. $id .'"' : '';
    $active       = ( isset( $_REQUEST['tab'] ) ) ? $_REQUEST['tab'] : $active;
    $uniqtab      = uniqid();
    if ($tab_style === 'style-one') {
      $tab_style_class = 'redl-pricing style2 '; //tabs top
    }else {
      $tab_style_class = 'redl-app-overview '.$styled_class;
    }

    // begin output
    $output  .= '<div'. $id .' class="'. $tab_style_class . $class .'">';

     if ($tab_style === 'style-one') {
         // tab-navs
        $output  .= '<div class="center-align"><ul class="nav nav-tabs">';
        foreach( $vt_tabs as $key => $tab ){
          $title      = $tab['atts']['title'];
          $icon       = ( !empty( $tab['atts']['icon'] ) ) ? '<i class="'. $tab['atts']['icon'] .'"></i>': '';
          $active_nav = ( ( $key + 1 ) == $active ) ? ' class="active"' : '';
          $output    .= '<li'. $active_nav .'><a href="#'. $uniqtab .'-'. $key .'" data-toggle="tab">'. $icon . $title . '</a></li>';
        }
        $output  .= '</ul></div>';

         // tab-contents
        $output  .= '<div class="tab-content">';
        foreach( $vt_tabs as $key => $tab ){
          $title           = $tab['atts']['title'];
          $active_content  = ( ( $key + 1 ) == $active ) ? ' in active' : '';
          $output         .= '<div id="'. $uniqtab .'-'. $key .'" class="tab-pane fade'. $active_content .'">'. do_shortcode( $tab['content'] ) .'</div>';
        }
        $output  .= '</div>';
        //end content

     }else{

        // tab-contents
        $output  .= '<div class="tab-content">';
        foreach( $vt_tabs as $key => $tab ){
          $title           = $tab['atts']['title'];
          $active_content  = ( ( $key + 1 ) == $active ) ? ' in active' : '';
          $output         .= '<div id="'. $uniqtab .'-'. $key .'" class="tab-pane fade'. $active_content .'">'. do_shortcode( $tab['content'] ) .'</div>';
        }
          $output  .= '</div>';
          //end content

          // tab-navs
          $output  .= '<div class="center-align"><ul class="nav nav-tabs">';
          foreach( $vt_tabs as $key => $tab ){
            $title      = $tab['atts']['title'];
            $icon       = ( !empty( $tab['atts']['icon'] ) ) ? '<i class="'. $tab['atts']['icon'] .'"></i>': '';
            $active_nav = ( ( $key + 1 ) == $active ) ? ' class="active"' : '';
            $output    .= '<li'. $active_nav .'><a href="#'. $uniqtab .'-'. $key .'" data-toggle="tab">'. $icon . $title . '</a></li>';
          }
          $output  .= '</ul></div>';
       }
      //end tab-navs

    $output  .= '</div>';
    // end output

    return $output;
  }
  add_shortcode( 'vt_tabs', 'redl_vt_tabs_function' );
}

/* ==========================================================
  Tab
=========================================================== */
if( ! function_exists( 'redl_vt_tab_function' ) ) {
  function redl_vt_tab_function( $atts, $content = '', $key = '' ) {
    global $vt_tabs;
    $vt_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode('vt_tab', 'redl_vt_tab_function');
}