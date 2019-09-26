<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$viewport = cs_get_option('theme_responsive');
if($viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else { }

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(REDEL_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
wp_head();

// Metabox
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

if ($redel_meta) {
  $content_padding = $redel_meta['content_spacings'];
} else { $content_padding = ''; }
// Padding - Metabox
if ($content_padding && $content_padding !== 'padding-none') {
  $content_top_spacings = $redel_meta['content_top_spacings'];
  $content_bottom_spacings = $redel_meta['content_bottom_spacings'];
  if ($content_padding === 'padding-custom') {
    $content_top_spacings = $content_top_spacings ? 'padding-top:'. redel_check_px($content_top_spacings) .';' : '';
    $content_bottom_spacings = $content_bottom_spacings ? 'padding-bottom:'. redel_check_px($content_bottom_spacings) .';' : '';
    $custom_padding = $content_top_spacings . $content_bottom_spacings;
  } else {
    $custom_padding = '';
  }
} else {
  $custom_padding = '';
}
?>
</head>

	<body <?php body_class(); ?>>
  <div class="vt-maintenance-mode">
    <div class="container <?php echo esc_attr($content_padding); ?> evlt-content-area" style="<?php echo esc_attr($custom_padding); ?>">
   	<div class="row">
      <?php
        $page = get_post( cs_get_option('maintenance_mode_page') );
        WPBMap::addAllMappedShortcodes();
        echo ( is_object( $page ) ) ? do_shortcode( $page->post_content ) : '';
      ?>
    </div>
    </div>
    <?php wp_footer(); ?>
  </div>
  </body>
</html>