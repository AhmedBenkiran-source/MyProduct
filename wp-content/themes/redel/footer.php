<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

if ($redel_meta) {
  $hide_footer  = $redel_meta['hide_footer'];
	$copyright_style  = isset($redel_meta['copyright_style']) ? $redel_meta['copyright_style'] : '';//copyright style
  $copyright_class = ($copyright_style === "light") ? 'redl-footer-light' : 'redl-footer-dark';
} else { $hide_footer = '';$copyright_style = '';$copyright_class = ''; }
if (!$hide_footer) { // Hide Footer Metabox
?>
	<!-- Footer -->
	<footer class="redl-footer <?php echo esc_attr($copyright_class); ?>" <?php if($copyright_style === "light") echo 'style="background-color:white;"'; ?>>
    <div class="container">
  		<?php
  			$footer_widget_block = cs_get_option('footer_widget_block');
  			if (isset($footer_widget_block)) {
  	      // Footer Widget Block
  	      get_template_part( 'layouts/footer/footer', 'widgets' );
  	    }

  	    $need_copyright = cs_get_option('need_copyright');
  			if (isset($need_copyright)) {
  	      // Copyright Block
        	get_template_part( 'layouts/footer/footer', 'copyright' );
  	    }
      ?>
    </div>
	</footer>
	<!-- Footer -->
<?php } // Hide Footer Metabox ?>
<div class="redl-back-top">
  <a href="#0"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php
$sticky_header  = cs_get_option('sticky_header');
if ($redel_meta) {
  $sticky_header = isset($redel_meta['sticky_header']) ? $redel_meta['sticky_header'] : true;
}
if($sticky_header){
  wp_add_inline_script( 'redel-plugins', 'jQuery(document).ready(function() { jQuery(window).scroll(function() { var windscroll = jQuery(window).scrollTop(); if (windscroll >= 80) { jQuery("header").addClass("fixed"); } else { jQuery("header").removeClass("fixed"); } }).scroll(); jQuery(".redl-header").sticky({topSpacing:0}); if( jQuery(".redl-header").hasClass("redl-banner-special") ) {jQuery(".redl-header").parent().addClass("sticky_special"); } });' );
}
wp_footer(); ?>
</body>
</html>