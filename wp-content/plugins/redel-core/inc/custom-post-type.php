<?php

/**
 * Initialize Custom Post Type - Redel Theme
 */

function redel_custom_post_type() {

    // Banner - Start
    $banner_slug = 'banner';
    $banners = __('Banners', 'redel-core');

    // Register custom post type - banner
    register_post_type('banner',
        array(
            'labels' => array(
                'name' => $banners,
                'singular_name' => sprintf(esc_html__('%s Post', 'redel-core' ), $banners),
                'all_items' => sprintf(esc_html__('All %s', 'redel-core' ), $banners),
                'add_new' => esc_html__('Add New', 'redel-core') ,
                'add_new_item' => sprintf(esc_html__('Add New %s', 'redel-core' ), $banners),
                'edit' => esc_html__('Edit', 'redel-core') ,
                'edit_item' => sprintf(esc_html__('Edit %s', 'redel-core' ), $banners),
                'new_item' => sprintf(esc_html__('New %s', 'redel-core' ), $banners),
                'view_item' => sprintf(esc_html__('View %s', 'redel-core' ), $banners),
                'search_items' => sprintf(esc_html__('Search %s', 'redel-core' ), $banners),
                'not_found' => esc_html__('Nothing found in the Database.', 'redel-core') ,
                'not_found_in_trash' => esc_html__('Nothing found in Trash', 'redel-core') ,
                'parent_item_colon' => ''
            ) ,
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 10,
            'menu_icon' => 'dashicons-portfolio',
            'rewrite' => array(
                'slug' => $banner_slug,
                'with_front' => false
            ),
            'has_archive' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'sticky',
                'page-attributes'
            )
        )
    );
    //Faq starts
    $faq_slug = 'faq';
    $faq = __('FAQ', 'redel-core');

    // Register custom post type - faq
    register_post_type('faq',
        array(
            'labels' => array(
                'name' => $faq,
                'singular_name' => sprintf(esc_html__('%s Post', 'redel-core' ), $faq),
                'all_items' => sprintf(esc_html__('%s', 'redel-core' ), $faq),
                'add_new' => esc_html__('Add New', 'redel-core') ,
                'add_new_item' => sprintf(esc_html__('Add New %s', 'redel-core' ), $faq),
                'edit' => esc_html__('Edit', 'redel-core') ,
                'edit_item' => sprintf(esc_html__('Edit %s', 'redel-core' ), $faq),
                'new_item' => sprintf(esc_html__('New %s', 'redel-core' ), $faq),
                'view_item' => sprintf(esc_html__('View %s', 'redel-core' ), $faq),
                'search_items' => sprintf(esc_html__('Search %s', 'redel-core' ), $faq),
                'not_found' => esc_html__('Nothing found in the Database.', 'redel-core') ,
                'not_found_in_trash' => esc_html__('Nothing found in Trash', 'redel-core') ,
                'parent_item_colon' => ''
            ) ,
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            //'menu_position' => 10,
            'show_in_menu' => 'redel_post_type',
            'menu_icon' => 'dashicons-portfolio',
            'rewrite' => array(
                'slug' => $faq_slug,
                'with_front' => false
            ),
            'has_archive' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'sticky',
                'page-attributes'
            )
        )
    );
    // Registered

	$portfolio_cpt = (is_cs_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$portfolio_slug = (is_cs_framework_active()) ? cs_get_option('theme_portfolio_slug') : '';
	$portfolio_cpt_slug = (is_cs_framework_active()) ? cs_get_option('theme_portfolio_cat_slug') : '';

	$base = (isset($portfolio_cpt_slug) && $portfolio_cpt_slug !== '') ? sanitize_title_with_dashes($portfolio_cpt_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$base_slug = (isset($portfolio_slug) && $portfolio_slug !== '') ? sanitize_title_with_dashes($portfolio_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$label = ucfirst((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	// Testimonials - Start
	$testimonial_slug = 'testimonial';
	$testimonials = __('Testimonials', 'redel-core');

	// Register custom post type - Testimonials
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => $testimonials,
				'singular_name' => sprintf(esc_html__('%s Post', 'redel-core' ), $testimonials),
				'all_items' => sprintf(esc_html__('%s', 'redel-core' ), $testimonials),
				'add_new' => esc_html__('Add New', 'redel-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'redel-core' ), $testimonials),
				'edit' => esc_html__('Edit', 'redel-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'redel-core' ), $testimonials),
				'new_item' => sprintf(esc_html__('New %s', 'redel-core' ), $testimonials),
				'view_item' => sprintf(esc_html__('View %s', 'redel-core' ), $testimonials),
				'search_items' => sprintf(esc_html__('Search %s', 'redel-core' ), $testimonials),
				'not_found' => esc_html__('Nothing found in the Database.', 'redel-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'redel-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'redel_post_type',
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array(
				'slug' => $testimonial_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'sticky',
			)
		)
	);
	// Testimonials - End

}

// Post Type - Menu
if( ! function_exists( 'redel_post_type_menu' ) ) {
  function redel_post_type_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
			add_menu_page( __('Company', 'redel-core'), __('Company', 'redel-core'), 'edit_theme_options', 'redel_post_type', 'redel_welcome_page', 'dashicons-groups', 10 );
    }
  }
}
add_action( 'admin_menu', 'redel_post_type_menu' );

// Portfolio Slug
function redel_custom_portfolio_slug() {
	$portfolio_cpt = (is_cs_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$portfolio_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
}
add_action( 'cs_validate_save_after','redel_custom_portfolio_slug' );

// After Theme Setup
function redel_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	redel_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'redel_custom_flush_rules');
add_action('init', 'redel_custom_post_type');

// Avoid portfolio post type as 404 page while it change
function redel_cpt_avoid_error_portfolio() {
	$portfolio_cpt = (is_cs_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
	$set = get_option('post_type_rules_flased_' . $portfolio_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $portfolio_cpt,true);
	}
}
add_action('init', 'redel_cpt_avoid_error_portfolio');

// Add Filter by Category in Portfolio Type
add_action('restrict_manage_posts', 'redel_filter_portfolio_categories');
function redel_filter_portfolio_categories() {
	global $typenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf(esc_html__("Show All %s", 'redel-core'), $info_taxonomy->label),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Portfolio Search => ID to Term
add_filter('parse_query', 'redel_portfolio_id_term_search');
function redel_portfolio_id_term_search($query) {
	global $pagenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/* ---------------------------------------------------------------------------
 * Custom columns - Portfolio
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-portfolio_columns", "redel_portfolio_edit_columns");
function redel_portfolio_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'redel-core' );
  $new_columns['thumbnail'] = __('Image', 'redel-core' );
  $new_columns['portfolio_category'] = __('Categories', 'redel-core' );
  $new_columns['portfolio_order'] = __('Order', 'redel-core' );
  $new_columns['date'] = __('Date', 'redel-core' );

  return $new_columns;
}
add_action('manage_portfolio_posts_custom_column', 'redel_manage_portfolio_columns', 10, 2);
function redel_manage_portfolio_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'Categories' column. */
    case 'portfolio_category' :

      $terms = get_the_terms( $post->ID, 'portfolio_category' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio_category' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio_category', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    case "portfolio_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Testimonial
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-testimonial_columns", "redel_testimonial_edit_columns");
function redel_testimonial_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['id'] = __('ID', 'redel-core' );
  $new_columns['title'] = __('Title', 'redel-core' );
  $new_columns['thumbnail'] = __('Image', 'redel-core' );
  $new_columns['name'] = __('Client Name', 'redel-core' );
  $new_columns['date'] = __('Date', 'redel-core' );

  return $new_columns;
}

add_action('manage_testimonial_posts_custom_column', 'redel_manage_testimonial_columns', 10, 2);
function redel_manage_testimonial_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    // ID
    case 'id':
      echo get_the_ID();
    break;

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
      echo $testimonial_options['testi_name'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Team
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-team_columns", "redel_team_edit_columns");
function redel_team_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'redel-core' );
  $new_columns['thumbnail'] = __('Image', 'redel-core' );
  $new_columns['name'] = __('Job Position', 'redel-core' );
  $new_columns['date'] = __('Date', 'redel-core' );

  return $new_columns;
}

add_action('manage_team_posts_custom_column', 'redel_manage_team_columns', 10, 2);
function redel_manage_team_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
      echo $team_options['team_job_position'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}
