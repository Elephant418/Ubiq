[Ubiq](../index.md) / [String](../index.md#array) / must_valid_schema
======


Description
-------- 

```php
bool \Util\Arr\must_valid_schema( array &$array, array $schema );
```

If the parameter is not an array, it is transformed to be conform. <br>

**Note**: The array is passed by reference.



Parameters
--------

<table>
	<tr>
		<th>Name</th>
		<th>Type</th>
		<th>Description</th>
		<th>Required</th>
	</tr>
	<tr>
		<td>$array</td>
		<td>array</td>
		<td>the input that must be valid a schema</td>
		<td>Yes</td>
	</tr>
	<tr>
		<td>$schema</td>
		<td>array</td>
		<td>the schema</td>
		<td>Yes</td>
	</tr>
</table>



Returns
--------

Returns TRUE if the array is conform or it has could be transformed to be conform, FALSE otherwise. 



Examples
--------

Todo.