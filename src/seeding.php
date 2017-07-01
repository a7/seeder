<?php

namespace A7\Seeder;

/**
 * Provide a proper action hook to latch onto for seeding actions
 *
 * @uses \A7\Seeder\doing_seed
 * @return bool
 * @throws \Exception
 */
function do_seeding( $action ) {

	$user_id = get_current_user_id();

	if ( empty( $user_id ) ) {
		throw new \Exception( "Unable to retrieve user. {$user_id}" );
	}

	if ( ! is_super_admin( $user_id ) ) {
		throw new \Exception( "Non-super admin attempted to seed. {$user_id}" );
	}

	if ( ! current_user_can( 'manage_options' ) ) {
		throw new \Exception( 'You do not have access to initiate this action' );
	}

	// This is the main action to tie into to perform seed actions
	do_action( __NAMESPACE__ . '\doing_seed' );

	return true;
}