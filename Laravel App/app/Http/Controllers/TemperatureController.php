<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temperature;

class TemperatureController extends Controller
{
    public function save(Request $request)
    {
    	$data = new Temperature;
    	$data->farm_id = $request->get('farm_id');
    	$data->temperature = $request->get('temperature');
    	$data->time = $request->get('time_stamp');
    	$data->save();
    	return "Successfully saved";

    }
}