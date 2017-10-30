<?php

namespace App\Traits;
use Excel;

trait Chart {

	public $labels = [];
	public $chartData = null;
	public $chartColours = [
		'rgba(235, 92, 36, 0.5)',
		'rgba(187, 48, 48, 0.5)',
		'rgba(58, 187, 48, 0.5)',
		'rgba(48, 65, 187, 0.5)',
		'rgba(176, 187, 48, 0.5)',
		'rgba(166, 79, 64, 0.5)',
		'rgba(64, 155, 166, 0.5)',
		'rgba(15, 181, 27, 0.5)',
		'rgba(76, 127, 184, 0.5)',
		'rgba(191, 46, 94, 0.5)',
		'rgba(191, 118, 46, 0.5)',
		'rgba(172, 191, 46, 0.5)',
	];

	public $chartBorderColours = [
		'rgba(235, 92, 36, 0.7)',
		'rgba(187, 48, 48, 0.7)',
		'rgba(58, 187, 48, 0.7)',
		'rgba(48, 65, 187, 0.7)',
		'rgba(176, 187, 48, 0.7)',
		'rgba(166, 79, 64, 0.7)',
		'rgba(64, 155, 166, 0.7)',
		'rgba(15, 181, 27, 0.7)',
		'rgba(76, 127, 184, 0.7)',
		'rgba(191, 46, 94, 0.7)',
		'rgba(191, 118, 46, 0.7)',
		'rgba(172, 191, 46, 0.7)',
	];

	public function chart()
	{
		$reader = Excel::load(public_path($this->excel_file))->get()->first()->toArray();

		dd($reader);

		foreach($reader[0] as $label)
		{
			$this->labels[] = $label;
		}

		$this->chartData = $reader;
		
		// // 
		// dd($reader);
		// 
		// Excel::load(public_path($this->excel_file),function($file){
		// 	$rs=$file->get();
		// 	$this->labels = $rs[0]->keys()->toArray();

		// 	dd($rs->toArray());

		// 	$this->data = $rs->toArray();
		// });

		return $this;
	}
}