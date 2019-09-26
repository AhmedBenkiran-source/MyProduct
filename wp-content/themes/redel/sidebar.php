<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$blog_widget = cs_get_option('blog_widget');
$single_blog_widget = cs_get_option('single_blog_widget');

if (is_page()) {
	// Page Layout Options
	$page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

	if ($page_layout['page_layout'] === 'left-sidebar') {
		$padding_class = 'no-padding-left';
	} elseif ($page_layout['page_layout'] === 'right-sidebar') {
		$padding_class = 'no-padding-right';
	} else {
		$padding_class = '';
	}
} else {

	$sidebar_position = cs_get_option('blog_sidebar_position');
	$single_sidebar_position = cs_get_option('single_sidebar_position');
	if ($sidebar_position === 'sidebar-left' || $single_sidebar_position === 'sidebar-left') {
		$padding_class = 'no-padding-right';
	} elseif ($sidebar_position === 'sidebar-right' || $single_sidebar_position === 'sidebar-right') {
		$padding_class = 'no-padding-left';
	} else {
		$padding_class = '';
	}

} // is_page
?>

<div class="<?php echo esc_attr($padding_class); ?>">
	<?php if (is_page() && $page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $blog_widget && !$single_blog_widget) {
		if (is_active_sidebar($blog_widget)) {
			dynamic_sidebar($blog_widget);
		}
	} elseif (is_single() && $single_blog_widget) {
		if (is_active_sidebar($single_blog_widget)) {
			dynamic_sidebar($single_blog_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-1' )) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->
