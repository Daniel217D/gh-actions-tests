<?php
/**
 * @package Ddaniel\GhReleases\Tests
 */

use Ddaniel\GhReleases\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * Class CalculatorTest
 */
class CalculatorTest extends TestCase {
	/**
	 * This method is called before each test.
	 */
	protected function setUp(): void {
	}

	/**
	 * This method is called after each test.
	 */
	protected function tearDown(): void {
	}

	/**
	 * Data to check sum
	 *
	 * @return int[][]
	 */
	public function sumProvider(): array {
		return array(
			array( 1, 2, 3 ),
			array( 1, 5, 6 ),
			array( - 1, - 2, - 3 ),
			array( 0, 0, 0 ),
		);
	}

	/**
	 * @see Calculator::add()
	 *
	 * @param  float $a  first term.
	 * @param  float $b  second term.
	 * @param  float $c  result.
	 *
	 * @dataProvider sumProvider
	 */
	public function testAdding( float $a, float $b, float $c ) {
		$calculator = new Calculator();

		$this->assertEquals(
			$c,
			$calculator->add( $a, $b )
		);
	}

	/**
	 * Data to check subtract
	 *
	 * @return int[][]
	 */
	public function subtractProvider(): array {
		return array(
			array( 1, 2, -1 ),
			array( -1, 2, -3 ),
			array( 1, -2, 3 ),
			array( -1, -2, 1 ),
		);
	}

	/**
	 * @see Calculator::subtract
	 *
	 * @param  float $a  first term.
	 * @param  float $b  second term.
	 * @param  float $c  result.
	 *
	 * @dataProvider subtractProvider
	 */
	public function testSubtracting( float $a, float $b, float $c ) {
		$calculator = new Calculator();

		$this->assertEquals(
			$c,
			$calculator->subtract( $a, $b )
		);
	}

	/**
	 * Data to check multiplication
	 *
	 * @return int[][]
	 */
	public function multiplicationProvider(): array {
		return array(
			array( 1, 2, 2 ),
			array( -1, 2, -2 ),
			array( 1, -2, -2 ),
			array( -1, -2, 2 ),
			array( 2, 2, 4 ),
			array( -2, 2, -4 ),
		);
	}

	/**
	 * @see Calculator::multiply()
	 *
	 * @param  float $a  first term.
	 * @param  float $b  second term.
	 * @param  float $c  result.
	 *
	 * @dataProvider multiplicationProvider
	 */
	public function testMultiplication( float $a, float $b, float $c ) {
		$calculator = new Calculator();

		$this->assertEquals(
			$c,
			$calculator->multiply( $a, $b )
		);
	}

	/**
	 * Data to check division
	 *
	 * @return int[][]
	 */
	public function divisionProvider(): array {
		return array(
			'4/2=2'     => array( 4, 2, 2 ),
			'5/2=2.5'   => array( 5, 2, 2.5 ),
			'-1/-2=0.5' => array( -1, -2, 0.5 ),
			'0/2=0'     => array( 0, 2, 0 ),
		);
	}

	/**
	 * @see Calculator::divide()
	 *
	 * @param  float $a  first term.
	 * @param  float $b  second term.
	 * @param  float $c  result.
	 *
	 * @dataProvider divisionProvider
	 */
	public function testDivision( float $a, float $b, float $c ) {
		$calculator = new Calculator();

		$this->assertEquals(
			$c,
			$calculator->divide( $a, $b )
		);
	}

	/**
	 * @see Calculator::divide()
	 */
	public function testZeroDivision() {
		$calculator = new Calculator();

		 $this->expectExceptionMessage( 'Division by zero' );
		 $calculator->divide( 1, 0 );
	}


	/**
	 * Test $calculator->get_memory
	 *
	 * @param  float $a  first term.
	 * @param  float $b  second term.
	 * @param  float $c  result.
	 *
	 * @dataProvider sumProvider
	 */
	public function testAddingWithMemory( float $a, float $b, float $c ) {
		$calculator = new Calculator();

		$calculator->set_memory( $a );
		$this->assertEquals(
			$c,
			$calculator->get_memory() + $b
		);
	}

}
