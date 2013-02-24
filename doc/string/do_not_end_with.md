[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_not_end_with
======


Description
-------- 

```php
void \UString::doNotEndWith( string &$haystack, mixed $needles );
```

If a string ends with one or several specific character/sequence, the sufix are removed.

**Note**: The string is passed by reference. See [not_end_with](./not_end_with.md#readme).



Examples
--------

### Example 1

```php
$url = 'http://www.example.com';
\UString::doNotEndWith( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 2

```php
$url = 'http://www.example.com/';
\UString::doNotEndWith( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 3

```php
$url = 'http://www.example.com///';
\UString::doNotEndWith( $url, '/' );
echo $url;
```
Returns 'http://www.example.com'.

### Example 4

```php
$url = 'http://www.example.com/\\/';
\UString::doNotEndWith( $url, [ '\\', '/' ] );
echo $url;
```
Returns 'http://www.example.com'.
