<?php

class Snowflake {
	private $m_grid_size;

	public function get_grid_size() {
		return $this->m_grid_size
			?: $this->get_default_grid_size();
	}

	public function get_default_grid_size() {
		return 9;
	}
}
