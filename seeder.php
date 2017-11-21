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

use function A7\autoload;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cannot access pages directly.' );
}

// If used in multiple places, only load once
if ( function_exists( '\A7\Seeder\do_seeding' ) ) {
	return;
}

/**
 * Load all the composer packages
 */
require_once __DIR__ . '/vendor/autoload.php';

autoload( __DIR__ . '/src' );