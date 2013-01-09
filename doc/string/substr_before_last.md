[Ubiq](../index.md) / [String](../index.md#string) / substr_before_last
======


Description
-------- 

```php
string \Util\Str\substr_before_last( string $hay, mixed $needles );
```

Return the portion of string from the beginning to a specific character/sequence. <br>
If several matches are given, the sequence that generate the larger return is kept.

**Note**: The string is not modified. See [cut_before_last](./cut_before_last.md).



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

Return the portion of string from the beginning to the last match.



Examples
--------

Todo.