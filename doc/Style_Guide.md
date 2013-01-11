Style Guide
======



Variable Declaration
---------
The variable declarations are better nicely spaced.  
Prefer use single quotes (') rather than double quotes (") to avoid including a variable inadvertently.

```php
$array = [ 'name' ];
$array[ ] = 'And more';
$string = 'A string';
$string = 'A string with an included' . $parameter . ' inside.';
```



Indenting
---------
All your code should be properly indented, preferably with tabs.

```php
while ( $a < 3 ) {
	if ( $a == 1 ) {
		echo 'A was equal to 1';
	} else {
		// Do something
	}
}
```



Control Structures
---------
Always use braces for your loops and conditions, even for one line instruction.  
Notice that spaces, especially before and after the parentheses, helps distinguish conditions.

```php
if ( $a == 1 && $b == 2 ) {
	echo 'A was equal to 1';
}
```



Function Calls
---------
Functions should be called with no space between the function name and the parentheses.  
Spaces between params and parentheses are encouraged.

```php
$var = my_function( $x, $y );
```



Function Definition
---------
The underscores are used as word separators in function names.  
There is no space between the function name and the parentheses, and the params are nicely spaced.  
The braces are put at the end of the declaration line.

```php
function my_function( $var1, $var2 = '' ) {
	// Indent all code inside here
	return $result;
}
```



Class Definition
---------
The underscores are used as word separators in class names and a capital letter must start every word.  
The braces are put at the end of the declaration line.

```php
class My_Class {

	public function my_method( $var1, $var2 = '' ) {
		// Indent all code inside here
		return $result;
	}
}
```



Comments
---------
You can put useful or funny comments in your code, but not too much.  
Your comments must NEVER be necessary, otherwise it is a sign of bad code.