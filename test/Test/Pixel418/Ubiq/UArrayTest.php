<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

echo 'Ubiq ' . \Pixel418\Ubiq::VERSION . ' tested with ';

date_default_timezone_set('Europe/Paris');

class UArrayTest extends \PHPUnit_Framework_TestCase {



	/*************************************************************************
	  CONVERT TO ARRAY
	 *************************************************************************/
	public function test_convert_to_array__string( ) {
		$array = \UArray::convertToArray( 'a string' );
		$this->assertEquals( array( 'a string' ), $array );
	}

	public function test_convert_to_array__string_empty( ) {
		$array =\UArray::convertToArray( '' );
		$this->assertEquals( array( ), $array );
	}

	public function test_convert_to_array__null( ) {
		$array =\UArray::convertToArray( NULL );
		$this->assertEquals( array( ), $array );
	}

	public function test_convert_to_array__array( ) {
		$array = \UArray::convertToArray( array( 'a string' ) );
		$this->assertEquals( array( 'a string' ), $array );
	}

	public function test_convert_to_array__object__stdclass( ) {
		$mixed = new \StdClass( );
		$mixed->entry = 'a string';
		$array = \UArray::convertToArray( $mixed );
		$this->assertEquals( array( 'entry' => 'a string' ), $array );
	}

	public function test_convert_to_array__object__array_object( ) {
		$array = \UArray::convertToArray( new \ArrayObject( array( 'entry' => 'a string' ) ) );
		$this->assertEquals( array( 'entry' => 'a string' ), $array );
	}

	public function test_convert_to_array__object__exception( ) {
		$mixed = new \Exception( );
		$mixed->entry = 'a string';
		$array = \UArray::convertToArray( $mixed );
		$this->assertEquals( array( 'entry' => 'a string' ), $array );
	}



	/*************************************************************************
	  DO CONVERT TO ARRAY
	 *************************************************************************/
	public function test_do_convert_to_array__string( ) {
		$array = 'a string';
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( 'a string' ), $array );
	}

	public function test_do_convert_to_array__string_empty( ) {
		$array = '';
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( ), $array );
	}

	public function test_do_convert_to_array__null( ) {
		$array = NULL;
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( ), $array );
	}

	public function test_do_convert_to_array__array( ) {
		$array = array( 'a string' );
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( 'a string' ), $array );
	}

	public function test_do_convert_to_array__object__stdclass( ) {
		$array = new \StdClass( );
		$array->entry = 'a string';
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( 'entry' => 'a string' ), $array );
	}

	public function test_do_convert_to_array__object__array_object( ) {
		$array = new \ArrayObject( array( 'entry' => 'a string' ) );
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( 'entry' => 'a string' ), $array );
	}

	public function test_do_convert_to_array__object__exception( ) {
		$array = new \Exception( );
		$array->entry = 'a string';
		\UArray::doConvertToArray( $array );
		$this->assertEquals( array( 'entry' => 'a string' ), $array );
	}



	/*************************************************************************
	  IS MATCH SCHEMA
	 *************************************************************************/
	public function test_is_match_schema__ko( ) {
		$array  = array( );
		$schema = array( 'needed' );
		$test = \UArray::isMatchSchema( $array, $schema );
		$this->assertFalse( $test );
	}

	public function test_is_match_schema__optional( ) {
		$array  = array( );
		$schema = array( 'optional' => 3 );
		$test = \UArray::isMatchSchema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__extra( ) {
		$array  = array( 'extra' => 4 );
		$schema = array( 'optional' => 3 );
		$test = \UArray::isMatchSchema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__needed( ) {
		$array  = array( 'needed' => 1 );
		$schema = array( 'needed' );
		$test = \UArray::isMatchSchema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__needed_optional( ) {
		$array  = array( 'needed' => 1, 'optional' => 2 );
		$schema = array( 'needed', 'optional' => 3 );
		$test = \UArray::isMatchSchema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__needed_optional_extra( ) {
		$array  = array( 'needed' => 1, 'optional' => 2, 'extra' => 4 );
		$schema = array( 'needed', 'optional' => 3 );
		$test = \UArray::isMatchSchema( $array, $schema );
		$this->assertTrue( $test );
	}



	/*************************************************************************
	  APPLY VALID SCHEMA
	 *************************************************************************/
	public function test_apply_schema__ko( ) {
		$array  = array( );
		$schema = array( 'needed' );
		$array = \UArray::applySchema( $array, $schema );
		$this->assertFalse( $array );
	}

	public function test_apply_schema__optional( ) {
		$array  = array( );
		$schema = array( 'optional' => 3 );
		$array = \UArray::applySchema( $array, $schema );
		$this->assertEquals( $schema, $array );
	}

	public function test_apply_schema__extra( ) {
		$array  = array( 'extra' => 4 );
		$schema = array( 'optional' => 3 );
		$array = \UArray::applySchema( $array, $schema );
		$this->assertEquals( array( 'optional' => 3, 'extra' => 4 ), $array );
	}

	public function test_apply_schema__needed( ) {
		$array  = array( 'needed' => 1 );
		$schema = array( 'needed' );
		$array = \UArray::applySchema( $array, $schema );
		$this->assertEquals( array( 'needed' => 1 ), $array );
	}

	public function test_apply_schema__needed_optional( ) {
		$array  = array( 'needed' => 1, 'optional' => 2 );
		$schema = array( 'needed', 'optional' => 3 );
		$array = \UArray::applySchema( $array, $schema );
		$this->assertEquals( array( 'needed' => 1, 'optional' => 2 ), $array );
	}

	public function test_apply_schema__needed_optional_extra( ) {
		$array  = array( 'needed' => 1, 'optional' => 2, 'extra' => 4 );
		$schema = array( 'needed', 'optional' => 3 );
		$array = \UArray::applySchema( $array, $schema );
		$this->assertEquals( array( 'needed' => 1, 'optional' => 2, 'extra' => 4 ), $array );
	}



	/*************************************************************************
	  DO APPLY VALID SCHEMA
	 *************************************************************************/
	public function test_do_apply_schema__ko( ) {
		$array  = array( );
		$schema = array( 'needed' );
		$test = \UArray::doApplySchema( $array, $schema );
		$this->assertFalse( $test );
	}

	public function test_do_apply_schema__optional( ) {
		$array  = array( );
		$schema = array( 'optional' => 3 );
		$test = \UArray::doApplySchema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( $schema, $array );
	}

	public function test_do_apply_schema__extra( ) {
		$array  = array( 'extra' => 4 );
		$schema = array( 'optional' => 3 );
		$test = \UArray::doApplySchema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( array( 'optional' => 3, 'extra' => 4 ), $array );
	}

	public function test_do_apply_schema__needed( ) {
		$array  = array( 'needed' => 1 );
		$schema = array( 'needed' );
		$test = \UArray::doApplySchema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( array( 'needed' => 1 ), $array );
	}

	public function test_do_apply_schema__needed_optional( ) {
		$array  = array( 'needed' => 1, 'optional' => 2 );
		$schema = array( 'needed', 'optional' => 3 );
		$test = \UArray::doApplySchema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( array( 'needed' => 1, 'optional' => 2 ), $array );
	}

	public function test_do_apply_schema__needed_optional_extra( ) {
		$array  = array( 'needed' => 1, 'optional' => 2, 'extra' => 4 );
		$schema = array( 'needed', 'optional' => 3 );
		$test = \UArray::doApplySchema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( array( 'needed' => 1, 'optional' => 2, 'extra' => 4 ), $array );
	}



	/*************************************************************************
	  REMOVE INDEX
	 *************************************************************************/
	public function test_remove_index__no_match_key( ) {
		$removed = \UArray::removeIndex( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ), 1 );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ), $removed );
	}

	public function test_remove_index__no_match_index( ) {
		$removed = \UArray::removeIndex( array( 1, 2, 3 ), 'coco' );
		$this->assertEquals( array( 1, 2, 3 ), $removed );
	}

	public function test_remove_index__match_key( ) {
		$removed = \UArray::removeIndex( array( 1, 2, 3 ), 1 );
		$this->assertEquals( array( 1, 3 ), $removed );
	}

	public function test_remove_index__match_key_2( ) {
		$removed = \UArray::removeIndex( array( 'name' => 'Thomas', 1, 2, 3 ), 1 );
		$this->assertEquals( array( 'name' => 'Thomas', 1, 3 ), $removed );
	}

	public function test_remove_index__match_index( ) {
		$removed = \UArray::removeIndex( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ), 'as' );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ) ), $removed );
	}

	public function test_remove_index__match_keys( ) {
		$removed = \UArray::removeIndex( array( 1, 2, 3 ), array( 0, 1 ) );
		$this->assertEquals( array( 3 ), $removed );
	}

	public function test_remove_index__match_keys_inverse( ) {
		$removed = \UArray::removeIndex( array( 1, 2, 3 ), array( 1, 0 ) );
		$this->assertEquals( array( 3 ), $removed );
	}

	public function test_remove_index__match_indexes( ) {
		$removed = \UArray::removeIndex( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ), array( 'as', 'role' ) );
		$this->assertEquals( array( 'name' => 'Thomas' ), $removed );
	}

	public function test_remove_index__hybrid( ) {
		$removed = \UArray::removeIndex( array( 1, 2, 3, 'name' => 'Thomas' ), array( '1', 'name' ) );
		$this->assertEquals( array( 1, 3 ), $removed );
	}



	/*************************************************************************
	  DO REMOVE INDEX
	 *************************************************************************/
	public function test_do_remove_index__no_match_key( ) {
		$array = array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveIndex( $array, 1 );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ), $array );
	}

	public function test_do_remove_index__no_match_index( ) {
		$array = array( 1, 2, 3 );
		\UArray::doRemoveIndex( $array, 'coco' );
		$this->assertEquals( array( 1, 2, 3 ), $array );
	}

	public function test_do_remove_index__match_key( ) {
		$array = array( 1, 2, 3 );
		\UArray::doRemoveIndex( $array, 1 );
		$this->assertEquals( array( 1, 3 ), $array );
	}

	public function test_do_remove_index__match_key_2( ) {
		$array = array( 'name' => 'Thomas', 1, 2, 3 );
		\UArray::doRemoveIndex( $array, 1 );
		$this->assertEquals( array( 'name' => 'Thomas', 1, 3 ), $array );
	}


	public function test_do_remove_index__match_index( ) {
		$array = array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveIndex( $array, 'as' );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ) ), $array );
	}

	public function test_do_remove_index__match_keys( ) {
		$array = array( 1, 2, 3 );
		\UArray::doRemoveIndex( $array, array( 0, 1 ) );
		$this->assertEquals( array( 3 ), $array );
	}

	public function test_do_remove_index__match_keys_inverse( ) {
		$array = array( 1, 2, 3 );
		\UArray::doRemoveIndex( $array, array( 1, 0 ) );
		$this->assertEquals( array( 3 ), $array );
	}

	public function test_do_remove_index__match_indexes( ) {
		$array = array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveIndex( $array, array( 'as', 'role' ) );
		$this->assertEquals( array( 'name' => 'Thomas' ), $array );
	}

	public function test_do_remove_index__hybrid( ) {
		$array = array( 1, 2, 3, 'name' => 'Thomas' );
		\UArray::doRemoveIndex( $array, array( '1', 'name' ) );
		$this->assertEquals( array( 1, 3 ), $array );
	}



	/*************************************************************************
	  REMOVE VALUE
	 *************************************************************************/
	public function test_remove_value__no_match( ) {
		$removed = \UArray::removeValue( array( 1, 2, 3 ) , 'Thomas' );
		$this->assertEquals( array( 1, 2, 3 ), $removed );
	}

	public function test_remove_value__match_int( ) {
		$removed = \UArray::removeValue( array( 1, 2, 3 ) , 2 );
		$this->assertEquals( array( 1, 3 ), $removed );
	}

	public function test_remove_value__match_int_2( ) {
		$removed = \UArray::removeValue( array( 'name' => 'Thomas', 1, 2, 3 ) , array( 2, 'Thomas' ) );
		$this->assertEquals( array( 1, 3 ), $removed );
	}

	public function test_remove_value__match_string( ) {
		$removed = \UArray::removeValue( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ) , 'Creator' );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ) ), $removed );
	}

	public function test_remove_value__match_array( ) {
		$removed = \UArray::removeValue( array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' ) , array( array( 'Developer' ) ) );
		$this->assertEquals( array( 'name' => 'Thomas', 'as' => 'Creator' ), $removed );
	}

	public function test_remove_value__several_match( ) {
		$removed = \UArray::removeValue( array( 'name' => 'Thomas', 'Creator', 'role' => array( 'Developer' ), 'as' => 'Creator' ) , 'Creator' );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ) ), $removed );
	}

	public function test_remove_value__hybrid_match( ) {
		$removed = \UArray::removeValue( array( 'name' => 'Thomas', 2, 3, 'role' => array( 'Developer' ), 'as' => 'Creator' ) , array( 2, 'Creator' ) );
		$this->assertEquals( array( 'name' => 'Thomas', 3, 'role' => array( 'Developer' ) ), $removed );
	}



	/*************************************************************************
	  DO REMOVE VALUE
	 *************************************************************************/
	public function test_do_remove_value__no_match( ) {
		$array = array( 1, 2, 3 );
		\UArray::doRemoveValue( $array, 'Thomas' );
		$this->assertEquals( array( 1, 2, 3 ), $array );
	}

	public function test_do_remove_value__match_int( ) {
		$array = array( 1, 2, 3 );
		\UArray::doRemoveValue( $array , 2 );
		$this->assertEquals( array( 1, 3 ), $array );
	}

	public function test_do_remove_value__match_int_2( ) {
		$array = array( 'name' => 'Thomas', 1, 2, 3 );
		\UArray::doRemoveValue( $array, array( 2, 'Thomas' ) );
		$this->assertEquals( array( 1, 3 ), $array );
	}

	public function test_do_remove_value__match_string( ) {
		$array = array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveValue( $array, 'Creator' );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ) ), $array );
	}

	public function test_do_remove_value__match_array( ) {
		$array = array( 'name' => 'Thomas', 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveValue( $array, array( array( 'Developer' ) ) );
		$this->assertEquals( array( 'name' => 'Thomas', 'as' => 'Creator' ), $array );
	}

	public function test_do_remove_value__several_match( ) {
		$array = array( 'name' => 'Thomas', 'Creator', 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveValue( $array, 'Creator' );
		$this->assertEquals( array( 'name' => 'Thomas', 'role' => array( 'Developer' ) ), $array );
	}

	public function test_do_remove_value__hybrid_match( ) {
		$array = array( 'name' => 'Thomas', 2, 3, 'role' => array( 'Developer' ), 'as' => 'Creator' );
		\UArray::doRemoveValue( $array, array( 2, 'Creator' ) );
		$this->assertEquals( array( 'name' => 'Thomas', 3, 'role' => array( 'Developer' ) ), $array );
	}



	/*************************************************************************
	  MERGE UNIQUE
	 *************************************************************************/
	public function test_merge_unique__two( ) {
		$merged = \UArray::mergeUnique( array( 1, 2, 3 ), array( 2, 3, 4 ) );
		$this->assertEquals( array( 1, 2, 3, 4 ), $merged );
	}

	public function test_merge_unique__three( ) {
		$merged = \UArray::mergeUnique( array( 1, 2, 3 ), array( 2, 3, 4 ), array( 5, 2 ) );
		$this->assertEquals( array( 1, 2, 3, 4, 5 ), $merged );
	}
	public function test_do_merge_unique__two( ) {
		$merged = array( 1, 2, 3 );
		\UArray::doMergeUnique( $merged, array( 2, 3, 4 ) );
		$this->assertEquals( array( 1, 2, 3, 4 ), $merged );
	}

	public function test_do_merge_unique__three( ) {
		$merged = array( 1, 2, 3 );
		\UArray::doMergeUnique( $merged, array( 2, 3, 4 ), array( 5, 2 ) );
		$this->assertEquals( array( 1, 2, 3, 4, 5 ), $merged );
	}



	/*************************************************************************
	  REVERSE MERGE UNIQUE
	 *************************************************************************/
	public function test_reverse_merge_unique__two( ) {
		$merged = \UArray::reverseMergeUnique( array( 1, 2, 3 ), array( 2, 3, 4 ) );
		$this->assertEquals( array( 1, 2, 3, 4 ), $merged );
	}

	public function test_reverse_merge_unique__three( ) {
		$merged = \UArray::reverseMergeUnique( array( 1, 2, 3 ), array( 2, 3, 4 ), array( 5, 2 ) );
		$this->assertEquals( array( 1, 3, 4, 5, 2 ), $merged );
	}

	public function test_do_reverse_merge_unique__two( ) {
		$merged = array( 1, 2, 3 );
		\UArray::doReverseMergeUnique( $merged, array( 2, 3, 4 ) );
		$this->assertEquals( array( 1, 2, 3, 4 ), $merged );
	}

	public function test_do_reverse_merge_unique__three( ) {
		$merged = array( 1, 2, 3 );
		\UArray::doReverseMergeUnique( $merged, array( 2, 3, 4 ), array( 5, 2 ) );
		$this->assertEquals( array( 1, 3, 4, 5, 2 ), $merged );
	}
}