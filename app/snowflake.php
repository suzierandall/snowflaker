<?php
require_once(__DIR__ . '/size.php');

class Snowflake {
	private $m_size;

	/**
	 * Ininitialise Snowflake; set the required size
	 * @param int size - option custom grid size
	 */
	public function __construct(int $size = null) {
		$this->m_size = new Size($size);
	}

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
