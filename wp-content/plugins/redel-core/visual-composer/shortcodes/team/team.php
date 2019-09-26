<?php
/* Team */
if ( !function_exists('redl_team_function')) {
  function redl_team_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'team_member_image'  => '',
      'team_member_name'  => '',
      'team_member_profession'  => '',
      'team_member_link'  => '',
      'class'  => '',

      // Color & Style
      'name_color'  => '',
      'profession_color'  => '',
      'content_color'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    $name_style = $prof_style = '';
    // Name Color
    if ( $name_color || $name_size ) {
      $name_style = ( $name_color ) ? 'color:'. $name_color .';' : '';
      $name_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $prof_style = ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $prof_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
    }

    // Turn output buffer on
    ob_start();

    //team member profession
    $team_member_profession = $team_member_profession ? '<div class="member-designation" style="' . $prof_style . '">'. $team_member_profession .'</div>' : '';

    //team member link
    $team_member_link = $team_member_link ? $team_member_link : '#';

    //team member name
    $team_member_name = $team_member_name ? '<div class="member-name" style="' . $name_style . '"><a href="' . esc_url($team_member_link) . '">' . esc_attr($team_member_name) .'</a></div>' : '';
    //member image
    if($team_member_image){
        $image_url1 = wp_get_attachment_url( $team_member_image );
        $image_html1 = '<img src="'. esc_url($image_url1) .'" alt="'.esc_attr($image_url1).'">';
    }else{
        $image_html1 = '';
    }
    ?>
    <div class="member-list"> <!-- Team Starts -->
    <div class="member-picture"><?php echo $image_html1;?></div>
    <?php echo $team_member_name;?> <!-- member name -->
    <?php echo $team_member_profession;?> <!-- member designation -->
    </div> <!-- Team End -->
<?php
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'redl_team', 'redl_team_function' );