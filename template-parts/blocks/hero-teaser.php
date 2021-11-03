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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> fullwidth position-relative">
	<div class="grid-container fluid padding-top-6">
		<div class="grid-x grid-margin-x">
			<div class="cell medium-8 large-5">
				<div class="callout">
					<h2 class="h1">
						<?php the_field( 'description' ); ?>
					</h2>
				<?php
				if( get_field('objekt_wahlen') == 'produkt' ) { ?>
					<?php $selected_product = get_field( 'selected_product' ); ?>
					<?php if ( $selected_product ) : ?>
						<?php $post = $selected_product; ?>
						<?php setup_postdata( $post ); ?> 
						<a class="button" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>	
				<?php }
				?>
				<?php
				if( get_field('objekt_wahlen') == 'produkt-kategorie' ) { ?>
					<?php $ausgewahlte_produkt_kategorie = get_field( 'ausgewahlte_produkt_kategorie' ); ?>
					<?php $term = get_term_by( 'id', $ausgewahlte_produkt_kategorie, 'product_cat' ); ?>
					<?php if ( $term ) : ?>
						<a class="button" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
					<?php endif; ?>
				<?php }
				?>
				</div>
			</div>
		</div>
	</div>
	<?php $background_image = get_field( 'background_image' ); ?>
	<?php $size = 'full'; ?>
	<?php if ( $background_image ) : ?>
		<?php echo wp_get_attachment_image( $background_image, $size, false, ["class" => "hero-bg-image"] );?>
	<?php endif; ?>
	<a href="#scroll-anchor" class="button clear scroll-down icon-font h1" data-smooth-scroll data-offset="45">
		
	</a>
</div>
<div id="scroll-anchor">
</div>