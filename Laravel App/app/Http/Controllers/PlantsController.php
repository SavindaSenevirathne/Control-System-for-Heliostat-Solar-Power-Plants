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

	public function show() {
		$stocksTable = Lava::DataTable();  // Lava::DataTable() if using Laravel
        $data = $this->getData();

        $stocksTable->addStringColumn('Time')
                    ->addNumberColumn('Temperature');

        dd($data);

        // foreach ($data as $datum) {

        //     $stocksTable->addRow([
        //         $datum[0],$datum[1]
        //     ]);
        // }

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

		return view('plants.plant', compact('plant'));
	}

    public function getData(Plant $plant)
    {
        $temperatureArray = array();

        $data = Temperature::where('plant_id',$plant->id)
                ->orderBy('id','desc')
                ->take(20)             
                ->get()
                ->reverse();

        foreach ($data as $datum) {
            $date = explode(" ", $datum->time);
            $temperatureArray[datum]['time'] = $date[1];
            $temperatureArray[datum]['temperature'] = $datum->temperature;
        }

        return temperatureArray;
    }

    public function update()
    {
        $response = new Symfony\Component\HttpFoundation\StreamedResponse(function() {
            $old_data = array();

            while (true) {
                $new_data = $this->getData();
                $changed_data = $this->getChangedData($old_data, $new_data);

                if (count($changed_data)) {
                    echo 'data: ' . json_encode($changed_data) . "\n\n";
                    ob_flush();
                    flush();
                }
                sleep(3);
                $old_data = $new_data;
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        return $response;
    }

    protected function getChangedData($old_data, $new_data);
    {
        $ret = array();
        foreach ($new_data as $curr => $curr_info) {
            $ret[$curr]['time'] = $curr_info['time'];
            $ret[$curr]['temperature'] = $curr_info['temperature'];                
        }

        return $ret;
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
        $chart->dataset('Sample', 'line', $data);

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
