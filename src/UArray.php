<?php

/* This file is part of the Ubiq project, which is under MIT license */

class UArray {



	/*************************************************************************
	  CONERSION METHODS
	 *************************************************************************/
	public static function convert_to_array( $mixed ) {
		if ( is_object( $mixed ) ) {
			if ( is_a( $mixed, 'StdClass' ) ) {
				$mixed = ( array ) $mixed;
			} else if ( is_a( $mixed, 'ArrayObject' ) ) {
				$mixed = $mixed->getArrayCopy( );
			} else {
				$mixed = get_object_vars( $mixed );
			}
		} else if ( ! is_array( $mixed ) ) {
			if ( empty( $mixed ) ) {
				$mixed = [ ];
			} else {
				$mixed = [ $mixed ];
			}
		}
		return $mixed;
	}

	public static function do_convert_to_array( &$mixed ) {
		$mixed = \UArray::convert_to_array( $mixed );
	}



	/*************************************************************************
	  SCHEMA METHODS
	 *************************************************************************/
	public static function is_match_schema( $array, $schema ) {
		foreach ( $schema as $key => $value ) {
			if ( is_numeric( $key ) ) {
				if ( ! isset( $array[ $value ] ) ) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	public static function apply_schema( $array, $schema ) {
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
		return $array;
	}

	public static function do_apply_schema( &$array, $schema ) {
		$result = \UArray::apply_schema( $array, $schema );
		if ( $result !== FALSE ) {
			$array = $result;
		}
		return ( $result !== FALSE );
	}



	/*************************************************************************
	  MERGE METHODS
	 *************************************************************************/
	// Keep the order of each FIRST occurence 
	public static function merge_unique( $array1, $array2 ) {
		return array_values( array_unique( call_user_func_array( 'array_merge', func_get_args( ) ) ) );
	}

	// Keep the order of each LAST occurence 
	public static function reverse_merge_unique( $array1, $array2 ) {
		return array_reverse( array_values( array_unique( array_reverse( call_user_func_array( 'array_merge', func_get_args( ) ) ) ) ) );
	}
}