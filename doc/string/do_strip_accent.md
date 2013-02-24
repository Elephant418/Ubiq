[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / do_strip_accent
======


Description
-------- 

```php
void \UString::doStripAccent( string &$input );
```

The accents of the string are converted to common characters.

**Note**: The string is passed by reference. See [strip_accent](./string/strip_accent.md#readme).



Examples
--------

### Example 1

```php
$test = 'úûüýÿĀāĂăĄąĆć';
\UString::doStripAccent( $test );
echo $test;
```
Returns 'uuuyyAaAaAaCc'
