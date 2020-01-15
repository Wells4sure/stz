@extends('admin.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Operators</span> - Edit Operator</h4>
        </div>
    
       
    </div>
    
    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="{{ route('admin.operators.index') }}">Operators</a></li>
            <li><a href="{{ route('admin.operators.edit',[$bus->operator->id]) }}">Edit Operator</a></li>
            <li class="active">Edit Bus </li>
        </ul>
    
        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
        </ul>
    </div>
    
    </div>

    <div class="row">
            
        <div class="col-md-12">
            <h6 class="content-group text-semibold">
                    {{$bus->reg}}
                    <small class="display-block">Edit or Assign Bus Routes</small>
                </h6>

               <div class="col-md-6">

                   <div class="panel panel-default ">
                       <div class="panel-heading">
                       <h6 class="panel-title">Edit Bus <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                           <div class="heading-elements">
                               <ul class="icons-list">
                                   <li><a data-action="collapse"></a></li>
                                   <li><a data-action="reload"></a></li>
                                   <li><a data-action="close"></a></li>
                               </ul>
                           </div>
                       </div>

                       <div class="panel-body">
                        
                         <div class="content-group-sm">
                               <h6 class="no-margin text-bold">Registration: <small>{{$bus->reg}}</small></h6>
                               <h6 class="no-margin text-bold">No. Seats: <small>{{$bus->num_seats}}</small></h6>
                               <h6 class="no-margin text-bold">Active: <small>
                                   @if ($bus->active)
                                       <span class="label label-success position-right">Yes</span>
                                       @else
                                       <span class="label label-danger position-right">No</span>
                                   @endif
                               </small></h6>
                           </div>
                           <div class="content-group-sm">
                           <form action="{{route('admin.operators.update.bus', ['bus' => $bus->id])}}" method="post" class="form-horizontal">
                            {{ csrf_field() }} 
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{$bus->id}}">
                            <input type="hidden"  name="operator_id" value="{{$bus->operator->id }}" readonly>
                                   
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Reg #</label>
                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Enter Registration number " name="reg" class="form-control" value="{{ $bus->reg }}">
                                    </div>
                                </div>
                                   <div class="form-group">
                                       <label class="control-label col-sm-3">Seats</label>
                                       <div class="col-sm-9">
                                           <input type="number" min="1" max="399" placeholder="Enter number of seats" name="num_seats" class="form-control" value="{{ $bus->num_seats }}">
                                       </div>
                                   </div>
                                   <div class="form-group">
                                           <label class="control-label col-sm-3">Is Active</label>
                                       <div class="col-sm-9">
                                               <label class="radio-inline">
                                                   <input type="radio" name="active" class="styled" value="1" {{ $bus->active == 1 ?'checked':''}}>
                                                   Yes
                                               </label>
       
                                               <label class="radio-inline">
                                                   <input type="radio" name="active" class="styled" value="0"  {{ $bus->active == 1 ?'':'checked'}}>
                                                   No
                                               </label>
                                       </div>
                                           
                                       </div>
                                   <button type="submit" name="update" value="1" class="btn btn-primary pull-right">Update</button>
                               </form>
                           </div>

                       </div>
                   </div>
               </div>
               <div class="col-md-6">

                   <div class="panel panel-default">
                       <div class="panel-heading">
                       <h6 class="panel-title">Assign Bus Route <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                           <div class="heading-elements">
                               <ul class="icons-list">
                                   <li><a data-action="collapse"></a></li>
                                   <li><a data-action="reload"></a></li>
                                   <li><a data-action="close"></a></li>
                               </ul>
                           </div>
                       </div>

                       <div class="panel-body">
                        

                           <div class="content-group-sm">
                               @if ($errors)
                                @foreach ($errors->all() as $message) 
                                <div class="alert alert-danger alert-styled-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-bold">Error! </span> {{$message}} .
                                    </div>
                                @endforeach
                        
                               @endif
                               
                                    
                                <form action="{{route('admin.operators.update.bus', ['bus' => $bus->id])}}" method="post" class="form-horizontal">
                                        {{ csrf_field() }} 
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="id" value="{{$bus->id}}">
                                        <input type="hidden"  name="bus_id" value="{{$bus->id }}" readonly>
                                        
                                        <div class="form-group">
                                       <label class="control-label col-sm-3">Route</label>
                                       <div class="col-sm-9">
                                            <select class="select-search" name="route_id">
                                                <option value="" selected disabled>Select or Search Route</option>
                                                @foreach ($routes as $route)
                                                    <option value="{{$route->id}}">{{$route->name}}</option>
                                                @endforeach   
                                            </select>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="control-label col-sm-3">Bus Name</label>
                                       <div class="col-sm-9">
                                           <input type="text"  placeholder="Enter Bus Name" name="bus_name" class="form-control" value="{{ old('bus_name') }}">
                                       </div>
                                   </div>                                   
                                   <div class="form-group">
                                       <label class="control-label col-sm-3">Bus Time</label>
                                       
                                        <div class="input-group col-sm-9">
											<span class="input-group-btn">
												<button type="button" class="btn btn-primary btn-icon" id="ButtonCreationDemoButton"><i class="icon-calendar3"></i></button>
											</span>
											<input type="text" class="form-control" id="ButtonCreationDemoInput" name="bus_time" placeholder="Select a date" value="{{ old('bus_time') }}">
										</div>
                                      
                                   </div>

                                   <button type="submit" name="save" value="1" class="btn btn-success pull-right">SAVE</button>
                               </form>
                           </div>

                       </div>
                   </div>
               </div>
                    

              
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h6 class="panel-title">Bus Routes<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                   <table class="table table-hover">
                       <thead>
                           <th>Route</th>
                           <th>Bus name</th>
                           <th>Bus Time</th>
                           <th></th>

                       </thead>
                       <tbody>
                           @foreach ($bus->bus_routes as $bus_route)
                               <tr>
                               <td>{{ $bus_route->route->name}}</td>
                               <td>{{ $bus_route->bus_name}}</td>
                               <td>{{ $bus_route->bus_time}}</td>
                               <td><a href="" class="btn btn-danger"> <i class="icon-trash"></i> </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection