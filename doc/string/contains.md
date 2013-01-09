[Ubiq](../index.md) / [String](../index.md#string) / contains
======


Description
-------- 

```php
bool \Util\Str\contains( string $hay, mixed $needles );
```

Checks if a string contains a specific character/sequence. <br>
If several matches are given, checks if the string contains at least one of them.

**Note**: This function is case sensitive. See [i_contains](./i_contains.md).



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

TRUE if there is a match, FALSE otherwise.



Examples
--------

### Example 1

```php
\Util\Str\contains( '/path/to/a/folder', '/to/' );
```
Returns TRUE.

### Example 2

```php
\Util\Str\contains( '/path/to/a/folder', '/TO/' );
```
Returns FALSE.

### Example 3

```php
\Util\Str\contains( '/path/to/a/folder', '.' );
```
Returns FALSE.

### Example 4

```php
\Util\Str\contains( '/path/to/a/folder', [ '/to/', '.' ] );
```
Returns TRUE.

### Example 5

```php
\Util\Str\contains( '/path/to/a/folder', [ '/TO/', '.' ] );
```
Returns FALSE.

### Example 46

```php
\Util\Str\contains( '/path/to/a/folder', [ 'php', '.' ] );
```
Returns FALSE.
