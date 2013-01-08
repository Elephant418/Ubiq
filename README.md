Ubiq
======
Functions for readable treatment of string, array & object.

### License

Staq is under [MIT License](http://opensource.org/licenses/MIT).

### Community

Staq is created and maintained by [Thomas ZILLIOX](http://zilliox.me). <br>



Let's code
-------- 

### Without Ubiq 

```php
function get_namespace( $class ) {

	// Allow to pass object or class as parameter
	if ( is_object( $class ) ) {
		$class = get_class( $class );
	}

	// Allow to pass class with or without the first '\\'
	if ( substr( $class, 0, 1 ) != '\\' ) {
		$class = '\\' . $class;
	}

	// Remove the class name from the namespace
	return substr( $class, 0, strrpos( $class, '\\' ) );
}
```

### With Ubiq 

```php
function get_namespace( $class ) {
	\Util\Obj\must_be_class( $class );
	\Util\Str\must_starts_with( $class, '\\' );
	return \Util\Str\substr_before_last( $class, '\\' );
}
```

### Even better

```php
function get_namespace( $class ) {
	return \Util\Obj\get_namespace( $class );
}
```