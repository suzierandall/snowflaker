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
}
