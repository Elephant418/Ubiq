[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / merge_unique
======


Description
-------- 

```php
array \UArray::mergeUnique( array $array1 [, array $array2, [ … ] ] );
```

Merges the elements of one or more arrays together without duplicate values. <br>

**Note**: The order follow the first match. See [reverse_merge_unique](./reverse_merge_unique.md#readme).



Examples
--------

### Example 1

```php
\UArray::mergeUnique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
```
Returns [ 1, 2, 3, 4 ]

### Example 2

```php
\UArray::mergeUnique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
```
Returns [ 1, 2, 3, 4, 5 ]
