<?php

namespace Test\Ubiq;

require_once( dirname( dirname( __DIR__ ) ) . '/ubiq/Ubiq.php' );

class String_Test extends \PHPUnit_Framework_TestCase {



	// IS START WITH
	public function test_is_start_with__match( ) {
		$test = \UString\is_start_with( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with__match_sensitive( ) {
		$test = \UString\is_start_with( 'Ubiq is so cool', 'ubiq' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__no_match( ) {
		$test = \UString\is_start_with( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__multiple_match( ) {
		$test = \UString\is_start_with( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_is_start_with__multiple_match_sensitive( ) {
		$test = \UString\is_start_with( 'Ubiq is so cool', [ 'ubiq', 'Java' ] );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__multiple_no_match( ) {
		$test = \UString\is_start_with( 'Ubiq is so cool', [ 'Java', '.NET' ] );
		$this->assertFalse( $test );
	}



	// IS START WITH INSENSITIVE
	public function test_is_start_with_insensitive__match( ) {
		$test = \UString\is_start_with_insensitive( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__match_sensitive( ) {
		$test = \UString\is_start_with_insensitive( 'Ubiq is so cool', 'ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__no_match( ) {
		$test = \UString\is_start_with_insensitive( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with_insensitive__multiple_match( ) {
		$test = \UString\is_start_with_insensitive( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__multiple_match_sensitive( ) {
		$test = \UString\is_start_with_insensitive( 'Ubiq is so cool', [ 'ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__multiple_no_match( ) {
		$test = \UString\is_start_with_insensitive( 'Ubiq is so cool', [ 'Java', '.NET' ] );
		$this->assertFalse( $test );
	}



	// DO START WITH
	public function test_do_start_with__match( ) {
		$assertion = 'www.example.com';
		\UString\do_start_with( $assertion, 'http://' );
		$this->assertEquals( $assertion, 'http://www.example.com' );
	}

	public function test_do_start_with__no_match( ) {
		$assertion = 'http://www.example.com';
		\UString\do_start_with( $assertion, 'http://' );
		$this->assertEquals( $assertion, 'http://www.example.com' );
	}



	// DO NOT START WITH
	public function test_do_not_start_with__match( ) {
		$assertion = 'http://www.example.com';
		\UString\do_not_start_with( $assertion, 'http://' );
		$this->assertEquals( $assertion, 'www.example.com' );
	}

	public function test_do_not_start_with__no_match( ) {
		$assertion = 'www.example.com';
		\UString\do_not_start_with( $assertion, 'http://' );
		$this->assertEquals( $assertion, 'www.example.com' );
	}

	public function test_do_not_start_with__double_match( ) {
		$assertion = 'http://http://www.example.com';
		\UString\do_not_start_with( $assertion, 'http://' );
		$this->assertEquals( $assertion, 'www.example.com' );
	}



	// IS END WITH
	public function test_is_end_with__match( ) {
		$test = \UString\is_end_with( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with__match_sensitive( ) {
		$test = \UString\is_end_with( 'Ubiq is so cool', 'Cool' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__no_match( ) {
		$test = \UString\is_end_with( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__multiple_match( ) {
		$test = \UString\is_end_with( 'Ubiq is so cool', [ 'cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_is_end_with__multiple_match_sensitive( ) {
		$test = \UString\is_end_with( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__multiple_no_match( ) {
		$test = \UString\is_end_with( 'Ubiq is so cool', [ 'boring', 'classy' ] );
		$this->assertFalse( $test );
	}



	// IS END WITH INSENSITIVE
	public function test_is_end_with_insensitive__match( ) {
		$test = \UString\is_end_with_insensitive( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__match_sensitive( ) {
		$test = \UString\is_end_with_insensitive( 'Ubiq is so cool', 'Cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__no_match( ) {
		$test = \UString\is_end_with_insensitive( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with_insensitive__multiple_match( ) {
		$test = \UString\is_end_with_insensitive( 'Ubiq is so cool', [ 'cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__multiple_match_sensitive( ) {
		$test = \UString\is_end_with_insensitive( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__multiple_no_match( ) {
		$test = \UString\is_end_with_insensitive( 'Ubiq is so cool', [ 'boring', 'classy' ] );
		$this->assertFalse( $test );
	}



	// DO END WITH
	public function test_do_end_with__match( ) {
		$assertion = 'http://www.example.com';
		\UString\do_end_with( $assertion, '/' );
		$this->assertEquals( $assertion, 'http://www.example.com/' );
	}

	public function test_do_end_with__no_match( ) {
		$assertion = 'http://www.example.com/';
		\UString\do_end_with( $assertion, '/' );
		$this->assertEquals( $assertion, 'http://www.example.com/' );
	}



	// DO NOT END WITH
	public function test_do_not_end_with__no_match( ) {
		$assertion = 'http://www.example.com';
		\UString\do_not_end_with( $assertion, '/' );
		$this->assertEquals( $assertion, 'http://www.example.com' );
	}

	public function test_do_not_end_with__macth( ) {
		$assertion = 'http://www.example.com/';
		\UString\do_not_end_with( $assertion, '/' );
		$this->assertEquals( $assertion, 'http://www.example.com' );
	}

	public function test_do_not_end_with__double_match( ) {
		$assertion = 'http://www.example.com///';
		\UString\do_not_end_with( $assertion, '/' );
		$this->assertEquals( $assertion, 'http://www.example.com' );
	}



	// HAS
	public function test_has__valid( ) {
		$test = \UString\has( '/path/to/a/folder', '/to/' );
		$this->assertTrue( $test );
	}

	public function test_has__valid_sensitive( ) {
		$test = \UString\has( '/path/to/a/folder', '/TO/' );
		$this->assertFalse( $test );
	}

	public function test_has__invalid( ) {
		$test = \UString\has( '/path/to/a/folder', '.' );
		$this->assertFalse( $test );
	}

	public function test_has__multiple_valid( ) {
		$test = \UString\has( '/path/to/a/folder', [ '/to/', '.' ] );
		$this->assertTrue( $test );
	}

	public function test_has__multiple_valid_sensitive( ) {
		$test = \UString\has( '/path/to/a/folder', [ '/TO/', '.' ] );
		$this->assertFalse( $test );
	}

	public function test_has__multiple_invalid( ) {
		$test = \UString\has( '/path/to/a/folder', [ 'php', '.' ] );
		$this->assertFalse( $test );
	}



	// HAS INSENSITIVE
	public function test_has_insensitive__valid( ) {
		$test = \UString\has_insensitive( '/path/to/a/folder', '/to/' );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__valid_sensitive( ) {
		$test = \UString\has_insensitive( '/path/to/a/folder', '/TO/' );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__invalid( ) {
		$test = \UString\has_insensitive( '/path/to/a/folder', '.' );
		$this->assertFalse( $test );
	}

	public function test_has_insensitive__multiple_valid( ) {
		$test = \UString\has_insensitive( '/path/to/a/folder', [ '/to/', '.' ] );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__multiple_valid_sensitive( ) {
		$test = \UString\has_insensitive( '/path/to/a/folder', [ '/TO/', '.' ] );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__multiple_invalid( ) {
		$test = \UString\has_insensitive( '/path/to/a/folder', [ 'php', '.' ] );
		$this->assertFalse( $test );
	}



	// CUT BEFORE
	public function test_cut_before__valid( ) {
		$original = 'example.com/my/path';
		$cut = \UString\cut_before( $original, '/' );
		$this->assertEquals( $cut, 'example.com' );
		$this->assertEquals( $original, '/my/path' );
	}
	public function test_cut_before__invalid( ) {
		$original = 'example.com';
		$cut = \UString\cut_before( $original, '/' );
		$this->assertEquals( $cut, 'example.com' );
		$this->assertEquals( $original, '' );
	}



	// SUBSTR BEFORE
	public function test_substr_before__valid( ) {
		$original = 'example.com/my/path';
		$substr = \UString\substr_before( $original, '/' );
		$this->assertEquals( $substr, 'example.com' );
	}
	public function test_substr_before__invalid( ) {
		$original = 'example.com';
		$substr = \UString\substr_before( $original, '/' );
		$this->assertEquals( $substr, 'example.com' );
	}



	// CUT BEFORE LAST
	public function test_cut_before_last__valid( ) {
		$original = 'example.com/my/path/file.md';
		$cut = \UString\cut_before_last( $original, '/' );
		$this->assertEquals( $cut, 'example.com/my/path' );
		$this->assertEquals( $original, '/file.md' );
	}
	public function test_cut_before_last__invalid( ) {
		$original = 'example.com';
		$cut = \UString\cut_before_last( $original, '/' );
		$this->assertEquals( $cut, '' );
		$this->assertEquals( $original, 'example.com' );
	}



	// SUBSTR BEFORE LAST
	public function test_substr_before_last__valid( ) {
		$original = 'example.com/my/path/file.md';
		$substr = \UString\substr_before_last( $original, '/' );
		$this->assertEquals( $substr, 'example.com/my/path' );
	}
	public function test_substr_before_last__invalid( ) {
		$original = 'example.com';
		$substr = \UString\substr_before_last( $original, '/' );
		$this->assertEquals( $substr, '' );
	}



	// CUT AFTER
	public function test_cut_after__valid( ) {
		$original = 'example.com/my/path';
		$cut = \UString\cut_after( $original, '/' );
		$this->assertEquals( $original, 'example.com/' );
		$this->assertEquals( $cut, 'my/path' );
	}
	public function test_cut_after__invalid( ) {
		$original = 'example.com';
		$cut = \UString\cut_after( $original, '/' );
		$this->assertEquals( $original, 'example.com' );
		$this->assertEquals( $cut, '' );
	}



	// SUBSTR AFTER
	public function test_substr_after__valid( ) {
		$original = 'example.com/my/path';
		$substr = \UString\cut_after( $original, '/' );
		$this->assertEquals( $substr, 'my/path' );
	}
	public function test_substr_after__invalid( ) {
		$original = 'example.com';
		$substr = \UString\cut_after( $original, '/' );
		$this->assertEquals( $substr, '' );
	}



	// CUT AFTER LAST
	public function test_cut_after_last__valid( ) {
		$original = 'example.com/my/path';
		$cut = \UString\cut_after_last( $original, '/' );
		$this->assertEquals( $original, 'example.com/my/' );
		$this->assertEquals( $cut, 'path' );
	}
	public function test_cut_after_last__invalid( ) {
		$original = 'example.com';
		$cut = \UString\cut_after_last( $original, '/' );
		$this->assertEquals( $original, '' );
		$this->assertEquals( $cut, 'example.com' );
	}



	// SUBSTR AFTER LAST
	public function test_substr_after_last__valid( ) {
		$original = 'example.com/my/path';
		$substr = \UString\substr_after_last( $original, '/' );
		$this->assertEquals( $substr, 'path' );
	}
	public function test_substr_after_last__invalid( ) {
		$original = 'example.com';
		$substr = \UString\substr_after_last( $original, '/' );
		$this->assertEquals( $substr, 'example.com' );
	}



	// RANDOM
	public function test_random__deafult( ) {
		$test = \UString\random( );
		$this->assertEquals( strlen( $test ), 10 );
	}
	public function test_random__length( ) {
		$test = \UString\random( 16 );
		$this->assertEquals( strlen( $test ), 16 );
	}
	public function test_random__charset( ) {
		$test = \UString\random( 16, 'abc' );
		$this->assertTrue( preg_match( '/[^abc]/', $test ) === 0 );
	}



	// STRIP ACCENT
	public function test_strip_accent( ) {
		$test = \UString\strip_accent( 'úûüýÿĀāĂăĄąĆć' );
		$this->assertEquals( $test, 'uuuyyAaAaAaCc' );
	}



	// DO STRIP ACCENT
	public function test_do_strip_accent( ) {
		$test = 'úûüýÿĀāĂăĄąĆć';
		\UString\do_strip_accent( $test );
		$this->assertEquals( $test, 'uuuyyAaAaAaCc' );
	}



	// STRIP SPECIAL CHAR
	public function test_strip_special_char__default( ) {
		$test = \UString\strip_special_char( 'A page for $13' );
		$this->assertEquals( $test, 'A-page-for-13' );
	}
	public function test_strip_special_char__characters( ) {
		$test = \UString\strip_special_char( 'A page for $13', 'aeiouyAEIOUY' );
		$this->assertEquals( $test, 'A-a-e-o' );
	}
	public function test_strip_special_char__replace( ) {
		$test = \UString\strip_special_char( 'A page for $13', 'a-zA-Z', '' );
		$this->assertEquals( $test, 'Apagefor' );
	}



	// DO STRIP SPECIAL CHAR
	public function test_do_strip_special_char__default( ) {
		$test = 'A page for $13';
		\UString\do_strip_special_char( $test );
		$this->assertEquals( $test, 'A-page-for-13' );
	}
	public function test_do_strip_special_char__characters( ) {
		$test = 'A page for $13';
		\UString\do_strip_special_char( $test, 'aeiouyAEIOUY' );
		$this->assertEquals( $test, 'A-a-e-o' );
	}
	public function test_do_strip_special_char__replace( ) {
		$test = 'A page for $13';
		\UString\do_strip_special_char( $test, 'a-zA-Z', '' );
		$this->assertEquals( $test, 'Apagefor' );
	}
}