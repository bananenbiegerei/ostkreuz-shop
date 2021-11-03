<?php
add_filter( 'query_vars', function( $vars ) {
    $vars[] = 'phgr';
    $vars[] = 'price_upper';
    $vars[] = 'price_lower';
    return $vars;
});

add_filter( 'pre_get_posts', function( $query ) {
    if ( $query->is_main_query() && !is_admin() && (is_post_type_archive('product') || is_tax()) ) {
        $query->set( 'orderby', 'rand' );
    }

    if ( $query->is_main_query() && is_post_type_archive( 'product' ) ) {
        //$query->set( 'posts_per_page', 2 );

        $tax_query = array(
            'relation' => 'AND'
        );

        $meta_query = array(
            'relation' => 'AND'
        );

        /*
        $photographers = get_query_var( 'phgr' ); 
        if ( !empty( $photographers ) ) {
          $tax_query['photographer'] = array(
            'relation' => 'OR',
          );

          $tax_query['photographer'][] = array(
            'taxonomy' => 'photographer',
            'field' => 'slug',
            'terms' => array($photographers),
            'operator' => 'IN'
          );
        }
        */

        /*
         * URL expected in wp friendly format: 
         * ?price[]=50&price[]=100
         * must be in ascending order
         */
        /*
        $price = get_query_var('price');
        if (!empty($price) && is_array($price)) {
          $meta_query['price'] = array(
            'key' => '_price',
            'value' => $price,
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC',
          );
        }
        */

        $price_lower = get_query_var( 'price_lower' );
        $price_upper = get_query_var( 'price_upper' );
        if ( !empty( $price_lower ) && !empty( $price_upper ) ) {
          $meta_query['price'] = array(
              'key' => '_price',
              'value' => [$price_lower, $price_upper],
              'compare' => 'BETWEEN',
              'type' => 'NUMERIC',
          );
        }


        $query->set( 'tax_query', $tax_query);
        $query->set( 'meta_query', $meta_query);
    }
});
