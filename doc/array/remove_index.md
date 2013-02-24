[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#array) / remove_index
======


Description
-------- 

```php
array \UString::removeIndex( array $array, mixed $indexes );
```

Removes the elements designated by indexes from the input array.

**Note**: The input array is not modified. See [do_remove_index](./do_remove_index.md#readme).



Examples
--------

### Example 1

```php
\UArray::removeIndex( [ 1, 2, 3 ], 1 );
```
Returns [ 1, 3 ].

### Example 2

```php
\UArray::removeIndex( [ 1, 2, 3, 'name' => 'Ubiq' ], [ 'name', 1 ] );
```
Returns [ 1, 3 ].
