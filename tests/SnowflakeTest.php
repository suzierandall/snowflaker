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

	function testCanSetGridSize() {
		$snowflake = new Snowflake;
		$this->assertTrue($snowflake->set_grid_size(12));
		$this->assertSame(12, $snowflake->get_grid_size());
	}

	function testCanSetGridSizeOnConstruction() {
		$snowflake = new Snowflake(12);
		$this->assertSame(12, $snowflake->get_grid_size());
	}

	function testHasGridSizeMax() {
		$this->assertIsInt((new Snowflake)->get_grid_size_max());
	}

	function testHasGridSizeMin() {
		$this->assertIsInt((new Snowflake)->get_grid_size_min());
	}
}
