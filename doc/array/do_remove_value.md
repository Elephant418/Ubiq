[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#array) / do_remove_value
======


Description
-------- 

```php
void \UString::doRemoveValue( array &$array, mixed $values );
```

Removes the elements designated by values from the input array.

**Note**: The input array is passed by reference. See [remove_value](./remove_value.md#readme).



Examples
--------

### Example 1

```php
$array = [ 1, 2, 3 ];
\UArray::doRemoveIndex( $array, 2 );
```
$array value is [ 1, 3 ].

### Example 2

```php
$array = [ 1, 2, 3, 'Ubiq', name' => 'Ubiq' ];
\UArray::doRemoveIndex( $array, [ 'Ubiq', 1 ] );
```
$array value is [ 1, 3 ].
