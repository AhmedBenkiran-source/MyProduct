<?php
// Metabox
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $redel_id : false;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

if (($redel_meta && is_page()) || ($redel_meta && is_single())) {
  $choose_menu = $redel_meta['choose_menu'];
} else { $choose_menu = ''; }
$choose_menu = $choose_menu ? $choose_menu : '';

//metabox header button
if ($redel_meta) {
  $header_button_text  = isset($redel_meta['header_button_text']) ? $redel_meta['header_button_text'] : '';
  $header_button_link  = isset($redel_meta['header_button_link']) ? $redel_meta['header_button_link'] : '';
  $open_new_tab  = (isset($redel_meta['open_new_tab']) && $redel_meta['open_new_tab']=== true) ? 'target="_blank"' : '';
} else {
  $header_button_text  = '';
  $header_button_link  = '';
  $open_new_tab = cs_get_option('open_new_tab') ? 'target="_blank"' : '';
}

//metabox ThemeOptions
if($header_button_text =="")
    $header_button_text  = cs_get_option('header_button_text');
if($header_button_link =="")
    $header_button_link  = cs_get_option('header_button_link');
?>
<!-- Navigation  -->
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".redl-header-right" aria-expanded="false">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>

<div class="redl-header-right">
<?php
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => 'ul',
      'container_class'   => '',
      'container_id'      => '',
      'menu'              => $choose_menu,
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'redel_wp_bootstrap_navwalker::fallback',
      'walker'            => new redel_wp_bootstrap_navwalker()
    )
  );

  //header button
  if($header_button_text != ""){
      echo '<a '.$open_new_tab.' href="'.esc_url($header_button_link).'" class="redl-btn redl-btn-one redl-btn-small">'.esc_attr($header_button_text).'</a>';
  }
?>
</div> <!-- end-navigation -->