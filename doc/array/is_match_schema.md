[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Array](../index.md#array) / is_match_schema
======


Description
-------- 

```php
bool \UArray\is_match_schema( array $array, array $schema );
```

Returns TRUE if the array is matching the schema, FALSE otherwise. 



Examples
--------

### Example 1

```php
$array = [ ];
\UArray\is_match_schema( $array, [ 'needed' ] );
```
Returns FALSE

### Example 2

```php
$array = [ ];
\UArray\is_match_schema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;

### Example 3

```php
$array = [ 'extra' => 4 ];
\UArray\is_match_schema( $array, [ 'optional' => 3 ] );
```
Returns TRUE;

### Example 4

```php
$array = [ 'needed' => 1 ];
\UArray\is_match_schema( $array, [ 'needed' ] );
```
Returns TRUE;

### Example 5

```php
$array = [ 'needed' => 1, 'optional' => 2 ];
\UArray\is_match_schema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;

### Example 6

```php
$array = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
\UArray\is_match_schema( $array, [ 'needed', 'optional' => 3 ] );
```
Returns TRUE;
