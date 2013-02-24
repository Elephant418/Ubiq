[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_not_start_with
======


Description
-------- 

```php
void \UString::doNotStartWith( string &$haystack, mixed $needles );
```

If a string starts with one or several specific character/sequence, the prefix is removed.

**Note**: The string is passed by reference. See [not_start_with](./not_start_with.md#readme).



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString::doNotStartWith( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 2

```php
$url = 'www.example.com';
\UString::doNotStartWith( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 3

```php
$url = 'http://http://www.example.com';
\UString::doNotStartWith( $url, 'http://' );
echo $url;
```
Returns 'www.example.com'.

### Example 4

```php
$url = 'http://https://www.example.com';
\UString::doNotStartWith( $url, [ 'file://', 'https://', 'http://' ] );
echo $url;
```
Returns 'www.example.com'.
