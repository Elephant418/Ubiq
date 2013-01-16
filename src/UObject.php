<?php

/* This file is part of the Ubiq project, which is under MIT license */

class UObject {



	/*************************************************************************
	  CONERSION METHODS
	 *************************************************************************/
	public static function convert_to_class( $mixed ) {
		if ( is_object( $mixed ) ) {
			$mixed = get_class( $mixed );
		} else {
			\UString::do_not_start_with( $mixed, '\\' );
		}
		return $mixed;
	}

	public static function do_convert_to_class( &$mixed ) {
		$mixed = \UObject::convert_to_class( $mixed );
	}



	/*************************************************************************
	  GETTER METHODS
	 *************************************************************************/
	public static function get_attribute_names( $class ) {
		\UObject::do_convert_to_class( $class );
		if ( class_exists( $class ) ) {
			return array_keys( get_class_vars( $class ) );
		}
		return FALSE;
	}

	public static function get_namespace( $class ) {
		\UObject::do_convert_to_class( $class );
		return \UString::substr_before_last( $class, '\\' );
	}

	public static function get_class_name( $class ) {
		\UObject::do_convert_to_class( $class );
		return \UString::substr_after_last( $class, '\\' );
	}
}