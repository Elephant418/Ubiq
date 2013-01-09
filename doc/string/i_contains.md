[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / i_contains
======


Description
-------- 

```php
bool \Util\Str\i_contains( string $hay, mixed $needles );
```

Checks if a string contains a specific character/sequence. <br>
If several matches are given, checks if the string contains at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case insensitive. See [contains](./contains.md#readme).



Examples
--------

### Example 1

```php
\Util\Str\i_contains( '/path/to/a/folder', '/to/' );
```
Returns TRUE.

### Example 2

```php
\Util\Str\i_contains( '/path/to/a/folder', '/TO/' );
```
Returns TRUE.

### Example 3

```php
\Util\Str\i_contains( '/path/to/a/folder', '.' );
```
Returns FALSE.

### Example 4

```php
\Util\Str\i_contains( '/path/to/a/folder', [ '/to/', '.' ] );
```
Returns TRUE.

### Example 5

```php
\Util\Str\i_contains( '/path/to/a/folder', [ '/TO/', '.' ] );
```
Returns TRUE.

### Example 46

```php
\Util\Str\i_contains( '/path/to/a/folder', [ 'php', '.' ] );
```
Returns FALSE.
