<?php
/**
 * get category id from acf field
 * and query products with category id
 */
$cat = get_field('product_category');
if ($cat) {
  $products = new WP_Query(array(
    'post_type' => 'product',
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => $cat->term_id,
      ),
    ),
  ));
}
?>

<section class="products-slider">
  <div class="grid-container">
    <p class="h1 text-center"><?php echo $cat->name; ?></p>
    <?php if (!empty($products) && $products->have_posts()) : ?>
      <div class="swiper-container" data-controller="swiper">
        <div class="swiper-wrapper">
        <?php while ($products->have_posts()) : $products->the_post();?>
          <div class="swiper-slide">
            <?php get_template_part('woocommerce/content', 'product'); ?>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
