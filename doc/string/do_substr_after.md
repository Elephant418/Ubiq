[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_substr_after
======


Description
-------- 

```php
string \UString::doSubstrAfter( string &$haystack, mixed $needles );
```

Reduce the input string from the first match of a specific character/sequence to the end. <br>
If several matches are given, the sequence that generate the larger string is kept.

**Note**: The string is passed by reference. See [substr_after](./substr_after.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path';
$pop = \UString::doSubstrAfter( $original, '/' );
echo $pop . ' + ' . $original;
```
Returns 'example.com/ + my/path'

### Example 2

```php
$original = 'example.com';
$pop = \UString::doSubstrAfter( $original, '/' );
echo $pop . ' + ' . $original;
```
Returns 'example.com + '
