[Ubiq](../index.md) / [String](../index.md#string) / must_not_starts_with
======


Description
-------- 

```php
void \Util\Str\must_not_starts_with( string &$hay, string $needle );
```

If a string starts with a specific character/sequence, the prefix is removed.

**Note**: The string is passed by reference.



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\Util\Str\must_not_starts_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 2

```php
$url = 'www.example.com';
\Util\Str\must_not_starts_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.
