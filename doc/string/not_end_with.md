[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / not_end_with
======


Description
-------- 

```php
string \UString::notEndWith( string $haystack, mixed $needles );
```

If a string ends with one or several specific character/sequence, the sufix is removed.

**Note**: The input string is not modified. See [do_not_end_with](./do_not_end_with.md#readme).



Examples
--------

### Example 1

```php
\UString::notEndWith( 'http://www.example.com', '/' );
```
Returns 'http://www.example.com'.

### Example 2

```php
\UString::notEndWith( 'http://www.example.com/', '/' );
```
Returns 'http://www.example.com'.

### Example 3

```php
\UString::notEndWith( 'http://www.example.com///', '/' );
```
Returns 'http://www.example.com'.

### Example 4

```php
\UString::notEndWith( 'http://www.example.com/\\/', [ '\\', '/' ] );
```
Returns 'http://www.example.com'.
