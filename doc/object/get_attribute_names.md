[Ubiq](https://github.com/Pixel418/Ubiq#readme) / [Documentation](../index.md#readme) / [Object](../index.md#object) / get_attribute_names
======


Description
-------- 

```php
array \UObject::getAttributeNames( mixed $class );
```

Returns the name of the public attributes of the passed class.



Examples
--------

### Example 1

```php
class Example_Class {
	public $name;
	public $height;
}
\UObject::getAttributeNames( new Example_Class );
```
Returns [ 'name', 'height' ]

### Example 2

```php
class Example_Class {
	public $name;
	public $height;
}
\UObject::getAttributeNames( 'Example_Class' );
```
Returns [ 'name', 'height' ]
