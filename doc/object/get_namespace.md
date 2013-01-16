[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / get_namespace
======


Description
-------- 

```php
string \UObject::get_namespace( mixed $class );
```

Returns the namespace of passed class.



Examples
--------

### Example 1

```php
namespace Test\Ubiq {
	class Example_Class { }
}
\UObject::get_namespace( new \Test\Ubiq\Example_Class );
```
Returns 'Test\Ubiq'

### Example 2

```php
namespace Test\Ubiq {
	class Example_Class { }
}
\UObject::get_namespace( 'Test\\Ubiq\\Example_Class' );
```
Returns 'Test\Ubiq'

### Example 3

```php
\UObject::get_namespace( new \Exception );
```
Returns ''