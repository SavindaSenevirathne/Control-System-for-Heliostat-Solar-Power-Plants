<?php

namespace App\Http\Controllers;
use App\Plant;

class SessionsController extends Controller {
	//
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index() {

		return view('index');
	}
	public function home()
	{
		$plants = Plant::all();
		return view('welcome', compact('plants'));
	}
}
