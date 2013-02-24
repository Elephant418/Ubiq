[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / not_start_with
======


Description
-------- 

```php
string \UString::notStartWith( string $haystack, mixed $needles );
```

If a string starts with one or several specific character/sequence, the prefix is removed.

**Note**: The input string is not modified. See [do_not_start_with](./do_not_start_with.md#readme).



Examples
--------

### Example 1

```php
\UString::notStartWith( 'http://www.example.com', 'http://' );
```
Returns 'www.example.com'.

### Example 2

```php
\UString::notStartWith( 'www.example.com', 'http://' );
```
Returns 'www.example.com'.

### Example 3

```php
\UString::notStartWith( 'http://http://www.example.com', 'http://' );
```
Returns 'www.example.com'.

### Example 4

```php
\UString::notStartWith( 'http://https://www.example.com', [ 'file://', 'https://', 'http://' ] );
```
Returns 'www.example.com'.
