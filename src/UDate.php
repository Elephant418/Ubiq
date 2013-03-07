<?php

class UDate {

	public static function format( $format, $timestamp = NULL ) {
		if ( is_null( $timestamp ) ) {
			$timestamp = time();
		}
		$format = preg_replace( '/(.)/', '\\\\$1', $format );
		$format = strtr( $format, array( 
			'\\D' => 'j',
			'\\D\\D' => 'd',
			'\\M' => 'n',
			'\\M\\M' => 'm',
			'\\Y\\Y' => 'y',
			'\\Y\\Y\\Y\\Y' => 'Y',
		) );
		return date( $format, $timestamp );
	}
}