[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / get_namespace
======


Description
-------- 

```php
string \UObject::getNamespace( mixed $class );
```

Returns the namespace of passed class.



Examples
--------

### Example 1

```php
namespace Test\Ubiq {
	class Example_Class { }
}
\UObject::getNamespace( new \Test\Ubiq\Example_Class );
```
Returns 'Test\Ubiq'

### Example 2

```php
namespace Test\Ubiq {
	class Example_Class { }
}
\UObject::getNamespace( 'Test\\Ubiq\\Example_Class' );
```
Returns 'Test\Ubiq'

### Example 3

```php
\UObject::getNamespace( new \Exception );
```
Returns ''