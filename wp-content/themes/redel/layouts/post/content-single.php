<?php
/**
 * Single Post.
 */
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];

$post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );

// Single Theme Option
$single_featured_image = cs_get_option('single_featured_image');
$single_author_info = cs_get_option('single_author_info');
$single_share_option = cs_get_option('single_share_option');
?>

<?php
if ($single_featured_image) {
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
<?php } // Featured Image
}
?>
    <!-- metas -->
    <?php echo redel_post_metas(); ?>
	<!-- Title and Content -->

		<div class="blog-title"><?php echo esc_attr(get_the_title()); ?></div>

		<?php
		the_content();
		echo redel_wp_link_pages();
		?>

	<!-- end Title and Content -->

	<!-- Tags and Share -->
	<div class="bp-bottom-meta">
        <?php
        $tag_list = get_the_tags();
      if($tag_list) { ?>
        <div class="bp-tags">
            <?php echo the_tags( '<ul><li><span>Tags:</span></li><li>', '</li><li>', '</li></ul>' ); ?>
        </div>
        <?php } ?>
		<div class="bp-share">
			<?php
			if($single_share_option) {
				echo redel_wp_share_option();
			}
			?>
		</div>

	</div>
	<!-- end Tags and Share -->

	<!-- Author Info -->
	<?php
	if($single_author_info) {
		echo redel_author_info();
	}
	?>
	<!-- Author Info -->

