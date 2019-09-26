<?php
/*
 * Recent Post Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

class redel_recent_posts extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'evlt-recent-blog',
      VTHEME_NAME_P . __( ': Recent Posts', 'redel' ),
      array(
        'classname'   => 'evlt-recent-blog',
        'description' => VTHEME_NAME_P . __( ' widget that displays recent posts.', 'redel' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => __( 'Recent Posts', 'redel' ),
      'ptypes'   => 'post',
      'limit'    => '3',
      'date'     => true,
      'category' => '',
      'order' => '',
      'orderby' => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'redel' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Post Type
    $ptypes_value = esc_attr( $instance['ptypes'] );
    $ptypes_field = array(
      'id'    => $this->get_field_name('ptypes'),
      'name'  => $this->get_field_name('ptypes'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'redel' ),
      'title' => __( 'Post Type :', 'redel' ),
    );
    echo cs_add_element( $ptypes_field, $ptypes_value );

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'redel' ),
      'help' => __( 'How many posts want to show?', 'redel' ),
    );
    echo cs_add_element( $limit_field, $limit_value );

    // Date
    $date_value = esc_attr( $instance['date'] );
    $date_field = array(
      'id'    => $this->get_field_name('date'),
      'name'  => $this->get_field_name('date'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'redel' ),
      'off_text'  => __( 'No', 'redel' ),
      'title' => __( 'Display Date :', 'redel' ),
    );
    echo cs_add_element( $date_field, $date_value );

    // Category
    $category_value = esc_attr( $instance['category'] );
    $category_field = array(
      'id'    => $this->get_field_name('category'),
      'name'  => $this->get_field_name('category'),
      'type'  => 'text',
      'title' => __( 'Category :', 'redel' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'redel' ),
    );
    echo cs_add_element( $category_field, $category_value );

    // Order
    $order_value = esc_attr( $instance['order'] );
    $order_field = array(
      'id'    => $this->get_field_name('order'),
      'name'  => $this->get_field_name('order'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'redel' ),
      'title' => __( 'Order :', 'redel' ),
    );
    echo cs_add_element( $order_field, $order_value );

    // Orderby
    $orderby_value = esc_attr( $instance['orderby'] );
    $orderby_field = array(
      'id'    => $this->get_field_name('orderby'),
      'name'  => $this->get_field_name('orderby'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'redel'),
        'ID' => __('ID', 'redel'),
        'author' => __('Author', 'redel'),
        'title' => __('Title', 'redel'),
        'name' => __('Name', 'redel'),
        'type' => __('Type', 'redel'),
        'date' => __('Date', 'redel'),
        'modified' => __('Modified', 'redel'),
        'rand' => __('Random', 'redel'),
      ),
      'default_option' => __( 'Select OrderBy', 'redel' ),
      'title' => __( 'OrderBy :', 'redel' ),
    );
    echo cs_add_element( $orderby_field, $orderby_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['ptypes']       = strip_tags( stripslashes( $new_instance['ptypes'] ) );
    $instance['limit']        = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['date']         = strip_tags( stripslashes( $new_instance['date'] ) );
    $instance['category']     = strip_tags( stripslashes( $new_instance['category'] ) );
    $instance['order']        = strip_tags( stripslashes( $new_instance['order'] ) );
    $instance['orderby']      = strip_tags( stripslashes( $new_instance['orderby'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title          = apply_filters( 'widget_title', $instance['title'] );
    $ptypes         = $instance['ptypes'];
    $limit          = $instance['limit'];
    $display_date   = $instance['date'];
    $category       = $instance['category'];
    $order          = $instance['order'];
    $orderby        = $instance['orderby'];

    $args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

     $redel_rpw = new WP_Query( $args );
     global $post;

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }



    if ($redel_rpw->have_posts()) : while ($redel_rpw->have_posts()) : $redel_rpw->the_post();
    $thumb_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumb', false, '' );
    $thumb_image = $thumb_image[0];
    $featured_img = aq_resize( $thumb_image, '69', '70', true );

  ?>

  <div class="news-item">
    <?php if ($featured_img) { ?>
    <div class="pull-left"><a href="<?php esc_url(the_permalink()); ?>"><img src="<?php echo esc_url($featured_img);?>" alt="Recent News"/></a></div>
    <?php } ?>
    <div class="news-info">
    <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
    <span><?php
      echo get_the_date('d')." ".get_the_date('M'). ' ' .get_the_date('Y');
    ?></span>
    </div>
  </div>

  <?php
    endwhile; endif;

    wp_reset_postdata();
    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function redel_recent_posts_function() {
  register_widget( "redel_recent_posts" );
}
add_action( 'widgets_init', 'redel_recent_posts_function' );


