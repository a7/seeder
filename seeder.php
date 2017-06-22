<?php
/**
 * Plugin Name: Seeder
 * Description: Perform heavy / infrequent actions in a controlled manner
 * Version:     2.0.0
 * Author:      Aaron Holbrook, Josh Levinson
 * Author URI:  http://aaronjholbrook.com
 * License:     GPLv2
 */

namespace A7\Seeder;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cannot access pages directly.' );
}

// If used in multiple places, only load once
if ( defined( 'A7_SEEDER_VERSION' ) ) {
	return;
}

require_once __DIR__ . '/src/main.php';