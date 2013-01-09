[Ubiq](../index.md) / [String](../index.md#string) / cut_before
======


Description
-------- 

```php
string \Util\Str\cut_before( string &$hay, mixed $needles );
```

Cut a string from a specific character/sequence. <br>
If several matches are given, the sequence that generate the shorter cut is kept.

**Note**: The string is passed by reference. See [substr_before](./substr_before.md).



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
		<td rowspan="2">$needles</td>
		<td>string</td>
		<td>the searched value</td>
		<td rowspan="2">Yes</td>
	</tr>
	<tr>
		<td>array</td>
		<td>the searched values</td>
	</tr>
</table>



Returns
--------

Return the portion of string from the beginning to the first match.



Examples
--------

Todo.