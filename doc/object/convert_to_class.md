[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / convert_to_class
======


Description
-------- 

```php
string \UObject\convert_to_class( mixed $class );
```

If the parameter is an object, returns its full class.

**Note**: The input is not modified. See [do_convert_to_class](./object/do_convert_to_class.md#readme).



Examples
--------

### Example 1

```php
\UObject\convert_to_class( new \Exception );
```
Returns 'Exception'

### Example 2

```php
\UObject\convert_to_class( '\\Exception' );
```
Returns 'Exception'
