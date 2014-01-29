<?php

/* This file is part of the Ubiq project, which is under MIT license */

abstract class UArray {



    /*************************************************************************
    CONVERSION METHODS
     *************************************************************************/
    public static function convertToArray( $mixed ) {
        if ( is_object( $mixed ) ) {
            if ( is_a( $mixed, 'StdClass' ) ) {
                $mixed = ( array ) $mixed;
            } else if ( is_a( $mixed, 'ArrayObject' ) ) {
                $mixed = $mixed->getArrayCopy( );
            } else {
                $mixed = get_object_vars( $mixed );
            }
        } else if ( ! is_array( $mixed ) ) {
            if ( empty( $mixed ) ) {
                $mixed = array( );
            } else {
                $mixed = array( $mixed );
            }
        }
        return $mixed;
    }

    public static function doConvertToArray( &$mixed ) {
        $mixed = \UArray::convertToArray( $mixed );
    }



    /*************************************************************************
    SCHEMA METHODS
     *************************************************************************/
    public static function isMatchSchema( $array, $schema ) {
        foreach ( $schema as $key => $value ) {
            if ( is_numeric( $key ) ) {
                if ( ! isset( $array[ $value ] ) ) {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

    public static function applySchema( $array, $schema ) {
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
        return $array;
    }

    public static function doApplySchema( &$array, $schema ) {
        $result = \UArray::applySchema( $array, $schema );
        if ( $result !== FALSE ) {
            $array = $result;
        }
        return ( $result !== FALSE );
    }



    /*************************************************************************
    OFFSET, INDEX & KEY METHODS
     *************************************************************************/
    public static function getOffsetIndex( $array, $index ) {
        return array_search( $index, array_keys( $array ), TRUE );
    }
    public static function isAssociative( $array ) {
        return ( array_values( $array ) !== $array );
    }
    public static function isSequential( $array ) {
        return ( ! \UArray::isAssociative( $array ) );
    }
    public static function getKeyValue( $item, $key, $default=NULL ) {
        if (isset($item[$key])) {
            return $item[$key];
        }
        if (isset($item->$key)) {
            return $item->$key;
        }
        return $default;
    }
    public static function renameKey( $array, $key, $newKey ) {
        if (!isset($array[$key])) {
            return $array;
        }
        $keys = array_keys( $array );
        $keys = array_combine( $keys, $keys );
        $keys[ $key ] = $newKey;
        return array_combine( $keys, $array );
    }

    public static function doRenameKey( &$array, $key, $newKey ) {
        $array = \UArray::renameKey( $array, $key, $newKey );
    }



    /*************************************************************************
    REMOVING METHODS
     *************************************************************************/
    public static function removeIndex( $array, $indexes ) {
        \UArray::doConvertToArray( $indexes );
        $removed_keys = array( );
        foreach( $indexes as $index ) {
            if ( is_numeric( $index ) ) {
                $gap = 0;
                foreach ( $removed_keys as $removed_key ) {
                    if ( $removed_key < $index ) {
                        $gap++;
                    }
                }
                $key = $index - $gap;
                if ( array_key_exists( $key, $array ) ) {
                    $offset = \UArray::getOffsetIndex( $array, $key );
                    array_splice( $array, $offset, 1 );
                    $removed_keys[ ] = $index;
                }
            } else {
                unset( $array[ $index ] );
            }
        }
        return $array;
    }

    public static function doRemoveIndex( &$array, $indexes ) {
        $array = \UArray::removeIndex( $array, $indexes );
    }

    public static function removeValue( $array, $values ) {
        \UArray::doConvertToArray( $values );
        $indexes = array( );
        foreach( $values as $value ) {
            $indexes = array_merge( $indexes, array_keys( $array, $value ) );
        }
        return \UArray::removeIndex( $array, $indexes );
    }

    public static function doRemoveValue( &$array, $values ) {
        $array = \UArray::removeValue( $array, $values );
    }



    /*************************************************************************
    GROUP METHODS
     *************************************************************************/
    public static function keyBy( $array, $index ) {
        $newArray = array();
        foreach( $array as $item ) {
            $key = \UArray::getKeyValue( $item, $index, 'empty' );
            $newArray[$key] = $item;
        }
        return $newArray;
    }

    public static function doKeyBy( &$array, $index ) {
        $array = \UArray::keyBy( $array, $index );
    }

    public static function valueBy( $array, $index ) {
        $newArray = array();
        foreach( $array as $key => $item ) {
            $newArray[$key] = \UArray::getKeyValue( $item, $index );
        }
        return $newArray;
    }

    public static function doValueBy( &$array, $index ) {
        $array = \UArray::valueBy( $array, $index );
    }

    public static function groupBy( $array, $index ) {
        $newArray = array();
        foreach( $array as $key => $item ) {
            $group = \UArray::getKeyValue( $item, $index, 'empty' );
            $newArray[$group][$key] = $item;
        }
        return $newArray;
    }

    public static function doGroupBy( &$array, $index ) {
        $array = \UArray::groupBy( $array, $index );
    }

    public static function filterBy( $array, $index, $value ) {
        $newArray = array();
        foreach( $array as $item ) {
            $indexValue = \UArray::getKeyValue( $item, $index );
            if ($indexValue === $value) {
                $newArray[] = $item;
            }
        }
        return $newArray;
    }

    public static function doFilterBy( &$array, $index, $value ) {
        $array = \UArray::filterBy( $array, $index, $value );
    }



    /*************************************************************************
    MERGE METHODS
     *************************************************************************/
    // Keep the order of each FIRST occurence 
    public static function mergeUnique( $array1 ) {
        return array_values( array_unique( call_user_func_array( 'array_merge', func_get_args( ) ) ) );
    }
    public static function doMergeUnique( &$array1 ) {
        $array1 = call_user_func_array( array( 'UArray', 'mergeUnique' ), func_get_args( ) );
    }

    // Keep the order of each LAST occurence 
    public static function reverseMergeUnique( $array1 ) {
        return array_reverse( array_values( array_unique( array_reverse( call_user_func_array( 'array_merge', func_get_args( ) ) ) ) ) );
    }
    public static function doReverseMergeUnique( &$array1 ) {
        $array1 = call_user_func_array( array( 'UArray', 'reverseMergeUnique' ), func_get_args( ) );
    }

    // array_merge_recursive that keep the depth of the arrays
    public static function mergeRecursive( $reference, $append ) {
        \UArray::doMergeRecursive( $reference, $append );
        return $reference;
    }
    public static function doMergeRecursive( &$reference, $append ) {
        foreach ( $append as $key => $value ) {
            if ( isset( $reference[ $key ] ) ) {
                if ( is_array( $reference[ $key ] ) && is_array( $value ) ) {
                    $reference[ $key ] = \UArray::mergeRecursive( $reference[ $key ], $value );
                } else {
                    if ( is_numeric( $key ) ) {
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
    public static function hasDeepSelector( $array, $selector ) {
        return static::deepSelectorCallback( $array, $selector, function( &$current, $current_key ) {
            return FALSE;
        }, function ( &$current, $current_key ) use ( &$array ) {
            return TRUE;
        } );
    }

    public static function getDeepSelector( $array, $selector ) {
        return static::deepSelectorCallback( $array, $selector, function( &$current, $current_key ) {
            return NULL;
        }, function ( &$current, $current_key ) use ( &$array ) {
            return $current[ $current_key ];
        } );
    }

    public static function setDeepSelector( $array, $selector, $value ) {
        return static::deepSelectorCallback( $array, $selector, function( &$current, $current_key ) {
            $current[ $current_key ] = array( );
        }, function ( &$current, $current_key ) use ( &$array, $value ) {
            $current[ $current_key ] = $value;
            return $array;
        } );
    }

    public static function unsetDeepSelector( $array, $selector ) {
        return static::deepSelectorCallback( $array, $selector, function( &$current, $current_key ) use ( &$array ) {
            return $array;
        }, function ( &$current, $current_key ) use ( &$array ) {
            unset( $current[ $current_key ] );
            return $array;
        } );
    }

    public static function deepSelectorCallback( &$array, $selector, $callback_path_not_found, $callback_end ) {
        $path = explode( '.', $selector );
        $current_key = $selector;
        $current =& $array;
        while ( count( $path ) ) {
            $current_key = array_shift( $path );
            if ( ! isset( $current[ $current_key ] ) || ! is_array( $current[ $current_key ] ) ) {
                $result = call_user_func_array( $callback_path_not_found, array( &$current, $current_key ) );
                if ( ! isset( $current[ $current_key ] ) ) {
                    return $result;
                }
            }
            if ( count( $path ) ) {
                $current =& $current[ $current_key ];
            }
        }
        $result = call_user_func_array( $callback_end, array( &$current, $current_key ) );
        return $result;
    }
}