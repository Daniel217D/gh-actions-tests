<?php

namespace Ddaniel\GhReleases;

class Calculator {
	/**
	 * @var float|int
	 */
	private float $memory = 0;

	/**
	 * @param  float  $a
	 * @param  float  $b
	 *
	 * @return float
	 */
	public function add( float $a, float $b ): float {
		return $a + $b;
	}

	/**
	 * @return float|int
	 */
	public function get_memory() {
		return $this->memory;
	}

	/**
	 * @param  float|int  $memory
	 */
	public function set_memory( $memory ): void {
		$this->memory = $memory;
	}
}