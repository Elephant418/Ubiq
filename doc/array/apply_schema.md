[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / apply_schema
======


Description
-------- 

```php
mixed \UArray::applySchema( array $array, array $schema );
```

Returns the array applied the passed schema : add optional entries that are not in the array.

Returns FALSE if the array is not matching the schema. 

**Note**: The array is passed by reference. See [do_apply_schema](./array/do_apply_schema.md#readme).



Examples
--------

### Example 1

```php
\UArray::applySchema( [ ], [ 'needed' ] );
```
Returns FALSE

### Example 2

```php
\UArray::applySchema( [ ], [ 'optional' => 3 ] );
```
Returns [ 'optional' => 3 ]

### Example 3

```php
\UArray::applySchema( [ 'extra' => 4 ], [ 'optional' => 3 ] );
```
Returns [ 'optional' => 3, 'extra' => 4 ]

### Example 4

```php
\UArray::applySchema( [ 'needed' => 1 ], [ 'needed' ] );
```
Returns [ 'needed' => 1 ]

### Example 5

```php
\UArray::applySchema( [ 'needed' => 1, 'optional' => 2 ], [ 'needed', 'optional' => 3 ] );
```
Returns [ 'needed' => 1, 'optional' => 2 ]

### Example 6

```php
\UArray::applySchema( [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ], [ 'needed', 'optional' => 3 ] );
```
Returns [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ]