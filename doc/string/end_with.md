[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / end_with
======


Description
-------- 

```php
string \UString\end_with( string $haystack, string $needle );
```

If a string does not end with a specific character/sequence, the string is sufixed.

**Note**: The input string is not modified. See [do_end_with](./do_end_with.md#readme).



Examples
--------

### Example 1

```php
\UString\end_with( 'http://www.example.com', '/' );
```
Returns 'http://www.example.com/'.

### Example 2

```php
\UString\end_with( 'http://www.example.com/', '/' );
```
Returns 'http://www.example.com/'.
