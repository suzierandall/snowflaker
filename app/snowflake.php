<?php

class Snowflake {
	private $m_grid_size;

	public function __construct(int $size = null) {
		if (is_int($size)) {
			$this->set_grid_size($size);
		}
	}

	public function set_grid_size(int $size): bool {
		$this->m_grid_size = $size;
		return true;
	}

	public function get_grid_size() {
		return $this->m_grid_size
			?: $this->get_default_grid_size();
	}

	public function get_default_grid_size() {
		return 9;
	}
}
