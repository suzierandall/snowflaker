<?php

class Snowflake {
	private $m_grid_size;

	/**
	 * Initialise the instance
	 * @param int size - optionally, set a custom grid size
	 */
	public function __construct(int $size = null) {
		if (is_int($size)) {
			$this->set_grid_size($size);
		}
	}

	/**
	 * Set a custom grid size
	 * @param int size - the custom grid size
	 * @return bool - true
	 */
	public function set_grid_size(int $size): bool {
		$this->m_grid_size = $size;
		return true;
	}

	/**
	 * Get the grid size
	 * @return int - custom or default grid size
	 */
	public function get_grid_size(): int {
		return $this->m_grid_size
			?: $this->get_default_grid_size();
	}

	/**
	 * Get the default grid size
	 * @return int - the default grid size
	 */
	public function get_default_grid_size(): int {
		return 9;
	}

	/**
	 * Get the maximum permitted grid size
	 * @return int - the maximum size
	 */
	public function get_grid_size_max(): int {
		return 30;
	}

	/**
	 * Get the minimum permitted grid size
	 * @return int - the minimum size
	 */
	public function get_grid_size_min(): int {
		return 3;
	}
}
