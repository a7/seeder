<?php
/**
 * Plugin Name: Seeder
 * Description: Perform heavy / infrequent actions in a controlled manner
 * Version:     1.0
 * Author:      Aaron Holbrook, Josh Levinson
 * Author URI:  http://aaronjholbrook
 * License:     GPLv2
 */

namespace AaronHolbrook\Seeder;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cannot access pages directly.' );
}

// If used in multiple places, only load once
if ( ! defined( 'AH_SEEDER_VERSION' ) ) {

	define( 'AH_SEEDER_VERSION', '0.1.0' );
	/**
	 * Seeding controller
	 * Allow custom activation of seeding by passing true to filter: \AaronHolbrook\Seeder\do_seed
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

	/**
	 * Add our seeding button to the activity box
	 */
	add_action( 'activity_box_end', function() {

		// Add to the super admin's dashboard
		if ( ! is_super_admin() ) {
			return;
		}

		printf( '<p><a class="button button-primary" href="%s">Do Seeding<a/></p>',
			esc_url( admin_url( '?perform-seeding=1' ) )
		);
	} );

	/**
	 * Shows status of seed actions
	 *
	 * @param $status
	 */
	function display_seeding_status( $status ) {
		if ( true === $status ) {
			add_action( 'admin_notices', function() {
				?>
				<div class="updated">
					<p>Performed seeding actions!</p>
				</div>
			<?php
			} );
		}
	}

	/**
	 * Provide a proper action hook to latch onto for seeding actions
	 *
	 * @uses \AaronHolbrook\Seeder\doing_seed
	 * @return bool
	 * @throws \Exception
	 */
	function do_seeding() {

		$user_id = get_current_user_id();

		if ( empty( $user_id ) ) {
			throw new \Exception( "Unable to retrieve user. {$user_id}" );
		}

		if ( ! is_super_admin( $user_id ) ) {
			throw new \Exception( "Non-super admin attempted to seed. {$user_id}" );
		}

		// This is the main action to tie into to perform seed actions
		do_action( __NAMESPACE__ . '\doing_seed' );

		return true;
	}
}