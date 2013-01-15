<?php

/* This file is part of the Ubiq project, which is under MIT license */

namespace Pixel418\Ubiq {
	const VERSION = '0.2.0';
}


/*************************************************************************
  STRING FUNCTIONS                   
 *************************************************************************/
namespace UString {



	// STARTS WITH & ENDS WITH FUNCTIONS
	function is_start_with( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $haystack, 0, strlen( $needle ) ) == $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function is_start_with_insensitive( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString\is_start_with( strtolower( $haystack ), $needles );
	}

	function start_with( $haystack, $needle ) {
		if ( ! \UString\is_start_with( $haystack, $needle ) ) {
			$haystack = $needle . $haystack;
		}
		return $haystack;
	}

	function do_start_with( &$haystack, $needle ) {
		$haystack = \UString\start_with( $haystack, $needle );
	}

	function not_start_with( $haystack, $needle ) {
		if ( !empty( $needle ) ) {
			while ( \UString\is_start_with( $haystack, $needle ) ) {
				$haystack = substr( $haystack, strlen( $needle ) );
			}
		}
		return $haystack;
	}

	function do_not_start_with( &$haystack, $needle ) {
		$haystack = \UString\not_start_with( $haystack, $needle );
	}

	function is_end_with( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( substr( $haystack, -strlen( $needle ) ) == $needle ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function is_end_with_insensitive( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString\is_end_with( strtolower( $haystack ), $needles );
	}

	function end_with( $haystack, $needle ) {
		if ( ! \UString\is_end_with( $haystack, $needle ) ) {
			$haystack .= $needle;
		}
		return $haystack;
	}

	function do_end_with( &$haystack, $needle ) {
		$haystack = \UString\end_with( $haystack, $needle );
	}

	function not_end_with( $haystack, $needle ) {
		if ( !empty( $needle ) ) {
			while ( \UString\is_end_with( $haystack, $needle ) ) {
				$haystack = substr( $haystack, 0, -strlen( $needle ) );
			}
		}
		return $haystack;
	}

	function do_not_end_with( &$haystack, $needle ) {
		$haystack = \UString\not_end_with( $haystack, $needle );
	}



	// has FUNCTIONS
	function has( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		foreach( $needles as $needle ) {
			if ( strpos( $haystack, $needle ) !== FALSE ) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function has_insensitive( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$needles = array_map( 'strtolower', $needles );
		return \UString\has( $haystack, $needles );
	}



	// SUBSTRING FUNCTIONS
	function substr_before( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$result = $haystack;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString\has( $haystack, $needle ) ) {
				$cut = substr( $haystack, 0, strpos( $haystack, $needle ) );
				if ( strlen( $cut ) < strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		$haystack = substr( $haystack, strlen( $result ) );
		return $result;
	}

	function do_substr_before( &$haystack, $needles ) {
		$substr = \UString\substr_before( $haystack, $needles );
		$pop = substr( $haystack, strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}

	function substr_before_last( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$result = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle ) && \UString\has( $haystack, $needle ) ) {
				$cut = substr( $haystack, 0, strrpos( $haystack, $needle ) );
				if ( strlen( $cut ) > strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		$haystack = substr( $haystack, strlen( $result ) );
		return $result;
	}

	function do_substr_before_last( &$haystack, $needles ) {
		$substr = \UString\substr_before_last( $haystack, $needles );
		$pop = substr( $haystack, strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}

	function substr_after( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$result = '';
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString\has( $haystack, $needle ) ) {
				$cut = substr( $haystack, strpos( $haystack, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) > strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	function do_substr_after( &$haystack, $needles ) {
		$substr = \UString\substr_after( $haystack, $needles );
		$pop = substr( $haystack, 0, strlen( $haystack ) - strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}

	function substr_after_last( $haystack, $needles ) {
		\UArray\must_be_array( $needles );
		$result = $haystack;
		foreach( $needles as $needle ) {
			if ( ! empty( $needle) && \UString\has( $haystack, $needle ) ) {
				$cut = substr( $haystack, strrpos( $haystack, $needle ) + strlen( $needle ) );
				if ( strlen( $cut ) < strlen ( $result ) ) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	function do_substr_after_last( &$haystack, $needles ) {
		$substr = \UString\substr_after_last( $haystack, $needles );
		$pop = substr( $haystack, 0, strlen( $haystack ) - strlen( $substr ) );
		$haystack = $substr;
		return $pop;
	}



	// RANDOM FUNCTIONS
	function random( $length = 10, $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ) {
		$string = '';
		for ( $i = 0; $i < $length; $i++ ) {
			$string .= $chars[ mt_rand( 0, strlen( $chars ) - 1 ) ];
		}
		return $string;
	}



	// SPECIAL CHARACTERS
	function strip_accent( $string ) {
		$match   = [ 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ' ];
		$replace = [ 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o' ];
		return str_replace( $match, $replace, $string );
	}

	function do_strip_accent( &$string ) {
		$string = \UString\strip_accent( $string );
	}

	function strip_special_char( $string, $chars = '-_a-zA-Z0-9', $replace = '-' ) {
		$string = preg_replace( '/[^' . $chars . ']/s', $replace, $string );
		if ( ! empty( $replace ) ) {
			$string = preg_replace( '/[' . $replace . ']+/s', $replace, $string );
			\UString\do_not_start_with( $string, $replace );
			\UString\do_not_end_with( $string, $replace );
		}
		return $string;
	}

	function do_strip_special_char( &$string, $chars = '-_a-zA-Z0-9', $replace = '-' ) {
		$string = \UString\strip_special_char( $string, $chars, $replace );
	}
}



/*************************************************************************
  ARRAY FUNCTIONS                   
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
  OBJECT FUNCTIONS                   
 *************************************************************************/
namespace UObject {

	function must_be_class( &$class ) {
		if ( is_object( $class ) ) {
			$class = get_class( $class );
		} else {
			\UString\do_not_start_with( $class, '\\' );
		}
	}

	function get_attribute_names( $class ) {
		\UObject\must_be_class( $class );
		if ( class_exists( $class ) ) {
			return array_keys( get_class_vars( $class ) );
		}
		return FALSE;
	}

	function get_namespace( $class ) {
		\UObject\must_be_class( $class );
		return \UString\substr_before_last( $class, '\\' );
	}

	function get_class_name( $class ) {
		\UObject\must_be_class( $class );
		return \UString\substr_after_last( $class, '\\' );
	}
}