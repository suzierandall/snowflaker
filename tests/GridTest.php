<?php
require_once(__DIR__ . '/../app/grid.php');

use PHPUnit\Framework\TestCase;

class GridTest extends TestCase {
	function testCanCreateGrid() {
		$this->assertIsObject(new Grid);
	}

	function testHasGridSize() {
		$this->assertNotEmpty((new Grid)->get_size());
	}

	function testHasDefaultGridSize() {
		$this->assertSame(9, (new Grid)->get_default_size());
	}

	function testCanSetGridSize() {
		$grid = new Grid;
		$this->assertTrue($grid->set_size(12));
		$this->assertSame(12, $grid->get_size());
	}

	function testCanSetGridSizeOnConstruction() {
		$grid = new Grid(12);
		$this->assertSame(12, $grid->get_size());
	}

	function testHasGridSizeMax() {
		$this->assertIsInt((new Grid)->get_size_max());
	}

	function testHasGridSizeMin() {
		$this->assertIsInt((new Grid)->get_size_min());
	}

	function testCannotSetGridSizeSmallerThanMin() {
		$this->assertFalse((new Grid)->set_size(1));
	}

	function testCannotSetGridSizeBiggerThanMax() {
		$this->assertFalse((new Grid)->set_size(50));
	}

	function testCannotSetGridSizeOutsidePermittedRange() {
		$grid = new Grid;
		$this->assertFalse($grid->set_size(-20));
		$this->assertFalse($grid->set_size(0));
		$this->assertFalse($grid->set_size(1));
		$this->assertFalse($grid->set_size(2));
		$this->assertTrue($grid->set_size(3));
		$this->assertTrue($grid->set_size(12));
		$this->assertTrue($grid->set_size(23));
		$this->assertTrue($grid->set_size(30));
		$this->assertFalse($grid->set_size(31));
		$this->assertFalse($grid->set_size(54));
		$this->assertFalse($grid->set_size(102));
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

	function testDoesCapGridSizeOutOfRange() {
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
}
