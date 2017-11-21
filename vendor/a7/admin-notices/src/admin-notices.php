<?php

namespace A7\Admin_Notices;

function admin_notices( $message = null, $type = null ) {
	static $notices;

	if ( null === $notices ) {
		$notices = [];
	}

	if ( empty( $message ) ) {
		return $notices;
	}

	$notices[] = [
		'message' => $message,
		'type'    => $type
	];

	return $notices;
}

function add_admin_notice( $notice, $type = 'info' ) {
	admin_notices( $notice, $type );
}

add_action( 'admin_notices', function () {

	$admin_notices = admin_notices();

	if ( empty( $admin_notices ) ) {
		return;
	}

	foreach ( $admin_notices as $notice ) {
		echo get_admin_notice_html( $notice['message'], $notice['type'] );
	}
} );

function get_admin_notice_html( $message, $type = 'info' ) {
	ob_start();

	?>
	<div class="notice notice-<?= esc_attr( $type ); ?> is-dismissible">
		<p><?php echo wp_kses_post( $message ); ?></p>
	</div>
	<?php

	return ob_get_clean();
}
