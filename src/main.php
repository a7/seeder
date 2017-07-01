<?php

namespace A7\Seeder;

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
				<p>Seeding actions initiated.</p>
			</div>
			<?php
		} );
	}
}