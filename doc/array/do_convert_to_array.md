[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / do_convert_to_array
======


Description
-------- 

```php
void \UArray::doConvertToArray( mixed &$array );
```

If the parameter is not an array, it is converted to an array.

**Note**: The array is passed by reference. See [convert_to_array](./array/convert_to_array.md#readme).



Examples
--------

### Example 1

```php
$array = 'a string';
\UArray::doConvertToArray( $array );
print_r( $array );
```
Returns [ 'a string' ]

### Example 2

```php
$array = [ 'a string' ];
\UArray::doConvertToArray( $array );
print_r( $array );
```
Returns [ 'a string' ]

### Example 3

```php
$array = NULL;
\UArray::doConvertToArray( $array );
print_r( $array );
```
Returns [ ]