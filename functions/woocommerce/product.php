<?php
/* Single Product */
/* remove_action('woocommerce_before_single_product','woocommerce_output_all_notices',10); */
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);

/* remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10); */

//add_action('data_test', 'wc_display_product_attributes', 10);
