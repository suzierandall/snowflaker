<?php

use PHPUnit\Framework\TestCase;

class SnowflakeClass extends TestCase {
	function testCanCreateSnowflake() {
		$this->assertIsObject(new Snowflake);
	}
}