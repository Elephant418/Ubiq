<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UArray {



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
	  OFFSET METHODS
	 *************************************************************************/
	public static function get_offset_index( $array, $index ) {
		return array_search( $index, array_keys( $array ), TRUE );
	}



	/*************************************************************************
	  REMOVING METHODS
	 *************************************************************************/
	public static function remove_index( $array, $indexes ) {
		\UArray::do_convert_to_array( $indexes );
		$removed_keys = [ ];
		foreach( $indexes as $index ) {
			if ( is_numeric( $index ) ) {
				$gap = 0;
				foreach ( $removed_keys as $removed_key ) {
					if ( $removed_key < $index ) {
						$gap++;
					}
				}
				$key = $index - $gap;
				if ( array_key_exists( $key, $array ) ) {
					$offset = \UArray::get_offset_index( $array, $key );
					array_splice( $array, $offset, 1 );
					$removed_keys[ ] = $index;
				}
			} else {
				unset( $array[ $index ] );
			}
		}
		return $array;
	}

	public static function do_remove_index( &$array, $indexes ) {
		$array = \UArray::remove_index( $array, $indexes );
	}

	public static function remove_value( $array, $values ) {
		\UArray::do_convert_to_array( $values );
		$indexes = [ ];
		foreach( $values as $value ) {
			$indexes = array_merge( $indexes, array_keys( $array, $value ) );
		}
		return \UArray::remove_index( $array, $indexes );
	}

	public static function do_remove_value( &$array, $values ) {
		$array = \UArray::remove_value( $array, $values );
	}



	/*************************************************************************
	  MERGE METHODS
	 *************************************************************************/
	// Keep the order of each FIRST occurence 
	public static function merge_unique( $array1 ) {
		return array_values( array_unique( call_user_func_array( 'array_merge', func_get_args( ) ) ) );
	}

	// Keep the order of each LAST occurence 
	public static function reverse_merge_unique( $array1 ) {
		return array_reverse( array_values( array_unique( array_reverse( call_user_func_array( 'array_merge', func_get_args( ) ) ) ) ) );
	}
}