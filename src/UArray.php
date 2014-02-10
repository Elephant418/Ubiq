<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UArray {



    /*************************************************************************
    CONVERSION METHODS
     *************************************************************************/
    public static function getAsArray($reference)
    {
        if (is_object($reference)) {
            if (is_a($reference, 'StdClass')) {
                $reference = (array) $reference;
            } else if (is_a($reference, 'ArrayObject')) {
                $reference = $reference->getArrayCopy();
            } else {
                $reference = get_object_vars($reference);
            }
        } else if (! is_array($reference)) {
            if (empty($reference)) {
                $reference = array();
            } else {
                $reference = array($reference);
            }
        }
        return $reference;
    }

    public static function convertToArray(&$reference)
    {
        $reference = \UArray::getAsArray($reference);
    }
    
    public static function isTraversable($reference) {
        return (is_array($reference) || $reference instanceof Traversable);
    }



    /*************************************************************************
    SCHEMA METHODS
     *************************************************************************/
    public static function isMatchSchema($reference, $schema)
    {
        foreach ($schema as $key => $value) {
            if (is_numeric($key)) {
                if (! isset($reference[ $value ])) {
                    return false;
                }
            }
        }
        return true;
    }

    public static function applySchema($array, $schema)
    {
        foreach ($schema as $key => $value) {
            if (is_numeric($key)) {
                if (! isset($array[ $value ])) {
                    return false;
                }
            } else {
                if (! isset($array[ $key ])) {
                    $array[ $key ] = $value;
                }
            }
        }
        return $array;
    }

    public static function doApplySchema(&$array, $schema)
    {
        $result = \UArray::applySchema($array, $schema);
        if ($result !== false) {
            $array = $result;
        }
        return ($result !== false);
    }



    /*************************************************************************
    OFFSET, INDEX & KEY METHODS
     *************************************************************************/
    public static function getOffsetIndex($array, $index)
    {
        return array_search($index, array_keys($array), true);
    }
    public static function isAssociative($array)
    {
        return (array_values($array) !== $array);
    }
    public static function isSequential($array)
    {
        return (! \UArray::isAssociative($array));
    }
    public static function getKeyValue($item, $key, $default=null)
    {
        if (isset($item[$key])) {
            return $item[$key];
        }
        if (isset($item->$key)) {
            return $item->$key;
        }
        return $default;
    }
    public static function renameKey($array, $key, $newKey)
    {
        if (!isset($array[$key])) {
            return $array;
        }
        $keys = array_keys($array);
        $keys = array_combine($keys, $keys);
        $keys[ $key ] = $newKey;
        return array_combine($keys, $array);
    }

    public static function doRenameKey(&$array, $key, $newKey)
    {
        $array = \UArray::renameKey($array, $key, $newKey);
    }



    /*************************************************************************
    REMOVING METHODS
     *************************************************************************/
    public static function removeIndex($array, $indexes)
    {
        \UArray::convertToArray($indexes);
        $removed_keys = array();
        foreach($indexes as $index) {
            if (is_numeric($index)) {
                $gap = 0;
                foreach ($removed_keys as $removed_key) {
                    if ($removed_key < $index) {
                        $gap++;
                    }
                }
                $key = $index - $gap;
                if (array_key_exists($key, $array)) {
                    $offset = \UArray::getOffsetIndex($array, $key);
                    array_splice($array, $offset, 1);
                    $removed_keys[ ] = $index;
                }
            } else {
                unset($array[ $index ]);
            }
        }
        return $array;
    }

    public static function doRemoveIndex(&$array, $indexes)
    {
        $array = \UArray::removeIndex($array, $indexes);
    }

    public static function removeValue($array, $values)
    {
        \UArray::convertToArray($values);
        $indexes = array();
        foreach($values as $value) {
            $indexes = array_merge($indexes, array_keys($array, $value));
        }
        return \UArray::removeIndex($array, $indexes);
    }

    public static function doRemoveValue(&$array, $values)
    {
        $array = \UArray::removeValue($array, $values);
    }



    /*************************************************************************
    SUB ITEM METHODS
     *************************************************************************/
    public static function keyBySubItem($array, $subIndex)
    {
        $newArray = array();
        foreach($array as $item) {
            $key = \UArray::getKeyValue($item, $subIndex, 'empty');
            $newArray[$key] = $item;
        }
        return $newArray;
    }

    public static function doKeyBySubItem(&$array, $subIndex)
    {
        $array = \UArray::keyBySubItem($array, $subIndex);
    }

    public static function fillBySubItem($array, $subIndex)
    {
        $newArray = array();
        foreach($array as $key => $item) {
            $newArray[$key] = \UArray::getKeyValue($item, $subIndex);
        }
        return $newArray;
    }

    public static function doFillBySubItem(&$array, $subIndex)
    {
        $array = \UArray::fillBySubItem($array, $subIndex);
    }

    public static function groupBySubItem($array, $subIndex)
    {
        $newArray = array();
        foreach($array as $key => $item) {
            $group = \UArray::getKeyValue($item, $subIndex, 'empty');
            $newArray[$group][$key] = $item;
        }
        return $newArray;
    }

    public static function doGroupBySubItem(&$array, $subIndex)
    {
        $array = \UArray::groupBySubItem($array, $subIndex);
    }

    public static function filterBySubItem($array, $subIndex, $subValue)
    {
        $newArray = array();
        foreach($array as $item) {
            $indexValue = \UArray::getKeyValue($item, $subIndex);
            if ($indexValue === $subValue) {
                $newArray[] = $item;
            }
        }
        return $newArray;
    }

    public static function doFilterBySubItem(&$array, $subIndex, $subValue)
    {
        $array = \UArray::filterBySubItem($array, $subIndex, $subValue);
    }



    /*************************************************************************
    MERGE METHODS
     *************************************************************************/
    // Keep the order of each FIRST occurrence 
    public static function mergeUnique($array1)
    {
        return array_values(array_unique(call_user_func_array('array_merge', func_get_args())));
    }
    public static function doMergeUnique(&$array1)
    {
        $array1 = call_user_func_array(array('UArray', 'mergeUnique'), func_get_args());
    }

    // Keep the order of each LAST v 
    public static function reverseMergeUnique($array1)
    {
        return array_reverse(array_values(array_unique(array_reverse(call_user_func_array('array_merge', func_get_args())))));
    }
    public static function doReverseMergeUnique(&$array1)
    {
        $array1 = call_user_func_array(array('UArray', 'reverseMergeUnique'), func_get_args());
    }

    // array_merge_recursive that keep the depth of the arrays
    public static function mergeRecursive($reference, $append)
    {
        \UArray::doMergeRecursive($reference, $append);
        return $reference;
    }
    public static function doMergeRecursive(&$reference, $append)
    {
        foreach ($append as $key => $value) {
            if (isset($reference[ $key ])) {
                if (is_array($reference[ $key ]) && is_array($value)) {
                    $reference[ $key ] = \UArray::mergeRecursive($reference[ $key ], $value);
                } else {
                    if (is_numeric($key)) {
                        $reference[ ] = $value;
                    } else {
                        $reference[ $key ] = $value;
                    }
                }
            } else {
                $reference[ $key ] = $value;
            }
        }
    }



    /*************************************************************************
    DEEP SELECTORS METHODS
     *************************************************************************/
    public static function convertDeepSelectors($array)
    {
        $newArray = array();
        foreach($array as $selector => $value) {
            if (is_array($value)) {
                \UArray::doConvertDeepSelectors($value);
            }
            \UArray::doSetDeepSelector($newArray, $selector, $value);
        }
        return $newArray;
    }

    public static function doConvertDeepSelectors(&$array)
    {
        $array = \UArray::convertDeepSelectors($array);
    }

    public static function hasDeepSelector($array, $selector)
    {
        return static::deepSelectorCallback($array, $selector, function(&$current, $current_key) {
            return false;
        }, function (&$current, $current_key) use (&$array) {
            return true;
        });
    }

    public static function getDeepSelector($array, $selector)
    {
        return static::deepSelectorCallback($array, $selector, function(&$current, $current_key) {
            return null;
        }, function (&$current, $current_key) use (&$array) {
            return $current[ $current_key ];
        });
    }

    public static function setDeepSelector($array, $selector, $value)
    {
        return static::deepSelectorCallback($array, $selector, function(&$current, $current_key) {
            $current[ $current_key ] = array();
        }, function (&$current, $current_key) use (&$array, $value) {
            $current[ $current_key ] = $value;
            return $array;
        });
    }

    public static function doSetDeepSelector(&$array, $selector, $value)
    {
        $array = \UArray::setDeepSelector($array, $selector, $value);
    }

    public static function unsetDeepSelector($array, $selector)
    {
        return static::deepSelectorCallback($array, $selector, function(&$current, $current_key) use (&$array) {
            return $array;
        }, function (&$current, $current_key) use (&$array) {
            unset($current[ $current_key ]);
            return $array;
        });
    }

    public static function doUnsetDeepSelector(&$array, $selector)
    {
        $array = \UArray::unsetDeepSelector($array, $selector);
    }

    public static function deepSelectorCallback(&$array, $selector, $callback_path_not_found, $callback_end)
    {
        $path = explode('.', $selector);
        $current_key = $selector;
        $current =& $array;
        while (count($path)) {
            $current_key = array_shift($path);
            if (! isset($current[ $current_key ]) || ! is_array($current[ $current_key ])) {
                $result = call_user_func_array($callback_path_not_found, array(&$current, $current_key));
                if (! isset($current[ $current_key ])) {
                    return $result;
                }
            }
            if (count($path)) {
                $current =& $current[ $current_key ];
            }
        }
        $result = call_user_func_array($callback_end, array(&$current, $current_key));
        return $result;
    }
}