<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php' );

class Array_Test extends \PHPUnit_Framework_TestCase {



	// CONVERT TO ARRAY
	public function test_convert_to_array__string( ) {
		$array = \UArray::convert_to_array( 'a string' );
		$this->assertEquals( $array, [ 'a string' ] );
	}

	public function test_convert_to_array__string_empty( ) {
		$array =\UArray::convert_to_array( '' );
		$this->assertEquals( $array, [ ] );
	}

	public function test_convert_to_array__null( ) {
		$array =\UArray::convert_to_array( NULL );
		$this->assertEquals( $array, [ ] );
	}

	public function test_convert_to_array__array( ) {
		$array = \UArray::convert_to_array( [ 'a string' ] );
		$this->assertEquals( $array, [ 'a string' ] );
	}

	public function test_convert_to_array__object__stdclass( ) {
		$mixed = new \StdClass( );
		$mixed->entry = 'a string';
		$array = \UArray::convert_to_array( $mixed );
		$this->assertEquals( $array, [ 'entry' => 'a string' ] );
	}

	public function test_convert_to_array__object__array_object( ) {
		$array = \UArray::convert_to_array( new \ArrayObject( [ 'entry' => 'a string' ] ) );
		$this->assertEquals( $array, [ 'entry' => 'a string' ] );
	}

	public function test_convert_to_array__object__exception( ) {
		$mixed = new \Exception( );
		$mixed->entry = 'a string';
		$array = \UArray::convert_to_array( $mixed );
		$this->assertEquals( $array, [ 'entry' => 'a string' ] );
	}



	// DO CONVERT TO ARRAY
	public function test_do_convert_to_array__string( ) {
		$array = 'a string';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ 'a string' ] );
	}

	public function test_do_convert_to_array__string_empty( ) {
		$array = '';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ ] );
	}

	public function test_do_convert_to_array__null( ) {
		$array = NULL;
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ ] );
	}

	public function test_do_convert_to_array__array( ) {
		$array = [ 'a string' ];
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ 'a string' ] );
	}

	public function test_do_convert_to_array__object__stdclass( ) {
		$array = new \StdClass( );
		$array->entry = 'a string';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ 'entry' => 'a string' ] );
	}

	public function test_do_convert_to_array__object__array_object( ) {
		$array = new \ArrayObject( [ 'entry' => 'a string' ] );
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ 'entry' => 'a string' ] );
	}

	public function test_do_convert_to_array__object__exception( ) {
		$array = new \Exception( );
		$array->entry = 'a string';
		\UArray::do_convert_to_array( $array );
		$this->assertEquals( $array, [ 'entry' => 'a string' ] );
	}




	// IS MATCH SCHEMA
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




	// APPLY VALID SCHEMA
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
		$this->assertEquals( $array, $schema );
	}

	public function test_apply_schema__extra( ) {
		$array  = [ 'extra' => 4 ];
		$schema = [ 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( $array, [ 'optional' => 3, 'extra' => 4 ] );
	}

	public function test_apply_schema__needed( ) {
		$array  = [ 'needed' => 1 ];
		$schema = [ 'needed' ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( $array, [ 'needed' => 1 ] );
	}

	public function test_apply_schema__needed_optional( ) {
		$array  = [ 'needed' => 1, 'optional' => 2 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( $array, [ 'needed' => 1, 'optional' => 2 ] );
	}

	public function test_apply_schema__needed_optional_extra( ) {
		$array  = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$array = \UArray::apply_schema( $array, $schema );
		$this->assertEquals( $array, [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ] );
	}




	// DO APPLY VALID SCHEMA
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
		$this->assertEquals( $array, $schema );
	}

	public function test_do_apply_schema__extra( ) {
		$array  = [ 'extra' => 4 ];
		$schema = [ 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( $array, [ 'optional' => 3, 'extra' => 4 ] );
	}

	public function test_do_apply_schema__needed( ) {
		$array  = [ 'needed' => 1 ];
		$schema = [ 'needed' ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( $array, [ 'needed' => 1 ] );
	}

	public function test_do_apply_schema__needed_optional( ) {
		$array  = [ 'needed' => 1, 'optional' => 2 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( $array, [ 'needed' => 1, 'optional' => 2 ] );
	}

	public function test_do_apply_schema__needed_optional_extra( ) {
		$array  = [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ];
		$schema = [ 'needed', 'optional' => 3 ];
		$test = \UArray::do_apply_schema( $array, $schema );
		$this->assertTrue( $test );
		$this->assertEquals( $array, [ 'needed' => 1, 'optional' => 2, 'extra' => 4 ] );
	}



	// MERGE UNIQUE
	public function test_merge_unique__two( ) {
		$merged = \UArray::merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( $merged, [ 1, 2, 3, 4 ] );
	}

	public function test_merge_unique__three( ) {
		$merged = \UArray::merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( $merged, [ 1, 2, 3, 4, 5 ] );
	}



	// REVERSE MERGE UNIQUE
	public function test_reverse_merge_unique__two( ) {
		$merged = \UArray::reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( $merged, [ 1, 2, 3, 4 ] );
	}

	public function test_reverse_merge_unique__three( ) {
		$merged = \UArray::reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( $merged, [ 1, 3, 4, 5, 2 ] );
	}
}