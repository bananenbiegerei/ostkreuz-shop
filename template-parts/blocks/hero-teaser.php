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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="grid-container padding-top-2">
		<div class="grid-x grid-margin-x">
			<div class="cell medium-6">
				<h2 class="font-size-xlarge">
					<?php the_field( 'description' ); ?>
				</h2>
				<?php $selected_product = get_field( 'selected_product' ); ?>
				<?php if ( $selected_product ) : ?>
					<?php $post = $selected_product; ?>
					<?php setup_postdata( $post ); ?> 
					<a class="button" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>		
			</div>
		</div>
	</div>
	<?php $background_image = get_field( 'background_image' ); ?>
	<?php $size = 'full'; ?>
	<?php if ( $background_image ) : ?>
		<?php echo wp_get_attachment_image( $background_image, $size, false, ["class" => "hero-bg-image"] );?>
	<?php endif; ?>
</div>