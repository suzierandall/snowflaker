<?php
require_once(__DIR__ . '/../app/size.php');

use PHPUnit\Framework\TestCase;

class SizeClassTest extends TestCase {
	function testCanCreateSize() {
		$this->assertIsObject(new Size);
	}

	function testHasSize() {
		$this->assertNotEmpty((new Size)->get());
	}

	function testCanSetSize() {
		$size = new Size;
		$size->set(12);
		$this->assertSame(12, $size->get());
	}

	function testCanInitialiseSize() {
		$size = new Size(12);
		$this->assertSame(12, $size->get());
	}

	function testHasMax() {
		$this->assertIsInt((new Size)->get_max());
	}

	function testHasMin() {
		$this->assertIsInt((new Size)->get_min());
	}

	/**
	 * @dataProvider defaultCappedSizesProvider
	 */
	function testIsCappedWithinCustomRange($out, $in) {
		$size = new Size;
		$size->set($in);
		$this->assertSame($out, $size->get($in));
	}

	/**
	 * @dataProvider defaultCappedSizesProvider
	 */
	function testIsCappedWithinRange($out, $in) {
		$this->assertSame($out, (new Size)->cap_within_range($in));
	}

	function defaultCappedSizesProvider() {
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

	function testCanSetMin() {
		$size = new Size;
		$size->set_min(1);
		$this->assertSame(1, $size->get_min(1));
		$this->assertSame(1, $size->cap_within_range(-20));
		$this->assertSame(1, $size->cap_within_range(-1));
		$this->assertSame(1, $size->cap_within_range(0));
		$this->assertSame(1, $size->cap_within_range(1));
	}

	function testCanSetMax() {
		$size = new Size;
		$size->set_max(100);
		$this->assertSame(100, $size->get_max(100));
		$this->assertSame(30, $size->cap_within_range(30));
		$this->assertSame(52, $size->cap_within_range(52));
		$this->assertSame(100, $size->cap_within_range(100));
		$this->assertSame(100, $size->cap_within_range(101));
		$this->assertSame(100, $size->cap_within_range(105));
		$this->assertSame(100, $size->cap_within_range(200));
	}
}
