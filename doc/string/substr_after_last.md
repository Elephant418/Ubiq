[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / substr_after_last
======


Description
-------- 

```php
string \UString::substrAfterLast( string $haystack, mixed $needles );
```

Returns the portion of string from the last match of a specific character/sequence to the end. <br>
If several matches are given, the sequence that generate the shorter return is kept.

**Note**: The string is not modified. See [do_substr_after_last](./do_substr_after_last.md#readme).



Examples
--------

### Example 1

```php
\UString::substrAfter( 'example.com/my/path', '/' );
```
Returns 'path'

### Example 2

```php
\UString::substrAfter( 'example.com', '/' );
```
Returns 'example.com'