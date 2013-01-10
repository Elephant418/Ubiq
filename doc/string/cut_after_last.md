[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / cut_after_last
======


Description
-------- 

```php
string \UString\cut_after_last( string &$hay, mixed $needles );
```

Cut & returns the portion of string from the last match of a specific character/sequence to the end. <br>
If several matches are given, the sequence that generate the shorter cut is kept.

**Note**: The string is passed by reference. See [substr_after_last](./substr_after_last.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path';
$cut = \UString\cut_after( $original, '/' );
echo $original . ' + ' . $cut;
```
Returns 'example.com/my/ + path'

### Example 2

```php
$original = 'example.com';
$cut = \UString\cut_after( $original, '/' );
echo $original . ' + ' . $cut;
```
Returns ' + example.com'