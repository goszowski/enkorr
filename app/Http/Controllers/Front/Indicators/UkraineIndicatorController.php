<?php

namespace App\Http\Controllers\Front\Indicators;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;
use Validator;
use Session;
use Carbon\Carbon;
use PH;

class UkraineIndicatorController extends RSController
{

    public function view()
    {
        $activeLocal = PH::getActiveLocalId();
        
        // for($i=1; $i<=30; $i++)
        // {
        //     if($i<10)
        //     {
        //         $i = '0'.$i;
        //     }
        //     Node::push(22, $this->node->id, str_slug(5).time().mt_rand(1000, 9999).str_slug(5), [
        //         $activeLocal => [
        //           'is_active' => true,
        //           'fuel_type_id' => 179,
        //           'wholesale' => mt_rand(20000, 21000),
        //           'retail' => mt_rand(25, 28).'.'.mt_rand(01, 99),
        //           'pubdate' => Carbon::parse('2017-08-'.$i)
        //         ]
        //     ]);

        //     Node::push(22, $this->node->id, str_slug(5).time().mt_rand(1000, 9999).str_slug(5), [
        //         $activeLocal => [
        //           'is_active' => true,
        //           'fuel_type_id' => 180,
        //           'wholesale' => mt_rand(20000, 21000),
        //           'retail' => mt_rand(25, 28).'.'.mt_rand(01, 99),
        //           'pubdate' => Carbon::parse('2017-08-'.$i)
        //         ]
        //     ]);

        //     Node::push(22, $this->node->id, str_slug(5).time().mt_rand(1000, 9999).str_slug(5), [
        //         $activeLocal => [
        //           'is_active' => true,
        //           'fuel_type_id' => 181,
        //           'wholesale' => mt_rand(20000, 21000),
        //           'retail' => mt_rand(25, 28).'.'.mt_rand(01, 99),
        //           'pubdate' => Carbon::parse('2017-08-'.$i)
        //         ]
        //     ]);
        // }

        $fuel_types = Model('fuel_type')->where('parent_id', $this->node->id)->get();
        $indicator_values = Model('indicator_value')
            ->where('parent_id', $this->node->id)
            ->get()
            ->groupBy(function($item){
                return Carbon::parse($item->pubdate)->format('Y.m.d');
            });

        return $this->make_view('indicators.ukraine.view', compact('fuel_types', 'indicator_values'));
    }

}
