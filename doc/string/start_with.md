[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / start_with
======


Description
-------- 

```php
string \UString::startWith( string $haystack, string $needle );
```

If a string does not start with a specific character/sequence, the string is prefixed.

**Note**: The input string is not modified. See [do_start_with](./do_start_with.md#readme).



Examples
--------

### Example 1

```php
\UString::startWith( 'www.example.com', 'http://' );
```
Returns 'http://www.example.com'.

### Example 2

```php
\UString::startWith( 'http://www.example.com', 'http://' );
```
Returns 'http://www.example.com'.
