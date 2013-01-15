[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_end_with
======


Description
-------- 

```php
void \UString\do_end_with( string &$haystack, string $needle );
```

If a string does not end with a specific character/sequence, the string is sufixed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString\do_end_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com/'.

### Example 2

```php
$url = 'http://www.example.com/';
\UString\do_end_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com/'.
