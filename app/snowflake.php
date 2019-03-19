<?php
require_once(__DIR__ . '/size.php');

class Snowflake {
	private $m_size;

	/**
	 * Iniitialise Snowflake; set the required size
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
	 * Get the size of the snowflake
	 * @return int - the size of the snowflake
	 */
	public function get_size(): int {
		return $this->m_size;
	}

	/**
	  * Build the character map
	  * @return array - the character map
	  */
	private function build() {
		$size = $this->m_size;
		$grid = [];
		for($i = 0; $i < $size; ++$i) {
			$rows = [];
			for($ii = 0; $ii < $size; ++$ii) {
				$rows[] = '*';
			}
			$grid[] = $rows;
		}
		return $grid;
	}

	/**
	  * Build the top half of the character map
	  * @return array - the top half of the character map
	  */
	public function get_top() {
		$size = $this->m_size;
		$quarter = ceil($size/2)-1;
		$plots = ceil($quarter/2);

		$top = [];
		for($i = 0; $i <= $quarter; $i++) {
			$row = [];
			for($ii = 0; $ii < $plots; $ii++) {
				$index = rand(0, $quarter);
				$row[] = $index;
				$row[] = ($size - $index) - 1;
			}
			$top[] = $row;
		}
		return $top;
	}

	/**
	 * Check if Snowflake is ready to cystalise
	 * @return bool - true if ready, false otherwise
	 */
	public function is_ready() {
		return true;
	}

}
