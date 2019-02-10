<?php

class Size {
	private $m_size;
	private $m_min;
	private $m_max;
	private const DEFAULT_SIZE = 9;
	private const DEFAULT_MIN = 3;
	private const DEFAULT_MAX = 30;

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
	 * Set a custom size, size capped if outside range
	 * @param int size - the custom size
	 */
	public function set_size(int $size) {
		$this->m_size = $this->cap_size_within_range($size);
	}

	/**
	 * Get the size
	 * @return int - custom or default size
	 */
	public function get_size(): int {
		return $this->m_size ?: self::DEFAULT_SIZE;
	}

	/**
	 * Set a custom min permitted size
	 * @param int size - the min size
	 */
	public function set_size_min(int $size) {
		$this->m_min = $size;
	}

	/**
	 * Set a custom max permitted size
	 * @param int size - the max size
	 */
	public function set_size_max(int $size) {
		$this->m_max = $size;
	}

	/**
	 * Get the maximum permitted size
	 * @return int - the maximum size
	 */
	public function get_size_max(): int {
		return $this->m_max ?: self::DEFAULT_MAX;
	}

	/**
	 * Get the minimum permitted size
	 * @return int - the minimum size
	 */
	public function get_size_min(): int {
		return $this->m_min ?: self::DEFAULT_MIN;
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
