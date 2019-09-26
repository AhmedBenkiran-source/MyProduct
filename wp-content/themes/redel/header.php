<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$viewport = cs_get_option('theme_responsive');
if($viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php }
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(REDEL_IMAGES); ?>/favicon.png" type="image/x-icon"/>
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
?>
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
// Metabox
global $post;
$redel_id    = ( isset( $post ) ) ? $post->ID : false;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $redel_id : false;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );
$sticky_header  = cs_get_option('sticky_header');
$banner_id = '';
$banner_type = '';
if ($redel_meta) {
  //banner data
  $banner_id = $redel_meta['banner'];
  $sticky_header = isset($redel_meta['sticky_header']) ? $redel_meta['sticky_header'] : true;
  if ($redel_meta['banner']) {
    if($sticky_header){
      $banner_type = 'redl-banner-special';
    }
  }
} else {
  $banner_type = '';
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>

  <!-- Header -->
  <header class="redl-header <?php echo esc_attr($banner_type); ?>">
    <div class="container">
      <?php
      //logo
      get_template_part( 'layouts/header/logo' );
      //menu
      get_template_part( 'layouts/header/menu', 'bar' );
      ?>
    </div>
  </header>

<?php
