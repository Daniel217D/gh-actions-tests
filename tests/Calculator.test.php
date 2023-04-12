<?php

use Ddaniel\GhReleases\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {
	private Calculator $calculator;

	protected function setUp(): void {
		$this->calculator = new Calculator();
	}

	protected function tearDown(): void {
	}

	public function sumProvider(): array {
		return array(
			array(1,2,3),
			array(1,5,6),
			array(-1,-2,-3),
			array(0,0,0),
		);
	}

	/**
	 * @dataProvider sumProvider
	 */
	public function testAdding( $a, $b, $c ) {
		$this->assertEquals(
			$c,
			$this->calculator->add( $a, $b )
		);
	}

	/**
	 * @dataProvider sumProvider
	 */
	public function testAddingWithMemory( $a, $b, $c ) {
		$this->calculator->set_memory( $a );
		$this->assertEquals(
			$c,
			$this->calculator->get_memory() + $b
		);
	}

}