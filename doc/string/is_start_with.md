[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / is_start_with
======


Description
-------- 

```php
bool \UString\is_start_with( string $haystack, mixed $needles );
```

Checks if a string starts with a specific character/sequence. <br>
If several matches are given, checks if the string starts with at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case sensitive. See [is_start_with_insensitive](./is_start_with_insensitive.md#readme).



Examples
--------

### Example 1

```php
\UString\is_start_with( 'Ubiq is so cool', 'Ubiq' );
```
Returns TRUE.

### Example 2

```php
\UString\is_start_with( 'Ubiq is so cool', 'ubiq' );
```
Returns FALSE.

### Example 3

```php
\UString\is_start_with( 'Ubiq is so cool', 'Java' );
```
Returns FALSE.

### Example 4

```php
\UString\is_start_with( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
```
Returns TRUE.

### Example 5

```php
\UString\is_start_with( 'Ubiq is so cool', [ 'ubiq', 'Java' ] );
```
Returns FALSE.

### Example 6

```php
\UString\is_start_with( 'Ubiq is so cool', [ 'Java', '.NET' ] );
```
Returns FALSE.
