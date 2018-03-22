<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temperature;
use App\Libraries\SunCalc\SunCalc;
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

        $sc = new SunCalc(Carbon::now(), 7.199655, 79.895354);
        // get position of the sun (azimuth and altitude) at given position
        $position = $sc->getSunPosition();
        return response()->json($position);
        
    	// return "Successfully saved @ $time";
        

    }

    public function Position()
    {
        $sc = new SunCalc(Carbon::now(), 7.199655, 79.895354);

        // get position of the sun (azimuth and altitude) at given position
        $position = $sc->getSunPosition();

        // get sun's azimuth in degrees
        $posAzimuth = $position->azimuth * 180 / M_PI;
        
        dd($position);
        
    }
}
