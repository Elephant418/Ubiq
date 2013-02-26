<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

class UObjectTest extends \PHPUnit_Framework_TestCase {



	// CONVERT TO CLASS
	public function test_convert_to_class__object( ) {
		$class = \UObject::convertToClass( New \Exception );
		$this->assertEquals( 'Exception', $class );
	}

	public function test_convert_to_class__class( ) {
		$class = \UObject::convertToClass( '\\Exception' );
		$this->assertEquals( 'Exception', $class );
	}



	// DO CONVERT TO CLASS
	public function test_do_convert_to_class__object( ) {
		$class = New \Exception;
		\UObject::doConvertToClass( $class );
		$this->assertEquals( 'Exception', $class );
	}

	public function test_do_convert_to_class__class( ) {
		$class = '\\Exception';
		\UObject::doConvertToClass( $class );
		$this->assertEquals( 'Exception', $class );
	}



	// GET ATTRIBUTE NAMES
	public function test_get_attribute_names__object( ) {
		$attributes = \UObject::getAttributeNames( new Example_Class );
		$this->assertEquals( array( 'name', 'height' ), $attributes );
	}

	public function test_get_attribute_names__class( ) {
		$attributes = \UObject::getAttributeNames( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( array( 'name', 'height' ), $attributes );
	}


	// GET CLASS NAME
	public function test_get_namespace__object( ) {
		$namespace = \UObject::getNamespace( new Example_Class );
		$this->assertEquals( __NAMESPACE__, $namespace );
	}

	public function test_get_namespace__class( ) {
		$namespace = \UObject::getNamespace( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( __NAMESPACE__, $namespace );
	}

	public function test_get_namespace__no_namespace( ) {
		$namespace = \UObject::getNamespace( new \Exception );
		$this->assertEquals( '', $namespace );
	}



	// GET CLASS NAME
	public function test_get_class_name__object( ) {
		$class_name = \UObject::getClassName( new Example_Class );
		$this->assertEquals( 'Example_Class', $class_name );
	}

	public function test_get_class_name__class( ) {
		$class_name = \UObject::getClassName( __NAMESPACE__ . '\\Example_Class' );
		$this->assertEquals( 'Example_Class', $class_name );
	}

	public function test_get_class_name__no_namespace( ) {
		$class_name = \UObject::getClassName( new \Exception );
		$this->assertEquals( 'Exception', $class_name );
	}
}

class Example_Class {
	public $name;
	public $height;
}