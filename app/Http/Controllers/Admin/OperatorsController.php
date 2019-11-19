<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Operators\CreateOperatorsRequest;
use App\Http\Requests\Operators\UpdateOperatorsRequest;
use App\Operator;
use App\User;

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
    public function edit($id)
    {
        $businessOwners = User::where('role','=','business_owner')->get();
        $operator = Operator::with([
            'user'
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

        if(!$operator->save()){
            return redirect()->back()->with(['msg' => 'Action Failed Call Developer', 'type' => 'bg-info']);
        }
        return redirect()->back()->with(['msg' => 'Operator Updated successfully', 'type' => 'bg-success']);
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
}
