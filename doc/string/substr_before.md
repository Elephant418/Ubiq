[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / substr_before
======


Description
-------- 

```php
string \UString::substrBefore( string $haystack, mixed $needles );
```

Returns the portion of string from the beginning to the first match of a specific character/sequence. <br>
If several matches are given, the sequence that generate the shorter return is kept.

**Note**: The string is not modified. See [do_substr_before](./do_substr_before.md#readme).



Examples
--------

### Example 1

```php
\UString::substrBefore( 'example.com/my/path', '/' );
```
Returns 'example.com'

### Example 2

```php
\UString::substrBefore( 'example.com', '/' );
```
Returns 'example.com'