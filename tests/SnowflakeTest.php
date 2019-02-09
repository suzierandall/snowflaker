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

	function testCannotSetGridSizeSmallerThanMin() {
		$this->assertFalse((new Snowflake)->set_grid_size(1));
	}

	function testCannotSetGridSizeBiggerThanMax() {
		$this->assertFalse((new Snowflake)->set_grid_size(50));
	}

	function testCannotSetGridSizeOutsidePermittedRange() {
		$snowflake = new Snowflake;
		$this->assertFalse($snowflake->set_grid_size(-20));
		$this->assertFalse($snowflake->set_grid_size(0));
		$this->assertFalse($snowflake->set_grid_size(1));
		$this->assertFalse($snowflake->set_grid_size(2));
		$this->assertTrue($snowflake->set_grid_size(3));
		$this->assertTrue($snowflake->set_grid_size(12));
		$this->assertTrue($snowflake->set_grid_size(23));
		$this->assertTrue($snowflake->set_grid_size(30));
		$this->assertFalse($snowflake->set_grid_size(31));
		$this->assertFalse($snowflake->set_grid_size(54));
		$this->assertFalse($snowflake->set_grid_size(102));
	}

	function testIsSizeWithinRange() {
		$snowflake = new Snowflake;
		$this->assertFalse($snowflake->is_size_within_range(-20));
		$this->assertFalse($snowflake->is_size_within_range(0));
		$this->assertFalse($snowflake->is_size_within_range(1));
		$this->assertFalse($snowflake->is_size_within_range(2));
		$this->assertTrue($snowflake->is_size_within_range(3));
		$this->assertTrue($snowflake->is_size_within_range(12));
		$this->assertTrue($snowflake->is_size_within_range(23));
		$this->assertTrue($snowflake->is_size_within_range(30));
		$this->assertFalse($snowflake->is_size_within_range(31));
		$this->assertFalse($snowflake->is_size_within_range(54));
		$this->assertFalse($snowflake->is_size_within_range(102));
	}
}
