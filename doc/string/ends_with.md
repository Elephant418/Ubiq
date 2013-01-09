[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / ends_with
======


Description
-------- 

```php
bool \Util\Str\ends_with( string $hay, mixed $needles );
```

Checks if a string ends with a specific character/sequence. <br>
If several matches are given, checks if the string ends with at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case sensitive. See [i_ends_with](./i_ends_with.md#readme).




Examples
--------

### Example 1

```php
\Util\Str\ends_with( 'Ubiq is so cool', 'cool' );
```
Returns TRUE.

### Example 2

```php
\Util\Str\ends_with( 'Ubiq is so cool', 'Cool' );
```
Returns FALSE.

### Example 3

```php
\Util\Str\ends_with( 'Ubiq is so cool', 'boring' );
```
Returns FALSE.

### Example 4

```php
\Util\Str\ends_with( 'Ubiq is so cool', [ 'cool', 'boring' ] );
```
Returns TRUE.

### Example 5

```php
\Util\Str\ends_with( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
```
Returns FALSE.

### Example 6

```php
\Util\Str\ends_with( 'Ubiq is so cool', [ 'boring', 'classy' ] );
```
Returns FALSE.
