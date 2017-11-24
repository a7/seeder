<?php

namespace A7\Seeder;

function seeds( $seed = null ) {
	static $seeds;

	if ( null === $seeds ) {
		$seeds = [];
	}

	if ( empty( $seed ) ) {
		return $seeds;
	}
	
	$key = sanitize_title( $seed['name'] );

	if ( ! in_array( $key, $seeds ) ) {
		$seeds[ $key ] = $seed;
	}

	return $seeds;
}

function add_seed( $seed ) {
	seeds( $seed );
}

function get_seeds() {
	return seeds();
}

function get_seed_by_key( $key ) {
	$seeds = get_seeds();

	if ( empty( $seeds[ $key ] ) ) {
		return false;
	}

	return $seeds[ $key ];
}

function get_seed_url( $seed ) {

	$url = get_admin_url();

	$url = add_query_arg( 'perform-seeding', $seed['key'], $url );

	return $url;
}