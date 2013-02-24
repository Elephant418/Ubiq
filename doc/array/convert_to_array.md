[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / convert_to_array
======


Description
-------- 

```php
array \UArray::convertToArray( mixed $array );
```

If the parameter is not an array, it is converted to an array.

**Note**: The input is not modified. See [do_convert_to_array](./array/do_convert_to_array.md#readme).



Examples
--------

### Example 1

```php
\UArray::convertToArray( 'a string' );
```
Returns [ 'a string' ]

### Example 2

```php
\UArray::convertToArray( [ 'a string' ] );
```
Returns [ 'a string' ]

### Example 3

```php
\UArray::convertToArray( NULL );
```
Returns [ ]