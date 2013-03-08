<?php

class UDate {

	public static function format( $humanPattern, $timestamp = NULL ) {
		if ( is_null( $timestamp ) ) {
			$timestamp = time();
		}
		$pattern = \UDate::convertPatternToPHP( $humanPattern );
		return date( $pattern, $timestamp );
	}

	public static function createFromFormat( $humanPattern, $time ) {
		$pattern = \UDate::convertPatternToPHP( $humanPattern );
		return \DateTime::createFromFormat( $pattern, $time );
	}

	public static function getTimestampFromFormat( $humanPattern, $time ) {
		if ( $date = \UDate::createFromFormat( $humanPattern, $time ) ) {
			return $date->getTimestamp( );
		}
		return FALSE;
	}

	public static function checkFormat( $humanPattern, $time ) {
		$regex = \UDate::convertPatternToRegex( $humanPattern );
		if ( preg_match( $regex, $time ) !== 1 ) {
			return FALSE;
		}
		$timestamp = \UDate::getTimestampFromFormat( $humanPattern, $time );
		if ( $timestamp === FALSE ) {
			return FALSE;
		}
		return ( \UDate::format( $humanPattern, $timestamp ) === $time );
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