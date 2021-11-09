<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<article id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<header class="product-header page-title-container">
		<h1 class="product-header__title"><?php the_title(); ?></h1>
		<div class="product-header__photographers">
			<?php $photographers = get_the_terms(get_the_id(), 'photographer');
			if (!empty($photographers)) :
		    $photographers = array_map(function($p) {
			return '<a href="' . get_term_link($p->term_id) . '">' . $p->name . '</a>';
		    },$photographers);
		    $photographers = implode(', ', $photographers);
	  		?>
			<p class="lead margin-bottom-0"> von <?php echo $photographers; ?></p>
			<?php endif; ?>
		</div>
		<div class="product-header__series">
			<?php $series = get_the_terms(get_the_id(), 'serie');
			if (!empty($series)) :
			$series = array_map(function($p) {
			return $p->name;
			},$series);
			$series = implode(', ', $series);
			  ?>
			<p class="lead margin-bottom-0"> aus der Serie <?php echo $series; ?></p>
			<?php endif; ?>
		</div>
	</header>
	
	<div class="swiper single-product-swiper margin-top-4 margin-bottom-4">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<?php
			  $attachment_ids = $product->get_gallery_image_ids(); ?>
			<div <?php wc_product_class( 'swiper-slide', $product ); ?>">
				<?php the_post_thumbnail('eight-columns', array('class' => 'product-image')); ?>
			</div>
			<?php foreach( $attachment_ids as $attachment_id ) { ?>
			<div <?php wc_product_class( 'swiper-slide', $product ); ?>>
				<?php echo wp_get_attachment_image( $attachment_id, 'eight-columns', false, ["class" => "product-image"] ); ?>
			</div>
			<?php }
			  ?>
		</div>

		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

	</div>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	<hr>

  <div class="grid-x grid-margin-x padding-vertical-1">
    <div class="cell medium-7 lead">
      <?php the_content(); ?>
    </div>

    <div class="cell medium-5">
      <ul class="tabs" data-responsive-accordion-tabs="accordion large-tabs" id="product-tabs">
        <li class="tabs-title is-active">
					<a data-tabs-target="tab-product-info" href="#tab-product-info" aria-selected="true">Produkt Info</a>
				</li>
        <li class="tabs-title">
					<a data-tabs-target="tab-shipping-info" href="#tab-shipping-info">Versand</a>
				</li>
      </ul>
      
      <div class="tabs-content" data-tabs-content="product-tabs">
        <div class="tabs-panel is-active" id="tab-product-info">
          <?php
            $attributes = $product->get_attributes();
						// var_dump($attributes);

						$filtered_attributes = array();

						if (array_key_exists('pa_breite', $attributes) && array_key_exists('pa_hoehe', $attributes) ) {
							$filtered_attributes['dimensions']['name'] = 'Maße';
							$filtered_attributes['dimensions']['value'] = get_term($attributes['pa_breite']['options'][0])->name . ' x ' . get_term($attributes['pa_hoehe']['options'][0])->name;
							unset($attributes['pa_breite']);
							unset($attributes['pa_hoehe']);
						}

						// if (array_key_exists('pa_signatur', $attributes)) {
						// 	$terms = $attributes['pa_signatur']['options'];
						// 	$terms = array_map(function($t) {
						// 		return get_term($t)->name;
						// 	}, $terms);
						// 	$filtered_attributes['signed'] = implode(', ', $terms);
						// 	unset($attributes['pa_signatur']);
						// }

						// if (array_key_exists('pa_papierformat', $attributes)) {
						// 	$terms = $attributes['pa_papierformat']['options'];
						// 	$terms = array_map(function($t) {
						// 		return get_term($t)->name;
						// 	}, $terms);
						// 	$filtered_attributes['paper'] = implode(', ', $terms);
						// 	unset($attributes['pa_papierformat']);
						// }

						foreach($filtered_attributes as $key => $attr) {
							echo '<div>' . $attr['name'] . ': ' . $attr['value'] . '</div>';
						}

            foreach ($attributes as $key => $attr) {
              if (!is_wp_error($attr)) {
                $data = $attr->get_data();
                $options = $data['options'];
								$options = array_map(function($t) {
										if (is_int($t)) {
											return get_term($t)->name;
										} else if (is_string($t)) {
											return $t;
										}
								}, $options);
								$options = implode(', ', $options);
								$name = $data['name'];
								if (strpos($name, 'pa_') !== false)
									$name = ucwords(substr($name, 3));

                echo '<div>' . $name . ': ' . $options . '</div>';
              }
            }
          ?>
        </div>
        <div class="tabs-panel" id="tab-shipping-info">Shipppping IIIIIIIINFOOOOO – kommt noch!</div>
      </div>
    </div>
  </div>
  <hr class="margin-top-4 margin-bottom-4">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
  remove_action('woocommerce_after_single_product_summary', 'woocommmerce_output_product_data_tabs', 10);
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</article>

<?php do_action( 'woocommerce_after_single_product' ); ?>
