[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / do_convert_to_class
======


Description
-------- 

```php
void \UObject::doConvertToClass( mixed &$class );
```

If the parameter is an object, returns its full class.

**Note**: The parameter is passed by reference. See [convert_to_class](./object/convert_to_class.md#readme).



Examples
--------

### Example 1

```php
$class = new \Exception;
\UObject::doConvertToClass( $class );
echo $class;
```
Returns 'Exception'

### Example 2

```php
$class = '\\Exception';
\UObject::doConvertToClass( $class );
echo $class;
```
Returns 'Exception'
