<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/Ubiq/Ubiq.php' );

class Ubiq_Test extends \PHPUnit_Framework_TestCase {



	// STARTS WITH
	public function test_starts_with__valid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_starts_with__invalid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_starts_with__multiple_valid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_starts_with__multiple_invalid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', [ 'Java', '.NET' ] );
		$this->assertFalse( $test );
	}



	// ENDS WITH
	public function test_ends_with__valid( ) {
		$test = \Util\Str\ends_with( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_ends_with__invalid( ) {
		$test = \Util\Str\ends_with( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_ends_with__multiple_valid( ) {
		$test = \Util\Str\ends_with( 'Ubiq is so cool', [ 'cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_sends_with__multiple_invalid( ) {
		$test = \Util\Str\ends_with( 'Ubiq is so cool', [ 'boring', 'classy' ] );
		$this->assertFalse( $test );
	}
}