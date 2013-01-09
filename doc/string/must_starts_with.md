[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / must_starts_with
======


Description
-------- 

```php
void \Util\Str\must_starts_with( string &$hay, string $needle );
```

If a string does not start with a specific character/sequence, the string is prefixed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'www.example.com';
\Util\Str\must_starts_with( $url, 'http://' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 2

```php
$url = 'http://www.example.com';
\Util\Str\must_starts_with( $url, 'http://' );
echo $url;
```
Returns 'http://www.example.com'.
