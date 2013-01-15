[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_not_end_with
======


Description
-------- 

```php
void \UString\do_not_end_with( string &$haystack, string $needle );
```

If a string ends with a specific character/sequence, the sufix is removed.

**Note**: The string is passed by reference. See [not_end_with](./not_end_with.md#readme).



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString\do_not_end_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 2

```php
$url = 'http://www.example.com/';
\UString\do_not_end_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 3

```php
$url = 'http://www.example.com///';
\UString\do_not_end_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.
