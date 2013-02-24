[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / strip_special_char
======


Description
-------- 

```php
string \UString::stripSpecialChar( string $input, string $chars = '-_a-zA-Z0-9', string $replace = '-' );
```

Returns a string with the characters, which are not authorized, replaced.

**Note**: The string is not modified. See [do_strip_special_char](./do_strip_special_char.md#readme).



Examples
--------

### Example 1

```php
\UString::stripAccent( 'A page for $13' );
```
Returns 'A-page-for-13'

### Example 2

```php
\UString::stripAccent( 'A page for $13', 'aeiouyAEIOUY' );
```
Returns 'A-a-e-o'

### Example 2

```php
\UString::stripAccent( 'A page for $13', 'a-zA-Z', '' );
```
Returns 'Apagefor'
