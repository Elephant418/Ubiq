[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#array) / do_remove_index
======


Description
-------- 

```php
void \UString::do_remove_index( array &$array, mixed $indexes );
```

Removes the elements designated by indexes from the input array.

**Note**: The input array is passed by reference. See [remove_index](./remove_index.md#readme).



Examples
--------

### Example 1

```php
$array = [ 1, 2, 3 ];
\UArray::do_remove_index( $array, 1 );
```
$array value is [ 1, 3 ].

### Example 2

```php
$array = [ 1, 2, 3, 'name' => 'Ubiq' ];
\UArray::do_remove_index( $array, [ 'name', 1 ] );
```
$array value is [ 1, 3 ].
