<?php
	// Main Text
	$need_copyright = cs_get_option('need_copyright');
	$footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if (isset($need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="redl-copyright">
	<div class="pull-left">
	<?php
		$copyright_text = cs_get_option('copyright_text');
		echo do_shortcode($copyright_text);
	?>
	</div>
  <div class="pull-right">
  <?php
    $secondary_text = cs_get_option('secondary_text');
    echo do_shortcode($secondary_text);
  ?>
  </div>
</div>
<!-- Copyright Bar -->
<?php }