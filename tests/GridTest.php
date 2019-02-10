<?php
require_once(__DIR__ . '/../app/grid.php');

use PHPUnit\Framework\TestCase;

class GridTest extends TestCase {
	function testCanCreateGrid() {
		$this->assertIsObject(new Grid);
	}

	function testHasSize() {
		$this->assertNotEmpty((new Grid)->get_size());
	}

	function testCanSetSize() {
		$grid = new Grid;
		$grid->set_size(12);
		$this->assertSame(12, $grid->get_size());
	}

	function testCanSetSizeOnConstruction() {
		$grid = new Grid(12);
		$this->assertSame(12, $grid->get_size());
	}

	function testHasSizeMax() {
		$this->assertIsInt((new Grid)->get_size_max());
	}

	function testHasSizeMin() {
		$this->assertIsInt((new Grid)->get_size_min());
	}


	/**
	 * @dataProvider defaultCappedSizeProvider
	 */
	function testDoesCapSetSizeOutsideRange($out, $in) {
		$grid = new Grid;
		$grid->set_size($in);
		$this->assertSame($out, $grid->get_size($in));
	}

	function defaultCappedSizeProvider() {
		return [
			[3, -20],
			[3, 0],
			[3, 1],
			[3, 2],
			[3, 3],
			[12, 12],
			[23, 23],
			[30, 30],
			[30, 31],
			[30, 54],
			[30, 102],
		];
	}

	function testIsSizeWithinRange() {
		$grid = new Grid;
		$this->assertFalse($grid->is_size_within_range(-20));
		$this->assertFalse($grid->is_size_within_range(0));
		$this->assertFalse($grid->is_size_within_range(1));
		$this->assertFalse($grid->is_size_within_range(2));
		$this->assertTrue($grid->is_size_within_range(3));
		$this->assertTrue($grid->is_size_within_range(12));
		$this->assertTrue($grid->is_size_within_range(23));
		$this->assertTrue($grid->is_size_within_range(30));
		$this->assertFalse($grid->is_size_within_range(31));
		$this->assertFalse($grid->is_size_within_range(54));
		$this->assertFalse($grid->is_size_within_range(102));
	}

	function testDoesCapSizeOutsideRange() {
		$grid = new Grid;
		$this->assertSame(3, $grid->cap_size_within_range(-20));
		$this->assertSame(3, $grid->cap_size_within_range(0));
		$this->assertSame(3, $grid->cap_size_within_range(1));
		$this->assertSame(3, $grid->cap_size_within_range(2));
		$this->assertSame(3, $grid->cap_size_within_range(3));
		$this->assertSame(12, $grid->cap_size_within_range(12));
		$this->assertSame(23, $grid->cap_size_within_range(23));
		$this->assertSame(30, $grid->cap_size_within_range(30));
		$this->assertSame(30, $grid->cap_size_within_range(31));
		$this->assertSame(30, $grid->cap_size_within_range(54));
		$this->assertSame(30, $grid->cap_size_within_range(102));
	}

	function testCanSetSizeMin() {
		$grid = new Grid;
		$grid->set_size_min(1);
		$this->assertSame(1, $grid->get_size_min(1));
		$this->assertSame(1, $grid->cap_size_within_range(-20));
		$this->assertSame(1, $grid->cap_size_within_range(-1));
		$this->assertSame(1, $grid->cap_size_within_range(0));
		$this->assertSame(1, $grid->cap_size_within_range(1));
	}

	function testCanSetSizeMax() {
		$grid = new Grid;
		$grid->set_size_max(100);
		$this->assertSame(100, $grid->get_size_max(100));
		$this->assertSame(30, $grid->cap_size_within_range(30));
		$this->assertSame(52, $grid->cap_size_within_range(52));
		$this->assertSame(100, $grid->cap_size_within_range(100));
		$this->assertSame(100, $grid->cap_size_within_range(101));
		$this->assertSame(100, $grid->cap_size_within_range(105));
		$this->assertSame(100, $grid->cap_size_within_range(200));
	}
}
