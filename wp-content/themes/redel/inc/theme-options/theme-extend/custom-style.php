<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'redel_dynamic_styles' ) ) {
  function redel_dynamic_styles() {

    // Typography
    $redel_framework_get_typography  = redel_framework_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );
    $all_hover_colors  = cs_get_customize_option( 'all_hover_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

/* Header - Customizer */
//menu color
$header_bg_color = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .redl-header, .redl-header.fixed,
  .page .redl-banner-special.redl-header.fixed,
  .error404 .redl-banner-special.redl-header.fixed,
  .archive .redl-header,
  .archive .redl-header.fixed,
  .category .redl-header,
  .category .redl-header.fixed,
  .single .redl-header,
  .single .redl-header.fixed,
  .blog .redl-header,
  .blog .redl-header.fixed,
  .search .redl-header,
  .search .redl-header.fixed,
  .page .redl-header,
  .page .redl-header.fixed {
    background-color: {$header_bg_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .redl-header .navbar-nav > li > a,
  .archive .redl-header .navbar-nav > li > a,
  .category .redl-header .navbar-nav > li > a,
  .single .redl-header .navbar-nav > li > a,
  .blog .redl-header .navbar-nav > li > a,
  .search .redl-header .navbar-nav > li > a,
  .page .redl-header .navbar-nav > li > a,
  .redl-header.fixed .navbar-nav > li > a,
  .caret,
  .redl-header.fixed .navbar-nav > li > a,
  .page .redl-banner-special.redl-header.fixed .navbar-nav > li > a,
  .error404 .redl-banner-special.redl-header.fixed .navbar-nav > li > a {
    color: {$header_link_color};
  }
  .redl-header .navbar-nav > li > a:hover,
  .redl-header.fixed .navbar-nav > li > a:hover,
  .redl-header.fixed .navbar-nav > li > a:hover,
  .page .redl-banner-special.redl-header.fixed .navbar-nav > li > a:hover,
  .error404 .redl-banner-special.redl-header.fixed .navbar-nav > li > a:hover,
  .redl-header .navbar-nav > li > a.redl-current,
  .page .redl-header .navbar-nav > li > a.redl-current,
  .redl-header.fixed .navbar-nav > li > a.redl-current,
  .redl-header.fixed .navbar-nav > li > a.redl-current,
  .page .redl-banner-special.redl-header.fixed .navbar-nav > li > a.redl-current {
    color: {$header_link_hover_color};
  }
CSS;
}
//submenu color
$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_bg_hover_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .dropdown-menu > li > a {
    color: {$submenu_link_color};
  }
  .dropdown-menu > li > a:focus,
  .dropdown-menu > li > a:hover,
  .dropdown-menu > .active > a,
  .dropdown-menu > .active > a:focus,
  .dropdown-menu > .active > a:hover,
  .redl-header .navbar-nav  ul.sub-menu > li:hover,
  .redl-header .navbar-nav  ul.sub-menu > li.current-menu-item,
  .redl-header .navbar-nav ul.sub-menu > li a:hover {
    background-color: {$submenu_bg_hover_color};
    color: {$submenu_link_hover_color};
  }
  .dropdown-menu,
  .redl-header .navbar-nav  ul.sub-menu li a {
    background-color: {$submenu_bg_color};
  }
  .redl-header .navbar-nav  ul.sub-menu li a {
    color: {$submenu_link_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
$title_bg_color  = cs_get_customize_option( 'titlebar_bg_color' );
if ($title_bg_color) {

echo <<<CSS
  .no-class {}
  .redl-page-heading {
    background-color: {$title_bg_color} !important;
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .redl-page-heading h2 {
    color: {$title_heading_color};
  }
CSS;
}

/* Footer */

if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  footer.redl-footer h6.widget-title {color: {$footer_heading_color};}
CSS;
}
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  footer .redl-widget p,
  footer .redl-widget {color: {$footer_text_color};}
CSS;
}
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  footer a,
  footer .redl-widget a,
  footer .redl-widget .nice-select ul li,
  footer .widget_list_style ul a,
  footer .widget_categories ul a,
  footer .widget_archive ul a,
  footer .widget_recent_comments ul a,
  footer .widget_recent_entries ul a,
  footer .widget_meta ul a,
  footer .widget_pages ul a,
  footer .widget_rss ul a,
  footer .widget_nav_menu ul a,
  footer .evlt-recent-blog .widget-btitle {color: {$footer_link_color};}
CSS;
}
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  footer a:hover,
  footer .redl-widget a:hover,
  footer .redl-widget .nice-select .list li:hover,
  footer .widget_list_style ul a:hover,
  footer .widget_categories ul a:hover,
  footer .widget_archive ul a:hover,
  footer .widget_recent_comments ul a:hover,
  footer .widget_recent_entries ul a:hover,
  footer .widget_meta ul a:hover,
  footer .widget_pages ul a:hover,
  footer .widget_rss ul a:hover,
  footer .widget_nav_menu ul a:hover,
  footer .evlt-recent-blog .widget-btitle:hover {color: {$footer_link_hover_color};}
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS

  ::selection {background: {$all_element_color};}
  ::-webkit-selection {background: {$all_element_color};}
  ::-moz-selection {background: {$all_element_color};}
  ::-o-selection {background: {$all_element_color};}
  ::-ms-selection {background: {$all_element_color};}
  .no-class {}
  .gray-nav .owl-dot.active,
  .redl-btn-two:hover,
  .redl-btn-two:focus,
  .redl-btn-three,
  .redl-btn-four:hover,
  .redl-btn-four:focus,
  .redl-banner,
  .redl-app-work,
  .redl-back-top a,
  .redl-subscribe-form.style-two,
  .redl-free-trial,
  body.archive .redl-header .redl-btn,
  body.category .redl-header .redl-btn,
  body.single .redl-header .redl-btn,
  body.blog .redl-header .redl-btn,
  body.search .redl-header .redl-btn,
  body.page .redl-header.fixed .redl-btn,
  .pagination a:hover,
  .wp-link-pages a:hover,
  #wp-calendar tbody td a,
  #wp-calendar caption,
  body .redl-header.redl-banner-special.fixed .redl-btn,
  #get_the_app,
  .mc4wp-form input[type="submit"],
  .redl-comment-form input[type="submit"],
  .wpcf7 input[type="submit"] {background-color: {$all_element_color} !important;}
  .pricing-item.featured::before {background-color: {$all_element_color};}

  #carousel-c .item ul li span,
  .redl-copyright .fa:hover,
  .redl-back-top a:hover,
  .redl-service [class^="ti-"],
  .redl-service.style2 [class^="ti-"],
  .member-name a:hover,
  ul.overview-bullets li [class^="ti-"],
  .redl-footer a:hover,
  .meta-tags ul li a:hover,
  .item-bullets ul li a:hover,
  .secondary-item ul li a:hover,
  .news-info a:hover,
  .bp-tags li a:hover,
  .author-content .author-name:hover,
  .faq-type,
  .have-account a,
  .tagcloud a,
  .blog-title a:hover,
  .blog-title a:focus,
  .form-inner a:hover,
  .form-inner a:focus,
  .ul-half ul li span,
  #carousel-c .item .ul-half ul li span {color: {$all_element_color};}

  .redl-btn-two:hover,
  .redl-btn-two:focus,
  .redl-btn-three,
  .redl-btn-four:hover,
  .redl-btn-four:focus,
  .redl-back-top a:hover,
  body.archive .redl-header .redl-btn,
  body.category .redl-header .redl-btn,
  body.single .redl-header .redl-btn,
  body.blog .redl-header .redl-btn,
  body.search .redl-header .redl-btn,
  body.page .redl-header.fixed .redl-btn,
  .pagination a:hover,
  .top-tags a:hover,
  .top-tags a:focus,
  .secondary-item .tagcloud a:hover,
  .secondary-item .tagcloud a:focus,
  blockquote,
  .wp-link-pages a:hover,
  body .redl-header.redl-banner-special.fixed .redl-btn {border-color: {$all_element_color} !important;}

CSS;
}

if ($all_hover_colors) {
echo <<<CSS

  .no-class {}
  input[type="submit"]:focus,
  input[type="submit"]:hover,
  .redl-btn-three:hover,
  .redl-btn-three:focus,
  .page .redl-header.redl-banner-special.fixed .redl-btn:hover,
  .error404 .redl-header.redl-banner-special.fixed .redl-btn:hover,
  body.archive .redl-header .redl-btn:hover,
  body.category .redl-header .redl-btn:hover,
  body.single .redl-header .redl-btn:hover,
  body.blog .redl-header .redl-btn:hover,
  body.search .redl-header .redl-btn:hover,
  body.page .redl-header.fixed .redl-btn:hover,
  .redl-back-top a:hover {background-color: {$all_hover_colors} !important;}

  .redl-btn-three:hover,
  .redl-btn-three:focus,
  body.archive .redl-header .redl-btn:hover,
  body.category .redl-header .redl-btn:hover,
  body.single .redl-header .redl-btn:hover,
  body.blog .redl-header .redl-btn:hover,
  body.search .redl-header .redl-btn:hover,
  body.page .redl-header.fixed .redl-btn:hover,
  .redl-back-top a:hover {border-color: {$all_hover_colors} !important;}

CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body {color: {$body_color};}
  body p,.author-content .author-pro, .meta-tags ul li,.tooltip-inner,input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, .news-info span, .redl-copyright, code,.redl-footer,.comment-reply-title,.redl-caption-wrap,.section-heading-wrap .section-sub-heading, .redl-box-form label, .redl-caption-wrap .play-btn span, .redl-app-overview p, .redl-app-overview,.redl-app-overview .nav-tabs > li > a,.nav-tabs > li > a,.pricing-item ul,.style3 .testimonial-owner .name,.testimonial-owner .clearfix,.redl-app-overview .nav-tabs > li.active > a,.feature-info-wrap ul,.nav-tabs > li.active > a,.nav-tabs > li.active > a:focus,.member-designation,.redl-subscribe-form.style-two .section-heading,.redl-subscribe-form.style-two .section-sub-heading,.redl-info-page ul,.panel-title a,.faq-type,.redl-info-page ul li span,.play-btn span,#carousel-c .item p,#carousel-c .item ul,.redl-service [class^="ti-"],.redl-comments-area .redl-comments-meta .comments-date,.wp-link-pages > span:first-child {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  body a,
  body p a,
  .item-bullets ul li a,
  .secondary-item ul li a,.sidebar-nav ul li a,
  .top-tags a, .member-name a,
  .bp-tags li a,.redl-main-container .page-numbers a.next.page-numbers,
  .redl-footer a,
  .news-info a,
  .secondary-item .tagcloud a,
  .meta-tags ul li a,
  .widget_list_style ul a,
  .widget_categories ul a,
  .widget_archive ul a,
  .widget_recent_comments ul a,
  .widget_recent_entries ul a,
  .widget_meta ul a,
  .widget_pages ul a,
  .widget_rss ul a,
  .widget_nav_menu ul a,
  .widget_layered_nav ul a,
  .widget_product_categories ul a {color: {$body_links_color};}

  .secondary-item .tagcloud a,
  .secondary-item .tagcloud a:hover{
  border-color: {$body_links_color}}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  body a:hover,
  body p a:hover,
  .item-bullets ul li a:hover,
  .secondary-item ul li a:hover,.sidebar-nav ul li a.active, .sidebar-nav ul li a:hover,
  .top-tags a:hover, .redl-main-container .page-numbers a.next.page-numbers:hover,
  .bp-tags li a:hover,
  .redl-footer a:hover,
  .news-info a:hover,
  .secondary-item .tagcloud a:hover,
  .meta-tags ul li a:hover,
  .widget_list_style ul a:hover,
  .widget_categories ul a:hover,
  .widget_archive ul a:hover,
  .widget_recent_comments ul a:hover,
  .widget_recent_entries ul a:hover,
  .widget_meta ul a:hover,
  .widget_pages ul a:hover,
  .widget_rss ul a:hover,
  .widget_nav_menu ul a:hover,
  .widget_layered_nav ul a:hover,
  .widget_product_categories ul a:hover {color: {$body_link_hover_color};}

  .secondary-item .tagcloud a:hover{
  border-color: {$body_link_hover_color}}
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .secondary-wrap .textwidget,
  .secondary-wrap p,
  .widget_rss .rssSummary,.news-info span,.secondary-wrap input[type="text"], .secondary-wrap input[type="email"], .secondary-wrap input[type="password"], .secondary-wrap input[type="tel"], .secondary-wrap input[type="search"], .secondary-wrap input[type="date"], .secondary-wrap input[type="time"], .secondary-wrap input[type="datetime-local"], .secondary-wrap  input[type="month"], .secondary-wrap input[type="url"], .secondary-wrap input[type="number"], .secondary-wrap textarea, .secondary-wrap select, .secondary-wrap .form-control,.secondary-item ul li {color: {$sidebar_content_color};}
CSS;
}

//content heading and sidebar heading
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  h1, h2, h3, h4, h5, h6, .blog-title, .blog-title a,.redl-comments-area.comments-area .comment h4,.redl-comments-area .comments-title,
  .comment-reply-title,.section-heading-wrap .section-heading,.section-heading-wrap .section-sub-heading,.faq-type,.pricing-item h1,.pricing-item h5,.redl-comments-area .redl-comments-meta h4,.author-content .author-name{color: {$content_heading_color};}
CSS;
}

$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .secondary-item h1,
  .secondary-item h2,
  .secondary-item h3,
  .secondary-item h4,
  .secondary-item h5,
  .secondary-item h6,
  .sidebar-nav h4
  {color: {$sidebar_heading_color};}
CSS;
}
/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );

if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .redl-copyright,
  .redl-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .redl-copyright a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .redl-copyright a:hover {color: {$copyright_link_hover_color} !important;}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '991';

echo <<<CSS
  .no-class {}
@media (max-width: {$breakpoint}px) {
  .redl-header {
    padding: 30px 0;
  }
  .redl-header .redl-btn {
    display: block;
    overflow: hidden;
    clear: both;
    min-width: auto;
    padding: 7px 10px;
    margin: 0 20px 15px;
  }
  .redl-header .navbar-nav {
    padding: 0 0 20px;
  }
  .redl-header .navbar-nav > li {
    width: 100%;
    padding: 0;
    border-bottom: 1px solid #202020;
  }
  .redl-header .navbar-nav > li > .dropdown-menu {
    position: static;
    min-width: 100%;
    margin: 0;
    background: transparent;
    border: none;
    box-shadow: none;
  }
  .redl-header .navbar-nav .dropdown-menu > li > a,
  .redl-header.fixed .navbar-nav > li > a,
  .archive .redl-header .navbar-nav > li > a,
  .category .redl-header .navbar-nav > li > a,
  .single .redl-header .navbar-nav > li > a,
  .blog .redl-header .navbar-nav > li > a,
  .search .redl-header .navbar-nav > li > a,
  .page .redl-header .navbar-nav > li > a {
    color: #ffffff;
  }
  .redl-header .navbar-nav .dropdown-menu > li > a:hover, .redl-header .navbar-nav .dropdown-menu > li > a:focus {
    background: #036ded;
  }
  .redl-header .navbar-nav > li > a {
    padding: 8px 20px 10px;
  }
  .redl-header .navbar-nav > li > a:hover, .redl-header .navbar-nav .open > a.dropdown-toggle {
    background: #036ded;
  }
  .redl-header.fixed .redl-btn:hover, .redl-header.fixed .redl-btn:focus {
    color: #ffffff;
  }
  .archive .redl-header .redl-btn:hover,
  .archive .redl-header .redl-btn:focus,
  .category .redl-header .redl-btn:hover,
  .category .redl-header .redl-btn:focus,
  .single .redl-header .redl-btn:hover,
  .single .redl-header .redl-btn:focus,
  .blog .redl-header .redl-btn:hover,
  .blog .redl-header .redl-btn:focus,
  .search .redl-header .redl-btn:hover,
  .search .redl-header .redl-btn:focus,
  .page .redl-header .redl-btn:hover,
  .page .redl-header .redl-btn:focus {
    color: #ffffff;
  }
  .redl-header-right {
    display: block ;
    position: fixed;
    top: 0;
    left: -100%;
    width: 320px;
    height: 100% !important;
    padding: 15px 0;
    background: #252525;
    overflow: auto;
    -webkit-box-shadow: 1px 0 5px rgba(0, 0, 0, 0.5);
    box-shadow: 1px 0 5px rgba(0, 0, 0, 0.5);
    -webkit-transition: all 0.6s ease 0s;
    -moz-transition: all 0.6s ease 0s;
    -o-transition: all 0.6s ease 0s;
    transition: all 0.6s ease 0s;
    z-index: 9;
  }
  .redl-header-right.in {left: 0;}
  .navbar-toggle {display: block;}
  .redl-header-right.collapse ul.navbar-nav.nav {padding: 20px 30px;}
  .redl-header-right.collapse ul.navbar-nav.nav li a {padding: 5px 0;}
  .redl-header.fixed .redl-header-right.collapse ul.navbar-nav.nav li a {color: #fff;}
  .redl-header-right.collapse ul.navbar-nav.nav li .dropdown-menu a {padding: 5px 15px;}
  .redl-header.fixed .redl-header-right.collapse ul.navbar-nav.nav li .dropdown-menu a {padding: 5px 15px;}

}
@media (max-width: 479px) {
  .redl-header-right {width: 300px;}
}
@media (max-width: 359px) {
  .redl-header-right {width: 250px;}
}
CSS;

  echo $redel_framework_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'redel_custom_font_load' ) ) {
  function redel_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']) .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']) .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. esc_url($font['svg']) .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']) .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'redel_framework_custom_css' ) ) {
  function redel_framework_custom_css() {
    wp_enqueue_style('redel-default-style', get_template_directory_uri() . '/style.css');
    $output  = redel_custom_font_load();
    $output .= redel_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = redel_compress_css_lines( $output );

    wp_add_inline_style( 'redel-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'redel_framework_custom_js' ) ) {
  function redel_framework_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'redel_framework_custom_js' );
}
