<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Operator;
use App\User;
use App\Bus;
use App\Route;
use App\BusRoute;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $routes =Route::get();
        return view('frontend.home.index', compact('routes'));
    }

    public function search(Request $request)
    {
       $this->validateSearch($request);
       //get rout_id 
       $route_id =Route::where([
           ['origin','=', $request->fromCity],
           ['destination','=', $request->toCity]
           ])->pluck('id');
 
       //search buses
        //check if bus is active
       $query =DB::table('bus_routes')
       ->join('buses', 'bus_routes.bus_id', '=', 'buses.id')
       ->join('operators', 'buses.operator_id', '=', 'operators.id')
       ->where('bus_routes.id', '=', $route_id)
       ->where('buses.active', '=', 1)
       ->get();
      return $query;
    }

    protected function validateSearch(Request $request)
    {
        $this->validate($request, [
            'fromCity' => 'required|string',
            'toCity' => 'required|string',
        ]);
    }
}
