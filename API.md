Ubiq API Style Guide
==============

Only treatment: The first argument is always the reference.
So there is no generator, for example: no random string generator.

Every Ubiq operators should match one these 3 API cases.


1. Modifier
-------------

There is 3 templates of modifier API:

```php
void  \UType::modifyExplicitly( $reference, $param )
mixed \UType::getModifiedExplicitly( $reference, $param )
bool  \UType::isModifiedExplicitly( $reference, $param )
```

For example, the modifier functions to suffix a string:

```php
void   \UString::suffixBy( $reference, $suffix )
string \UString::getSuffixedBy( $reference, $suffix )
bool   \UString::isSuffixedBy( $reference, $suffix )
```


2. Converter
-------------

There is 2 templates of converter API:

```php
void  \UType::convertToExplicitTarget( $reference, $param )
mixed \UType::getAsExplicitTarget( $reference, $param )
```

For example, the converter functions to convert anything to an array:

```php
void  \UArray::convertToArray( $reference )
array \UArray::getAsArray( $reference )
```


3. Attribute Selector
-------------

There is 2 templates of attribute selector API:

```php
mixed \UType::getExplicitAttribute( $reference, $param )
void  \UType::replaceByExplicitAttribute( $reference, $param )
```

For example, the attribute selector functions to get the class name of an object:

```php
string \UObject::getClassName( $reference )
void   \UObject::replaceByClassName( $reference )
```