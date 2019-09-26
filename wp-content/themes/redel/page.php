<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Metabox
$redel_id    = ( isset( $post ) ) ? $post->ID : 0;
$redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
$redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );

if ($redel_meta) {
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

} else { $banner_id = '';
  $banner_area_bg = '';
}

// Padding - Metabox for content
$content_padding = isset($redel_meta['content_spacings']) ? $redel_meta['content_spacings'] : '';

if ($content_padding && $content_padding !== 'padding-none') {
  $content_top_spacings = $redel_meta['content_top_spacings'];
  $content_bottom_spacings = $redel_meta['content_bottom_spacings'];
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

// Page Layout Options
$page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ($page_layout) {
	$page_layout = $page_layout['page_layout'];

  if($page_layout === 'left-sidebar') {
    $column_class = 'col-lg-9';
    $layout_class = ' style2';
  } elseif($page_layout === 'right-sidebar') {
    $column_class = 'col-lg-9';
    $layout_class = '';
  } else {
    $column_class = 'col-lg-12';
    $layout_class = 'container';
  }

	if ($page_layout === 'left-sidebar') {
		$padding_class = 'no-padding-right';
	} elseif ($page_layout === 'right-sidebar') {
		$padding_class = 'no-padding-left';
	} elseif ($page_layout === 'full-width') {
		$padding_class = 'no-padding';
	} else {
		$padding_class = '';
	}
} else {
	$column_class = 'col-lg-12';
	$layout_class = 'container';
	$padding_class = '';
}

get_header();

//banner content from metabox
if($banner_id) { ?>
  <div class="redl-banner <?php if($background_type == "self_hosted_video") echo 'video-banner'; if($banner_wrap_class)echo " ". esc_attr($banner_wrap_class);?>" style="<?php echo esc_attr($banner_bg_style); ?>">
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

<!-- redl main wrap -->
<div class="redl-main-wrap">
<?php
//Title Bar from theme options
$need_title_bar = cs_get_option('need_title_bar');
// Title Area
if (isset($need_title_bar)) {
  get_template_part( 'layouts/header/title', 'bar' );
}
  ?>
  <div class="redl-main-container <?php echo esc_attr($layout_class.' '. $content_padding); ?>" style="<?php echo esc_attr($custom_padding); ?>">
    <div class="container">
    <?php //sidebar
      if($page_layout === 'left-sidebar') { ?>
      <div class="redl-secondary">
        <div class="secondary-wrap">
          <?php get_sidebar(); // Sidebar ?>
        </div>
      </div>
      <?php }
      if($page_layout === 'right-sidebar' || $page_layout === 'left-sidebar') { ?>
      <!-- content area -->
      <div class="redl-primary">
        <div class="primary-wrap">
        <?php
      }
			while ( have_posts() ) : the_post();
				the_content();
				// If comments are open or we have at least one comment, load up the comment template.
				$theme_page_comments = cs_get_option('theme_page_comments');
				if ( isset($theme_page_comments) && (comments_open() || get_comments_number()) ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
      if($page_layout === 'right-sidebar' || $page_layout === 'left-sidebar') { ?>
        </div>
      </div>
      <?php
      }
      //sidebar
      if($page_layout === 'right-sidebar') { ?>
      <div class="redl-secondary">
        <div class="secondary-wrap">
          <?php get_sidebar(); // Sidebar ?>
        </div>
      </div>
      <?php } ?>
	  </div><!-- end container -->
  </div><!-- end redl main container -->
</div><!-- end redl main wrap -->

<?php
get_footer();