<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $provinces = Province::pluck('name', 'id');
       $cities = City::pluck('name', 'id');

        return view('home',['provinces'=>$provinces, 'cities'=>$cities]);
    }
    
    
}
