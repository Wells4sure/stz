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
            <li class="active">Edit Operator </li>
        </ul>
    
        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
           
        </ul>
    </div>
    
    </div>

    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Edit Operator's Details<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                                    <li class="active"><a href="#bottom-justified-divided-tab1" data-toggle="tab" class="legitRipple" aria-expanded="false">Operator</a></li>
                                    <li class=""><a href="#bottom-justified-divided-tab2" data-toggle="tab" class="legitRipple" aria-expanded="true">Buses</a></li>
                                    <li class=""><a href="#bottom-justified-divided-tab3" data-toggle="tab" class="legitRipple" aria-expanded="true">Reviews</a></li>

                                </ul>
                                <form  action="{{ route('admin.operators.update', ['operator' => $operator->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <div class="tab-content">
<hr>

        {{ csrf_field() }}
                                    {{-- Operaters Details --}}
                                    <div class="tab-pane active" id="bottom-justified-divided-tab1">
                                           
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="id" value="{{$operator->id}}">
                                            <div class="form-group">
                                                    <label class="control-label col-sm-3">Logo</label>
                                                    <div class="col-sm-9 text-center">
                                                        <img src="{{url('assets/images/cover.jpg')}}" class="img-responsive content-group" alt="" id="logo-preview" width="300" >
                                                    </div>
                                                    <div class="col-offset-3 col-sm-9">
                                                        <div class="uploader ">
                                                            <input type="file" class="file-styled-primary" name="logo">
                                                                <span class="filename " style="user-select: none;">No file selected</span>
                                                                <span class="action btn bg-blue legitRipple" style="user-select: none;">Choose File</span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label class="control-label col-sm-3">Operator name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Enter Operator name" name="name" class="form-control" value="{{ $operator->name }}">
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-sm-3">Business owner</label>
                                                    <div class="col-sm-9">
                                                       <select class="form-control" name="user_id">
                                                           <option value="">Select Business Owner</option>
                                                           @foreach ($businessOwners as $businessOwner)
                                                            
                                                                <option value="{{$businessOwner->id}}" {{$businessOwner->id ==  $operator->user->id ?'selected':'' }}>{{ ucfirst($businessOwner->first_name.' '.$businessOwner->last_name)}}</option>
                                                           
                                                            @endforeach
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Phone #</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Enter Phone number" name="phone" data-mask="+99-99-9999-9999" class="form-control" value="{{ $operator->phone}}">
                                                        <span class="help-block">+260-969-999-999</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                        <label class="control-label col-sm-3">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="email Adrress" name="email" class="form-control" value="{{ $operator->email}}">
                                                            <span class="help-block">optional</span>
                                                        </div>
                                                    </div>
                                
                                
                                                    <div class="form-group  has-feedback">
                                                        <label class="control-label col-sm-3">Address</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="address" class="form-control" placeholder="Enter address">{{ $operator->address}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-sm-3">Is Active</label>
                                                        <div class="col-sm-9">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="active" class="styled" value="1" {{ $operator->active == 1 ?'checked':''}}>
                                                                    Yes
                                                                </label>
                        
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="active" class="styled" value="0"  {{ $operator->active == 1 ?'':'checked'}}>
                                                                    No
                                                                </label>
                                                        </div>
                                                            
                                                        </div>
                                                    
 
                                    </div>

                                    <div class="tab-pane " id="bottom-justified-divided-tab2">
                                       <div class="row">
                                           <div class="col-md-6">
                                                <table class="table datatable-basic table-hover">
                                                        <thead>
                                                          
                                                            <th>Registration # </th>
                                                            <th>Seats</th>                                                        
                                                            <th>Active</th>                                                        
                                                            <th>Added </th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($operator->buses as $bus)
                                                                <tr>
                                                                    <td><a href="{{ route('admin.operators.edit.bus',[$bus->id]) }}">{{$bus->reg}}</a></td>
                                                                    <td>{{$bus->num_seats}}</td>
                                                                    <td>{{$bus->active ?'Yes':'No'}}</td>
                                                                    <td>{{$bus->created_at}}</td>
                                                                </tr>  
                                                               
                                                            @endforeach
                                                            
                                                        </tbody>
                                                </table>
                                           </div>
                                           <div class="col-md-6">

                                                <div class="panel panel-flat border-bottom-primary">
                                                        <div class="panel-heading">
                                                            <h6 class="panel-title">Add a Bus</h6>
                                                        </div>
                                                        
                                                        <div class="panel-body">
                                                                
                                                                    <div class="form-group  has-feedback">
                                                                            <label class="control-label col-sm-3">Reg #</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" placeholder="Enter Registration number" name="reg" data-mask="ABC1234ZM" class="form-control" value="{{ old('reg')}}">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    <div class="form-group  has-feedback">
                                                                            <label class="control-label col-sm-3">Number of Seats</label>
                                                                            <div class="col-sm-9">
                                                                                    <input type="number" placeholder="Enter number of seats" name="num_seats" class="form-control" value="{{ old('num_seats')}}" min='1' max="399">
                                                                            </div>
                                                                        </div>
                                                                       
                                                               
                                                        </div>
                                                    </div>

                                               
    
                                           </div>
                                       </div>
                                    </div>

                                    <div class="tab-pane" id="bottom-justified-divided-tab3">
                                        Reviews Can be viewed here
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                                </form>
                                </div>
                          
                            </div>
                        </div>
                    </div>
           
        </div>


    </div>

    @endsection