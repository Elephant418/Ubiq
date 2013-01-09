[Ubiq](https://github.com/Pixel418/Ubiq#ubiq) / [Documentation](../index.md#readme) / [String](../index.md#string) / contains
======


Description
-------- 

```php
bool \Util\Str\contains( string $hay, mixed $needles );
```

Checks if a string contains a specific character/sequence. <br>
If several matches are given, checks if the string contains at least one of them.

Returns TRUE if there is a match, FALSE otherwise.

**Note**: This function is case sensitive. See [i_contains](./i_contains.md#readme).



Examples
--------

### Example 1

```php
\Util\Str\contains( '/path/to/a/folder', '/to/' );
```
Returns TRUE.

### Example 2

```php
\Util\Str\contains( '/path/to/a/folder', '/TO/' );
```
Returns FALSE.

### Example 3

```php
\Util\Str\contains( '/path/to/a/folder', '.' );
```
Returns FALSE.

### Example 4

```php
\Util\Str\contains( '/path/to/a/folder', [ '/to/', '.' ] );
```
Returns TRUE.

### Example 5

```php
\Util\Str\contains( '/path/to/a/folder', [ '/TO/', '.' ] );
```
Returns FALSE.

### Example 46

```php
\Util\Str\contains( '/path/to/a/folder', [ 'php', '.' ] );
```
Returns FALSE.
