Ubiq [![Build Status](https://secure.travis-ci.org/Pixel418/Ubiq.png)](http://travis-ci.org/Pixel418/Ubiq)
======

Functions for readable treatment of string, array & object: [see the documentation](https://github.com/Pixel418/Ubiq/blob/master/doc/index.md#readme)



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
	if ( substr( $class, 0, 1 ) != '\\' ) {
		$class = '\\' . $class;
	}

	// Remove the class name from the namespace
	return substr( $class, 0, strrpos( $class, '\\' ) );
}
```

### The same example with Ubiq 

```php
function get_namespace( $class ) {
	\UObject\must_be_class( $class );
	return \UString\substr_before_last( $class, '\\' );
}
```

### Or even better

```php
function get_namespace( $class ) {
	return \UObject\get_namespace( $class );
}
```



License
--------

Ubiq is under [MIT License](http://opensource.org/licenses/MIT).



Community
--------

Ubiq is created and maintained by [Thomas ZILLIOX](http://zilliox.me). <br>

### How to Contribute

1. Fork the Ubiq repository
2. Create a new branch for each feature or improvement
3. Send a pull request from each feature branch to the **develop** branch

If you don't know much about pull request, please read [the Github article](https://help.github.com/articles/using-pull-requests).

All pull requests must follow this particular [style guide](https://github.com/Pixel418/Ubiq/blob/master/doc/Style_Guide.md) and accompanied by passing [phpunit](https://github.com/sebastianbergmann/phpunit/) tests.