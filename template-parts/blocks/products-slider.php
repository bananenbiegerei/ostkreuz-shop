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
<section class="products-slider margin-top-6 margin-bottom-6 fullwidth">
  <div class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell medium-12">
        <h2 class="h1 text-center"><?php echo $cat->name; ?></h2>
      </div>
    </div>
  </div>
  <div class="swiper product-swiper padding-2">
    <div class="swiper-wrapper">
      <?php if (!empty($products) && $products->have_posts()) : ?>
      <?php while ($products->have_posts()) : $products->the_post();?>
      <div class="swiper-slide">
        <?php get_template_part('woocommerce/content', 'product'); ?>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="grid-container">
    <div class="grid-x grid-margin-x align-center">
      <div class="cell medium-8 text-center">
        <div class="lead"><?php echo term_description($cat->term_id); ?></div>
        <a class="button" href="<?php echo get_term_link($cat->term_id); ?>">Alle <?php echo $cat->name; ?></a>
      </div>
    </div>
  </div>
</section>