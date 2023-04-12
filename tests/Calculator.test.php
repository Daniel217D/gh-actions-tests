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
	 * Calculator instance to test
	 *
	 * @var Calculator
	 */
	private Calculator $calculator;

	/**
	 * This method is called before each test.
	 */
	protected function setUp(): void {
		$this->calculator = new Calculator();
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
		$this->assertEquals(
			$c,
			$this->calculator->add( $a, $b )
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

	 * @dataProvider subtractProvider
	 */
	public function testSubtracting( float $a, float $b, float $c ) {
		$this->assertEquals(
			$c,
			$this->calculator->subtract( $a, $b )
		);
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
		$this->calculator->set_memory( $a );
		$this->assertEquals(
			$c,
			$this->calculator->get_memory() + $b
		);
	}

}
