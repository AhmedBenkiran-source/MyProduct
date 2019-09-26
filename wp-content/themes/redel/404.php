<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header(); ?>

<!-- Content -->
<div class="redl-main-wrap">
<?php
//Title Bar from theme options
$need_title_bar = cs_get_option('need_title_bar');
// Title Area
if (isset($need_title_bar)) {
  get_template_part( 'layouts/header/title', 'bar' );
}

// Atts
$error_title = cs_get_option('error_title');
$error_heading = cs_get_option('error_heading');
$error_text = cs_get_option('error_text');
$error_btn_text = cs_get_option('error_btn_text');
$error_title = $error_title ? $error_title : esc_html__('404', 'redel');
$error_heading = $error_heading ? $error_heading : esc_html__('Oops! Nothing Was Found', 'redel');
$error_text = $error_text ? $error_text : esc_html__('We can’t seem to find the page you’re looking for.', 'redel');
$error_btn_text = $error_btn_text ? $error_btn_text : esc_html__('Come Back Home', 'redel');
?>
	<div class="redl-main-container">
		<div class="container">

			<div class="error-content">
				<h1><?php echo esc_attr($error_title); ?></h1>
				<h3><?php echo esc_attr($error_heading); ?></h3>
				<p><?php echo esc_attr($error_text); ?></p>
				<a href="<?php echo esc_url(home_url( '/' )); ?>" class="redl-btn redl-btn-three redl-btn-medium btn-hover-one"><?php echo esc_attr($error_btn_text); ?></a>
			</div>

		</div>
	</div>
</div>
<!-- Content -->

<?php
get_footer();