<?php
require_once(__DIR__ . '/size.php');

class Snowflake {
	private $m_size;

	/**
	 * Ininitialise Snowflake; set the required size
	 * @param int size - option custom grid size
	 */
	public function __construct(int $size = null) {
		$this->m_size = (new Size($size))->get();
	}

	/**
	 * Get the JSON character map to build the snowflake
	 * @return JSON - the character map
	 */
	public function get() {
		$map = $this->build();
		$json_map = json_encode($map);
		return $json_map;
	}

	/**
	  * Build the character map
	  * @return array - the character map
	  */
	private function build() {
		$size = $this->m_size;
		$rows = [];
		for($i = 0; $i < $size; ++$i) {
			$cols = [];
			for($i = 0; $i < $size; ++$i) {
				$cols[] = '*';
			}
			$rows[] = $cols;
		}
		return $rows;
	}

	/**
	 * Check if Snowflake is ready to cystalise
	 * @return bool - true if ready, false otherwise
	 */
	public function is_ready() {
		return true;
	}

}
