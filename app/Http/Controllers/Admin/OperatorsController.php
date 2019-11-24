<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Operators\CreateOperatorsRequest;
use App\Http\Requests\Operators\UpdateOperatorsRequest;
use App\Operator;
use App\User;
use App\Bus;
use App\Route;
use App\BusRoute;

class OperatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessOwners = User::where('role','=','business_owner')->get();
        $operators = Operator::get();
        return view('admin.operators.index',compact('businessOwners','operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOperatorsRequest $request)
    {
        $operator = new Operator;
        $operator->name = $request->name;
        $operator->user_id = $request->user_id;
        $operator->logo = $request->logo;
        $operator->email = $request->email;
        $operator->phone = $request->phone;
        $operator->address = $request->address;
        $operator->active = false;

        if (!$operator->save()) {
            return redirect()->back()->with(['msg' => 'Action Failed Call Developer', 'type' => 'bg-info']);
        }
        return redirect()->back()->with(['msg' => 'Operator created successfully', 'type' => 'bg-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBus($id)
    {
        $routes=Route::get();
        
        $bus = Bus::with([
            'operator',
            'bus_routes'
        ])->findOrFail($id);
           
        return view('admin.operators.editBus',compact('bus','routes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $businessOwners = User::where('role','=','business_owner')->get();
      
        $operator = Operator::with([
            'user',
            'buses'
        ])->findOrFail($id);
           
        return view('admin.operators.edit',compact('operator','businessOwners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatorsRequest $request, Operator $operator)
    {
        $operator->name = $request->name;
        $operator->user_id = $request->user_id;
        $operator->logo = $request->logo;
        $operator->email = $request->email;
        $operator->phone = $request->phone;
        $operator->address = $request->address;
        $operator->active = $request->active;

        if($request->reg != null || $request->num_seats != null ){
           
            $this->storeBus($request->all(), $operator->id, $operator);
        }

        if(!$operator->save()){
            return redirect()->back()->with(['msg' => 'Action Failed Call Developer', 'type' => 'bg-info']);
        }
        return redirect()->back()->with(['msg' => 'Operator Updated successfully', 'type' => 'bg-success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBus(Request $request, Bus $bus)
    {
        
        $bus = Bus::findorfail($request->id);

        if( $request->update){
            $bus->operator_id = $request->operator_id;
            $bus->reg = $request->reg;
            $bus->num_seats = $request->num_seats;
            $bus->active = $request->active;
        
        }
      
        if($request->save){

            $request->validate([
                'bus_id' => 'required|exists:buses,id',
                'route_id' => 'required|exists:routes,id',
                'price' => 'required|Numeric',
            ]);

            $bus_route=BusRoute::create([
                'bus_id'=>$request->bus_id,
                'route_id'=>$request->route_id,
                'price'=>$request->price,
            ]);
            
            return redirect()->back()->with(['msg' => 'Bus route successfully created', 'type' => 'bg-success']);
        }

        if(!$bus->save()){
            return redirect()->back()->with(['msg' => 'Action Failed Call Developer', 'type' => 'bg-info']);
        }
        return redirect()->back()->with(['msg' => 'Bus Updated successfully', 'type' => 'bg-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeBus($data, $operator_id, $operator)
    {
      try{
        
        $noSpaces =str_replace(' ', '',$data['reg']);

        Bus::create([
            'operator_id' => $operator_id,
            'reg' =>  $noSpaces,
            'num_seats' => $data['num_seats'],
        ]);

        }catch (\Exception $e) {
            return redirect()->back()->with(['msg' => 'Bus not created try again later', 'type' => 'bg-error']);
        }
    }
}
