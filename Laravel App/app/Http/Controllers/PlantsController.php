<?php

namespace App\Http\Controllers;
use App\Plant;

class PlantsController extends Controller {
	//
	public function index() {

		$plants = Plant::all();
		return view('plants', compact('plants'));
	}

	public function show(Plant $plant) {

		return view('plant', compact('plant'));
	}
}
