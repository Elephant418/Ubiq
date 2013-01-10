[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / must_valid_schema
======


Description
-------- 

```php
bool \UArray\must_valid_schema( array &$array, array $schema );
```

If the parameter is not an array, it is transformed to be conform.

Returns TRUE if the array is conform or it has could be transformed to be conform, FALSE otherwise. 

**Note**: The array is passed by reference.



Examples
--------

### Example 1

```php
$array = [ ];
\UArray\must_valid_schema( $array, [ 'needed' ] );
```
Returns FALSE

### Example 2

```php
$array = [ ];
\UArray\must_valid_schema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'optional' => 3 ]

### Example 3

```php
$array = [ 'extra' => 4 ];
\UArray\must_valid_schema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'optional' => 3, 'extra' => 4 ]

### Example 4

```php
$array = [ 'needed' => 1 ];
\UArray\must_valid_schema( $array, [ 'needed' ] );
```
Returns TRUE;
$array value is [ 'needed' => 1 ]

### Example 5

```php
$array = [ 'needed' => 1, 'optional' => 2 ];
\UArray\must_valid_schema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'needed' => 1, 'optional' => 2 ]

### Example 6

```php
$array = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
\UArray\must_valid_schema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;
$array value is [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ]