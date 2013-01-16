[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [String](../index.md#string) / random
======


Description
-------- 

```php
string \UString::random( int $length = 10, string $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' );
```

Return a generated string with specified length and specified character set.



Examples
--------

### Example 1

```php
\UString::random( );
```
Returns (for example) 'pkuRO4KrWn'

### Example 2

```php
\UString::random( 16 );
```
Returns (for example) 'pHh4WoE3itDZgSe0'

### Example 3

```php
\UString::random( 16, 'abc' );
```
Returns (for example) 'baabbaacbcbcacba'




