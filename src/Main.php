<?php

namespace Ddaniel\GhReleases;

class Main {
	private string $message;

	public function __construct( string $message ) {
		$this->message = $message;
	}

	public function echo() {
		echo $this->message . "\n";
	}
}