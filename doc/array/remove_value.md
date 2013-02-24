[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#array) / remove_value
======


Description
-------- 

```php
array \UString::removeValue( array $array, mixed $values );
```

Removes the elements designated by values from the input array.

**Note**: The input array is not modified. See [do_remove_value](./do_remove_value.md#readme).



Examples
--------

### Example 1

```php
\UArray::removeIndex( [ 1, 2, 3 ], 2 );
```
Returns [ 1, 3 ].

### Example 2

```php
\UArray::removeIndex( [ 1, 2, 3, 'Ubiq', name' => 'Ubiq' ], [ 'Ubiq', 2 ] );
```
Returns [ 1, 3 ].
