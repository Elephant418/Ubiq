[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / cut_after
======


Description
-------- 

```php
string \UString\cut_after( string &$hay, mixed $needles );
```

Cut & returns the portion of string from the first match of a specific character/sequence to the end. <br>
If several matches are given, the sequence that generate the larger cut is kept.

**Note**: The string is passed by reference. See [substr_after](./substr_after.md#readme).



Examples
--------

### Example 1

```php
$original = 'example.com/my/path';
$cut = \UString\cut_after( $original, '/' );
echo $original . ' + ' . $cut;
```
Returns 'example.com/ + my/path'

### Example 2

```php
$original = 'example.com';
$cut = \UString\cut_after( $original, '/' );
echo $original . ' + ' . $cut;
```
Returns 'example.com + '
