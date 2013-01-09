[Ubiq](../index.md) / [String](../index.md#string) / must_starts_with
======


Description
-------- 

```php
void \Util\String\must_starts_with( string &$hay, string $needle );
```

If a string does not start with a specific character/sequence, the string is prefixed.

**Note**: The string is passed by reference.



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
		<td>$hay</td>
		<td>string</td>
		<td>the input string</td>
		<td>Yes</td>
	</tr>
	<tr>
		<td>$needle</td>
		<td>string</td>
		<td>the searched value</td>
		<td>Yes</td>
	</tr>
</table>



Returns
--------

No value is returned. 



Examples
--------

### Example 1

```php
$assertion = 'www.example.com';
\Util\Str\must_starts_with( $assertion, 'http://' );
echo $assertion;
```
Returns 'http://www.example.com'.

### Example 2

```php
$assertion = 'http://www.example.com';
\Util\Str\must_starts_with( $assertion, 'http://' );
echo $assertion;
```
Returns 'http://www.example.com'.
