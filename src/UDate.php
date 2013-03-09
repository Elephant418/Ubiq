<?php

class UDate {

	const SQL_FORMAT = 'YYYY-MM-DD';


	public static function format( $humanPattern, $timestamp = NULL ) {
		if ( is_null( $timestamp ) ) {
			$timestamp = time();
		}
		$pattern = static::convertPatternToPHP( $humanPattern );
		return date( $pattern, $timestamp );
	}

	public static function createFromFormat( $humanPattern, $time ) {
		$pattern = static::convertPatternToPHP( $humanPattern );
		$date = \DateTime::createFromFormat( $pattern, $time );
		if ( ! $date ) {
			return FALSE;
		}
		$date->modify( 'midnight' );
		return $date;
	}

	public static function getTimestampFromFormat( $humanPattern, $time ) {
		if ( $date = static::createFromFormat( $humanPattern, $time ) ) {
			return $date->getTimestamp( );
		}
		return FALSE;
	}

	public static function checkFormat( $humanPattern, $time ) {
		$regex = static::convertPatternToRegex( $humanPattern );
		if ( preg_match( $regex, $time ) !== 1 ) {
			return FALSE;
		}
		$timestamp = static::getTimestampFromFormat( $humanPattern, $time );
		if ( $timestamp === FALSE ) {
			return FALSE;
		}
		return ( static::format( $humanPattern, $timestamp ) === $time );
	}

	public static function convertPatternToPHP( $humanPattern ) {
		$pattern = preg_replace( '/(.)/', '\\\\$1', $humanPattern );
		$pattern = strtr( $pattern, array( 
			'\\D' => 'j',
			'\\D\\D' => 'd',
			'\\M' => 'n',
			'\\M\\M' => 'm',
			'\\Y\\Y' => 'y',
			'\\Y\\Y\\Y\\Y' => 'Y',
		) );
		return $pattern;
	}

	public static function convertPatternToRegex( $humanPattern ) {
		$regex = preg_replace( '/(.)/', '\\\\$1', $humanPattern );
		$regex = strtr( $regex, array( 
			'\\D' => '(?<day>[0-3]?[0-9])',
			'\\D\\D' => '(?<day>[0-3][0-9])',
			'\\M' => '(?<month>[0-1]?[0-9])',
			'\\M\\M' => '(?<month>[0-1][0-9])',
			'\\Y\\Y' => '(?<year>[0-9][0-9])',
			'\\Y\\Y\\Y\\Y' => '(?<year>[0-9][0-9][0-9][0-9])',
		) );
		return '@' . $regex . '@';
	}
}