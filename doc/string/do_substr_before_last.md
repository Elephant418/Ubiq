[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_substr_before_last
======


Description
-------- 

```php
string \UString::doSubstrBeforeLast( string &$haystack, mixed $needles );
```

Reduce the input string from the beginning to the last match of a specific character/sequence. <br>
If several matches are given, the sequence that generate the larger string is kept.

**Note**: The string is passed by reference. See [substr_before_last](./substr_before_last.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path/file.md';
$pop = \UString::doSubstrBeforeLast( $original, '/' );
echo $original . ' + ' . $pop;
```
Returns 'example.com/my/path + /file.md'

### Example 2

```php
$original = 'example.com';
$pop = \UString::doSubstrBeforeLast( $original, '/' );
echo $original . ' + ' . $pop;
```
Returns ' + example.com'
