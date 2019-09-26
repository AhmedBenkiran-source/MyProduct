<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* Exclude category from blog */
function redel_excludeCat($query) {
	if ( $query->is_home ) {
		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
		if($exclude_cat_ids) {
			foreach( $exclude_cat_ids as $exclude_cat_id ) {
				$exclude_from_blog[] = '-'. $exclude_cat_id;
			}
			$query->set('cat', implode(',', $exclude_from_blog));
		}
	}
	return $query;
}
add_filter('pre_get_posts', 'redel_excludeCat');

/* Excerpt Length */
function redel_excerpt_length( $length ) {
  $excerpt_length = cs_get_option('theme_blog_excerpt');
  if($excerpt_length) {
    $excerpt_length = $excerpt_length;
  } else {
    $excerpt_length = '20';
  }
  return $excerpt_length;
}
add_filter( 'excerpt_length', 'redel_excerpt_length', 999 );

/* Excerpt More */
function redel_excerpt_more( $more ) {
  return '.';
}
add_filter('excerpt_more', 'redel_excerpt_more');

/* Tag Cloud Widget - Remove Inline Font Size */
function redel_tag_cloud($tag_string){
  return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'redel_tag_cloud', 10, 3);

/* Password Form */
if( ! function_exists( 'redel_password_form' ) ) {
  function redel_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'redel_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'redel_maintenance_mode' ) ) {
  function redel_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'redel_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'redel_footer_widgets' ) ) {
  function redel_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar( 'footer-'. $i )) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

if( ! function_exists( 'redel_top_bar' ) ) {
  function redel_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="evlt-topbar"><div class="container"><div class="row">';
      $out .= redel_top_bar_modules( 'left' );
      $out .= redel_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* ==============================================
  Excerpt Length Change
=============================================== */
if ( ! function_exists( 'redel_custom_excerpt_length' ) ) {
  function redel_custom_excerpt_length( $length ) {
    $excerpt_length = cs_get_option('theme_blog_excerpt');
    if($excerpt_length) {
      $excerpt_length = $excerpt_length;
    } else {
      $excerpt_length = '55';
    }
    return $excerpt_length;
  }
  add_filter( 'excerpt_length', 'redel_custom_excerpt_length', 999 );
}

if ( ! function_exists( 'redel_new_excerpt_more' ) ) {
  function redel_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'redel_new_excerpt_more');
}

/* WP Link Pages */
if ( ! function_exists( 'redel_wp_link_pages' ) ) {
  function redel_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages"><span>' . esc_html__( 'Pages:', 'redel' ).'</span>',
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'redel_post_metas' ) ) {
  function redel_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="meta-tags"><ul>
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ' ' );
        if ( $category_list ) {
          echo '<li>'. $category_list .' </li>';
        }
      }
    } // Category Hides
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>

      <li><?php echo get_the_date('M d, Y'); ?></li>

    <?php } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>

      <?php
      printf(
        '<li>'. __('by','redel') .' <a href="%1$s" rel="author">%2$s</a></li>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>

    <?php } ?>
    </ul>
  </div>
  <?php
  }
}

/* Share Options */
if ( ! function_exists( 'redel_wp_share_option' ) ) {
  function redel_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    $share_text = cs_get_option('share_text');
    $share_text = $share_text ? $share_text : '';
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'redel' );
    ?>
    <!--<p><?php echo esc_attr($share_text); ?>:</p>-->
    <ul>
      <li>
        <a href="http://twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Twitter', 'redel'); ?>"><i class="fa fa-twitter"></i></a>
      </li>
      <li>
        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Facebook', 'redel'); ?>"><i class="fa fa-facebook"></i></a>
      </li>
      <li>
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Linkedin', 'redel'); ?>"><i class="fa fa-linkedin"></i></a>
      </li>
      <li>
        <a href="https://plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Google+', 'redel'); ?>"><i class="fa fa-google-plus"></i></a>
      </li>
    </ul>
<?php
  }
}

/* Author Info */
if ( ! function_exists( 'redel_author_info' ) ) {
  function redel_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'Author', 'redel' );
    $author_content = get_the_author_meta( 'description' );
  if ($author_content) {
?>
  <div class="redl-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?>
      </a>
    </div>
    <div class="author-content">
      <div class="author-pro"><?php echo esc_attr($author_text); ?></div>
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a>
      <p><?php echo get_the_author_meta( 'description' ); ?></p>
    </div>
  </div>
<?php
  } // if $author_content
  } // function redel_author_info()
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'redel_comment_modification' ) ) {
  function redel_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
        <div class="comment-wrapper">
          <div class="redl-comments-meta">
            <h4><?php printf( '%s', get_comment_author() ); ?></h4>
            <span class="comments-date">
              <?php $d='jS M Y'; echo get_comment_date($d); echo ' - '; ?>
              <span class="caps"><?php echo get_comment_time(); ?></span>
            </span>
            <div class="comments-reply">
            <?php
              comment_reply_link( array_merge( $args, array(
              'reply_text' => '<span class="comment-reply-link">'. __('Reply','redel') .'</span>',
              'before' => '',
              'class'  => '',
              'depth' => $depth,
              'max_depth' => $args['max_depth']
              ) ) );
            ?>
            </div>
          </div>
          <div class="comment-area">
            <?php comment_text(); ?>
          </div>
        </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'redel' ); ?></em>
      <?php endif; ?>

    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'redel_title_area' ) ) {
  function redel_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $redel_id    = ( isset( $post ) ) ? $post->ID : 0;
    $redel_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $redel_id;
    $redel_meta  = get_post_meta( $redel_id, 'page_type_metabox', true );
    if ($redel_meta && (!is_archive() )) {
      $custom_title = isset($redel_meta['page_custom_title']) ? $redel_meta['page_custom_title'] : '';
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_html_array = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title ) {
      echo esc_attr($custom_title);
    } elseif ( is_home() ) {
      bloginfo('name');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'redel' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'redel'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'redel' ), $allowed_html_array ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'redel' ), $allowed_html_array ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'redel' ), $allowed_html_array ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'redel' ), $allowed_html_array ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      }  elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'redel' );
      }
    } elseif( is_404() ) {
      esc_html_e('404 Error', 'redel');
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'redel_paging_nav' ) ) {
  function redel_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( 'OLDER POSTS', 'redel' );
      $newer_post = $newer_post ? $newer_post : esc_html__( 'NEWER POSTS', 'redel' );
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => $older_post,
        'next_text' => $newer_post,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type' => 'list'
      ));
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

/**
 * Sub-Menu Mobile Function
 */
add_action('wp_footer','redel_submenu_for_mobile_function');
function redel_submenu_for_mobile_function(){
  $mobile_breakpoint = cs_get_option('mobile_breakpoint');
  $breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '991';
  wp_add_inline_script( 'redel-scripts', 'jQuery(document).ready(function() { if (jQuery(window).width() > '. esc_js($breakpoint) .'){ jQuery("ul.nav li.dropdown").hover(function() { jQuery(this).children(".dropdown-menu").stop(true, true).delay(100).fadeIn(200); }, function() { jQuery(this).children(".dropdown-menu").stop(true, true).delay(100).fadeOut(200); }); } });' );
}
