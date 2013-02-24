<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UObject {



	/*************************************************************************
	  CONERSION METHODS
	 *************************************************************************/
	public static function convertToClass( $mixed ) {
		if ( is_object( $mixed ) ) {
			$mixed = get_class( $mixed );
		} else {
			\UString::doNotStartWith( $mixed, '\\' );
		}
		return $mixed;
	}

	public static function doConvertToClass( &$mixed ) {
		$mixed = \UObject::convertToClass( $mixed );
	}



	/*************************************************************************
	  GETTER METHODS
	 *************************************************************************/
	public static function getAttributeNames( $class ) {
		\UObject::doConvertToClass( $class );
		if ( class_exists( $class ) ) {
			return array_keys( get_class_vars( $class ) );
		}
		return FALSE;
	}

	public static function getNamespace( $class ) {
		\UObject::doConvertToClass( $class );
		return \UString::substrBeforeLast( $class, '\\' );
	}

	public static function getClassName( $class ) {
		\UObject::doConvertToClass( $class );
		return \UString::substrAfterLast( $class, '\\' );
	}
}