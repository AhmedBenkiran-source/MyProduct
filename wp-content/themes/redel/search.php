<?php
/*
 * The template for displaying Search result.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header();

// Theme Options
$sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($sidebar_position === 'sidebar-left') {
  $layout_class = ' style2';
} else {
  $layout_class = '';
}
?>

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
  <div class="redl-main-container <?php echo esc_attr($layout_class);?>">
    <div class="container">
    <?php if ($sidebar_position === 'sidebar-left' && $sidebar_position !== 'sidebar-hide') { ?>
    <div class="redl-secondary">
      <div class="secondary-wrap">
        <?php get_sidebar(); // Sidebar ?>
      </div>
    </div>
    <?php }
  if($sidebar_position !== 'sidebar-hide'){
  ?>
  <div class="redl-primary ">
    <div class="primary-wrap">
      <div class="clearfix">
    <?php } else { ?>
      <div class="primary-wrap">
        <div class="clearfix">
    <?php }
          if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'layouts/post/content' );
            endwhile;
          else :
            get_template_part( 'layouts/post/content', 'none' );
          endif; ?>
        </div><!-- Blog Div -->
        <!-- pagination-->
        <div class="pagination">
        <?php
          redel_paging_nav();
          wp_reset_postdata();  // avoid errors further down the page
    if($sidebar_position !== 'sidebar-hide') { ?>
      </div>
      </div>
    </div><!-- Content Area -->
  <?php } else { ?>
      </div>
          </div>
  <?php }
  if ($sidebar_position !== 'sidebar-hide') { ?>
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