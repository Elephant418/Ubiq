[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / cut_before
======


Description
-------- 

```php
string \UString\cut_before( string &$hay, mixed $needles );
```

Cut & returns a string from the beginning to the first match of a specific character/sequence. <br>
If several matches are given, the sequence that generate the shorter cut is kept.

**Note**: The string is passed by reference. See [substr_before](./substr_before.md#readme).



Examples
--------

### Example 1

```php
$path = 'example.com/my/path';
$domain = \UString\cut_before( $path, '/' );
echo $domain . ' - ' . $path;
```
Returns 'example.com - /my/path'

### Example 2

```php
$path = '/my/path';
$domain = \UString\cut_before( $path, '/' );
echo $domain . ' - ' . $path;
```
Returns ' - /my/path'
