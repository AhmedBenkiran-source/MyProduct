<?php
// Logo Image
$brand_logo_default = cs_get_option('brand_logo_default');
$floating_logo = cs_get_option('floating_logo_default');
$brand_logo_retina = cs_get_option('brand_logo_retina');
$floating_logo_retina = cs_get_option('floating_logo_retina');

// Metabox -
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

// Retina Size
$retina_width = cs_get_option('retina_width');
$retina_height = cs_get_option('retina_height');
?>
<div class="logo ">
	<a href="<?php echo esc_url(home_url( '/' )); ?>"><?php
  $blog_name = get_bloginfo( 'name' );
  //default logo
  if ($brand_logo_default != ''){
    if ($brand_logo_retina){
      echo '<img src="'. wp_get_attachment_url($brand_logo_retina) .'" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="retina-logo white-logo" />';
    }
    echo '<img src="'. esc_attr(wp_get_attachment_url($brand_logo_default)) .'" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="white-logo default-logo" />';
  } else {
    if($blog_name)
      echo '<span class="text-logo">'.$blog_name.'</span>';
    else
      echo '<img src="'. REDEL_IMAGES .'/logo-white.png" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="'. get_bloginfo( 'name' ). '" class="white-logo default-logo">';
  }
  //floating logo
  if ($floating_logo != '') {
    if ($floating_logo_retina){
      echo '<img src="'. wp_get_attachment_url($floating_logo_retina) .'" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="retina-logo dark-logo" />';
    }
      echo '<img src="'. esc_attr(wp_get_attachment_url($floating_logo)) .'" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="dark-logo default-logo" />';
  } else {
    //default logo
    if ($brand_logo_default != ''){
      if ($brand_logo_retina){
        echo '<img src="'. wp_get_attachment_url($brand_logo_retina) .'" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="retina-logo dark-logo" />';
      }
      echo '<img src="'. esc_attr(wp_get_attachment_url($brand_logo_default)) .'" width="'. esc_attr($retina_width) .'" height="'. esc_attr($retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="dark-logo default-logo" />';
    }
  }

	echo '</a>';
	?>
</div>