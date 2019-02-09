<?php
require_once(__DIR__ . '/../app/snowflake.php');

use PHPUnit\Framework\Testcase;

class SnowflakeTest extends TestCase {
	function testCanCreateSnowflake() {
		$snowflake = new Snowflake;
	}
}
