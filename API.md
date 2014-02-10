Ubiq API Style Guide
==============

Only treatment: The first argument is always the reference.
So there is no generator, for example: no random string generator.

Every Ubiq operators should match one these 3 API cases.


1. Modifier
-------------

There is 3 templates of modifier API:

```php
void  \UType::modifyExplicitly( &$reference, $param )
mixed \UType::getModifiedExplicitly( $reference, $param )
bool  \UType::isModifiedExplicitly( $reference, $param )
```

For example, the modifier functions to suffix a string:

```php
void   \UString::suffixBy( &$reference, $suffix )
string \UString::getSuffixedBy( $reference, $suffix )
bool   \UString::isSuffixedBy( $reference, $suffix )
```


2. Converter
-------------

There is 3 templates of converter API:

```php
void  \UType::convertToExplicitType( &$reference, $param )
mixed \UType::getAsExplicitType( $reference, $param )
mixed \UType::isExplicitType( $reference, $param )
```

For example, the converter functions to convert anything to an array:

```php
void  \UArray::convertToArray( &$reference )
array \UArray::getAsArray( $reference )
bool  \UArray::isTraversable( $reference )
```


3. Attribute Selector
-------------

There is 3 templates of attribute selector API:

```php
mixed \UType::getExplicitAttribute( &$reference, $param )
void  \UType::replaceByExplicitAttribute( $reference, $param )
bool  \UType::hasExplicitAttribute( $reference, $param )
```

For example, the attribute selector functions to get the class name of an object:

```php
string \UObject::getNamespace( &$reference )
void   \UObject::replaceByNamespace( $reference )
bool   \UObject::hasNamespace( $reference )
```