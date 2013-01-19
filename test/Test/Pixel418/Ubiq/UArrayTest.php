<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

echo 'Ubiq ' . \Pixel418\Ubiq::VERSION . ' tested with ';

class UArrayTest extends \PHPUnit_Framework_TestCase {



	/*************************************************************************
	  CONVERT TO ARRAY
	 *************************************************************************/
	public function test_convert_to_array__string( ) {
		$array = \UArray::convert_to_array( 'a string' );
		$this->assertEquals( [ 'a string' ], $array );
	}

	public function test_convert_to_array__string_empty( ) {
		$array =\UArray::convert_to_array( '' );
		$this->assertEquals( [ ], $array );
	}

	public function test_convert_to_array__null( ) {
		$array =\UArray::convert_to_array( NULL );
		$this->assertEquals( [ ], $array );
	}

	public function test_convert_to_array__array( ) {
		$array = \UArray::convert_to_array( [ 'a string' ] );
		$this->assertEquals( [ 'a string' ], $array );
	}

	public function test_convert_to_array__object__stdclass( ) {
		$mixed = new \StdClass( );
		$mixed->entry = 'a string';
		$array = \UArray::convert_to_array( $mixed );
		$this->assertEquals( [ 'entry' => 'a string' ], $array );
	}

	public function test_convert_to_array__object__array_object( ) {
		$array = \UArray::convert_to_array( new \ArrayObject( [ 'entry' => 'a string' ] ) );
		$this->assertEquals( [ 'entry' => 'a string' ], $array );
	}

	public function test_convert_to_array__object__exception( ) {
		$mixed = new \Exception( );
		$mixed->entry = 'a string';
		$array = \UArray::convert_to_array( $mixed );
		$this->assertEquals( [ 'entry' => 'a string' ], $array );
	}



	/*************************************************************************
	  DO CONVERT TO ARRAY
	 *************************************************************************/
	public function test_do_convert_to_array__string( ) {
		$array = 'a string';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ 'a string' ], $array );
	}

	public function test_do_convert_to_array__string_empty( ) {
		$array = '';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ ], $array );
	}

	public function test_do_convert_to_array__null( ) {
		$array = NULL;
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ ], $array );
	}

	public function test_do_convert_to_array__array( ) {
		$array = [ 'a string' ];
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ 'a string' ], $array );
	}

	public function test_do_convert_to_array__object__stdclass( ) {
		$array = new \StdClass( );
		$array->entry = 'a string';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ 'entry' => 'a string' ], $array );
	}

	public function test_do_convert_to_array__object__array_object( ) {
		$array = new \ArrayObject( [ 'entry' => 'a string' ] );
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ 'entry' => 'a string' ], $array );
	}

	public function test_do_convert_to_array__object__exception( ) {
		$array = new \Exception( );
		$array->entry = 'a string';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( [ 'entry' => 'a string' ], $array );
	}



	/*************************************************************************
	  IS MATCH SCHEMA
	 *************************************************************************/
	public function test_is_match_schema__ko( ) {
		$array  = [ ];
		$schema = [ 'needed' ];
		$test = \UArray::is_match_schema( $array, $schema );
		$this->assertFalse( $test );
	}

	public function test_is_match_schema__optional( ) {
		$array  = [ ];
		$schema = [ 'optional' => 3 ];
		$test = \UArray::is_match_schema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__extra( ) {
		$array  = [ 'extra' => 4 ];
		$schema = [ 'optional' => 3 ];
		$test = \UArray::is_match_schema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__needed( ) {
		$array  = [ 'needed' => 1 ];
		$schema = [ 'needed' ];
		$test = \UArray::is_match_schema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__needed_optional( ) {
		$array  = [ 'needed' => 1, 'optional' => 2 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$test = \UArray::is_match_schema( $array, $schema );
		$this->assertTrue( $test );
	}

	public function test_is_match_schema__needed_optional_extra( ) {
		$array  = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$test = \UArray::is_match_schema( $array, $schema );
		$this->assertTrue( $test );
	}



	/*************************************************************************
	  APPLY VALID SCHEMA
	 *************************************************************************/
	public function test_apply_schema__ko( ) {
		$array  = [ ];
		$schema = [ 'needed' ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertFalse( $array );
	}

	public function test_apply_schema__optional( ) {
		$array  = [ ];
		$schema = [ 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( $schema, $array );
	}

	public function test_apply_schema__extra( ) {
		$array  = [ 'extra' => 4 ];
		$schema = [ 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( [ 'optional' => 3, 'extra' => 4 ], $array );
	}

	public function test_apply_schema__needed( ) {
		$array  = [ 'needed' => 1 ];
		$schema = [ 'needed' ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( [ 'needed' => 1 ], $array );
	}

	public function test_apply_schema__needed_optional( ) {
		$array  = [ 'needed' => 1, 'optional' => 2 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( [ 'needed' => 1, 'optional' => 2 ], $array );
	}

	public function test_apply_schema__needed_optional_extra( ) {
		$array  = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ], $array );
	}



	/*************************************************************************
	  DO APPLY VALID SCHEMA
	 *************************************************************************/
	public function test_do_apply_schema__ko( ) {
		$array  = [ ];
		$schema = [ 'needed' ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertFalse( $test );
	}

	public function test_do_apply_schema__optional( ) {
		$array  = [ ];
		$schema = [ 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( $schema, $array );
	}

	public function test_do_apply_schema__extra( ) {
		$array  = [ 'extra' => 4 ];
		$schema = [ 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( [ 'optional' => 3, 'extra' => 4 ], $array );
	}

	public function test_do_apply_schema__needed( ) {
		$array  = [ 'needed' => 1 ];
		$schema = [ 'needed' ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( [ 'needed' => 1 ], $array );
	}

	public function test_do_apply_schema__needed_optional( ) {
		$array  = [ 'needed' => 1, 'optional' => 2 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( [ 'needed' => 1, 'optional' => 2 ], $array );
	}

	public function test_do_apply_schema__needed_optional_extra( ) {
		$array  = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ], $array );
	}



	/*************************************************************************
	  REMOVE INDEX
	 *************************************************************************/
	public function test_remove_index__no_match_key( ) {
		$removed = \UArray::remove_index( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ], 1 );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ], $removed );
	}

	public function test_remove_index__no_match_index( ) {
		$removed = \UArray::remove_index( [ 1, 2, 3 ], 'coco' );
		$this->assertEquals( [ 1, 2, 3 ], $removed );
	}

	public function test_remove_index__match_key( ) {
		$removed = \UArray::remove_index( [ 1, 2, 3 ], 1 );
		$this->assertEquals( [ 1, 3 ], $removed );
	}

	public function test_remove_index__match_key_2( ) {
		$removed = \UArray::remove_index( [ 'name' => 'Thomas', 1, 2, 3 ], 1 );
		$this->assertEquals( [ 'name' => 'Thomas', 1, 3 ], $removed );
	}

	public function test_remove_index__match_index( ) {
		$removed = \UArray::remove_index( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ], 'as' );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ] ], $removed );
	}

	public function test_remove_index__match_keys( ) {
		$removed = \UArray::remove_index( [ 1, 2, 3 ], [ 0, 1 ] );
		$this->assertEquals( [ 3 ], $removed );
	}

	public function test_remove_index__match_keys_inverse( ) {
		$removed = \UArray::remove_index( [ 1, 2, 3 ], [ 1, 0 ] );
		$this->assertEquals( [ 3 ], $removed );
	}

	public function test_remove_index__match_indexes( ) {
		$removed = \UArray::remove_index( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ], [ 'as', 'role' ] );
		$this->assertEquals( [ 'name' => 'Thomas' ], $removed );
	}

	public function test_remove_index__hybrid( ) {
		$removed = \UArray::remove_index( [ 1, 2, 3, 'name' => 'Thomas' ], [ '1', 'name' ] );
		$this->assertEquals( [ 1, 3 ], $removed );
	}



	/*************************************************************************
	  DO REMOVE INDEX
	 *************************************************************************/
	public function test_do_remove_index__no_match_key( ) {
		$array = [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_index( $array, 1 );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ], $array );
	}

	public function test_do_remove_index__no_match_index( ) {
		$array = [ 1, 2, 3 ];
		\UArray::do_remove_index( $array, 'coco' );
		$this->assertEquals( [ 1, 2, 3 ], $array );
	}

	public function test_do_remove_index__match_key( ) {
		$array = [ 1, 2, 3 ];
		\UArray::do_remove_index( $array, 1 );
		$this->assertEquals( [ 1, 3 ], $array );
	}

	public function test_do_remove_index__match_key_2( ) {
		$array = [ 'name' => 'Thomas', 1, 2, 3 ];
		\UArray::do_remove_index( $array, 1 );
		$this->assertEquals( [ 'name' => 'Thomas', 1, 3 ], $array );
	}


	public function test_do_remove_index__match_index( ) {
		$array = [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_index( $array, 'as' );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ] ], $array );
	}

	public function test_do_remove_index__match_keys( ) {
		$array = [ 1, 2, 3 ];
		\UArray::do_remove_index( $array, [ 0, 1 ] );
		$this->assertEquals( [ 3 ], $array );
	}

	public function test_do_remove_index__match_keys_inverse( ) {
		$array = [ 1, 2, 3 ];
		\UArray::do_remove_index( $array, [ 1, 0 ] );
		$this->assertEquals( [ 3 ], $array );
	}

	public function test_do_remove_index__match_indexes( ) {
		$array = [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_index( $array, [ 'as', 'role' ] );
		$this->assertEquals( [ 'name' => 'Thomas' ], $array );
	}

	public function test_do_remove_index__hybrid( ) {
		$array = [ 1, 2, 3, 'name' => 'Thomas' ];
		\UArray::do_remove_index( $array, [ '1', 'name' ] );
		$this->assertEquals( [ 1, 3 ], $array );
	}



	/*************************************************************************
	  REMOVE VALUE
	 *************************************************************************/
	public function test_remove_value__no_match( ) {
		$removed = \UArray::remove_value( [ 1, 2, 3 ] , 'Thomas' );
		$this->assertEquals( [ 1, 2, 3 ], $removed );
	}

	public function test_remove_value__match_int( ) {
		$removed = \UArray::remove_value( [ 1, 2, 3 ] , 2 );
		$this->assertEquals( [ 1, 3 ], $removed );
	}

	public function test_remove_value__match_int_2( ) {
		$removed = \UArray::remove_value( [ 'name' => 'Thomas', 1, 2, 3 ] , [ 2, 'Thomas' ] );
		$this->assertEquals( [ 1, 3 ], $removed );
	}

	public function test_remove_value__match_string( ) {
		$removed = \UArray::remove_value( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ] , 'Creator' );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ] ], $removed );
	}

	public function test_remove_value__match_array( ) {
		$removed = \UArray::remove_value( [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ] , [ [ 'Developer' ] ] );
		$this->assertEquals( [ 'name' => 'Thomas', 'as' => 'Creator' ], $removed );
	}

	public function test_remove_value__several_match( ) {
		$removed = \UArray::remove_value( [ 'name' => 'Thomas', 'Creator', 'role' => [ 'Developer' ], 'as' => 'Creator' ] , 'Creator' );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ] ], $removed );
	}

	public function test_remove_value__hybrid_match( ) {
		$removed = \UArray::remove_value( [ 'name' => 'Thomas', 2, 3, 'role' => [ 'Developer' ], 'as' => 'Creator' ] , [ 2, 'Creator' ] );
		$this->assertEquals( [ 'name' => 'Thomas', 3, 'role' => [ 'Developer' ] ], $removed );
	}



	/*************************************************************************
	  DO REMOVE VALUE
	 *************************************************************************/
	public function test_do_remove_value__no_match( ) {
		$array = [ 1, 2, 3 ];
		\UArray::do_remove_value( $array, 'Thomas' );
		$this->assertEquals( [ 1, 2, 3 ], $array );
	}

	public function test_do_remove_value__match_int( ) {
		$array = [ 1, 2, 3 ];
		\UArray::do_remove_value( $array , 2 );
		$this->assertEquals( [ 1, 3 ], $array );
	}

	public function test_do_remove_value__match_int_2( ) {
		$array = [ 'name' => 'Thomas', 1, 2, 3 ];
		\UArray::do_remove_value( $array, [ 2, 'Thomas' ] );
		$this->assertEquals( [ 1, 3 ], $array );
	}

	public function test_do_remove_value__match_string( ) {
		$array = [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_value( $array, 'Creator' );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ] ], $array );
	}

	public function test_do_remove_value__match_array( ) {
		$array = [ 'name' => 'Thomas', 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_value( $array, [ [ 'Developer' ] ] );
		$this->assertEquals( [ 'name' => 'Thomas', 'as' => 'Creator' ], $array );
	}

	public function test_do_remove_value__several_match( ) {
		$array = [ 'name' => 'Thomas', 'Creator', 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_value( $array, 'Creator' );
		$this->assertEquals( [ 'name' => 'Thomas', 'role' => [ 'Developer' ] ], $array );
	}

	public function test_do_remove_value__hybrid_match( ) {
		$array = [ 'name' => 'Thomas', 2, 3, 'role' => [ 'Developer' ], 'as' => 'Creator' ];
		\UArray::do_remove_value( $array, [ 2, 'Creator' ] );
		$this->assertEquals( [ 'name' => 'Thomas', 3, 'role' => [ 'Developer' ] ], $array );
	}



	/*************************************************************************
	  MERGE UNIQUE
	 *************************************************************************/
	public function test_merge_unique__two( ) {
		$merged = \UArray::merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( [ 1, 2, 3, 4 ], $merged );
	}

	public function test_merge_unique__three( ) {
		$merged = \UArray::merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( [ 1, 2, 3, 4, 5 ], $merged );
	}



	/*************************************************************************
	  REVERSE MERGE UNIQUE
	 *************************************************************************/
	public function test_reverse_merge_unique__two( ) {
		$merged = \UArray::reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( [ 1, 2, 3, 4 ], $merged );
	}

	public function test_reverse_merge_unique__three( ) {
		$merged = \UArray::reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( [ 1, 3, 4, 5, 2 ], $merged );
	}
}