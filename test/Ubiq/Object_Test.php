<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/Ubiq/Ubiq.php' );

class Object_Test extends \PHPUnit_Framework_TestCase {



	// MUST BE CLASS
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



	// GET ATTRIBUTE NAMES
	public function test_get_attribute_names__object( ) {
		$attributes = \UObject\get_attribute_names( new Example_Class );
		$this->assertEquals( $attributes, [ 'name', 'height' ] );
	}

	public function test_get_attribute_names__class( ) {
		$attributes = \UObject\get_attribute_names( '\\' . __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( $attributes, [ 'name', 'height' ] );
	}
}

class Example_Class {
	public $name;
	public $height;
}