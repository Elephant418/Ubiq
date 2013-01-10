<?php

/* This file is part of the Ubiq project, which is under MIT license */


/*************************************************************************
  STRING METHODS                   
 *************************************************************************/
namespace UString {



	// STARTS WITH & ENDS WITH FUNCTIONS
	function starts_with( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $hay, 0, strlen( $needle ) ) == $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function i_starts_with( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString\starts_with( strtolower( $hay ), $needles );
	}

	function must_starts_with( &$hay, $needle ) {
		if ( ! \UString\starts_with( $hay, $needle ) ) {
			$hay = $needle . $hay;
		}
	}

	function must_not_starts_with( &$hay, $needle ) {
		if ( \UString\starts_with( $hay, $needle ) ) {
			$hay = substr( $hay, strlen( $needle ) );
		}
	}

	function ends_with( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $hay, -strlen( $needle ) ) == $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function i_ends_with( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString\ends_with( strtolower( $hay ), $needles );
	}

	function must_ends_with( &$hay, $needle ) {
		if ( ! \UString\ends_with( $hay, $needle ) ) {
			$hay .= $needle;
		}
	}

	function must_not_ends_with( &$hay, $needle ) {
		if ( \UString\ends_with( $hay, $needle ) ) {
			$hay = substr( $hay, 0, -strlen( $needle ) );
		}
	}



	// CONTAINS FUNCTIONS
	function contains( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( strpos( $hay, $needle ) !== FALSE ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function i_contains( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString\contains( $hay, $needles );
	}



	// SUBSTRING FUNCTIONS
	function cut_before( &$hay, $needles ) {
		$return = \UString\substr_before( $hay, $needles );
		$hay = substr( $hay, strlen( $return ) );
		return $return;
	}

	function substr_before( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$return = $hay;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString\contains( $hay, $needle ) ) {
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
		$return = \UString\substr_before_last( $hay, $needles );
		$hay = substr( $hay, strlen( $return ) );
		return $return;
	}

	function substr_before_last( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$return = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle ) && \UString\contains( $hay, $needle ) ) {
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
		$return = \UString\substr_after( $hay, $needles );
		$hay = substr( $hay, 0, strlen( $hay ) - strlen( $return ) );
		return $return;
	}

	function substr_after( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$return = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString\contains( $hay, $needle ) ) {
				$cut = substr( $hay, strpos( $hay, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) > strlen ( $return ) ) {
					$return = $cut;
				}
			}
		}
		return $return;
	}

	function cut_after_last( &$hay, $needles ) {
		$return = \UString\substr_after_last( $hay, $needles );
		$hay = substr( $hay, 0, strlen( $hay ) - strlen( $return ) );
		return $return;
	}

	function substr_after_last( $hay, $needles ) {
		\UArray\must_be_array( $needles );
		$return = $hay;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString\contains( $hay, $needle ) ) {
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



	// SPECIAL CHARACTERS
	function strip_accents( $string ) {
		$string = htmlentities( $string, ENT_COMPAT );
		$string = preg_replace( '/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $string );
		return html_entity_decode( $string );
	}

	function strip_special_chars( $string, $characters = '-_a-zA-Z0-9', $replace = '-' ) {
		$string = preg_replace( '/[^' . $characters . ']/s', $replace, $string );
		if ( ! empty( $replace ) ) {
			$string = preg_replace( '/[' . $replace . '+]/s', $replace, $string );
		}
		return $string;
	}
}



/*************************************************************************
  ARRAY METHODS                   
 *************************************************************************/
namespace UArray {

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
		return array_values( array_unique( call_user_func_array( 'array_merge', func_get_args( ) ) ) );
	}

	// Keep the order of each LAST occurence 
	function reverse_merge_unique( $array1, $array2 ) {
		return array_reverse( array_values( array_unique( array_reverse( call_user_func_array( 'array_merge', func_get_args( ) ) ) ) ) );
	}
}



/*************************************************************************
  OBJECT METHODS                   
 *************************************************************************/
namespace UObject {

	function must_be_class( &$object ) {
		if ( is_object( $object ) ) {
			$object = get_class( $object );
		}
	}

	function get_attribute_names( $class ) {
		\UObject\must_be_class( $class );
		return array_keys( get_class_vars( $class ) );
	}

	function get_namespace( $class ) {
		\UObject\must_be_class( $class );
		\UString\must_starts_with( $class, '\\' );
		return \UString\substr_before_last( $class, '\\' );
	}

	function get_class_name( $class ) {
		\UObject\must_be_class( $class );
		\UString\must_starts_with( $class, '\\' );
		return \UString\substr_after_last( $class, '\\' );
	}
}