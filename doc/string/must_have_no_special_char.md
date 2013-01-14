[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / must_have_no_special_char
======


Description
-------- 

```php
void \UString\must_have_no_special_char( string &$input, string $characters = '-_a-zA-Z0-9', string $replace = '-' );
```

The characters of the string, which are not authorized, are replaced.

**Note**: The string is passed by reference. See [strip_special_char](./strip_special_char.md#readme).



Examples
--------

### Example 1

```php
$test = 'A page for $13';
\UString\must_have_no_special_char( $test );
echo $test;
```
Returns 'A-page-for-13'

### Example 2

```php
$test = 'A page for $13';
\UString\must_have_no_special_char( $test, 'aeiouyAEIOUY' );
echo $test;
```
Returns 'A-a-e-o'

### Example 2

```php
$test = 'A page for $13';
\UString\must_have_no_special_char( $test, 'a-zA-Z', '' );
echo $test;
```
Returns 'Apagefor'
