[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / must_ends_with
======


Description
-------- 

```php
void \Util\Str\must_ends_with( string &$hay, string $needle );
```

If a string does not end with a specific character/sequence, the string is sufixed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\Util\Str\must_ends_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com/'.

### Example 2

```php
$url = 'http://www.example.com/';
\Util\Str\must_ends_with( $url, '/' );
echo $url;
```
Returns 'http://www.example.com/'.
