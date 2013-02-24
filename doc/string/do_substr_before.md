[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_substr_before
======


Description
-------- 

```php
string \UString::doSubstrBefore( string &$haystack, mixed $needles );
```

Reduce the input string from the beginning to the first match of a specific character/sequence. <br>
If several matches are given, the sequence that generate the shorter string is kept.

**Note**: The string is passed by reference. See [substr_before](./substr_before.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path';
$pop = \UString::doSubstrBefore( $original, '/' );
echo $original . ' + ' . $pop;
```
Returns 'example.com + /my/path'

### Example 2

```php
$original = 'example.com';
$pop = \UString::doSubstrBefore( $original, '/' );
echo $original . ' + ' . $pop;
```
Returns 'example.com + '
