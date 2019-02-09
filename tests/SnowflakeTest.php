<?php
require_once(__DIR__ . '/../app/snowflake.php');

use PHPUnit\Framework\TestCase;

class SnowflakeTest extends TestCase {
	function testCanCreateSnowflake() {
		$this->assertIsObject(new Snowflake);
	}

	function testHasGridSize() {
		$this->assertNotEmpty((new Snowflake)->get_grid_size());
	}

	function testHasDefaultGridSize() {
		$this->assertSame(9, (new Snowflake)->get_default_grid_size());
	}
}
