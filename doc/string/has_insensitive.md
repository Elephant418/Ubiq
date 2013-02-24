[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / has_insensitive
======


Description
-------- 

```php
bool \UString::hasInsensitive( string $haystack, mixed $needles );
```

Checks if a string contains a specific character/sequence. <br>
If several matches are given, checks if the string contains at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case insensitive. See [has](./has.md#readme).



Examples
--------

### Example 1

```php
\UString::hasInsensitive( '/path/to/a/folder', '/to/' );
```
Returns TRUE.

### Example 2

```php
\UString::hasInsensitive( '/path/to/a/folder', '/TO/' );
```
Returns TRUE.

### Example 3

```php
\UString::hasInsensitive( '/path/to/a/folder', '.' );
```
Returns FALSE.

### Example 4

```php
\UString::hasInsensitive( '/path/to/a/folder', [ '/to/', '.' ] );
```
Returns TRUE.

### Example 5

```php
\UString::hasInsensitive( '/path/to/a/folder', [ '/TO/', '.' ] );
```
Returns TRUE.

### Example 46

```php
\UString::hasInsensitive( '/path/to/a/folder', [ 'php', '.' ] );
```
Returns FALSE.
