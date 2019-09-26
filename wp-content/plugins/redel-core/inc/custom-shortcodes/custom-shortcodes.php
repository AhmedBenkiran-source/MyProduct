<?php
/* Social Icons */
function vt_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "social_select" => '',
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "icon_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.evlt-socials-'. $e_uniqid .'.evlt-social a, .evlt-socials-'. $e_uniqid .'.evlt-social-two li a, .evlt-socials-'. $e_uniqid .'.tm-social-links a i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. redel_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ($social_select !== 'style-three') {
    if ( $icon_hover_color ) {
      $inline_style .= '.evlt-socials-'. $e_uniqid .'.evlt-social li a:hover, .evlt-socials-'. $e_uniqid .'.evlt-social-two li a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select !== 'style-one') {
    if ( $bg_color ) {
      $inline_style .= '.evlt-socials-'. $e_uniqid .'.evlt-social-two li a, .evlt-socials-'. $e_uniqid .'.tm-social-links a {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-two') {
    if ( $bg_hover_color ) {
      $inline_style .= '.evlt-socials-'. $e_uniqid .'.evlt-social-two li a:hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-three') {
    if ( $border_color ) {
      $inline_style .= '.evlt-socials-'. $e_uniqid .'.tm-social-links a {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' evlt-socials-'. $e_uniqid;

  $result =  do_shortcode($content) ;
  return $result;

}
add_shortcode("vt_socials", "vt_socials_function");

/* Social Icon */
function vt_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<a '. $social_link . $target_tab .'><i class="'. $social_icon .'"></i></a> ';
   return $result;

}
add_shortcode("vt_social", "vt_social_function");

/* FAQ navigation */
function vt_faq_navigation_function($atts, $content = true) {
  extract(shortcode_atts(array(
    'faq_limit'  => '',
    'faq_order'  => '',
    'faq_orderby'  => '',
    'faq_show'  => '',
    'custom_class'  => '',
  ), $atts));

  $faq_specific_arr=array();
  //specific faq
    if($faq_show){
      $faq_specific_arr=explode(",",$faq_show);
    }
  $args = array(
    // other query params here,
    'post_type' => 'faq',
    'posts_per_page' => (int)$faq_limit,
    /*'category_name' => esc_attr($faq_show_category),*/
    'post__in' => $faq_specific_arr,
    'orderby' => $faq_orderby,
    'order' => $faq_order
  );

  $redl_post = new WP_Query( $args );

  if ($redl_post->have_posts()) :
    $output = '<ul>';
    while ($redl_post->have_posts()) :
    $redl_post->the_post();
    $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
    $output .= '<li><a href="#" data-scroll="p-' . get_the_ID() . '">' . get_the_title() . '</a></li>';
    endwhile;
    $output .= '</ul>';
    $output .= '
    <script type="text/javascript">

jQuery(document).ready(function(){
//on scroll fixed sidebarnav script
function sticky_relocate() {
if(jQuery(".redl-quick-support")[0]){
  var window_top = jQuery(window).scrollTop();
  var footer_top = jQuery(".redl-quick-support").offset().top;
  var div_top = jQuery(".redl-faqs").offset().top;
  var div_height = jQuery(".sidebar-nav").height();
  var padding = 20;  // tweak here or get from margins etc
  if (window_top + div_height > footer_top - padding)
  jQuery(".sidebar-nav").css({top: (window_top + div_height - footer_top + padding) * -1})
    else if (window_top > div_top) {
      jQuery(".sidebar-nav").addClass("fixed");
      jQuery(".sidebar-nav").css({top: 0})
    }
  }
}

  jQuery(window).scroll(sticky_relocate);
  sticky_relocate();
});
</script>
    ';
  endif;
  wp_reset_postdata();

  $result = $output;
  return $result;

}
add_shortcode("vt_faq_navigation", "vt_faq_navigation_function");
/* FAQ navigation*/

/* video link*/
function vt_video_link_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "video_text" => '',
    "video_link" => '',
    "icon_size" => '',
  ), $atts));

  //video text
  $video_text = $video_text ? '<span>' . $video_text . '</span>' : '';

  //video link
  $video_link = $video_link ?  $video_link  : '';

  //icon size
  if($icon_size == "small"){
      $icon_style = 'height:56px;width:56px;';
  }else if($icon_size == "medium"){
      $icon_style = 'height:70px;width:70px;';
  }else{
      $icon_style = 'height:80px;width:80px;';
  }

  $result = '';
  $result .= '<div class="video-class"><a href="'.$video_link.'" class="play-btn popup-video"><i style="' . $icon_style .'"></i> '.$video_text.'</a></div>';

  return $result;
}
add_shortcode("vt_video", "vt_video_link_function");

/* AppStore & Google Play Store buttons*/
function vt_play_store_buttons_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "link" => '',
    "type" => '',
    "custom_class" => '',
    "open_new_tab" => '',
  ), $atts));

  $open_new_tab = ( $open_new_tab === '1' ) ? ' target="_blank"' : '';

  if($type == "apple"){
      $store = '<img src="'. VCTS_PLUGIN_ASTS . '/images/app-store-icon.png" alt="App Store"/>';
  }else{
      $store = '<img src="'. VCTS_PLUGIN_ASTS . '/images/google-play-icon.png" alt="Google Play"/>';
  }
  $result = '<div class="app-buttons '.$custom_class.'">
          <a '.$open_new_tab.' href="'.$link.'">'.$store.'</a>
        </div>';
  return $result;

}
add_shortcode("vt_app_button", "vt_play_store_buttons_function");

/* Spacer */
function vt_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("vt_spacer", "vt_spacer_function");

/* Educational Lists */
function vt_education_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "title_color" => '',
    "text_color" => '',
    "bullet_color" => '',
    // Size
    "title_size" => '',
    "text_size" => '',
    "bullet_top_space" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $title_color || $title_size ) {
    $inline_style .= '.evlt-education-'. $e_uniqid .'.evlt-education li strong {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
    $inline_style .= '}';
  }
  if ( $text_color || $text_size ) {
    $inline_style .= '.evlt-education-'. $e_uniqid .'.evlt-education li, .evlt-education-'. $e_uniqid .'.evlt-education li a {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
    $inline_style .= '}';
  }
  if ( $bullet_color || $bullet_top_space ) {
    $inline_style .= '.evlt-education-'. $e_uniqid .'.evlt-education li:before {';
    $inline_style .= ( $bullet_color ) ? 'background-color:'. $bullet_color .';' : '';
    $inline_style .= ( $bullet_top_space ) ? 'top:'. $bullet_top_space .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' evlt-education-'. $e_uniqid;

  $result = '<ul class="evlt-education '. $custom_class . $styled_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("vt_education_lists", "vt_education_lists_function");

/* Educational List */
function vt_education_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "title" => '',
    "text" => '',
    "text_link" => ''
  ), $atts));

  // Atts
  $title = ($title) ? '<strong>'. $title .'</strong>' : '';
  if ($text_link) {
    $text_link_open = '<a href="'. $text_link .'" target="_blank">';
    $text_link_close = '</a>';
  } else {
    $text_link_open = '';
    $text_link_close = '';
  }

  $result = '<li>'. $title . $text_link_open . $text . $text_link_close .'</li>';
  return $result;

}
add_shortcode("vt_education_list", "vt_education_list_function");

/* Simple Images */
function vt_image_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
  ), $atts));

  $result = '<ul class="simple-fix '. $custom_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("vt_image_lists", "vt_image_lists_function");

/* Simple Image */
function vt_image_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "get_image" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt=""/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }

  $result = '<li>'. $link_o . $my_image . $link_c .'</li>';
  return $result;

}
add_shortcode("vt_image_list", "vt_image_list_function");

/* Download Button */
function vt_download_btn_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "icon_color" => '',
    "bg_color" => '',
    // Hover
    "text_hover_color" => '',
    "icon_hover_color" => '',
    "bg_hover_color" => '',
    // Size
    "text_size" => '',
    "icon_size" => '',
  ), $atts));

  // Atts
  $link_icon = $link_icon ? '<i class="'. $link_icon .'"></i>' : '';
  $target_tab = $target_tab ? 'target="_blank"' : '';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size || $bg_color ) {
    $inline_style .= '.evlt-dwnd-btn-'. $e_uniqid .'.evlt-download-btn {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. redel_check_px($text_size) .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color || $bg_hover_color ) {
    $inline_style .= '.evlt-dwnd-btn-'. $e_uniqid .'.evlt-download-btn:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.evlt-dwnd-btn-'. $e_uniqid .'.evlt-download-btn i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. redel_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
    $inline_style .= '.evlt-dwnd-btn-'. $e_uniqid .'.evlt-download-btn:hover i {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' evlt-dwnd-btn-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="evlt-download-btn '. $custom_class . $styled_class .'">'. $link_icon . $link_text .'</a>';
  return $result;

}
add_shortcode("vt_download_btn", "vt_download_btn_function");

/* Simple Underline Link */
function vt_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_style" => '',
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "border_color" => '',
    // Hover
    "text_hover_color" => '',
    "border_hover_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';
  if ($link_style === 'link-arrow-right') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-right"></i>';
  } elseif ($link_style === 'link-arrow-left') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-left"></i>';
  } else {
    $arrow_icon = '';
  }
  $link_style = $link_style ? $link_style. ' ' : 'link-underline ';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.evlt-simple-link-'. $e_uniqid .'.evlt-'. $link_style .', .evlt-simple-link-'. $e_uniqid .'.evlt-link-arrow-left i, .evlt-simple-link-'. $e_uniqid .'.evlt-link-arrow-right i {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. redel_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.evlt-simple-link-'. $e_uniqid .'.evlt-'. $link_style .':hover, .evlt-simple-link-'. $e_uniqid .'.evlt-link-arrow-right:hover, .evlt-simple-link-'. $e_uniqid .'.evlt-link-arrow-left:hover, .evlt-simple-link-'. $e_uniqid .'.evlt-link-arrow-right:hover i, .evlt-simple-link-'. $e_uniqid .'.evlt-link-arrow-left:hover i {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color ) {
    $inline_style .= '.evlt-simple-link-'. $e_uniqid .'.evlt-'. $link_style .':after {';
    $inline_style .= ( $border_color ) ? 'background-color:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_hover_color ) {
    $inline_style .= '.evlt-simple-link-'. $e_uniqid .'.evlt-'. $link_style .':hover:after {';
    $inline_style .= ( $border_hover_color ) ? 'background-color:'. $border_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' evlt-simple-link-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="evlt-'. $link_style . $custom_class . $styled_class .'">'. $link_text . $arrow_icon .'</a>';
  return $result;

}
add_shortcode("vt_simple_link", "vt_simple_link_function");

/* Topbar WPML */
function vt_topbar_wpml_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => ''
  ), $atts));

  $output   = '';

  if ( is_wpml_activated() ) {
    global $sitepress;
    $sitepress_settings = $sitepress->get_settings();
    $icl_get_languages  = icl_get_languages();

    if ( ! empty( $icl_get_languages ) ) {

      $output .= '<div class="evlt-tr-element '. $custom_class .'"><div class="evlt-top-dropdown evlt-wpml-dropdown">';

      // current language
      $output .= '<a href="#" class="evlt-top-active">';
      foreach ( $icl_get_languages as $id => $current_lang ) {
        if ( $current_lang['active'] ) {
          $output .= ( ( $sitepress_settings['icl_lso_native_lang'] ) ? $current_lang['code'] : $current_lang['translated_name'] );
          $output .= '<i class="fa fa-angle-down"></i>';
        }
      }
      $output .= '</a>';

      // list languages
      $output .= '<ul class="evlt-topdd-content">';
      foreach ( $icl_get_languages as $id => $language ) {
        if ( ! $language['active'] ) {
          $output .= '<li>';
          $output .= '<a href="'. $language['url'] .'">';
          $output .= ( $sitepress_settings['icl_lso_native_lang'] && $sitepress_settings['icl_lso_display_lang'] ) ? $language['code'] : '';
          $output .= ( ! $sitepress_settings['icl_lso_native_lang'] && $sitepress_settings['icl_lso_display_lang'] ) ? $language['translated_name'] : '';
          $output .= ( $sitepress_settings['icl_lso_native_lang'] && ! $sitepress_settings['icl_lso_display_lang'] ) ? $language['code'] : '';
          $output .= '</a>';
          $output .= '</li>';
        }
        // print_r($language);
      }
      $output .= '</ul>';
      $output .= '</div>';
      $output .= '</div>';
    }

  } else {
    $output .= '<p class="wpml-not-active">Please Activate WPML Plugin</p>';
  }

  return $output;

}
add_shortcode("vt_topbar_wpml", "vt_topbar_wpml_function");

/* lists */
function vt_lists_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "list_style" => '',
      "number_bullets" => '',

   ), $atts));

   $list_style = $list_style ? $list_style : '';
   //start output
   $result = '<div class="'.$list_style.' ">';
   if ($list_style === 'redl-info-page') {
        if ($number_bullets === "true")
            $result .= '<ul class="number-bullets '. $custom_class .'">';
        else
            $result .= '<ul class="'. $custom_class .'">';
    }else if ($list_style === 'overview-bullets') {
            $result .= '<ul class="overview-bullets '. $custom_class .'">';
    }else{
        $result .= '<ul class="'. $custom_class .'">';
    }

   $result .= do_shortcode($content);
   $result .= '</ul>';
   $result .= '</div>';
   //end output

   return $result;

}
add_shortcode("vt_lists", "vt_lists_function");

/* each list */
/* Address Info */
function vt_list_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "select_icon" => '',
      "list_text" => '',
      "text_size" => '',
      "text_color" => '',
   ), $atts));

   $text_style = '';

   if ( $text_color || $text_size ) {

      $text_style = ( $text_color ) ? 'color:'. $text_color .';' : '';
      $text_style .= ( $text_size ) ? 'font-size:'. redel_check_px($text_size) .';' : '';

    }

   $result = '<li style="'.$text_style.'"><span class="'. $select_icon .'"></span>'. $list_text .'</li>';
   return $result;

}
add_shortcode("vt_list", "vt_list_function");

/*  end each list */

/* Address Infos */
function vt_address_infos_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="evlt-top-info '. $custom_class .'">'. do_shortcode($content) .'</div>';
   return $result;

}
add_shortcode("vt_address_infos", "vt_address_infos_function");

/* Address Info */
function vt_address_info_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "address_style" => '',
      "info_icon" => '',
      "info_icon_color" => '',
      "info_main_text" => '',
      "info_main_text_link" => '',
      "info_main_text_color" => '',
      "info_sec_text" => '',
      "info_sec_text_link" => '',
      "info_sec_text_color" => '',
      "target_tab" => ''
   ), $atts));

   // Color
   $info_icon_color = $info_icon_color ? 'color:'. $info_icon_color .';' : '';
   $info_main_text_color = $info_main_text_color ? 'color:'. $info_main_text_color .';' : '';
   $info_sec_text_color = $info_sec_text_color ? 'color:'. $info_sec_text_color .';' : '';

   $address_style = ( $address_style === 'style-two' ) ? 'evlt-ai-two' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $info_icon = ( isset( $info_icon ) ) ? '<i class="'. $info_icon .'" style="'. $info_icon_color .'"></i>' : '';

   if (isset( $info_main_text ) && !$info_main_text_link ) {
      $info_main_text = '<span style="'. $info_main_text_color .'">'. $info_main_text .'</span>';
   } elseif (isset( $info_main_text ) && isset( $info_main_text_link )) {
      $info_main_text = '<span><a href="'. $info_main_text_link .'" '. $target_tab .'  style="'. $info_main_text_color .'">'. $info_main_text .'</a></span>';
   } else {
      $info_main_text = '';
   }
   if (isset( $info_sec_text ) && !$info_sec_text_link ) {
      $info_sec_text = '<p style="'. $info_sec_text_color .'">'. $info_sec_text .'</p>';
   } elseif (isset( $info_sec_text ) && isset( $info_sec_text_link )) {
      $info_sec_text = '<a href="'. $info_sec_text_link .'" '. $target_tab .' style="'. $info_sec_text_color .'">'. $info_sec_text .'</a>';
   } else {
      $info_sec_text = '';
   }

   $result = '<div class="evlt-address-info '. $address_style .'">'. $info_icon .'<div class="evlt-ai-content">'. $info_main_text . $info_sec_text .'</div></div>';
   return $result;

}
add_shortcode("vt_address_info", "vt_address_info_function");

/* Useful Links */
function vt_useful_links_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "column_width" => '',
      "custom_class" => ''
   ), $atts));

   $result = '<ul class="evlt-useful-links '. $custom_class .' '. $column_width .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("vt_useful_links", "vt_useful_links_function");

/* Useful Link */
function vt_useful_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "target_tab" => '',
      "title_link" => '',
      "link_title" => ''
   ), $atts));

   $title_link = ( isset( $title_link ) ) ? 'href="'. $title_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $result = '<li><a '. $title_link . $target_tab .'>'. $link_title .'</a></li>';
   return $result;

}
add_shortcode("vt_useful_link", "vt_useful_link_function");

/* Footer Menus */
function vt_footer_menus_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<ul class="footer-nav-links '. $custom_class .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("vt_footer_menus", "vt_footer_menus_function");

/* Footer Menu */
function vt_footer_menu_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "menu_title" => '',
      "menu_link" => '',
      "target_tab" => ''
   ), $atts));

   $menu_link = ( isset( $menu_link ) ) ? 'href="'. $menu_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $result = '<li><a '. $menu_link . $target_tab .'>'. $menu_title .'</a></li>';
   return $result;
}
add_shortcode("vt_footer_menu", "vt_footer_menu_function");

/* Blockquote */
function vt_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "blockquote_style" => '',
    "text_size" => '',
    "custom_class" => '',
    "content_color" => '',
    "left_color" => '',
    "border_color" => '',
    "bg_color" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $text_size || $content_color || $border_color || $bg_color ) {
    $inline_style .= '.evlt-blockquote-'. $e_uniqid .' {';
    $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $left_color ) {
    $inline_style .= '.evlt-blockquote-'. $e_uniqid .':before {';
    $inline_style .= ( $left_color ) ? 'background-color:'. $left_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' evlt-blockquote-'. $e_uniqid;

  // Style
  $blockquote_style = ($blockquote_style === 'style-two') ? 'blockquote-two ' : '';

  $result = '<blockquote class="'. $blockquote_style . $custom_class . $styled_class .'">'. do_shortcode($content) .'</blockquote>';
  return $result;

}
add_shortcode("vt_blockquote", "vt_blockquote_function");

/* List Styles Lists */
function vt_address_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "text_color" => '',
    "title_color" => '',
    // Size
    "text_size" => '',
    "title_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $text_color || $text_size ) {
    $inline_style .= '.evlt-list-'. $e_uniqid .' li {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. redel_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $title_size || $title_color ) {
    $inline_style .= '.evlt-list-'. $e_uniqid .'.evlt-list-three li strong {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. redel_check_px($title_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' evlt-list-'. $e_uniqid;

  // Output
  $output = '';

  $output .= '<ul class="evlt-list-three '. $custom_class . $styled_class .'">';
  $output .= do_shortcode($content);
  $output .= '</ul>';

  return $output;

}
add_shortcode("vt_address_lists", "vt_address_lists_function");

/* List Styles List */
function vt_address_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "list_title" => '',
    "list_text" => '',
  ), $atts));

  // Atts
  $list_title = $list_title ? '<strong>'. $list_title .' :</strong> ' : '';
  $list_text = $list_text ? $list_text : '';

  $result = '<li>'. $list_title . $list_text .'</li>';
  return $result;

}
add_shortcode("vt_address_list", "vt_address_list_function");

/* Current Year - Shortcode */
if( ! function_exists( 'vt_current_year' ) ) {
  function vt_current_year() {
    return date('Y');
  }
  add_shortcode( 'vt_current_year', 'vt_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'vt_home_url' ) ) {
  function vt_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'vt_home_url', 'vt_home_url' );
}