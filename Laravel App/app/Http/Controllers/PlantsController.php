<?php

namespace App\Http\Controllers;
use App\Plant;
use App\Temperature;
use Khill\Lavacharts\Lavacharts;
use \Lava as Lava;


class PlantsController extends Controller {
    //
    public function index() {
        
		$plants = Plant::all();
		return view('plants', compact('plants'));
	}

	public function show(Plant $plant) {
		$stocksTable = Lava::DataTable();  // Lava::DataTable() if using Laravel
        $data = Temperature::where('plant_id',$plant->id)
                ->orderBy('id','desc')
                ->take(20)             
                ->get()
                ->reverse();

        $stocksTable->addStringColumn('Time')
                    ->addNumberColumn('Temperature');


        foreach ($data as $datum) {
            $date = explode(" ", $datum->time);
            $stocksTable->addRow([
                $date[1],$datum->temperature
            ]);
        }
        $test = Temperature::all();
        // dd($plant);

         $chart = Lava::LineChart('MyStocks', $stocksTable)
        ->setOptions([
            'datatable' => $stocksTable,
            'title' => 'Temperature variation',
            'pointSize' => 5,
            'lineWidth' => 2,
            'vAxis' => ['ticks' => [0,25,50,75,100],'title'=>'Temperature'],
            'hAxis' => ['title'=>'Time'],
            'axisTitlesPosition' => 'out',
            ]);

		return view('plant', compact('plant'));
	}


}
