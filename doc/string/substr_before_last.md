[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / substr_before_last
======


Description
-------- 

```php
string \UString\substr_before_last( string $haystack, mixed $needles );
```

Returns the portion of string from the beginning to the last match of a specific character/sequence. <br>
If several matches are given, the sequence that generate the larger return is kept.

**Note**: The string is not modified. See [cut_before_last](./cut_before_last.md#readme).



Examples
--------

### Example 1

```php
\UString\substr_before_last( 'example.com/my/path/file.md', '/' );
```
Returns 'example.com/my/path'

### Example 2

```php
$cut = \UString\substr_before_last( 'example.com', '/' );
```
Returns ''