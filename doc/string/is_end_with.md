[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / is_end_with
======


Description
-------- 

```php
bool \UString::isEndWith( string $haystack, mixed $needles );
```

Checks if a string ends with a specific character/sequence. <br>
If several matches are given, checks if the string ends with at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case sensitive. See [is_end_with_insensitive](./is_end_with_insensitive.md#readme).




Examples
--------

### Example 1

```php
\UString::isEndWith( 'Ubiq is so cool', 'cool' );
```
Returns TRUE.

### Example 2

```php
\UString::isEndWith( 'Ubiq is so cool', 'Cool' );
```
Returns FALSE.

### Example 3

```php
\UString::isEndWith( 'Ubiq is so cool', 'boring' );
```
Returns FALSE.

### Example 4

```php
\UString::isEndWith( 'Ubiq is so cool', [ 'cool', 'boring' ] );
```
Returns TRUE.

### Example 5

```php
\UString::isEndWith( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
```
Returns FALSE.

### Example 6

```php
\UString::isEndWith( 'Ubiq is so cool', [ 'boring', 'classy' ] );
```
Returns FALSE.
