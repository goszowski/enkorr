<?php

namespace App\Traits;
use Excel;

trait Table {

	public $excel_table_data = null;

	public function excel_table_read()
	{
		$this->excel_table_data = Excel::load(public_path($this->excel_table))->get()[0]->toArray();
		return $this;
	}
}