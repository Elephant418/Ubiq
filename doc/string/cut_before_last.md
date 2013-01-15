[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / cut_before_last
======


Description
-------- 

```php
string \UString\cut_before_last( string &$haystack, mixed $needles );
```

Cut & returns the portion of string from the beginning to the last match of a specific character/sequence. <br>
If several matches are given, the sequence that generate the larger cut is kept.

**Note**: The string is passed by reference. See [substr_before_last](./substr_before_last.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path/file.md';
$cut = \UString\cut_before_last( $original, '/' );
echo $cut . ' + ' . $original;
```
Returns 'example.com/my/path + /file.md'

### Example 2

```php
$original = 'example.com';
$cut = \UString\cut_before_last( $original, '/' );
echo $cut . ' + ' . $original;
```
Returns ' + example.com'
