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
		$merged = \UArray\merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( $merged, [ 1, 2, 3, 4 ] );
	}

	public function test_merge_unique__three( ) {
		$merged = \UArray\merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( $merged, [ 1, 2, 3, 4, 5 ] );
	}



	// REVERSE MERGE UNIQUE
	public function test_reverse_merge_unique__two( ) {
		$merged = \UArray\reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ] );
		$this->assertEquals( $merged, [ 1, 2, 3, 4 ] );
	}

	public function test_reverse_merge_unique__three( ) {
		$merged = \UArray\reverse_merge_unique( [ 1, 2, 3 ], [ 2, 3, 4 ], [ 5, 2 ] );
		$this->assertEquals( $merged, [ 1, 3, 4, 5, 2 ] );
	}
}