Ubiq [![Build Status](https://secure.travis-ci.org/Pixel418/Ubiq.png)](http://travis-ci.org/Pixel418/Ubiq)
======

Functions for readable treatment of string, array & object.

1. [Documentation](https://github.com/Pixel418/Ubiq/blob/master/doc/index.md#readme)
2. [Let's code](#lets-code)
3. [How to Install](#how-to-install)
4. [How to Contribute](#how-to-contribute)
5. [Author & Community](#author--community)



Let's code
-------- 

### An example without Ubiq 

```php
function get_namespace( $class ) {

	// Allow to pass an object or a class as parameter
	if ( is_object( $class ) ) {
		$class = get_class( $class );
	}

	// Allow to pass a class with or without the first '\'
	if ( substr( $class, 0, 1 ) == '\\' ) {
		$class = substr( $class, 1 );
	}

	// Remove the class name from the namespace
	return substr( $class, 0, strrpos( $class, '\\' ) );
}
```

### The same example with Ubiq 

```php
function get_namespace( $class ) {
	\UObject\do_convert_to_class( $class );
	return \UString\substr_before_last( $class, '\\' );
}
```

### Or even better

```php
function get_namespace( $class ) {
	return \UObject\get_namespace( $class );
}
```

[&uarr; top](#readme)



How to Install
--------

If you don't have composer, you have to [install it](http://getcomposer.org/doc/01-basic-usage.md#installation).

Add or complete the composer.json file at the root of your repository, like this :

```json
{
    "require": {
        "pixel418/ubiq": "0.1.5"
    }
}
```

Ubiq can now be [downloaded via composer](http://getcomposer.org/doc/01-basic-usage.md#installing-dependencies).

The last step is to include Ubiq in your PHP file :

```php
require_once( './vendor/pixel418/ubiq/ubiq/Ubiq.php' );
```

[&uarr; top](#readme)



How to Contribute
--------

1. Fork the Ubiq repository
2. Create a new branch for each feature or improvement
3. Send a pull request from each feature branch to the **develop** branch

If you don't know much about pull request, you can read [the Github article](https://help.github.com/articles/using-pull-requests).

All pull requests must follow this particular [style guide](https://github.com/Pixel418/Style_Guide) and accompanied by passing [phpunit](https://github.com/sebastianbergmann/phpunit/) tests.

[&uarr; top](#readme)



Author & Community
--------

Ubiq is under the [MIT License](http://opensource.org/licenses/MIT).  
It is created and maintained by [Thomas ZILLIOX](http://zilliox.me).

[&uarr; top](#readme)
