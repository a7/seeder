<?php

namespace A7\Seeder;

function get_settings_slug() {
	return 'seeder-settings';
}

function get_seeds() {
	return [
		[
			'key'         => 'seedtest',
			'button'      => 'Seed',
			'action'      => 'Action Name',
			'description' => 'Description',
			'last_run'    => time(),
			'user'        => 1,
		],
	];
}

function get_settings_fields() {
	return [
		'action-1' => [
			'label' => 'Action 1',
		],
		'action-2' => [
			'label' => 'Action 2',
		],
	];
}