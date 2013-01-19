<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

class UStringTest extends \PHPUnit_Framework_TestCase {



	// IS START WITH
	public function test_is_start_with__match( ) {
		$test = \UString::is_start_with( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with__match_sensitive( ) {
		$test = \UString::is_start_with( 'Ubiq is so cool', 'ubiq' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__no_match( ) {
		$test = \UString::is_start_with( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__multiple_match( ) {
		$test = \UString::is_start_with( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_is_start_with__multiple_match_sensitive( ) {
		$test = \UString::is_start_with( 'Ubiq is so cool', [ 'ubiq', 'Java' ] );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__multiple_no_match( ) {
		$test = \UString::is_start_with( 'Ubiq is so cool', [ 'Java', '.NET' ] );
		$this->assertFalse( $test );
	}



	// IS START WITH INSENSITIVE
	public function test_is_start_with_insensitive__match( ) {
		$test = \UString::is_start_with_insensitive( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__match_sensitive( ) {
		$test = \UString::is_start_with_insensitive( 'Ubiq is so cool', 'ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__no_match( ) {
		$test = \UString::is_start_with_insensitive( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with_insensitive__multiple_match( ) {
		$test = \UString::is_start_with_insensitive( 'Ubiq is so cool', [ 'Ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__multiple_match_sensitive( ) {
		$test = \UString::is_start_with_insensitive( 'Ubiq is so cool', [ 'ubiq', 'Java' ] );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__multiple_no_match( ) {
		$test = \UString::is_start_with_insensitive( 'Ubiq is so cool', [ 'Java', '.NET' ] );
		$this->assertFalse( $test );
	}



	// START WITH
	public function test_start_with__no_match( ) {
		$assertion = \UString::start_with( 'www.example.com', 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_start_with__match( ) {
		$assertion = \UString::start_with( 'http://www.example.com', 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// DO START WITH
	public function test_do_start_with__no_match( ) {
		$assertion = 'www.example.com';
		\UString::do_start_with( $assertion, 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_start_with__match( ) {
		$assertion = 'http://www.example.com';
		\UString::do_start_with( $assertion, 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// NOT START WITH
	public function test_not_start_with__match( ) {
		$assertion = \UString::not_start_with( 'http://www.example.com', 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_not_start_with__no_match( ) {
		$assertion = \UString::not_start_with( 'www.example.com', 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_not_start_with__double_match( ) {
		$assertion = \UString::not_start_with( 'http://http://www.example.com', 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_not_start_with__multiple_match( ) {
		$assertion = \UString::not_start_with( 'https://http://www.example.com', [ 'file://', 'https://', 'http://' ] );
		$this->assertEquals( 'www.example.com', $assertion );
	}



	// DO NOT START WITH
	public function test_do_not_start_with__match( ) {
		$assertion = 'http://www.example.com';
		\UString::do_not_start_with( $assertion, 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_do_not_start_with__no_match( ) {
		$assertion = 'www.example.com';
		\UString::do_not_start_with( $assertion, 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_do_not_start_with__double_match( ) {
		$assertion = 'http://http://www.example.com';
		\UString::do_not_start_with( $assertion, 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_do_not_start_with__multiple_match( ) {
		$assertion = 'https://http://www.example.com';
		\UString::do_not_start_with( $assertion, [ 'file://', 'https://', 'http://' ] );
		$this->assertEquals( 'www.example.com', $assertion );
	}



	// IS END WITH
	public function test_is_end_with__match( ) {
		$test = \UString::is_end_with( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with__match_sensitive( ) {
		$test = \UString::is_end_with( 'Ubiq is so cool', 'Cool' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__no_match( ) {
		$test = \UString::is_end_with( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__multiple_match( ) {
		$test = \UString::is_end_with( 'Ubiq is so cool', [ 'cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_is_end_with__multiple_match_sensitive( ) {
		$test = \UString::is_end_with( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__multiple_no_match( ) {
		$test = \UString::is_end_with( 'Ubiq is so cool', [ 'boring', 'classy' ] );
		$this->assertFalse( $test );
	}



	// IS END WITH INSENSITIVE
	public function test_is_end_with_insensitive__match( ) {
		$test = \UString::is_end_with_insensitive( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__match_sensitive( ) {
		$test = \UString::is_end_with_insensitive( 'Ubiq is so cool', 'Cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__no_match( ) {
		$test = \UString::is_end_with_insensitive( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with_insensitive__multiple_match( ) {
		$test = \UString::is_end_with_insensitive( 'Ubiq is so cool', [ 'cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__multiple_match_sensitive( ) {
		$test = \UString::is_end_with_insensitive( 'Ubiq is so cool', [ 'Cool', 'boring' ] );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__multiple_no_match( ) {
		$test = \UString::is_end_with_insensitive( 'Ubiq is so cool', [ 'boring', 'classy' ] );
		$this->assertFalse( $test );
	}



	// END WITH
	public function test_end_with__no_match( ) {
		$assertion =\UString::end_with( 'http://www.example.com', '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}

	public function test_end_with__match( ) {
		$assertion =\UString::end_with( 'http://www.example.com/', '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}



	// DO END WITH
	public function test_do_end_with__no_match( ) {
		$assertion = 'http://www.example.com';
		\UString::do_end_with( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}

	public function test_do_end_with__match( ) {
		$assertion = 'http://www.example.com/';
		\UString::do_end_with( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}



	// NOT END WITH
	public function test_not_end_with__no_match( ) {
		$assertion = \UString::not_end_with( 'http://www.example.com', '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_not_end_with__macth( ) {
		$assertion = \UString::not_end_with( 'http://www.example.com/', '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_not_end_with__double_match( ) {
		$assertion = \UString::not_end_with( 'http://www.example.com///', '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_not_end_with__multiple_match( ) {
		$assertion = \UString::not_end_with( 'http://www.example.com/\\/', [ '\\', '/' ] );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// DO NOT END WITH
	public function test_do_not_end_with__no_match( ) {
		$assertion = 'http://www.example.com';
		\UString::do_not_end_with( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_not_end_with__macth( ) {
		$assertion = 'http://www.example.com/';
		\UString::do_not_end_with( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_not_end_with__double_match( ) {
		$assertion = 'http://www.example.com///';
		\UString::do_not_end_with( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_not_end_with__multiple_match( ) {
		$assertion = 'http://www.example.com/\\/';
		\UString::do_not_end_with( $assertion, [ '\\', '/' ] );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// HAS
	public function test_has__match( ) {
		$test = \UString::has( '/path/to/a/folder', '/to/' );
		$this->assertTrue( $test );
	}

	public function test_has__match_sensitive( ) {
		$test = \UString::has( '/path/to/a/folder', '/TO/' );
		$this->assertFalse( $test );
	}

	public function test_has__no_match( ) {
		$test = \UString::has( '/path/to/a/folder', '.' );
		$this->assertFalse( $test );
	}

	public function test_has__multiple_match( ) {
		$test = \UString::has( '/path/to/a/folder', [ '/to/', '.' ] );
		$this->assertTrue( $test );
	}

	public function test_has__multiple_match_sensitive( ) {
		$test = \UString::has( '/path/to/a/folder', [ '/TO/', '.' ] );
		$this->assertFalse( $test );
	}

	public function test_has__multiple_no_match( ) {
		$test = \UString::has( '/path/to/a/folder', [ 'php', '.' ] );
		$this->assertFalse( $test );
	}



	// HAS INSENSITIVE
	public function test_has_insensitive__match( ) {
		$test = \UString::has_insensitive( '/path/to/a/folder', '/to/' );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__match_sensitive( ) {
		$test = \UString::has_insensitive( '/path/to/a/folder', '/TO/' );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__no_match( ) {
		$test = \UString::has_insensitive( '/path/to/a/folder', '.' );
		$this->assertFalse( $test );
	}

	public function test_has_insensitive__multiple_match( ) {
		$test = \UString::has_insensitive( '/path/to/a/folder', [ '/to/', '.' ] );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__multiple_match_sensitive( ) {
		$test = \UString::has_insensitive( '/path/to/a/folder', [ '/TO/', '.' ] );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__multiple_no_match( ) {
		$test = \UString::has_insensitive( '/path/to/a/folder', [ 'php', '.' ] );
		$this->assertFalse( $test );
	}



	// SUBSTR BEFORE
	public function test_substr_before__match( ) {
		$substr = \UString::substr_before( 'example.com/my/path', '/' );
		$this->assertEquals( 'example.com', $substr );
	}
	public function test_substr_before__no_match( ) {
		$substr = \UString::substr_before( 'example.com', '/' );
		$this->assertEquals( 'example.com', $substr );
	}



	// DO SUBSTR BEFORE
	public function test_do_substr_before__match( ) {
		$original = 'example.com/my/path';
		$pop = \UString::do_substr_before( $original, '/' );
		$this->assertEquals( 'example.com', $original );
		$this->assertEquals( '/my/path', $pop );
	}
	public function test_do_substr_before__no_match( ) {
		$original = 'example.com';
		$pop = \UString::do_substr_before( $original, '/' );
		$this->assertEquals( 'example.com', $original );
		$this->assertEquals( '', $pop );
	}



	// SUBSTR BEFORE LAST
	public function test_substr_before_last__match( ) {
		$substr = \UString::substr_before_last( 'example.com/my/path/file.md', '/' );
		$this->assertEquals( 'example.com/my/path', $substr );
	}
	public function test_substr_before_last__no_match( ) {
		$substr = \UString::substr_before_last( 'example.com', '/' );
		$this->assertEquals( '', $substr );
	}



	// DO SUBSTR BEFORE LAST
	public function test_do_substr_before_last__match( ) {
		$original = 'example.com/my/path/file.md';
		$pop = \UString::do_substr_before_last( $original, '/' );
		$this->assertEquals( 'example.com/my/path', $original );
		$this->assertEquals( '/file.md', $pop );
	}
	public function test_do_substr_before_last__no_match( ) {
		$original = 'example.com';
		$pop = \UString::do_substr_before_last( $original, '/' );
		$this->assertEquals( '', $original );
		$this->assertEquals( 'example.com', $pop );
	}



	// SUBSTR AFTER
	public function test_substr_after__match( ) {
		$substr = \UString::substr_after( 'example.com/my/path', '/' );
		$this->assertEquals( 'my/path', $substr );
	}
	public function test_substr_after__no_match( ) {
		$substr = \UString::substr_after( 'example.com', '/' );
		$this->assertEquals( '', $substr );
	}



	// DO SUBSTR AFTER
	public function test_do_substr_after__match( ) {
		$original = 'example.com/my/path';
		$pop = \UString::do_substr_after( $original, '/' );
		$this->assertEquals( 'my/path', $original );
		$this->assertEquals( 'example.com/', $pop );
	}
	public function test_do_substr_after__no_match( ) {
		$original = 'example.com';
		$pop = \UString::do_substr_after( $original, '/' );
		$this->assertEquals( '', $original );
		$this->assertEquals( 'example.com', $pop );
	}



	// SUBSTR AFTER LAST
	public function test_substr_after_last__match( ) {
		$substr = \UString::substr_after_last( 'example.com/my/path', '/' );
		$this->assertEquals( 'path', $substr );
	}
	public function test_substr_after_last__no_match( ) {
		$substr = \UString::substr_after_last( 'example.com', '/' );
		$this->assertEquals( 'example.com', $substr );
	}



	// DO SUBSTR AFTER LAST
	public function test_do_substr_after_last__match( ) {
		$original = 'example.com/my/path';
		$pop = \UString::do_substr_after_last( $original, '/' );
		$this->assertEquals( 'path', $original );
		$this->assertEquals( 'example.com/my/', $pop );
	}
	public function test_do_substr_after_last__no_match( ) {
		$original = 'example.com';
		$pop = \UString::do_substr_after_last( $original, '/' );
		$this->assertEquals( 'example.com', $original );
		$this->assertEquals( '', $pop );
	}



	// RANDOM
	public function test_random__deafult( ) {
		$test = \UString::random( );
		$this->assertEquals( 10, strlen( $test ) );
	}
	public function test_random__length( ) {
		$test = \UString::random( 16 );
		$this->assertEquals( 16, strlen( $test ) );
	}
	public function test_random__charset( ) {
		$test = \UString::random( 16, 'abc' );
		$this->assertEquals( 0, preg_match( '/[^abc]/', $test ) );
	}



	// STRIP ACCENT
	public function test_strip_accent( ) {
		$test = \UString::strip_accent( 'úûüýÿĀāĂăĄąĆć' );
		$this->assertEquals( 'uuuyyAaAaAaCc', $test );
	}



	// DO STRIP ACCENT
	public function test_do_strip_accent( ) {
		$test = 'úûüýÿĀāĂăĄąĆć';
		\UString::do_strip_accent( $test );
		$this->assertEquals( 'uuuyyAaAaAaCc', $test );
	}



	// STRIP SPECIAL CHAR
	public function test_strip_special_char__default( ) {
		$test = \UString::strip_special_char( 'A page for $13' );
		$this->assertEquals( 'A-page-for-13', $test );
	}
	public function test_strip_special_char__characters( ) {
		$test = \UString::strip_special_char( 'A page for $13', 'aeiouyAEIOUY' );
		$this->assertEquals( 'A-a-e-o', $test );
	}
	public function test_strip_special_char__replace( ) {
		$test = \UString::strip_special_char( 'A page for $13', 'a-zA-Z', '' );
		$this->assertEquals( 'Apagefor', $test );
	}



	// DO STRIP SPECIAL CHAR
	public function test_do_strip_special_char__default( ) {
		$test = 'A page for $13';
		\UString::do_strip_special_char( $test );
		$this->assertEquals( 'A-page-for-13', $test );
	}
	public function test_do_strip_special_char__characters( ) {
		$test = 'A page for $13';
		\UString::do_strip_special_char( $test, 'aeiouyAEIOUY' );
		$this->assertEquals( 'A-a-e-o', $test );
	}
	public function test_do_strip_special_char__replace( ) {
		$test = 'A page for $13';
		\UString::do_strip_special_char( $test, 'a-zA-Z', '' );
		$this->assertEquals( 'Apagefor', $test );
	}
}