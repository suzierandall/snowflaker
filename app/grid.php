<?php

class Grid {
	private $m_size;

	/**
	 * Initialise the instance
	 * @param int size - optionally, set a custom size
	 */
	public function __construct(int $size = null) {
		if (is_int($size)) {
			$this->set_size($size);
		}
	}

	/**
	 * Set a custom size
	 * @param int size - the custom size
	 * @return bool - true if within permitted range, false otherwise
	 */
	public function set_size(int $size): bool {
		if (!$this->is_size_within_range($size)) {
			return false;
		}
		$this->m_size = $size;
		return true;
	}

	/**
	 * Get the size
	 * @return int - custom or default size
	 */
	public function get_size(): int {
		return $this->m_size
			?: $this->get_default_size();
	}

	/**
	 * Get the default size
	 * @return int - the default size
	 */
	public function get_default_size(): int {
		return 9;
	}

	/**
	 * Get the maximum permitted size
	 * @return int - the maximum size
	 */
	public function get_size_max(): int {
		return 30;
	}

	/**
	 * Get the minimum permitted size
	 * @return int - the minimum size
	 */
	public function get_size_min(): int {
		return 3;
	}

	/**
	 * Check if the given size is within the permitted range
	 * @param int size - the size
	 * @return bool - true if within permitted range, false otherwise
	 */
	public function is_size_within_range(int $size): bool {
		if ($size >= $this->get_size_min() &&
			$size <= $this->get_size_max()) {
			return true;
		}
		return false;
	}

	/**
	 * Cap out-of-range sizes
	 * @param int size - the current size
	 * @return int - min if below min, max if above max, else original size
	 */
	public function cap_size_within_range(int $size): int {
		$min = $this->get_size_min();
		$max = $this->get_size_max();
		$size = max([$min, $size]);
		$size = min([$max, $size]);
		return $size;
	}
}
