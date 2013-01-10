[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / must_be_class
======


Description
-------- 

```php
void \UObject\must_be_class( mixed &$class );
```

If the parameter is an object, returns its full class.

**Note**: The parameter is passed by reference.



Examples
--------

### Example 1

```php
$class = New \Exception;
\UObject\must_be_class( $class );
```
Returns '\Exception'

### Example 2

```php
$class = '\\Exception';
\UObject\must_be_class( $class );
```
Returns '\Exception'
