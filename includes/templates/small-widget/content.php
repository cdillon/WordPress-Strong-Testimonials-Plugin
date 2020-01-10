<?php
/**
 * Template Name: Widget
 * Description: The default widget template.
 * Force: view-layout-normal
 */
?>
<?php
do_action( 'wpmtst_before_view' ); 
$view = new Strong_View_Slideshow( $atts );
$continuous_slide = ($view->atts['slideshow_settings']['continuous_sliding'] == 1 ) ? 0 : 1;
?>

<div class="strong-view strong-widget <?php wpmtst_container_class(); ?>"<?php wpmtst_container_data(); ?>>
	<?php do_action( 'wpmtst_view_header' ); ?>

	<div class="strong-content <?php wpmtst_content_class(); ?>">

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="<?php wpmtst_post_class(); ?>">

			<div class="testimonial-inner">
				<?php do_action( 'wpmtst_before_testimonial' ); ?>

				<?php wpmtst_the_title( '<h5 class="testimonial-heading">', '</h5>' ); ?>

				<div data-infinite-loop=<?php echo esc_attr($continuous_slide); ?>  class="testimonial-content">
					<div class="maybe-clear"></div>
					<?php wpmtst_the_content(); ?>
					<?php do_action( 'wpmtst_after_testimonial_content' ); ?>
				</div>

				<?php wpmtst_the_client(); ?>

				<div class="clear"></div>

				<?php do_action( 'wpmtst_after_testimonial' ); ?>
			</div>

		</div>
		<?php endwhile; ?>

		<?php do_action( 'wpmtst_after_content' ); ?>
	</div>

	<?php do_action( 'wpmtst_view_footer' ); ?>
</div>

<?php do_action( 'wpmtst_after_view' ); ?>
