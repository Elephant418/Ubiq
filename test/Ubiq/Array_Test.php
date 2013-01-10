<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/Ubiq/Ubiq.php' );

class Array_Test extends \PHPUnit_Framework_TestCase {



	// MUST BE ARRAY
	public function test_must_be_array__string( ) {
		$array = 'a string';
		\UArray\must_be_array( $array );
		$this->assertEquals( $array, [ 'a string' ] );
	}

	public function test_must_be_array__array( ) {
		$array = [ 'a string' ];
		\UArray\must_be_array( $array );
		$this->assertEquals( $array, [ 'a string' ] );
	}



	// MERGE UNIQUE
	public function test_merge_unique__two( ) {
		$test = \UArray\merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( $test, [ 1, 2, 3, 4 ] );
	}

	public function test_merge_unique__three( ) {
		$test = \UArray\merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( $test, [ 1, 2, 3, 4, 5 ] );
	}



	// REVERSE MERGE UNIQUE
	public function test_reverse_merge_unique__two( ) {
		$test = \UArray\reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( $test, [ 1, 2, 3, 4 ] );
	}

	public function test_reverse_merge_unique__three( ) {
		$test = \UArray\reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( $test, [ 1, 3, 4, 5, 2 ] );
	}
}