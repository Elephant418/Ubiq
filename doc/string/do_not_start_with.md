[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_not_start_with
======


Description
-------- 

```php
void \UString\do_not_start_with( string &$haystack, string $needle );
```

If a string starts with a specific character/sequence, the prefix is removed.

**Note**: The string is passed by reference. See [not_start_with](./not_start_with.md#readme).



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString\do_not_start_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 2

```php
$url = 'www.example.com';
\UString\do_not_start_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 3

```php
$url = 'http://http://www.example.com';
\UString\do_not_start_with( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.
