<?php
/**
 * Deprecated functions. Do not use these.
 */

if ( ! function_exists( 'order_featured_job_listing' ) ) :
/**
* Was used for sorting.
*
* @deprecated 1.22.4
* @param array $args
* @return array
*/
function order_featured_job_listing( $args ) {
	global $wpdb;
	$args['orderby'] = "$wpdb->posts.menu_order ASC, $wpdb->posts.post_date DESC";
	return $args;
}
endif;



if ( ! function_exists( 'the_job_type' ) ) :
/**
 * Displays the job type for the listing.
 *
 * @since 1.0.0
 * @deprecated 1.27.0 Use `wpjm_the_job_types()` instead.
 *
 * @param int|WP_Post $post
 * @return string
 */
function the_job_type( $post = null ) {
	_deprecated_function( __FUNCTION__, '1.27.0', 'wpjm_the_job_types' );

	if ( ! get_option( 'job_manager_enable_types' ) ) {
		return '';
	}
	if ( $job_type = get_the_job_type( $post ) ) {
		echo $job_type->name;
	}
}
endif;

if ( ! function_exists( 'get_the_job_type' ) ) :
/**
 * Gets the job type for the listing.
 *
 * @since 1.0.0
 * @deprecated 1.27.0 Use `wpjm_get_the_job_types()` instead.
 *
 * @param int|WP_Post $post (default: null)
 * @return string|bool|null
 */
function get_the_job_type( $post = null ) {
	_deprecated_function( __FUNCTION__, '1.27.0', 'wpjm_get_the_job_types' );

	$post = get_post( $post );
	if ( $post->post_type !== 'job_listing' ) {
		return;
	}

	$types = wp_get_post_terms( $post->ID, 'job_listing_type' );

	if ( $types ) {
		$type = current( $types );
	} else {
		$type = false;
	}

	return apply_filters( 'the_job_type', $type, $post );
}
endif;
