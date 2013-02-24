[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_substr_after_last
======


Description
-------- 

```php
string \UString::doSubstrAfterLast( string &$haystack, mixed $needles );
```

Reduce the input string from the last match of a specific character/sequence to the end. <br>
If several matches are given, the sequence that generate the shorter string is kept.

**Note**: The string is passed by reference. See [substr_after_last](./substr_after_last.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path';
$pop = \UString::doSubstrAfter( $original, '/' );
echo $pop . ' + ' . $original;
```
Returns 'example.com/my/ + path'

### Example 2

```php
$original = 'example.com';
$pop = \UString::doSubstrAfter( $original, '/' );
echo $pop . ' + ' . $original;
```
Returns ' + example.com'