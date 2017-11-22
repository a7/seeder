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

/**
 *
 */
function configuration() {

	$seeds = get_seeds();

	?>
	<style>
		#seed-list td {
			vertical-align: bottom;
		}
	</style>
	<div class="wrap">
		<h1>Seeder</h1>
		<p>
			Perform heavy and/or infrequent actions in a controlled manner
		</p>

		<table class="wp-list-table widefat fixed striped posts">
			<thead>
				<tr>
					<th scope="col" id="name" class="manage-column column-title column-primary">
						Seed
					</th>
					<th scope="col" id="action-hook" class="manage-column">
						Function
					</th>
					<th scope="col" id="description" class="manage-column column-description" style="width: 40%">
						Description
					</th>
				</tr>
			</thead>

			<tbody id="seed-list">
				<?php
				foreach ( $seeds as $seed ) : ?>
					<tr>
						<td>
							<div class="row-title">
								<form action="" method="POST">
									<input type="hidden" name="seed_key" value="<?= esc_attr( $seed['key'] ); ?>">
									<?php
									wp_nonce_field( 'seeder_' . $seed['key'] );

									submit_button( $seed['name'], 'primary', 'submit', false ); ?>
								</form>
							</div>
						</td>

						<td>
							<div class="row-action-hook" style="margin-top: .4rem;">
								<code><?= esc_html( $seed['callback'] ); ?></code>
							</div>
						</td>

						<td>
							<?= esc_html( $seed['description'] ); ?>
						</td>
					</tr>
					<?php
				endforeach; ?>
			</tbody>
		</table>

	</div>

	<?php
}
