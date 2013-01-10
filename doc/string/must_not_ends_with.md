[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / must_not_ends_with
======


Description
-------- 

```php
void \UString\must_not_ends_with( string &$hay, string $needle );
```

If a string ends with a specific character/sequence, the sufix is removed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString\must_not_ends_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 2

```php
$url = 'http://www.example.com/';
\UString\must_not_ends_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.
