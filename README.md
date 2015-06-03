# Seeder

## Purpose
Perform heavy and/or infrequent actions in a controlled manner.

## Usage
Initialize seeding by clicking the **Do Seed** button that is visible only to admins/super admins in the activity box in the WP Admin Dashboard

![button for easy initialization!](/screenshots/do-seeding-button.png?raw=true "button for easy seeding")

Use the `\AaronHolbrook\Seeder\doing_seed` action hook to perform logic that you want to manually activate.

This could be anything such as pre-filling content, auto-creating terms, updating the database in a certain manner, talking to or updating an API, etc.

## Credit
Special thanks to [@joshlevinson](https://github.com/joshlevinson) for pioneering the first version of this plugin and for coining the term of `seeding`.
