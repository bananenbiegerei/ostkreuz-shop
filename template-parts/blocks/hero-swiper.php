<?php
/**
 * Block template file: template-parts/blocks/hero-teaser.php
 *
 * Hero Teaser Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
global $post;
// Create id attribute allowing for custom "anchor" value.
$id = 'hero-teaser-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-hero-teaser';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> fullwidth">
	<?php if ( have_rows( 'slides' ) ) : ?>
	<div class="swiper-container hero-swiper">
		<div class="swiper-wrapper">
		<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
		<div class="swiper-slide">
			<div class="grid-container padding-top-4">
				<div class="grid-x grid-margin-x">
					<div class="cell medium-6">
						<h2 class="font-size-xlarge">
						<?php the_sub_field( 'description' ); ?>
						</h2>
					</div>
				</div>
			</div>
		
			<?php $selected_product = get_sub_field( 'selected_product' ); ?>
			<?php if ( $selected_product ) : ?>
				<?php $post = $selected_product; ?>
				<?php setup_postdata( $post ); ?> 
				<a class="button" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php $background_image = get_sub_field( 'background_image' ); ?>
			<?php $size = 'full'; ?>
			<?php if ( $background_image ) : ?>
				<?php echo wp_get_attachment_image( $background_image, $size, false, ["class" => "hero-bg-image"]  ); ?>
			<?php endif; ?>
			</div>
		<?php endwhile; ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		</div>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>
</div>