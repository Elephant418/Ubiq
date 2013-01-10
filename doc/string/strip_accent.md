[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / strip_accent
======


Description
-------- 

```php
string \UString\strip_accent( string $input );
```

Returns a string with the accents converted to common characters.



Examples
--------

### Example 1

```php
\UString\strip_accent( 'úûüýÿĀāĂăĄąĆć' );
```
Returns 'uuuyyAaAaAaCc'
