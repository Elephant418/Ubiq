[Ubiq](../index.md) / [String](../index.md#string) / starts_with
======


Description
-------- 

```php
bool \Util\String\starts_with( string $hay, mixed $needles );
```

Checks if a string starts with a specific character/sequence. <br>
If several matches are given, checks if the string starts with at least one of them. <br>
This function is case sensitive.




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
\Util\Str\starts_with( 'Ubiq is so cool', 'Ubiq' );
```
Returns TRUE.

### Example 2

```php
\Util\Str\starts_with( 'Ubiq is so cool', 'Java' );
```
Returns FALSE.

### Example 3

```php
\Util\Str\starts_with( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
```
Returns TRUE.

### Example 4

```php
\Util\Str\starts_with( 'Ubiq is so cool', [ 'Java', '.NET' ] );
```
Returns FALSE.
