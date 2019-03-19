<?php
require_once(__DIR__ . '/../app/snowflake.php');

use PHPUnit\Framework\TestCase;

class SnowflakeTest extends TestCase {
	protected $snowflake;

	function setUp(): void {
		$this->snowflake = new Snowflake;
	}

	function testCanCreateSnowflake() {
		$this->assertIsObject($this->snowflake);
	}

	function testCanGetSnowflakeJSON() {
		$this->assertThat(
			$this->snowflake->get(),
			$this->matchesRegularExpression(
				'/{?\n?(\s*(("[\w\s-]+")\s*:)?\s*([\["]?["\w\s,-]+[\]"]?),\n?)+}?/'
			)
		);
	}

	function testSnowflakeIsReady() {
		$this->assertTrue($this->snowflake->is_ready());
	}

	function testGetSize() {
		$size = 12;
		$snowflake = new Snowflake($size);
		$this->assertEquals($size, $snowflake->get_size());
	}

	function testGetTop() {
		$size = 12;
		$half = ceil($size/2);
		$snowflake = new Snowflake($size);
		$top = $snowflake->get_top();
		$this->assertNotEmpty($top);
		$this->assertIsArray($top);
		$this->assertEquals($half, count($top));
	}
}
