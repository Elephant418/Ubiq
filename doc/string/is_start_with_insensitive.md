[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / is_start_with_insensitive
======


Description
-------- 

```php
bool \UString::isStartWithInsensitive( string $haystack, mixed $needles );
```

Checks if a string starts with a specific character/sequence. <br>
If several matches are given, checks if the string starts with at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case insensitive. See [is_start_with](./is_start_with.md#readme).



Examples
--------

### Example 1

```php
\UString::isStartWithInsensitive( 'Ubiq is so cool', 'Ubiq' );
```
Returns TRUE.

### Example 2

```php
\UString::isStartWithInsensitive( 'Ubiq is so cool', 'ubiq' );
```
Returns TRUE.

### Example 3

```php
\UString::isStartWithInsensitive( 'Ubiq is so cool', 'Java' );
```
Returns FALSE.

### Example 4

```php
\UString::isStartWithInsensitive( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
```
Returns TRUE.

### Example 5

```php
\UString::isStartWithInsensitive( 'Ubiq is so cool', [ 'ubiq', 'Java' ] );
```
Returns TRUE.

### Example 6

```php
\UString::isStartWithInsensitive( 'Ubiq is so cool', [ 'Java', '.NET' ] );
```
Returns FALSE.
