[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / strip_accent
======


Description
-------- 

```php
string \UString::stripAccent( string $input );
```

Returns a string with the accents converted to common characters.

**Note**: The string is not modified. See [do_strip_accent](./do_strip_accent.md#readme).



Examples
--------

### Example 1

```php
\UString::stripAccent( 'úûüýÿĀāĂăĄąĆć' );
```
Returns 'uuuyyAaAaAaCc'
