<?php
//Metabox option for footer widget block
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

if ($redel_meta) {
  $hide_footer_widget  = isset($redel_meta['hide_footer_widget']) ? $redel_meta['hide_footer_widget'] : '';
} else { $hide_footer_widget = ''; }
if (!$hide_footer_widget) { // Hide Footer Metabox
?>
<!-- Footer Widgets -->
<div class="primary-footer">
  <div class="row">
		<?php echo redel_footer_widgets(); ?>
	</div>
</div>
<!-- Footer Widgets -->
<?php
}