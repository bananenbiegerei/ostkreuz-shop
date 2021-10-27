<?php
/**
 * Block template file: template-parts/blocks/anchor-top.php
 *
 * Anchor Top Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'anchor-top-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-anchor-top';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#'. $id;

	?> {
		/* Add styles that use ACF values here */
	}
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	
	<?php $link = get_field( 'link' ); ?>
	<?php if ( $link ) : ?>
	<hr>
	<div class="grid-container fluid">
		<div class="grid-x grid-margin-x">
			<div class="auto cell">
				<a class="button small clear" href="#top" data-smooth-scroll>Top</a>
			</div>
			<div class="shrink cell">
				<a class="button small clear" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php $category = get_field( 'category' ); ?>
	<?php if ( $category ) : ?>
	<?php $get_terms_args = array(
			'taxonomy' => 'product_cat',
			'hide_empty' => 0,
			'include' => $category,
		); ?>
	<?php $terms = get_terms( $get_terms_args ); ?>
	<?php if ( $terms ) : ?>
	<hr>
	<div class="grid-container fluid">
		<div class="grid-x grid-margin-x">
			<div class="auto cell">
				<a class="button small clear" href="#top" data-smooth-scroll>Top</a>
			</div>
			<div class="shrink cell">
				<?php foreach ( $terms as $term ) : ?>
				<a class="button small clear" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endif; ?>
</div>