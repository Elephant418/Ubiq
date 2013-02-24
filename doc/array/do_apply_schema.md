[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / do_apply_schema
======


Description
-------- 

```php
bool \UArray::doApplySchema( array &$array, array $schema );
```

Modifies the array by applying the passed schema : add optional entries that are not in the array.

Returns TRUE if the array is matching the schema, FALSE otherwise. 

**Note**: The array is passed by reference. See [apply_schema](./array/apply_schema.md#readme).



Examples
--------

### Example 1

```php
$array = [ ];
\UArray::doApplySchema( $array, [ 'needed' ] );
```
Returns FALSE

### Example 2

```php
$array = [ ];
\UArray::doApplySchema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'optional' => 3 ]

### Example 3

```php
$array = [ 'extra' => 4 ];
\UArray::doApplySchema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'optional' => 3, 'extra' => 4 ]

### Example 4

```php
$array = [ 'needed' => 1 ];
\UArray::doApplySchema( $array, [ 'needed' ] );
```
Returns TRUE;
$array value is [ 'needed' => 1 ]

### Example 5

```php
$array = [ 'needed' => 1, 'optional' => 2 ];
\UArray::doApplySchema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'needed' => 1, 'optional' => 2 ]

### Example 6

```php
$array = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
\UArray::doApplySchema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ]