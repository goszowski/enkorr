<?php

namespace App\Http\Controllers\Front\Indicators;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;
use Validator;
use Session;

class EuropeIndicatorController extends RSController
{

    public function view()
    {
      return $this->make_view('indicators.europe.view');
    }

}
