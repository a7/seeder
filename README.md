# Seeder

## Purpose
Perform heavy / infrequent actions in a controlled manner.

## Usage
Use the `A7\Seeder\add_seed` function to register the seed. 

```php
\A7\Seeder\add_seed( [
	'name'        => 'User Roles',
	'description' => 'Build user roles',
	'callback'    => 'Dev\user_roles',
] );
```

This registers the seed with the callback of `Dev\user_roles`. Create a function with that name (in the appropriate namespace) and this will be the function that runs when you initiate the seed.

You can also just create a closure right there:

```php
\A7\Seeder\add_seed( [
	'name'        => 'User Roles',
	'description' => 'Build user roles',
	'callback'    => function() {
		// .. do some logic ..
		
		echo 'Status of logic';
	},
] );
```

```php

namespace Dev;

function user_roles() {
    // .. do some logic ..
    
    echo 'Status of the logic...';
}
```

Go to Tools -> Seeder and click the corresponding seed button to initialize the callback that you registered.

This could be anything such as pre-filling content, auto-creating terms, updating the database in a certain manner, talking to or updating an API, etc.

Anything output during the seed callback will get output in an admin notice.

![](http://d.pr/i/KLuOtC/1LEWHDiY+)
