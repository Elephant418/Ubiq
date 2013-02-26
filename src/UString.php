<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UString {



	/*************************************************************************
	  STARTS WITH & ENDS WITH METHODS
	 *************************************************************************/
	public static function isStartWith( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $haystack, 0, strlen( $needle ) ) === $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	public static function isStartWithInsensitive( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString::isStartWith( strtolower( $haystack ), $needles );
	}

	public static function startWith( $haystack, $needle ) {
		if ( ! \UString::isStartWith( $haystack, $needle ) ) {
			$haystack = $needle . $haystack;
		}
		return $haystack;
	}

	public static function doStartWith( &$haystack, $needle ) {
		$haystack = \UString::startWith( $haystack, $needle );
	}

	public static function notStartWith( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		array_walk( $needles, function( &$a ) {
			$a = preg_quote( $a, '/' );
		} );
		$pattern = '/^(' . implode( '|', $needles ) . ')+/';
		$haystack = preg_replace( $pattern, '', $haystack );
		return $haystack;
	}

	public static function doNotStartWith( &$haystack, $needles ) {
		$haystack = \UString::notStartWith( $haystack, $needles );
	}

	public static function isEndWith( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $haystack, -strlen( $needle ) ) === $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	public static function isEndWithInsensitive( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString::isEndWith( strtolower( $haystack ), $needles );
	}

	public static function endWith( $haystack, $needle ) {
		if ( ! \UString::isEndWith( $haystack, $needle ) ) {
			$haystack .= $needle;
		}
		return $haystack;
	}

	public static function doEndWith( &$haystack, $needle ) {
		$haystack = \UString::endWith( $haystack, $needle );
	}

	public static function notEndWith( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		array_walk( $needles, function( &$a ) {
			$a = preg_quote( $a, '/' );
		} );
		$pattern = '/(' . implode( '|', $needles ) . ')+$/';
		$haystack = preg_replace( $pattern, '', $haystack );
		return $haystack;
	}

	public static function doNotEndWith( &$haystack, $needles ) {
		$haystack = \UString::notEndWith( $haystack, $needles );
	}



	/*************************************************************************
	  HAS METHODS
	 *************************************************************************/
	public static function has( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		foreach( $needles as $needle ) {
			if ( strpos( $haystack, $needle ) !== FALSE ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	public static function hasInsensitive( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString::has( $haystack, $needles );
	}



	/*************************************************************************
	  SUBSTRING METHODS
	 *************************************************************************/
	public static function substrBefore( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$result = $haystack;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString::has( $haystack, $needle ) ) {
				$cut = substr( $haystack, 0, strpos( $haystack, $needle ) );
				if ( strlen( $cut ) < strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		$haystack = substr( $haystack, strlen( $result ) );
		return $result;
	}

	public static function doSubstrBefore( &$haystack, $needles ) {
		$substr = \UString::substrBefore( $haystack, $needles );
		$pop = substr( $haystack, strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}

	public static function substrBeforeLast( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$result = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle ) && \UString::has( $haystack, $needle ) ) {
				$cut = substr( $haystack, 0, strrpos( $haystack, $needle ) );
				if ( strlen( $cut ) > strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		$haystack = substr( $haystack, strlen( $result ) );
		return $result;
	}

	public static function doSubstrBeforeLast( &$haystack, $needles ) {
		$substr = \UString::substrBeforeLast( $haystack, $needles );
		$pop = substr( $haystack, strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}

	public static function substrAfter( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$result = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString::has( $haystack, $needle ) ) {
				$cut = substr( $haystack, strpos( $haystack, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) > strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	public static function doSubstrAfter( &$haystack, $needles ) {
		$substr = \UString::substrAfter( $haystack, $needles );
		$pop = substr( $haystack, 0, strlen( $haystack ) - strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}

	public static function substrAfterLast( $haystack, $needles ) {
		\UArray::doConvertToArray( $needles );
		$result = $haystack;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString::has( $haystack, $needle ) ) {
				$cut = substr( $haystack, strrpos( $haystack, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) < strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	public static function doSubstrAfterLast( &$haystack, $needles ) {
		$substr = \UString::substrAfterLast( $haystack, $needles );
		$pop = substr( $haystack, 0, strlen( $haystack ) - strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}



	/*************************************************************************
	  RANDOM METHODS
	 *************************************************************************/
	public static function random( $length = 10, $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ) {
		$string = '';
		for ( $i = 0; $i < $length; $i++ ) {
			$string .= $chars[ mt_rand( 0, strlen( $chars ) - 1 ) ];
		}
		return $string;
	}



	/*************************************************************************
	  SPECIAL CHARS METHODS
	 *************************************************************************/
	public static function stripAccent( $string ) {
		$match   = array( 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ' );
		$replace = array( 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o' );
		return str_replace( $match, $replace, $string );
	}

	public static function doStripAccent( &$string ) {
		$string = \UString::stripAccent( $string );
	}

	public static function stripSpecialChar( $string, $chars = '-_a-zA-Z0-9', $replace = '-' ) {
		$string = preg_replace( '/[^' . $chars . ']/s', $replace, $string );
		if ( ! empty( $replace ) ) {
			$string = preg_replace( '/[' . $replace . ']+/s', $replace, $string );
			\UString::doNotStartWith( $string, $replace );
			\UString::doNotEndWith( $string, $replace );
		}
		return $string;
	}

	public static function doStripSpecialChar( &$string, $chars = '-_a-zA-Z0-9', $replace = '-' ) {
		$string = \UString::stripSpecialChar( $string, $chars, $replace );
	}
}