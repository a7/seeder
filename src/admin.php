<?php

namespace A7\Seeder;

add_action( 'admin_menu', function () {
	add_submenu_page(
		'tools.php',
		'Seeder',
		'Seeder',
		'manage_options',
		'seeder',
		__NAMESPACE__ . '\configuration'
	);
} );

function configuration() {
	?>
	<div class="wrap">
		<h1>Seeder</h1>
		<p>
			Perform heavy and/or infrequent actions in a controlled manner
		</p>

		<table class="wp-list-table widefat fixed striped posts">
			<thead>
			<tr>
				<th scope="col" style="width:13%">
					Initiate
				</th>
				<th scope="col" id="action" class="manage-column column-title column-primary">
					Action
				</th>
				<th scope="col" id="description" class="manage-column column-description" style="width: 50%">
					Description
				</th>
				<th scope="col" id="date" class="manage-column column-date">
					Last run
				</th>
			</tr>
			</thead>

			<tbody id="the-list">
			<tr>
				<td>
					<a class="button button-primary" href="#">Seed<a/>
				</td>
				<td>
					<div class="row-title"><strong>Dummy Content</strong>
				</td>

				<td>
					Initiate data population with mock content and posts.
				</td>

				<td class="date column-date">
					<abbr title="2017/01/12 8:29:32 pm">2017/01/12</abbr>
				</td>
			</tr>

			</tbody>


		</table>

	</div>

	<?php
}