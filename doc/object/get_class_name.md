[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / get_class_name
======


Description
-------- 

```php
string \UObject::getClassName( mixed $class );
```

Returns the class name of passed class.



Examples
--------

### Example 1

```php
namespace Test\Ubiq {
	class Example_Class { }
}
\UObject::getClassName( new \Test\Ubiq\Example_Class );
```
Returns 'Example_Class'

### Example 2

```php
namespace Test\Ubiq {
	class Example_Class { }
}
\UObject::getClassName( 'Test\\Ubiq\\Example_Class' );
```
Returns 'Example_Class'

### Example 3

```php
\UObject::getClassName( new \Exception );
```
Returns 'Exception'