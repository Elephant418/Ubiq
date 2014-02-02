<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

class UStringTest extends \PHPUnit_Framework_TestCase {



	// IS START WITH
	public function test_is_start_with__match( ) {
		$test = \UString::isPrefixedWith( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with__match_sensitive( ) {
		$test = \UString::isPrefixedWith( 'Ubiq is so cool', 'ubiq' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__no_match( ) {
		$test = \UString::isPrefixedWith( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__multiple_match( ) {
		$test = \UString::isPrefixedWith( 'Ubiq is so cool', array( 'Ubiq', 'Java' ) );
		$this->assertTrue( $test );
	}

	public function test_is_start_with__multiple_match_sensitive( ) {
		$test = \UString::isPrefixedWith( 'Ubiq is so cool', array( 'ubiq', 'Java' ) );
		$this->assertFalse( $test );
	}

	public function test_is_start_with__multiple_no_match( ) {
		$test = \UString::isPrefixedWith( 'Ubiq is so cool', array( 'Java', '.NET' ) );
		$this->assertFalse( $test );
	}



	// IS START WITH INSENSITIVE
	public function test_is_start_with_insensitive__match( ) {
		$test = \UString::isPrefixedWithInsensitive( 'Ubiq is so cool', 'Ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__match_sensitive( ) {
		$test = \UString::isPrefixedWithInsensitive( 'Ubiq is so cool', 'ubiq' );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__no_match( ) {
		$test = \UString::isPrefixedWithInsensitive( 'Ubiq is so cool', 'Java' );
		$this->assertFalse( $test );
	}

	public function test_is_start_with_insensitive__multiple_match( ) {
		$test = \UString::isPrefixedWithInsensitive( 'Ubiq is so cool', array( 'Ubiq', 'Java' ) );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__multiple_match_sensitive( ) {
		$test = \UString::isPrefixedWithInsensitive( 'Ubiq is so cool', array( 'ubiq', 'Java' ) );
		$this->assertTrue( $test );
	}

	public function test_is_start_with_insensitive__multiple_no_match( ) {
		$test = \UString::isPrefixedWithInsensitive( 'Ubiq is so cool', array( 'Java', '.NET' ) );
		$this->assertFalse( $test );
	}



	// START WITH
	public function test_start_with__no_match( ) {
		$assertion = \UString::getPrefixedWith( 'www.example.com', 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_start_with__match( ) {
		$assertion = \UString::getPrefixedWith( 'http://www.example.com', 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// DO START WITH
	public function test_do_start_with__no_match( ) {
		$assertion = 'www.example.com';
		\UString::prefixWith( $assertion, 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_start_with__match( ) {
		$assertion = 'http://www.example.com';
		\UString::prefixWith( $assertion, 'http://' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// NOT START WITH
	public function test_not_start_with__match( ) {
		$assertion = \UString::getUnprefixedBy( 'http://www.example.com', 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_not_start_with__no_match( ) {
		$assertion = \UString::getUnprefixedBy( 'www.example.com', 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_not_start_with__double_match( ) {
		$assertion = \UString::getUnprefixedBy( 'http://http://www.example.com', 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_not_start_with__multiple_match( ) {
		$assertion = \UString::getUnprefixedBy( 'https://http://www.example.com', array( 'file://', 'https://', 'http://' ) );
		$this->assertEquals( 'www.example.com', $assertion );
	}



	// DO NOT START WITH
	public function test_do_not_start_with__match( ) {
		$assertion = 'http://www.example.com';
		\UString::unprefixBy( $assertion, 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_do_not_start_with__no_match( ) {
		$assertion = 'www.example.com';
		\UString::unprefixBy( $assertion, 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_do_not_start_with__double_match( ) {
		$assertion = 'http://http://www.example.com';
		\UString::unprefixBy( $assertion, 'http://' );
		$this->assertEquals( 'www.example.com', $assertion );
	}

	public function test_do_not_start_with__multiple_match( ) {
		$assertion = 'https://http://www.example.com';
		\UString::unprefixBy( $assertion, array( 'file://', 'https://', 'http://' ) );
		$this->assertEquals( 'www.example.com', $assertion );
	}



	// IS END WITH
	public function test_is_end_with__match( ) {
		$test = \UString::isSuffixedBy( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with__match_sensitive( ) {
		$test = \UString::isSuffixedBy( 'Ubiq is so cool', 'Cool' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__no_match( ) {
		$test = \UString::isSuffixedBy( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__multiple_match( ) {
		$test = \UString::isSuffixedBy( 'Ubiq is so cool', array( 'cool', 'boring' ) );
		$this->assertTrue( $test );
	}

	public function test_is_end_with__multiple_match_sensitive( ) {
		$test = \UString::isSuffixedBy( 'Ubiq is so cool', array( 'Cool', 'boring' ) );
		$this->assertFalse( $test );
	}

	public function test_is_end_with__multiple_no_match( ) {
		$test = \UString::isSuffixedBy( 'Ubiq is so cool', array( 'boring', 'classy' ) );
		$this->assertFalse( $test );
	}



	// IS END WITH INSENSITIVE
	public function test_is_end_with_insensitive__match( ) {
		$test = \UString::isSuffixedByInsensitive( 'Ubiq is so cool', 'cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__match_sensitive( ) {
		$test = \UString::isSuffixedByInsensitive( 'Ubiq is so cool', 'Cool' );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__no_match( ) {
		$test = \UString::isSuffixedByInsensitive( 'Ubiq is so cool', 'boring' );
		$this->assertFalse( $test );
	}

	public function test_is_end_with_insensitive__multiple_match( ) {
		$test = \UString::isSuffixedByInsensitive( 'Ubiq is so cool', array( 'cool', 'boring' ) );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__multiple_match_sensitive( ) {
		$test = \UString::isSuffixedByInsensitive( 'Ubiq is so cool', array( 'Cool', 'boring' ) );
		$this->assertTrue( $test );
	}

	public function test_is_end_with_insensitive__multiple_no_match( ) {
		$test = \UString::isSuffixedByInsensitive( 'Ubiq is so cool', array( 'boring', 'classy' ) );
		$this->assertFalse( $test );
	}



	// END WITH
	public function test_end_with__no_match( ) {
		$assertion =\UString::getSuffixedBy( 'http://www.example.com', '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}

	public function test_end_with__match( ) {
		$assertion =\UString::getSuffixedBy( 'http://www.example.com/', '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}



	// DO END WITH
	public function test_do_end_with__no_match( ) {
		$assertion = 'http://www.example.com';
		\UString::suffixBy( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}

	public function test_do_end_with__match( ) {
		$assertion = 'http://www.example.com/';
		\UString::suffixBy( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com/', $assertion );
	}



	// NOT END WITH
	public function test_not_end_with__no_match( ) {
		$assertion = \UString::getUnsuffixedBy( 'http://www.example.com', '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_not_end_with__macth( ) {
		$assertion = \UString::getUnsuffixedBy( 'http://www.example.com/', '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_not_end_with__double_match( ) {
		$assertion = \UString::getUnsuffixedBy( 'http://www.example.com///', '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_not_end_with__multiple_match( ) {
		$assertion = \UString::getUnsuffixedBy( 'http://www.example.com/\\/', array( '\\', '/' ) );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// DO NOT END WITH
	public function test_do_not_end_with__no_match( ) {
		$assertion = 'http://www.example.com';
		\UString::unsuffixBy( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_not_end_with__macth( ) {
		$assertion = 'http://www.example.com/';
		\UString::unsuffixBy( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_not_end_with__double_match( ) {
		$assertion = 'http://www.example.com///';
		\UString::unsuffixBy( $assertion, '/' );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}

	public function test_do_not_end_with__multiple_match( ) {
		$assertion = 'http://www.example.com/\\/';
		\UString::unsuffixBy( $assertion, array( '\\', '/' ) );
		$this->assertEquals( 'http://www.example.com', $assertion );
	}



	// HAS
	public function test_has__match( ) {
		$test = \UString::contains( '/path/to/a/folder', '/to/' );
		$this->assertTrue( $test );
	}

	public function test_has__match_sensitive( ) {
		$test = \UString::contains( '/path/to/a/folder', '/TO/' );
		$this->assertFalse( $test );
	}

	public function test_has__no_match( ) {
		$test = \UString::contains( '/path/to/a/folder', '.' );
		$this->assertFalse( $test );
	}

	public function test_has__multiple_match( ) {
		$test = \UString::contains( '/path/to/a/folder', array( '/to/', '.' ) );
		$this->assertTrue( $test );
	}

	public function test_has__multiple_match_sensitive( ) {
		$test = \UString::contains( '/path/to/a/folder', array( '/TO/', '.' ) );
		$this->assertFalse( $test );
	}

	public function test_has__multiple_no_match( ) {
		$test = \UString::contains( '/path/to/a/folder', array( 'php', '.' ) );
		$this->assertFalse( $test );
	}



	// HAS INSENSITIVE
	public function test_has_insensitive__match( ) {
		$test = \UString::containsInsensitive( '/path/to/a/folder', '/to/' );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__match_sensitive( ) {
		$test = \UString::containsInsensitive( '/path/to/a/folder', '/TO/' );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__no_match( ) {
		$test = \UString::containsInsensitive( '/path/to/a/folder', '.' );
		$this->assertFalse( $test );
	}

	public function test_has_insensitive__multiple_match( ) {
		$test = \UString::containsInsensitive( '/path/to/a/folder', array( '/to/', '.' ) );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__multiple_match_sensitive( ) {
		$test = \UString::containsInsensitive( '/path/to/a/folder', array( '/TO/', '.' ) );
		$this->assertTrue( $test );
	}

	public function test_has_insensitive__multiple_no_match( ) {
		$test = \UString::containsInsensitive( '/path/to/a/folder', array( 'php', '.' ) );
		$this->assertFalse( $test );
	}



	// SUBSTR BEFORE
	public function test_substr_before__match( ) {
		$substr = \UString::getCutBefore( 'example.com/my/path', '/' );
		$this->assertEquals( 'example.com', $substr );
	}
	public function test_substr_before__no_match( ) {
		$substr = \UString::getCutBefore( 'example.com', '/' );
		$this->assertEquals( 'example.com', $substr );
	}



	// DO SUBSTR BEFORE
	public function test_do_substr_before__match( ) {
		$original = 'example.com/my/path';
		 \UString::cutBefore( $original, '/' );
		$this->assertEquals( 'example.com', $original );
	}
	public function test_do_substr_before__no_match( ) {
		$original = 'example.com';
		\UString::cutBefore( $original, '/' );
		$this->assertEquals( 'example.com', $original );
	}



	// SUBSTR BEFORE LAST
	public function test_substr_before_last__match( ) {
		$substr = \UString::getCutBeforeLast( 'example.com/my/path/file.md', '/' );
		$this->assertEquals( 'example.com/my/path', $substr );
	}
	public function test_substr_before_last__no_match( ) {
		$substr = \UString::getCutBeforeLast( 'example.com', '/' );
		$this->assertEquals( '', $substr );
	}



	// DO SUBSTR BEFORE LAST
	public function test_do_substr_before_last__match( ) {
		$original = 'example.com/my/path/file.md';
		\UString::cutBeforeLast( $original, '/' );
		$this->assertEquals( 'example.com/my/path', $original );
	}
	public function test_do_substr_before_last__no_match( ) {
		$original = 'example.com';
		\UString::cutBeforeLast( $original, '/' );
		$this->assertEquals( '', $original );
	}



	// SUBSTR AFTER
	public function test_substr_after__match( ) {
		$substr = \UString::getCutAfter( 'example.com/my/path', '/' );
		$this->assertEquals( 'my/path', $substr );
	}
	public function test_substr_after__no_match( ) {
		$substr = \UString::getCutAfter( 'example.com', '/' );
		$this->assertEquals( '', $substr );
	}



	// DO SUBSTR AFTER
	public function test_do_substr_after__match( ) {
		$original = 'example.com/my/path';
		\UString::cutAfter( $original, '/' );
		$this->assertEquals( 'my/path', $original );
	}
	public function test_do_substr_after__no_match( ) {
		$original = 'example.com';
		\UString::cutAfter( $original, '/' );
		$this->assertEquals( '', $original );
	}



	// SUBSTR AFTER LAST
	public function test_substr_after_last__match( ) {
		$substr = \UString::getCutAfterLast( 'example.com/my/path', '/' );
		$this->assertEquals( 'path', $substr );
	}
	public function test_substr_after_last__no_match( ) {
		$substr = \UString::getCutAfterLast( 'example.com', '/' );
		$this->assertEquals( 'example.com', $substr );
	}



	// DO SUBSTR AFTER LAST
	public function test_do_substr_after_last__match( ) {
		$original = 'example.com/my/path';
		\UString::cutAfterLast( $original, '/' );
		$this->assertEquals( 'path', $original );
	}
	public function test_do_substr_after_last__no_match( ) {
		$original = 'example.com';
		\UString::cutAfterLast( $original, '/' );
		$this->assertEquals( 'example.com', $original );
	}



	// STRIP ACCENT
	public function test_strip_accent( ) {
		$test = \UString::getStrippedAccent( 'úûüýÿĀāĂăĄąĆć' );
		$this->assertEquals( 'uuuyyAaAaAaCc', $test );
	}



	// DO STRIP ACCENT
	public function test_do_strip_accent( ) {
		$test = 'úûüýÿĀāĂăĄąĆć';
		\UString::stripAccent( $test );
		$this->assertEquals( 'uuuyyAaAaAaCc', $test );
	}



	// STRIP SPECIAL CHAR
	public function test_strip_special_char__default( ) {
		$test = \UString::getSlug( 'A page for $13' );
		$this->assertEquals( 'A-page-for-13', $test );
	}
	public function test_strip_special_char__characters( ) {
		$test = \UString::getSlug( 'A page for $13', 'aeiouyAEIOUY' );
		$this->assertEquals( 'A-a-e-o', $test );
	}
	public function test_strip_special_char__replace( ) {
		$test = \UString::getSlug( 'A page for $13', 'a-zA-Z', '' );
		$this->assertEquals( 'Apagefor', $test );
	}



	// DO STRIP SPECIAL CHAR
	public function test_do_strip_special_char__default( ) {
		$test = 'A page for $13';
		\UString::convertToSlug( $test );
		$this->assertEquals( 'A-page-for-13', $test );
	}
	public function test_do_strip_special_char__characters( ) {
		$test = 'A page for $13';
		\UString::convertToSlug( $test, 'aeiouyAEIOUY' );
		$this->assertEquals( 'A-a-e-o', $test );
	}
	public function test_do_strip_special_char__replace( ) {
		$test = 'A page for $13';
		\UString::convertToSlug( $test, 'a-zA-Z', '' );
		$this->assertEquals( 'Apagefor', $test );
	}
}