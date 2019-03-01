<?php
require_once(__DIR__ . '/../app/size.php');

use PHPUnit\Framework\TestCase;

class SizeClassTest extends TestCase {
	protected $size;

	function setUp(): void {
		$this->size = new Size;
	}

	function testCanCreateSize() {
		$this->assertIsObject($this->size);
	}

	function testHasSize() {
		$this->assertNotEmpty($this->size->get());
	}

	function testCanSetSize() {
		$this->size->set(12);
		$this->assertSame(12, $this->size->get());
	}

	function testCanInitialiseSize() {
		$init_size = new Size(12);
		$this->assertSame(12, $init_size->get());
	}

	function testHasMax() {
		$this->assertIsInt($this->size->get_max());
	}

	function testHasMin() {
		$this->assertIsInt($this->size->get_min());
	}

	/**
	 * @dataProvider defaultCappedSizesProvider
	 */
	function testIsCappedWithinCustomRange($out, $in) {
		$this->size->set($in);
		$this->assertSame($out, $this->size->get($in));
	}

	/**
	 * @dataProvider defaultCappedSizesProvider
	 */
	function testIsCappedWithinRange($out, $in) {
		$this->assertSame(
			$out,
			$this->size->cap_within_range($in)
		);
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
		$this->size->set_min(1);
		$this->assertSame(1, $this->size->get_min(1));
		$this->assertSame(1, $this->size->cap_within_range(-20));
		$this->assertSame(1, $this->size->cap_within_range(-1));
		$this->assertSame(1, $this->size->cap_within_range(0));
		$this->assertSame(1, $this->size->cap_within_range(1));
	}

	function testCanSetMax() {
		$this->size->set_max(100);
		$this->assertSame(100, $this->size->get_max(100));
		$this->assertSame(30, $this->size->cap_within_range(30));
		$this->assertSame(52, $this->size->cap_within_range(52));
		$this->assertSame(100, $this->size->cap_within_range(100));
		$this->assertSame(100, $this->size->cap_within_range(101));
		$this->assertSame(100, $this->size->cap_within_range(105));
		$this->assertSame(100, $this->size->cap_within_range(200));
	}
}
