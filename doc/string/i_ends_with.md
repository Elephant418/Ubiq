[Ubiq](../index.md) / [String](../index.md#string) / i_ends_with
======


Description
-------- 

```php
bool \Util\String\i_ends_with( string $hay, mixed $needles );
```

Checks if a string ends with a specific character/sequence. <br>
If several matches are given, checks if the string ends with at least one of them.

**Note**: This function is case insensitive. See [ends_with](./ends_with.md).



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
\Util\Str\i_ends_with( 'Ubiq is so cool', 'cool' );
```
Returns TRUE.

### Example 2

```php
\Util\Str\i_ends_with( 'Ubiq is so cool', 'Cool' );
```
Returns TRUE.

### Example 3

```php
\Util\Str\i_ends_with( 'Ubiq is so cool', 'boring' );
```
Returns FALSE.

### Example 4

```php
\Util\Str\i_ends_with( 'Ubiq is so cool', [ 'cool', 'boring' ] );
```
Returns TRUE.

### Example 5

```php
\Util\Str\i_ends_with( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
```
Returns TRUE.

### Example 6

```php
\Util\Str\i_ends_with( 'Ubiq is so cool', [ 'boring', 'classy' ] );
```
Returns FALSE.
