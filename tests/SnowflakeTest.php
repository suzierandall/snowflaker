<?php
require_once(__DIR__ . '/../app/snowflake.php');

use PHPUnit\Framework\TestCase;

class SnowflakeTest extends TestCase {
	function testCanCreateSnowflake() {
		$this->assertIsObject(new Snowflake);
	}

	function testCanGetSnowflakeJSON() {
		$this->assertThat(
			(new Snowflake)->get(),
			$this->matchesRegularExpression(
				'/{\n?(\s*("[\w\s-]+")\s*:\s*("?[\w\s-]+"?),\n?)+}/'
			)
		);
	}
}