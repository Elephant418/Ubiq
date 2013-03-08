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
	public function _testTimestampFromFormat( $format, $humanPattern ) {
		$timestamp = time();
		$time = date( $format, $timestamp );
		$this->assertEquals( $timestamp, \UDate::getTimestampFromFormat( $humanPattern, $time ) );
	}
}