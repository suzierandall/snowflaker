<?php
require_once(__DIR__ . '/../app/size.php');

use PHPUnit\Framework\TestCase;

class SizeClassTest extends TestCase {
	function testCanCreateSize() {
		$this->assertIsObject(new Size);
	}

	function testHasSize() {
		$this->assertNotEmpty((new Size)->get_size());
	}

	function testCanSetSize() {
		$size = new Size;
		$size->set_size(12);
		$this->assertSame(12, $size->get_size());
	}

	function testCanSetSizeOnConstruction() {
		$size = new Size(12);
		$this->assertSame(12, $size->get_size());
	}

	function testHasSizeMax() {
		$this->assertIsInt((new Size)->get_size_max());
	}

	function testHasSizeMin() {
		$this->assertIsInt((new Size)->get_size_min());
	}

	/**
	 * @dataProvider defaultCappedSizeProvider
	 */
	function testDoesCapSetSizeOutsideRange($out, $in) {
		$size = new Size;
		$size->set_size($in);
		$this->assertSame($out, $size->get_size($in));
	}

	/**
	 * @dataProvider defaultCappedSizeProvider
	 */
	function testDoesCapSizeOutsideRange($out, $in) {
		$this->assertSame($out, (new Size)->cap_size_within_range($in));
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

	function testCanSetSizeMin() {
		$size = new Size;
		$size->set_size_min(1);
		$this->assertSame(1, $size->get_size_min(1));
		$this->assertSame(1, $size->cap_size_within_range(-20));
		$this->assertSame(1, $size->cap_size_within_range(-1));
		$this->assertSame(1, $size->cap_size_within_range(0));
		$this->assertSame(1, $size->cap_size_within_range(1));
	}

	function testCanSetSizeMax() {
		$size = new Size;
		$size->set_size_max(100);
		$this->assertSame(100, $size->get_size_max(100));
		$this->assertSame(30, $size->cap_size_within_range(30));
		$this->assertSame(52, $size->cap_size_within_range(52));
		$this->assertSame(100, $size->cap_size_within_range(100));
		$this->assertSame(100, $size->cap_size_within_range(101));
		$this->assertSame(100, $size->cap_size_within_range(105));
		$this->assertSame(100, $size->cap_size_within_range(200));
	}
}
