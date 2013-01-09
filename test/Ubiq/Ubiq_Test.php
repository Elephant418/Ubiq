<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/Ubiq/Ubiq.php' );

class Ubiq_Test extends \PHPUnit_Framework_TestCase {

	// STARTS WITH
	public function test_starts_with__valid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', 'Ubiq ' );
		$this->assertTrue( $test );
	}

	public function test_starts_with__invalid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', 'Ubiq2 ' );
		$this->assertFalse( $test );
	}

	public function test_starts_with__multiple_valid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', [ 'Ubiq ', 'Ubiq2 ' ] );
		$this->assertTrue( $test );
	}

	public function test_starts_with__multiple_invalid( ) {
		$test = \Util\Str\starts_with( 'Ubiq is so cool', [ 'Ubiq2 ', 'Ubiq3 ' ] );
		$this->assertFalse( $test );
	}
}