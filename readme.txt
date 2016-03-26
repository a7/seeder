=== Seeder ===
Contributors: aaronholbrook, joshlevinson
Tags: seed, infrequent actions, administrator
Requires at least: 3.3
Tested up to: 4.4.2
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Perform heavy / infrequent actions in a controlled manner.

== Description ==

It’s nice to pre-populate terms, content or have the ability to only OCCASIONALLY run actions.

In the past, I’ve had to manually use special $_GET variables.

Not any more! This plugin provides a simple interface for admins/super admins to fire a special hook. You can easily hook onto that action in order to perform your infrequent or expensive logic.

This could be anything such as pre-filling content, auto-creating terms, updating the database in a certain manner, talking to or updating an API, etc.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Define functions that are hooked to: `AaronHolbrook\Seeder\doing_seed` that you would like to only run when you press the magic 'Do Seeding' button

== Frequently Asked Questions ==

= I installed the plugin but nothing happens =

That's because this function is more of a power user plugin. This plugin gives developers a way to infrequently perform actions. If you are unfamiliar with the WordPress action hook system, this plugin is probably not for you.

== Screenshots ==

1. Seeding button is placed in the 'At a Glance' dashboard meta box.

== Changelog ==

= 1.0 =
* Initial release