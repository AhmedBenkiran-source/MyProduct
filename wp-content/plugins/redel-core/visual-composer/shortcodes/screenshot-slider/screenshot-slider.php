<?php
/* Testimonial Carousel */
if ( !function_exists('evlt_screenshot_slider_function')) {
  function evlt_screenshot_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'  => '',
      'screenshot_images'  => '',
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
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' evlt-testi-carousel-'. $e_uniqid;

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

    //images
    //var_dump($screenshot_images);
    $arr_img=explode(",",$screenshot_images);
    if(is_array($arr_img)){
        if(count($arr_img)){
    ?>
    <!-- slider Starts -->
    <div class="redl-default-slider redl-screenshort-slider gray-nav" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
    <?php
    foreach($arr_img as $ss){
        $image_url = wp_get_attachment_url( $ss );
        $actual_image = $image_url ? '<img src="'. esc_url($image_url) .'" alt="">' : '';

     ?>
      <div class="item">
          <?php echo $actual_image; ?>
      </div>
    <?php
    }
    ?>
    </div><!-- slider End -->
    <?php
    }
    }
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'evlt_screenshot_slider', 'evlt_screenshot_slider_function' );