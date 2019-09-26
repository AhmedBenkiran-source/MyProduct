<?php
/**
 * Template part for displaying posts.
 */
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];

$read_more_text = cs_get_option('read_more_text');
$read_text = $read_more_text ? $read_more_text : esc_html__( 'Continue Reading', 'redel' );
$post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$metas_hide = (array) cs_get_option( 'theme_metas_hide' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>

	<?php
	if ( 'gallery' == get_post_format() && ! empty( $post_type['gallery_post_format'] ) ) { ?>
		<div class="featured-image rounded-three evlt-theme-carousel"
		data-nav="true"
		data-autoplay="true"
		data-auto-height="true"
		data-dots="true">
			<?php
		  $ids = explode( ',', $post_type['gallery_post_format'] );
		  foreach ( $ids as $id ) {
		    $attachment = wp_get_attachment_image_src( $id, 'full' );
		    $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		    echo '<img src="'. $attachment[0] .'" alt="'. esc_attr($alt) .'" />';
		  }
			?>
		</div>
	<?php
	} elseif ($large_image) { ?>
	<div class="blog-picture">
        <a href="<?php echo esc_url($large_image); ?>">
		    <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        </a>
	</div>
	<?php } // Featured Image ?>

	<!-- Content -->
	    <!-- metas -->
		<?php echo redel_post_metas(); ?>
		<div class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></div>
			<p><?php
			the_excerpt();
			?></p>
			<div class="clearfix">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="redl-btn redl-btn-three redl-btn-medium">
				  <?php echo esc_attr($read_text); ?>
			  </a>
      </div>

	<!-- Content -->

  </div><!-- #post-## -->
