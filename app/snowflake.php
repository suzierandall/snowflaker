<?php

class Snowflake {

	/**
	 * Get the JSON character map to build the snowflake
	 * @return JSON - the character map
	 */
	public function get() {
		return <<< JSON
{
	"thing" : "another thing",
	"thing":1,
	"thingy thing": [1,2,3,4,5],
	"t" :"thing",
	[1,2,3,4,5],
	["thing", "thing", "thing"],
}
JSON;
	}

	/**
	 * Check if Snowflake is ready to cystalise
	 * @return bool - true if ready, false otherwise
	 */
	public function is_ready() {
		return true;
	}

}
