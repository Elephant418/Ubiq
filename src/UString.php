<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UString {



	/*************************************************************************
	  PREFIX & SUFFIX METHODS
	 *************************************************************************/
	public static function isPrefixedWith($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		foreach($needles as $needle) {
			if (substr($haystack, 0, strlen($needle)) === $needle) {
				return true;
			}
		}
		return false;
	}

	public static function isPrefixedWithInsensitive($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$needles = array_map('strtolower', $needles);
		return \UString::isPrefixedWith(strtolower($haystack), $needles);
	}

	public static function getPrefixedWith($haystack, $needle)
    {
		if (! \UString::isPrefixedWith($haystack, $needle)) {
			$haystack = $needle . $haystack;
		}
		return $haystack;
	}

	public static function prefixWith(&$haystack, $needle)
    {
		$haystack = \UString::getPrefixedWith($haystack, $needle);
	}

	public static function getUnprefixedBy($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		array_walk($needles, function(&$a) {
			$a = preg_quote($a, '/');
		});
		$pattern = '/^(' . implode('|', $needles) . ')+/';
		$haystack = preg_replace($pattern, '', $haystack);
		return $haystack;
	}

	public static function unprefixBy(&$haystack, $needles)
    {
		$haystack = \UString::getUnprefixedBy($haystack, $needles);
	}

	public static function isSuffixedBy($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		foreach($needles as $needle) {
			if (substr($haystack, -strlen($needle)) === $needle) {
				return true;
			}
		}
		return false;
	}

	public static function isSuffixedByInsensitive($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$needles = array_map('strtolower', $needles);
		return \UString::isSuffixedBy(strtolower($haystack), $needles);
	}

	public static function getSuffixedBy($haystack, $needle)
    {
		if (! \UString::isSuffixedBy($haystack, $needle)) {
			$haystack .= $needle;
		}
		return $haystack;
	}

	public static function suffixBy(&$haystack, $needle)
    {
		$haystack = \UString::getSuffixedBy($haystack, $needle);
	}

	public static function getUnsuffixedBy($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		array_walk($needles, function(&$a) {
			$a = preg_quote($a, '/');
		});
		$pattern = '/(' . implode('|', $needles) . ')+$/';
		$haystack = preg_replace($pattern, '', $haystack);
		return $haystack;
	}

	public static function unsuffixBy(&$haystack, $needles)
    {
		$haystack = \UString::getUnsuffixedBy($haystack, $needles);
	}



	/*************************************************************************
	  CONTAINS METHODS
	 *************************************************************************/
	public static function contains($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		foreach($needles as $needle) {
			if (strpos($haystack, $needle) !== false) {
				return true;
			}
		}
		return false;
	}

	public static function containsInsensitive($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$needles = array_map('strtolower', $needles);
		return \UString::contains($haystack, $needles);
	}



	/*************************************************************************
	  CUT METHODS
	 *************************************************************************/
	public static function getCutBefore($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$result = $haystack;
		foreach($needles as $needle) {
			if (! empty($needle) && \UString::contains($haystack, $needle)) {
				$cut = substr($haystack, 0, strpos($haystack, $needle));
				if (strlen($cut) < strlen ($result)) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	public static function cutBefore(&$haystack, $needles)
    {
        $haystack = \UString::getCutBefore($haystack, $needles);
	}

	public static function getCutBeforeLast($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$result = '';
		foreach($needles as $needle) {
			if (! empty($needle) && \UString::contains($haystack, $needle)) {
				$cut = substr($haystack, 0, strrpos($haystack, $needle));
				if (strlen($cut) > strlen ($result)) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	public static function cutBeforeLast(&$haystack, $needles)
    {
        $haystack = \UString::getCutBeforeLast($haystack, $needles);
	}

	public static function getCutAfter($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$result = '';
		foreach($needles as $needle) {
			if (! empty($needle) && \UString::contains($haystack, $needle)) {
				$cut = substr($haystack, strpos($haystack, $needle) + strlen($needle));
				if (strlen($cut) > strlen ($result)) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	public static function cutAfter(&$haystack, $needles)
    {
        $haystack = \UString::getCutAfter($haystack, $needles);
	}

	public static function getCutAfterLast($haystack, $needles)
    {
		\UArray::convertToArray($needles);
		$result = $haystack;
		foreach($needles as $needle) {
			if (! empty($needle) && \UString::contains($haystack, $needle)) {
				$cut = substr($haystack, strrpos($haystack, $needle) + strlen($needle));
				if (strlen($cut) < strlen ($result)) {
					$result = $cut;
				}
			}
		}
		return $result;
	}

	public static function cutAfterLast(&$haystack, $needles)
    {
        $haystack = \UString::getCutAfterLast($haystack, $needles);
	}



	/*************************************************************************
	  SPECIAL CHARS METHODS
	 *************************************************************************/
	public static function getStrippedAccent($reference)
    {
		$match   = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
		$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
		return str_replace($match, $replace, $reference);
	}

	public static function stripAccent(&$reference)
    {
		$reference = \UString::getStrippedAccent($reference);
	}

	public static function getSlug($reference, $chars = '-_a-zA-Z0-9', $replace = '-')
    {
		$reference = preg_replace('/[^' . $chars . ']/s', $replace, $reference);
		if (! empty($replace)) {
			$reference = preg_replace('/[' . $replace . ']+/s', $replace, $reference);
			\UString::unprefixBy($reference, $replace);
			\UString::unsuffixBy($reference, $replace);
		}
		return $reference;
	}

	public static function convertToSlug(&$reference, $chars = '-_a-zA-Z0-9', $replace = '-')
    {
		$reference = \UString::getSlug($reference, $chars, $replace);
	}
}