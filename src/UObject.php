<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UObject {



	/*************************************************************************
	  CLASS NAME METHODS
	 *************************************************************************/
	public static function getClassName($reference)
    {
		if (is_object($reference)) {
			$class = get_class($reference);
		} else {
            $class = \UString::getUnprefixedBy($reference, '\\');
		}
		return $class;
	}

	public static function replaceByClassName(&$reference)
    {
		$reference = \UObject::getClassName($reference);
	}
    
	public static function getAttributeNames($reference)
    {
		\UObject::replaceByClassName($reference);
		if (class_exists($reference)) {
			return array_keys(get_class_vars($reference));
		}
		return false;
	}

    public static function replaceByAttributeNames(&$reference)
    {
        $reference = \UObject::getAttributeNames($reference);
    }

	public static function getNamespace($reference)
    {
		\UObject::replaceByClassName($reference);
		return \UString::getCutBeforeLast($reference, '\\');
	}

    public static function replaceByNamespace(&$reference)
    {
        $reference = \UObject::getNamespace($reference);
    }

	public static function getClassBaseName($reference)
    {
		\UObject::replaceByClassName($reference);
		return \UString::getCutAfterLast($reference, '\\');
	}

    public static function replaceByClassBaseName(&$reference)
    {
        $reference = \UObject::getClassBaseName($reference);
    }
}