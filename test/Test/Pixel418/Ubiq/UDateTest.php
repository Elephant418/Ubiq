<?php

namespace Test\Pixel418\Ubiq;

require_once( __DIR__ . '/../../../../vendor/autoload.php' );

class UDateTest extends \PHPUnit_Framework_TestCase {



	/*************************************************************************
	  DATE FORMAT
	 *************************************************************************/
	public function testDateFormat_day_1Digit( ) {
		$time = time();
		$this->assertEquals( date( 'j', $time ), \UDate::format( 'D', $time ) );
	}
	public function testDateFormat_day_2Digit( ) {
		$time = time();
		$this->assertEquals( date( 'd', $time ), \UDate::format( 'DD', $time ) );
	}
	public function testDateFormat_month_1Digit( ) {
		$time = time();
		$this->assertEquals( date( 'n', $time ), \UDate::format( 'M', $time ) );
	}
	public function testDateFormat_month_2Digit( ) {
		$time = time();
		$this->assertEquals( date( 'm', $time ), \UDate::format( 'MM', $time ) );
	}
	public function testDateFormat_year_2Digit( ) {
		$time = time();
		$this->assertEquals( date( 'y', $time ), \UDate::format( 'YY', $time ) );
	}
	public function testDateFormat_year_4Digit( ) {
		$time = time();
		$this->assertEquals( date( 'Y', $time ), \UDate::format( 'YYYY', $time ) );
	}
	public function testDateFormat_complex( ) {
		$time = time();
		$this->assertEquals( 'the ' . date( 'd/m/Y', $time ), \UDate::format( 'the DD/MM/YYYY', $time ) );
	}
}