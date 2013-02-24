[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_end_with
======


Description
-------- 

```php
void \UString::doEndWith( string &$haystack, string $needle );
```

If a string does not end with a specific character/sequence, the string is sufixed.

**Note**: The string is passed by reference. See [end_with](./end_with.md#readme).



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString::doEndWith( $url, '/' );
echo $url;
```
Returns 'http://www.example.com/'.

### Example 2

```php
$url = 'http://www.example.com/';
\UString::doEndWith( $url, '/' );
echo $url;
```
Returns 'http://www.example.com/'.
