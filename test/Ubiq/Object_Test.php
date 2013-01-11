<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/Ubiq/Ubiq.php' );

class Object_Test extends \PHPUnit_Framework_TestCase {



	// MUST BE CLASS
	public function test_must_be_class__object( ) {
		$class = New \Exception;
		\UObject\must_be_class( $class );
		$this->assertEquals( $class, 'Exception' );
	}

	public function test_must_be_class__class( ) {
		$class = '\\Exception';
		\UObject\must_be_class( $class );
		$this->assertEquals( $class, 'Exception' );
	}



	// GET ATTRIBUTE NAMES
	public function test_get_attribute_names__object( ) {
		$attributes = \UObject\get_attribute_names( new Example_Class );
		$this->assertEquals( $attributes, [ 'name', 'height' ] );
	}

	public function test_get_attribute_names__class( ) {
		$attributes = \UObject\get_attribute_names( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( $attributes, [ 'name', 'height' ] );
	}


	// GET CLASS NAME
	public function test_get_namespace__object( ) {
		$namespace = \UObject\get_namespace( new Example_Class );
		$this->assertEquals( $namespace, __NAMESPACE__ );
	}

	public function test_get_namespace__class( ) {
		$namespace = \UObject\get_namespace( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( $namespace, __NAMESPACE__ );
	}

	public function test_get_namespace__no_namespace( ) {
		$namespace = \UObject\get_namespace( new \Exception );
		$this->assertEquals( $namespace, '' );
	}



	// GET CLASS NAME
	public function test_get_class_name__object( ) {
		$class_name = \UObject\get_class_name( new Example_Class );
		$this->assertEquals( $class_name, 'Example_Class' );
	}

	public function test_get_class_name__class( ) {
		$class_name = \UObject\get_class_name( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( $class_name, 'Example_Class' );
	}

	public function test_get_class_name__no_namespace( ) {
		$class_name = \UObject\get_class_name( new \Exception );
		$this->assertEquals( $class_name, 'Exception' );
	}
}

class Example_Class {
	public $name;
	public $height;
}