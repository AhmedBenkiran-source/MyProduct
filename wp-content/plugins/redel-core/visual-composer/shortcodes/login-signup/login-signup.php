<?php
/* Team */
if ( !function_exists('redl_login_signup_function')) {
  function redl_login_signup_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'form_type'  => '',
      'link_url'  => '',
      'text_after'  => '',
      'link_text'  => '',
      'class'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    $form_type = $form_type ?  $form_type  : 'login';

    $link_text = $link_text ?  '<a href="'.esc_url($link_url).'">'.esc_attr($link_text).'</a>'  : '';

    // Turn output buffer on
    ob_start();

    if($form_type == "login"){
        //login form
        ?>
        <div class=" form-pages">
        <div class="redl-box-form ">
            <div class="form-inner">
                <?php
                    if ( ! is_user_logged_in() ) {
                    $args = array(

                        'remember'       => true,
                        'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                        'form_id'        => 'loginform',
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'label_username' => __( 'Email' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Login' ),
                        'value_username' => '',
                        'value_remember' => false
                    );
                    wp_login_form($args);
                    echo '<p class="have-account">' . esc_attr($text_after) . $link_text .'</p>';
                    } else { // If logged in:
                        wp_loginout( home_url() ); // Display "Log Out" link.
                        echo " | ";
                        wp_register('', ''); // Display "Site Admin" link.
                    }

                ?>

            </div>
      </div>
      </div>
        <?php
    }else{
        //signup form
        ?>
        <div class=" form-pages">
        <div class="redl-box-form">
            <div class="form-inner">
        <?php
        if ( ! is_user_logged_in() ) {
            echo do_shortcode('[appldr_registration]');
             echo '<p class="have-account">' . esc_attr($text_after) . $link_text .'</p>';
        } else { // If logged in:
            wp_loginout( home_url() ); // Display "Log Out" link.
            echo " | ";
            wp_register('', ''); // Display "Site Admin" link.
        }

        ?>
        </div>
        </div>
        </div>
        <?php
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'redl_login_signup', 'redl_login_signup_function' );
