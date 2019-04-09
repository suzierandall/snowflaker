<?php
require_once(__DIR__ . '/size.php');

class Snowflake {
	public const ON = '*';
	public const OFF = '';

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
	  * Plot the character map
	  * @return array - the plotted character map
	  */
	public function build() {
		$size = $this->m_size;
		$map = $this->get_map();
		$grid = [];
		for($i = 0; $i < $size; ++$i) {
			$row = [];
			for($ii = 0; $ii < $size; ++$ii) {
				$row[] = in_array($ii, $map[$i])
					? self::ON
					: self::OFF;
			}
			$grid[] = $row;
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
				$left_plot = $index;
				$right_plot = ($size - $index) - 1;
				$row[] = $left_plot;
				$row[] = $right_plot;
			}
			$row = array_unique($row, SORT_NUMERIC);
			$top[] = $row;
		}
		return $top;
	}

	/**
	  * Build the bottom half of the character map
	  * @param array top - the top half of the character map
	  * @return array - the bottom half of the character map
	  */
	public function get_bottom(array $top) {
		$size = $this->m_size;
		$is_even = $size % 2 === 0;
		// remove center line of odd-numbered grids
		if (!$is_even) {
			array_pop($top);
		}
		$bottom = array_reverse($top);
		return $bottom;
	}

	/**
	  * Build the character map
	  * @return array - the character map
	  */
	public function get_map() {
		$top = $this->get_top();
		$bottom = $this->get_bottom($top);

		$map = array_merge($top, $bottom);
		return $map;
	}

	/**
	 * Check if Snowflake is ready to cystalise
	 * @return bool - true if ready, false otherwise
	 */
	public function is_ready() {
		return true;
	}

}
