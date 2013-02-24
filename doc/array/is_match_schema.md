[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / is_match_schema
======


Description
-------- 

```php
bool \UArray::isMatchSchema( array $array, array $schema );
```

Returns TRUE if the array is matching the schema, FALSE otherwise. 



Examples
--------

### Example 1

```php
$array = [ ];
\UArray::isMatchSchema( $array, [ 'needed' ] );
```
Returns FALSE

### Example 2

```php
$array = [ ];
\UArray::isMatchSchema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;

### Example 3

```php
$array = [ 'extra' => 4 ];
\UArray::isMatchSchema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;

### Example 4

```php
$array = [ 'needed' => 1 ];
\UArray::isMatchSchema( $array, [ 'needed' ] );
```
Returns TRUE;

### Example 5

```php
$array = [ 'needed' => 1, 'optional' => 2 ];
\UArray::isMatchSchema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;

### Example 6

```php
$array = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
\UArray::isMatchSchema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;
