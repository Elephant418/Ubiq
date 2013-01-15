[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / substr_after
======


Description
-------- 

```php
string \UString\substr_after( string $haystack, mixed $needles );
```

Returns the portion of string from the first match of a specific character/sequence to the end. <br>
If several matches are given, the sequence that generate the larger return is kept.

**Note**: The string is not modified. See [do_substr_after](./do_substr_after.md#readme).



Examples
--------

### Example 1

```php
\UString\do_substr_after( 'example.com/my/path', '/' );
```
Returns 'my/path'

### Example 2

```php
$cut = \UString\do_substr_after( 'example.com', '/' );
```
Returns ''
