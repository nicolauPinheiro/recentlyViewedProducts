<?php
/**
 * Plugin Name: recently Viewed Products
 * Author:      Nicolau Pinheiro
 * Author URI:  https://facebook.com/nicolaupinheiro.58
 * License:     GPLv2 or later
 */


/*
recentlyViewedProducts is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

recentlyViewedProducts is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/


if( ! defined ( 'ABSPATH' ) ){
	die;
}

function rvp_cookie_products(){
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array();
	$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

	if ( empty( $viewed_products ) ) return;
	$product_ids = implode( ",", $viewed_products );

	echo $product_ids;

}

function rvs_products_recents(){
	add_shortcode('nicolauplugin', rvp_cookie_products);
}


register_activation_hook(__FILE__, 'rvp_products_recents');

