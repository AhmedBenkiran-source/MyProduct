<?php
/* Testimonial Carousel */
if ( !function_exists('evlt_testimonial_carousel_function')) {
  function evlt_testimonial_carousel_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'testimonial_style'  => '',
      'testimonial_alignment'  => '',
      'class'  => '',
      'testimonial_rounded'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_particular'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',

      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',

      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'name_color'  => '',
      'profession_color'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    //Testimonial alignment
    $testimonial_alignment = $testimonial_alignment ? 'text-align:' . $testimonial_alignment . ';' : 'text-align:center';

    $prof_style=$name_style='';
    // Name Color
    if ( $name_color || $name_size ) {
      $name_style = ( $name_color ) ? 'color:'. $name_color .';' : '';
      $name_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $prof_style  = ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $prof_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
    }

    // Carousel Data's
    $carousel_loop = $carousel_loop !== 'true' ? 'data-loop="true"' : 'data-loop="false"';
    $carousel_items = $carousel_items ? 'data-items="'. $carousel_items .'"' : 'data-items="1"';
    $carousel_margin = $carousel_margin ? 'data-margin="'. $carousel_margin .'"' : 'data-margin="0"';
    $carousel_dots = $carousel_dots ? 'data-dots="'. $carousel_dots .'"' : 'data-dots="false"';
    $carousel_nav = $carousel_nav ? 'data-nav="'. $carousel_nav .'"' : 'data-nav="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? 'data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag !== 'true' ? 'data-mouse-drag="true"' : 'data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? 'data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? 'data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? 'data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? 'data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? 'data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';

    // Turn output buffer on
    ob_start();

    $particular_id = explode(',', $testimonial_particular);

    // Query Starts Here
    if ($testimonial_particular) {
      $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => (int)$testimonial_limit,
        'post__in' => $particular_id,
        'orderby' => $testimonial_orderby,
        'order' => $testimonial_order
      );
    } else {
      $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => (int)$testimonial_limit,
        'orderby' => $testimonial_orderby,
        'order' => $testimonial_order
      );
    }

    $evlt_testi = new WP_Query( $args );

    if ($evlt_testi->have_posts()) :
    ?>
    <!-- Testimonial Starts -->
    <div class="redl-default-slider redl-testimonial-carousel <?php echo esc_attr($class); ?>" style="<?php echo $testimonial_alignment;?>" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
    <?php
    while ($evlt_testi->have_posts()) : $evlt_testi->the_post();
    $testi_style = ($testimonial_style === 'testimonial_two') ? "style3" : "";
    ?>
    <div class="item <?php echo $testi_style;?>">
    <?php

    // Get Meta Box Options - is_cs_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $client_name = $testimonial_options['testi_name'];
    $name_link = $testimonial_options['testi_name_link'];
    $client_pro = $testimonial_options['testi_pro'];
    $pro_link = $testimonial_options['testi_pro_link'];

    $name_tag = $name_link ? 'a' : 'span';
    $name_link = $name_link ? 'href="'. esc_url($name_link) .'" target="_blank"' : '';
    $client_name = $client_name ? '<'. $name_tag .' '. $name_link .' >'. esc_attr($client_name) .'</'. $name_tag .'>' : '';

    $pro_tag = $pro_link ? 'a' : 'span';
    $pro_link = $pro_link ? 'href="'. esc_url($pro_link) .'" target="_blank"' : '';
    $client_pro = $client_pro ? '<'. $pro_tag .' '. $pro_link .' style=" ' . $prof_style . '">'. esc_attr($client_pro) .'</'. $pro_tag .'>' : '';

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $large_image = $large_image[0];
    if ($testimonial_style === 'testimonial_two') {
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '120', '120', true );
        if(!$testi_img)$testi_img = $large_image;//if aqua resize returns null for small image
      } else {$testi_img = $large_image;}
    } else {
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '60', '60', true );
      } else {$testi_img = $large_image;}
    }

    $actual_image = $large_image ? '<img src="'. $testi_img .'" alt="">' : '';

    if ($testimonial_style === 'testimonial_two') { // Style Two
    ?>
      <div class="testimonial-owner">
      <?php echo $actual_image; ?>
      </div>

      <?php the_content(); ?>
      <div class="testimonial-owner">
          <div class="name" style="<?php echo $name_style; ?>"><?php echo $client_name ; ?></div>
          <div class="clearfix"><?php echo $client_pro;?></div>
      </div>

    <?php

    } else {
     the_content(); ?>
        <div class="testimonial-owner">
          <?php echo $actual_image; ?>
          <div class="name" style="<?php echo $name_style; ?>"><?php echo $client_name ; ?></div>
          <div class="clearfix"><?php echo $client_pro;?></div>
        </div>

    <?php
    } // Style One
    ?>
    </div> <!-- item end -->
    <?php
    endwhile;
    wp_reset_postdata();
    ?>

    </div> <!-- Testimonial End -->

<?php
  endif;

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'evlt_testimonial_carousel', 'evlt_testimonial_carousel_function' );