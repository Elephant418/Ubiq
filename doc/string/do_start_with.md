[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_start_with
======


Description
-------- 

```php
void \UString\do_start_with( string &$haystack, string $needle );
```

If a string does not start with a specific character/sequence, the string is prefixed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'www.example.com';
\UString\do_start_with( $url, 'http://' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 2

```php
$url = 'http://www.example.com';
\UString\do_start_with( $url, 'http://' );
echo $url;
```
Returns 'http://www.example.com'.
