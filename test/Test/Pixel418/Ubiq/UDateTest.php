<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

class UDateTest extends \PHPUnit_Framework_TestCase {



	/*************************************************************************
	  DATE FORMAT
	 *************************************************************************/
	public function testFormat_day_1Digit( ) {
		$this->_testFormat( 'j', 'D' );
	}
	public function testFormat_day_2Digit( ) {
		$this->_testFormat( 'd', 'DD' );
	}
	public function testFormat_month_1Digit( ) {
		$this->_testFormat( 'n', 'M' );
	}
	public function testFormat_month_2Digit( ) {
		$this->_testFormat( 'm', 'MM' );
	}
	public function testFormat_year_2Digit( ) {
		$this->_testFormat( 'y', 'YY' );
	}
	public function testFormat_year_4Digit( ) {
		$this->_testFormat( 'Y', 'YYYY' );
	}
	public function testFormat_complex( ) {
		$this->_testFormat( 'd/m/Y', 'DD/MM/YYYY' );
	}
	protected function _testFormat( $format, $humanPattern ) {
		$timestamp = time();
		$this->assertEquals( date( $format, $timestamp ), \UDate::format( $humanPattern, $timestamp ) );
	}



	/*************************************************************************
	  TIMESTAMP FROM FORMAT
	 *************************************************************************/
	public function testTimestampFromFormat_day_1Digit( ) {
		echo 
		$this->_testTimestampFromFormat( 'j', 'D' );
	}
	public function testTimestampFromFormat_day_2Digit( ) {
		$this->_testTimestampFromFormat( 'd', 'DD' );
	}
	public function testTimestampFromFormat_month_1Digit( ) {
		$this->_testTimestampFromFormat( 'n', 'M' );
	}
	public function testTimestampFromFormat_month_2Digit( ) {
		$this->_testTimestampFromFormat( 'm', 'MM' );
	}
	public function testTimestampFromFormat_year_2Digit( ) {
		$this->_testTimestampFromFormat( 'y', 'YY' );
	}
	public function testTimestampFromFormat_year_4Digit( ) {
		$this->_testTimestampFromFormat( 'Y', 'YYYY' );
	}
	public function testTimestampFromFormat_complex( ) {
		$this->_testTimestampFromFormat( 'd/m/Y', 'DD/MM/YYYY' );
	}
	public function testTimestampFromFormat_error( ) {
		$this->assertFalse( \UDate::getTimestampFromFormat( 'DD/MM/YYYY', '01/02/03' ) );
	}
	protected function _testTimestampFromFormat( $format, $humanPattern ) {
		$timestamp = time();
		$time = date( $format, $timestamp );
		$this->assertEquals( $timestamp, \UDate::getTimestampFromFormat( $humanPattern, $time ) );
	}
	protected function _debugIncompleteFormat( $humanPattern, $time ) {
		return \UDate::format( 'DD/MM/YYYY', \UDate::getTimestampFromFormat( $humanPattern, $time ) );
	}



	/*************************************************************************
	  CHECK FORMAT
	 *************************************************************************/
	public function testCheckFormat_year_notEnougth( ) {
		$this->assertFalse( \UDate::checkFormat( 'DD/MM/YYYY', '01/02/13' ) );
	}
	public function testCheckFormat_year_toMuch( ) {
		$this->assertFalse( \UDate::checkFormat( 'DD/MM/YY', '01/02/2013' ) );
	}
	public function testCheckFormat_yearFull( ) {
		$this->assertTrue( \UDate::checkFormat( 'DD/MM/YYYY', '01/02/2013' ) );
	}
	public function testCheckFormat_yearShort_current( ) {
		$this->assertTrue( \UDate::checkFormat( 'DD/MM/YY', '01/02/13' ) );
	}
	public function testCheckFormat_yearShort_before( ) {
		$this->assertTrue( \UDate::checkFormat( 'DD/MM/YY', '01/02/98' ) );
	}
	public function testCheckFormat_notExisting( ) {
		echo $this->_debugIncompleteFormat( 'MM/YY', '02/02' );
		$this->assertFalse( \UDate::checkFormat( 'DD/MM/YYYY', '31/02/2013' ) );
	}
}