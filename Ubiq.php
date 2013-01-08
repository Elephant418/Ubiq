<?php

/* This file is part of the Ubiq project, which is under MIT license */


/*************************************************************************
  STRING METHODS                   
 *************************************************************************/
namespace Util\Str {



	// STARTS WITH & ENDS WITH FUNCTIONS
	function starts_with( $hay, $needles ) {
		\Util\Arr\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $hay, 0, strlen( $needle ) ) == $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function ends_with( $hay, $needles ) {
		\Util\Arr\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $hay, -strlen( $needle ) ) == $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function i_starts_with( $hay, $needle ) {
		return \Util\String\starts_with( strtolower( $hay ), strtolower( $needle ) );
	}

	function i_ends_with( $hay, $needle ) {
		return \Util\String\ends_with( strtolower( $hay ), strtolower( $needle ) );
	}

	function must_starts_with( &$hay, $needle ) {
		if ( ! \Util\String\starts_with( $hay, $needle ) ) {
			$hay = $needle . $hay;
		}
	}

	function must_ends_with( &$hay, $needle ) {
		if ( ! \Util\String\ends_with( $hay, $needle ) ) {
			$hay .= $needle;
		}
	}

	function must_not_starts_with( &$hay, $needle ) {
		if ( \Util\String\starts_with( $hay, $needle ) ) {
			$hay = substr( $hay, strlen( $needle ) );
		}
	}

	function must_not_ends_with( &$hay, $needle ) {
		if ( \Util\String\ends_with( $hay, $needle ) ) {
			$hay = substr( $hay, 0, -strlen( $needle ) );
		}
	}



	// CONTAINS FUNCTIONS
	function contains( $hay, $needle ) {
		return ( strpos( $hay, $needle ) !== false );
	}

	function i_contains( $hay, $needle ) {
		return \Util\String\contains( strtolower( $hay ), strtolower( $needle ) );
	}



	// SUBSTRING FUNCTIONS
	function cut_before( &$hay, $needles ) {
		$return = \Util\String\substr_before( $hay, $needles );
		$hay = substr( $hay, strlen( $return ) );
		return $return;
	}

	function substr_before( $hay, $needles ) {
		must_be_array( $needles );
		$return = $hay;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \Util\String\contains( $hay, $needle ) ) {
				$cut = substr( $hay, 0, strpos( $hay, $needle ) );
				if ( strlen( $cut ) < strlen ( $return ) ) {
					$return = $cut;
				}
			}
		}
		$hay = substr( $hay, strlen( $return ) );
		return $return;
	}

	function cut_before_last( &$hay, $needles ) {
		$return = \Util\String\substr_before_last( $hay, $needles );
		$hay = substr( $hay, strlen( $return ) );
		return $return;
	}

	function substr_before_last( $hay, $needles ) {
		\Util\Arr\must_be_array( $needles );
		$return = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \Util\String\contains( $hay, $needle ) ) {
				$cut = substr( $hay, 0, strrpos( $hay, $needle ) );
				if ( strlen( $cut ) > strlen ( $return ) ) {
					$return = $cut;
				}
			}
		}
		$hay = substr( $hay, strlen( $return ) );
		return $return;
	}

	function cut_after( &$hay, $needles ) {
		$return = \Util\String\substr_after( $hay, $needles );
		$hay = substr( $hay, 0, - strlen( $return ) );
		return $return;
	}

	function substr_after( $hay, $needles ) {
		\Util\Arr\must_be_array( $needles );
		$return = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \Util\String\contains( $hay, $needle ) ) {
				$cut = substr( $hay, strpos( $hay, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) > strlen ( $return ) ) {
					$return = $cut;
				}
			}
		}
		return $return;
	}

	function cut_after_last( &$hay, $needles ) {
		$return = \Util\String\substr_after_last( $hay, $needles );
		$hay = substr( $hay, 0, - strlen( $return ) );
		return $return;
	}

	function substr_after_last( $hay, $needles ) {
		\Util\Arr\must_be_array( $needles );
		$return = $hay;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \Util\String\contains( $hay, $needle ) ) {
				$cut = substr( $hay, strrpos( $hay, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) < strlen ( $return ) ) {
					$return = $cut;
				}
			}
		}
		return $return;
	}



	// RANDOM FUNCTIONS
	function random( $length = 10, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ) {
		$string = '';
		for ( $i = 0; $i < $length; $i++ ) {
			$string .= $characters[ mt_rand( 0, strlen( $characters ) - 1 ) ];
		}
		return $string;
	}
}



/*************************************************************************
  ARRAY METHODS                   
 *************************************************************************/
namespace Util\Arr {

	function must_be_array( &$array ) {
		if ( ! is_array( $array ) ) {
			$array = [ $array ];
		}
	}

	function must_valid_schema( &$array, $schema ) {
		foreach ( $schema as $key => $value ) {
			if ( is_numeric( $key ) ) {
				if ( ! isset( $array[ $value ] ) ) {
					return FALSE;
				}
			} else {
				if ( ! isset( $array[ $key ] ) ) {
					$array[ $key ] = $value;
				}
			}
		}
		return TRUE;
	}

	// Keep the order of each FIRST occurence 
	function merge_unique( $array1, $array2 ) {
		return array_values( array_unique( array_merge( $array1, $array2 ) ) );
	}

	// Keep the order of each LAST occurence 
	function reverse_merge_unique( $array1, $array2 ) {
		return array_reverse( array_values( array_unique( array_reverse( array_merge( $array1, $array2 ) ) ) ) );
	}
}



/*************************************************************************
  OBJECT METHODS                   
 *************************************************************************/
namespace Util\Obj {

	function must_be_class( &$object ) {
		if ( is_object( $object ) ) {
			$object = get_class( $object );
		}
	}

	function get_attribute_names( $object ) {
		return array_keys( get_object_vars( $object ) );
	}
}



/*************************************************************************
  HTTP METHODS                   
 *************************************************************************/
namespace Util\Http {

	function redirect( $url ) {
		header( 'HTTP/1.1 302 Moved Temporarily' );
		header( 'Location: ' . $url );
		die( );
	}
}