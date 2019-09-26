<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header();

// Metabox
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

if ($redel_meta) {
	$content_padding = isset($redel_meta['content_spacings']) ? $redel_meta['content_spacings'] : '';
  //banner data from metabox
  $banner_id = $redel_meta['banner'];
  //background type
  $background_type = isset($redel_meta['background_type']) ? $redel_meta['background_type'] : '';

  //banner wrap class
  $banner_wrap_class = isset($redel_meta['banner_wrap_class']) ? $redel_meta['banner_wrap_class'] : '';

  //background image
  $banner_area_bg = $redel_meta['banner_area_bg'];
  if(is_array($banner_area_bg)){
    $banner_bg_style = 'background-image:url('.$banner_area_bg['image'].');';
    $banner_bg_style .= 'background-repeat:'.$banner_area_bg['repeat']. ';';
    $banner_bg_style .= 'background-position:'.$banner_area_bg['position']. ';';
    $banner_bg_style .= 'background-size:'.$banner_area_bg['size']. ';';
    $banner_bg_style .= 'background-color:'.$banner_area_bg['color']. ';';
  }
  //banner content
  if($banner_id){
    $banner = get_post($banner_id);
  }
} else {
    $content_padding = '';
    $banner_id = '';
    $banner_area_bg = '';
   }
// Padding - Metabox
if ($content_padding && $content_padding !== 'padding-none') {
	$content_top_spacings = isset($redel_meta['content_top_spacings']) ? $redel_meta['content_top_spacings'] : '';
	$content_bottom_spacings = isset($redel_meta['content_bottom_spacings']) ? $redel_meta['content_bottom_spacings']: '';
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

// Theme Options
$sidebar_position = cs_get_option('single_sidebar_position');
$single_comment = cs_get_option('single_comment_form');

// Sidebar Position
if ($sidebar_position === 'sidebar-left') {
  $layout_class = ' style2';
} else {
  $layout_class = '';
}

//banner content from metabox
if($banner_id) { ?>
  <div class="redl-banner <?php if($background_type == "self_hosted_video")echo 'video-banner'; if($banner_wrap_class)echo " ". esc_attr($banner_wrap_class);?>" style="<?php echo esc_attr($banner_bg_style); ?>">
    <div class="container">
      <div class="redl-caption-wrap">
        <?php echo do_shortcode($banner->post_content); ?>
      </div>
    </div>
    <?php
    if($background_type == "self_hosted_video"){
      $banner_video = $redel_meta['banner_video'];
      $video_poster = $redel_meta['video_poster'];
      $video_poster_url = wp_get_attachment_url($redel_meta['video_poster']);
      if($banner_video){
        //controls
        $autoplay = (isset($redel_meta['autoplay']) && $redel_meta['autoplay'] == "true") ? 'autoplay' : '';
        $loop = (isset($redel_meta['loop']) && $redel_meta['loop'] == "true") ? 'loop' : '';
        $mute = (isset($redel_meta['mute']) && $redel_meta['mute'] == "true") ? 'muted' : '';
      ?>
      <div id="video-wrap" class="redl-video">
        <video preload="metadata" <?php echo esc_attr($autoplay);?> <?php echo esc_attr($loop);?> <?php echo esc_attr($mute);?> control="0" tabindex="0" poster="<?php echo esc_url($video_poster_url); ?>" class="parallax-video">
        <source src="<?php echo esc_url($banner_video);?>" type="video/mp4" /><!-- Safari / iOS, IE9 -->
        <source src="<?php echo esc_url($banner_video);?>" type="video/webm"/><!-- Chrome10+, Ffx4+, Opera10.6+ -->
        <source src="<?php echo esc_url($banner_video);?>" type="video/ogg"/><!-- Firefox3.6+ / Opera 10.5+ -->
          <?php esc_html_e('Your browser does not support the video tag.', 'redel'); ?>
        </video>
      </div>
      <?php
      }
    }
?>
  </div>
<?php } ?>

<div class="redl-main-wrap">
<?php
//Title Bar from theme options
$need_title_bar = cs_get_option('need_title_bar');
  // Title Area
  if (isset($need_title_bar)) {
    get_template_part( 'layouts/header/title', 'bar' );
  } ?>
  <div class="redl-main-container <?php echo esc_attr($layout_class); ?>">
    <div class="container">
	<?php if ($sidebar_position === 'sidebar-left' && $sidebar_position !== 'sidebar-hide') { ?>
  <div class="redl-secondary">
    <div class="secondary-wrap">
      <?php get_sidebar(); // Sidebar ?>
    </div>
  </div>
<?php } ?>
  <!-- content area -->
<?php if($sidebar_position !== 'sidebar-hide') { ?>
  <div class="redl-primary ">
    <div class="primary-wrap">
      <div class="clearfix">
<?php } else { ?>
  <div class="primary-wrap">
    <div class="clearfix">
<?php }
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class('blog-detail'); ?>>
    <?php
			get_template_part( 'layouts/post/content', 'single' );
			$single_comment = $single_comment ? comments_template() : ''; ?>
    </div><!-- #post-## --><?php
		endwhile;
	else :
		get_template_part( 'layouts/post/content', 'none' );
	endif;

  if($sidebar_position !== 'sidebar-hide') { ?>
    </div>
  </div>
<?php
  redel_paging_nav();
  wp_reset_postdata();  // avoid errors further down the page
?>
  </div><!-- Content Area -->
<?php } else { ?>
</div>
<?php
  redel_paging_nav();
  wp_reset_postdata();  // avoid errors further down the page
?>
</div>
<?php }
  if ( $sidebar_position !== 'sidebar-hide') { ?>
    <div class="redl-secondary">
      <div class="secondary-wrap">
        <?php get_sidebar(); // Sidebar ?>
      </div>
    </div>
  <?php } ?>
    </div>
  </div>
</div>

<?php
get_footer();