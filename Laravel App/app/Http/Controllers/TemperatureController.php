<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temperature;
use Carbon\Carbon;

class TemperatureController extends Controller
{
    public function save(Request $request)
    {
    	$data = new Temperature;
    	$time = Carbon::now();
    	$data->plant_id = $request->get('plant_id');
    	$data->temperature = $request->get('temperature');
    	$data->time = "$time";
    	$data->save();
    	return "Successfully saved @ $time";

    }

     public function date()
    {
        $now = Carbon::now();
        return "$now";
        
    }
}
