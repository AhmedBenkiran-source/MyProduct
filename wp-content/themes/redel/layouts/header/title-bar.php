<?php
// Metabox
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );
if ($redel_meta) {
	$title_bar_padding = isset($redel_meta['title_area_spacings']) ? $redel_meta['title_area_spacings'] : '';
    //Title Bar from metabox
    $need_title_bar = isset($redel_meta['hide_title_bar']) ? $redel_meta['hide_title_bar'] : '';
} else {
    $title_bar_padding = '';
}

// Padding - Theme Options
if ($title_bar_padding && $title_bar_padding !== 'padding-none') {
	$title_top_spacings = $redel_meta['title_top_spacings'];
	$title_bottom_spacings = $redel_meta['title_bottom_spacings'];
	if ($title_bar_padding === 'padding-custom') {
		$title_top_spacings = $title_top_spacings ? 'padding-top:'. redel_check_px($title_top_spacings) .';' : '';
		$title_bottom_spacings = $title_bottom_spacings ? 'padding-bottom:'. redel_check_px($title_bottom_spacings) .';' : '';
		$custom_padding = $title_top_spacings . $title_bottom_spacings;
	} else {
		$custom_padding = '';
	}
} else {
	$title_bar_padding = cs_get_option('title_bar_padding');
	$titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
    //var_dump($title_bar_padding);
	if ($title_bar_padding === 'padding-custom') {
		$titlebar_top_padding = $titlebar_top_padding ? 'padding-top:'. redel_check_px($titlebar_top_padding) .';' : '';
		$titlebar_bottom_padding = $titlebar_bottom_padding ? 'padding-bottom:'. redel_check_px($titlebar_bottom_padding) .';' : '';
		$custom_padding = $titlebar_top_padding . $titlebar_bottom_padding;
	} else {
		$custom_padding = '';
	}
}

if(isset($need_title_bar) && ($need_title_bar === true)) { // Hide Title Area
}else{//Show title area
?>
	<!-- Title Area -->
<div class="redl-page-heading <?php echo esc_attr($title_bar_padding); ?>" style="<?php echo esc_attr($custom_padding ); ?>">
    <div class="container">
      <h2><?php echo redel_title_area(); ?></h2>
    </div>
  </div>
<?php } ?>
