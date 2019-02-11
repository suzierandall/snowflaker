<?php
require_once(__DIR__ . '/../app/snowflake.php');

use PHPUnit\Framework\TestCase;

class SnowflakeClass extends TestCase {
	function testCanCreateSnowflake() {
		$this->assertIsObject(new Snowflake);
	}
}