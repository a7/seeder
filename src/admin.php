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

	$seeds = [
		[
			'button'      => 'Seed',
			'action'      => 'Action Name',
			'description' => 'Description',
			'last_run'    => time(),
			'user'        => 1,
		],
	];

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
					Last Run
				</th>
				<th scope="col" id="user" class="manage-column column-user">
					Initiated By
				</th>
			</tr>
			</thead>

			<tbody id="the-list">
				<?php
				foreach ( $seeds as $seed ) : ?>
					<tr>
						<td>
							<a class="button button-primary" href="#"><?= esc_html( $seed['button'] ); ?></a>
						</td>
						<td>
							<div class="row-title">
								<strong><?= esc_html( $seed['action'] ); ?></strong>
							</div>
						</td>

						<td>
							<?= esc_html( $seed['description'] ); ?>
						</td>

						<td class="date column-date">
							<abbr title="<?= esc_attr( date( 'Y/m/d g:i:s a', $seed['last_run'] ) ); ?>">
								<?= esc_html( date( 'Y/m/d', $seed['last_run'] ) ); ?>
							</abbr>
						</td>

						<td class="user column-user">
							<?php
							$user = get_user_by( 'id', $seed['user'] );

							if ( empty( $user->data->display_name ) ) {
								$user_name = '--';
							} else {
								$user_name = $user->data->display_name;
							}

							echo esc_html( $user_name ); ?>
						</td>
					</tr>
					<?php
				endforeach; ?>


			</tbody>


		</table>

	</div>

	<?php
}