[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / must_not_start_with
======


Description
-------- 

```php
void \UString\must_not_start_with( string &$hay, string $needle );
```

If a string starts with a specific character/sequence, the prefix is removed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString\must_not_start_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 2

```php
$url = 'www.example.com';
\UString\must_not_start_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.
