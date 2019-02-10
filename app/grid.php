<?php

class Grid {
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
	 * @return bool - true if within permitted range, false otherwise
	 */
	public function set_grid_size(int $size): bool {
		if (!$this->is_size_within_range($size)) {
			return false;
		}
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

	/**
	 * Check if the given size is within the permitted range
	 * @param int size - the size
	 * @return bool - true if within permitted range, false otherwise
	 */
	public function is_size_within_range(int $size): bool {
		if ($size < $this->get_grid_size_min() ||
			$size > $this->get_grid_size_max()) {
			return false;
		}
		return true;
	}

	/**
	 * Cap out-of-range sizes
	 * @param int size - the current size
	 * @return int - min if below min, max if above max, else original size
	 */
	public function cap_size_within_range(int $size): int {
		if ($size < $this->get_grid_size_min()) {
			$size = $this->get_grid_size_min();
		}
		elseif ($size > $this->get_grid_size_max()) {
			$size = $this->get_grid_size_max();
		}
		return $size;
	}
}
