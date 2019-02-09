<?php
require_once('/app/snowflake.php');

use PHPUnit\Framework\Testcase;

class SnowflakeTest extends TestClass {
	function testCanCreateSnowflake() {
		$snowflake = new Snowflake;
	}
}
