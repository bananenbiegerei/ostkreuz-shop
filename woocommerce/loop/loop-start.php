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
<form
  class="filters grid-x grid-margin-x margin-bottom-2"
  action=""
  method="get"
  data-controller="form"
  data-action="
    change->form#submit
    //input:change->form#submit
    rangeslider:change->form#submit"
>
  <div class="cell medium-3">

    <select
      id="photographer"
      name="photographer"
      data-controller="select"
      data-action="select#change">
        <option value="">All</option>
        <?php $photographer = get_terms(array(
          'taxonomy' => 'photographer', 
        ));
        foreach ($photographer as $p) :?>
          <option value="<?php echo $p->slug; ?>"><?php echo $p->name; ?></option>
        <?php endforeach; ?>
    </select>
  </div>

  <div class="cell medium-3">
    <div
    class="rangeslider"
    data-controller="rangeslider"
    data-rangeslider-id-value="price"
    data-rangeslider-name-value="Preis"
    data-rangeslider-start-value="[0, 5000]"
    data-rangeslider-step-value="50"
    data-rangeslider-rangemin-value="0"
    data-rangeslider-rangemax-value="5000"
    data-action="
    active-filter:deactivate@window->rangeslider#handleDeactivate
    input-group:usable@window->rangeslider#checkDisabled">
      <div>
      <span>Price: </span>
      <input
      class="rangeslider__display"
      type="text"
      name="price_lower"
      id="price_lower"
      size="3"
      data-rangeslider-target="display">

      <span>-</span>

      <input
      class="rangeslider__display"
      type="text"
      name="price_upper"
      id="price_upper"
      size="3"
      data-rangeslider-target="display">

      <span>€</span>

      </div>
      <div
      class="rangeslider__slider"
      data-rangeslider-target="slider" ></div>
    </div>
  </div>
  
  <div class="cell">
    <input type="submit" value="go" data-form-target="submit">
  </div>
</form>
<turbo-frame id="products" target="_top">
  <div class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell medium-12">
        <ul class="products">

