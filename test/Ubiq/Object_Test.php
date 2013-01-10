<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/Ubiq/Ubiq.php' );

class Object_Test extends \PHPUnit_Framework_TestCase {



	// MUST BE ARRAY
	public function test_must_be_class__object( ) {
		$class = New \Exception;
		\UObject\must_be_class( $class );
		$this->assertEquals( $class, '\\Exception' );
	}

	public function test_must_be_class__class( ) {
		$class = '\\Exception';
		\UObject\must_be_class( $class );
		$this->assertEquals( $class, '\\Exception' );
	}
}