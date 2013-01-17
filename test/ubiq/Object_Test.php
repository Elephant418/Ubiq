<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php' );

class Object_Test extends \PHPUnit_Framework_TestCase {



	// CONVERT TO CLASS
	public function test_convert_to_class__object( ) {
		$class = \UObject::convert_to_class( New \Exception );
		$this->assertEquals( 'Exception', $class );
	}

	public function test_convert_to_class__class( ) {
		$class = \UObject::convert_to_class( '\\Exception' );
		$this->assertEquals( 'Exception', $class );
	}



	// DO CONVERT TO CLASS
	public function test_do_convert_to_class__object( ) {
		$class = New \Exception;
		\UObject::do_convert_to_class( $class );
		$this->assertEquals( 'Exception', $class );
	}

	public function test_do_convert_to_class__class( ) {
		$class = '\\Exception';
		\UObject::do_convert_to_class( $class );
		$this->assertEquals( 'Exception', $class );
	}



	// GET ATTRIBUTE NAMES
	public function test_get_attribute_names__object( ) {
		$attributes = \UObject::get_attribute_names( new Example_Class );
		$this->assertEquals( [ 'name', 'height' ], $attributes );
	}

	public function test_get_attribute_names__class( ) {
		$attributes = \UObject::get_attribute_names( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( [ 'name', 'height' ], $attributes );
	}


	// GET CLASS NAME
	public function test_get_namespace__object( ) {
		$namespace = \UObject::get_namespace( new Example_Class );
		$this->assertEquals( __NAMESPACE__, $namespace );
	}

	public function test_get_namespace__class( ) {
		$namespace = \UObject::get_namespace( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( __NAMESPACE__, $namespace );
	}

	public function test_get_namespace__no_namespace( ) {
		$namespace = \UObject::get_namespace( new \Exception );
		$this->assertEquals( '', $namespace );
	}



	// GET CLASS NAME
	public function test_get_class_name__object( ) {
		$class_name = \UObject::get_class_name( new Example_Class );
		$this->assertEquals( 'Example_Class', $class_name );
	}

	public function test_get_class_name__class( ) {
		$class_name = \UObject::get_class_name( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( 'Example_Class', $class_name );
	}

	public function test_get_class_name__no_namespace( ) {
		$class_name = \UObject::get_class_name( new \Exception );
		$this->assertEquals( 'Exception', $class_name );
	}
}

class Example_Class {
	public $name;
	public $height;
}