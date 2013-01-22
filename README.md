Ubiq [![Build Status](https://secure.travis-ci.org/Pixel418/Ubiq.png)](http://travis-ci.org/Pixel418/Ubiq)
======

Functions for readable treatment of string, array & object. There

1. [Let's code](#lets-code)    
1.1 [Readable](#readable)  
1.2 [Adaptive](#adaptive)  
2.3 [Normalized](#normalized)
2. [Documentation](https://github.com/Pixel418/Ubiq/blob/master/doc/index.md#readme)  
2.1 [String manipulation](https://github.com/Pixel418/Ubiq/blob/master/doc/index.md#string)  
2.2 [Array manipulation](https://github.com/Pixel418/Ubiq/blob/master/doc/index.md#array)  
2.3 [Object manipulation](https://github.com/Pixel418/Ubiq/blob/master/doc/index.md#object)
3. [How to Install](#how-to-install)
4. [How to Contribute](#how-to-contribute)
5. [Author & Community](#author--community)



Let's code
-------- 

### Readable

With Ubiq, your string treatments are fully readable.

```php
$string = 'example.com/my/path';
\UString::substr_before( $string, '/' );
// Returns 'example.com'
// Instead of usual implementation: substr( $string, 0, strpos( $string, '/' ) );
```

[&uarr; top](#readme)



### Adaptive

The Ubiq tries to be kind and let you use it in different ways.

```php
$string = 'example.com/my/path';
\UString::substr_before( $string, '/' );
// Returns 'example.com'
```

```php
\UString::substr_before( $string, [ '/', '.' ] );
// Returns 'example'
```

```php
\UString::substr_before_last( $string, [ '/', '.' ] );
// Returns 'example.com/my'
```

[&uarr; top](#readme)



### Normalized

Ubiq has consistent api and normalized.

```php
$string = 'my/path';
\UString::start_with( $string, '/' );
// Returns '/my/path'
```

```php
// Prefix by 'is' to test
\UString::is_start_with( $string, '/' );
// Returns FALSE
```

```php
// Prefix by 'do' to treat by reference
\UString::do_start_with( $string, '/' );
// $string value is now '/my/path'
```

[&uarr; top](#readme)



How to Install
--------

If you don't have composer, you have to [install it](http://getcomposer.org/doc/01-basic-usage.md#installation).

Add or complete the composer.json file at the root of your repository, like this :

```json
{
    "require": {
        "pixel418/ubiq": "0.3.3"
    }
}
```

Ubiq can now be [downloaded via composer](http://getcomposer.org/doc/01-basic-usage.md#installing-dependencies).

To use it, you just have to load the composer autoloader :

```php
require_once( './vendor/autoload.php' );
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
