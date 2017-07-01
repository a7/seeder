<?php

namespace A7\Seeder;

/**
 * Seeding controller
 * Allow custom activation of seeding by passing true to filter: \A7\Seeder\do_seed
 *
 * Adds button to activity box in dashboard for super admins
 */
add_action( 'admin_init', function() {

	// Only allow seeding for admins/super-admins
	if ( ! is_super_admin() ) {
		return;
	}

	$do_seed = apply_filters( __NAMESPACE__ . '\do_seed', false );

	if ( isset( $_GET['perform-seeding'] ) ) {
		$do_seed = true;
	}

	// By default we do not want to seed, so unless something's changed our filter, abort
	if ( true !== $do_seed ) {
		return;
	}

	$seeding_status = false;
	try {
		// Okey dokey, time for seeding!
		$seeding_status = do_seeding();
	} catch ( \Exception $e ) {
		error_log( "Seeding was attempted but failed. {$e->getMessage() }" );
	}

	display_seeding_status( $seeding_status );
} );