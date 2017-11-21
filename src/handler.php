<?php

namespace A7\Seeder;

/**
 * Seeding controller
 * Allow custom activation of seeding by passing true to filter: \A7\Seeder\do_seed
 *
 * Adds button to activity box in dashboard for super admins
 */

use function \A7\Admin_Notices\add_admin_notice;

add_action( 'admin_init', function() {

	// Only allow seeding for admins/super-admins
	if ( ! is_super_admin() ) {
		return;
	}

	if ( empty( $_POST['seed_key'] ) ) {
		return;
	}

	if ( true !== boolval( $_POST['seed_key'] ) ) {
		return;
	}

	try {
		// Perform nonce authentication
		if ( ! check_admin_referer( 'seeder_' . $_POST['seed_key'] ) ) {
			throw new \Exception( 'Invalid nonce' );
		}

		// Okey dokey, time for seeding!
		ob_start();

		do_seed( sanitize_title( $_POST['seed_key'] ) );

		$output = ob_get_clean();

		add_admin_notice( $output, 'success' );
	} catch ( \Exception $e ) {

		error_log( "Seeding was attempted but failed. {$e->getMessage() }" );
		add_admin_notice( $e->getMessage(), 'error' );
	}
} );

function do_seed( $seed_key ) {
	$seed = get_seed_by_key( $seed_key );

	if ( empty( $seed['callback'] ) ) {
		throw new \Exception( 'Invalid callback.' );
	}

	if ( ! is_callable( $seed['callback'] ) ) {
		throw new \Exception( 'Invalid callback.' );
	}

	call_user_func( $seed['callback'] );
}