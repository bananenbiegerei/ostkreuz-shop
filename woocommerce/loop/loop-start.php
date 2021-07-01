<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="filters grid-x grid-margin-x">
  <div class="cell">
    <select id="photographer" name="photographer">
      <?php $photographer = get_terms(array(
        'taxonomy' => 'photographer', 
      ));
      foreach ($photographer as $p) :?>
        <option value="<?php echo $p->slug; ?>"><?php echo $p->name; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<pre><?php // var_dump(get_taxonomies()); ?></pre>
<ul class="products grid-x grid-margin-x block-grid small-up-1 medium-up-3 large-up-4">
