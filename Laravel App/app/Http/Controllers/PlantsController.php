<?php

namespace App\Http\Controllers;
use App\Plant;
use App\Temperature;
use Khill\Lavacharts\Lavacharts;
use App\Charts\TemperatureChart;
use \Lava as Lava;


class PlantsController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {
        
		$plants = Plant::all();
		return view('plants.plants', compact('plants'));
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
        // $test = Temperature::all();
        // dd($plant);

         $chart = Lava::LineChart('MyStocks', $stocksTable)
        ->setOptions([
            'datatable' => $stocksTable,
            'title' => 'Temperature variation',
            'pointSize' => 5,
            'lineWidth' => 2,
            'vAxis' => ['title'=>'Temperature'],
            'hAxis' => ['title'=>'Time'],
            'axisTitlesPosition' => 'out',
            ]);


		return view('plants.plant', compact('plant'));
	}
    public function add()
    {
        return view('plants.add');
    }

    public function save()
    {
        $plant = new Plant;
        $plant->name = request('name');
        $plant->location = request('location');
        $plant->latitude = request('latitude');
        $plant->longitude = request('longitude');
        $plant->save();
        return redirect('/plants')->with('success','Successfully updated');
    }

    public function chart()
    {
        $chart = new TemperatureChart;
        $data =  Temperature::pluck('Temperature')->toArray();
        $labels = Temperature::pluck('Time')->toArray();
        // dd($data);
        $chart->labels($labels);
        $chart->dataset('Temperature', 'line', $data);

        return view('test',compact('chart'));
    }

    // public function response()
    // {
    //     $chart = new TemperatureChart;
    //     // $data =  Temperature::pluck('Temperature')->toArray();
    //     // $labels = Temperature::pluck('Time')->toArray();
    //     // // dd($data);
    //     // $chart->labels($labels);
    //     // $chart->dataset('Sample', 'line', $data);

    //     // $chart = new TemperatureChart;
    //   $chart->dataset('Sample Test', 'bar', [3,4,1])->color('#00ff00');
    // //   $chart->dataset('Sample Test', 'line', [1,4,3])->color('#ff0000');
    //   return $chart->api();
    // }

}
