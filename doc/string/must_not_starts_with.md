[Ubiq](../index.md) / [String](../index.md#string) / must_not_starts_with
======


Description
-------- 

```php
void \Util\String\must_not_starts_with( string &$hay, string $needle );
```

If a string starts with a specific character/sequence, the prefix is removed.

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
$assertion = 'http://www.pixel418.com';
\Util\Str\must_not_starts_with( $assertion, 'http://' );
echo $assertion;
```
Returns 'www.pixel418.com'.

### Example 2

```php
$assertion = 'www.pixel418.com';
\Util\Str\must_not_starts_with( $assertion, 'http://' );
echo $assertion;
```
Returns 'www.pixel418.com'.
