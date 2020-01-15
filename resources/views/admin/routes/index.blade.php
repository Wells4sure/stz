@extends('admin.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection
@section('content')
    <div class="page-header">
        <div class="page-header-content">

            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Routes</span> - All Routes</h4>
            </div>
        
            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" data-toggle="modal" data-target="#modal_theme_primary" class="btn btn-link btn-float text-size-small has-text"><i class="icon-road text-primary"></i><span>Add New Route</span></a>
                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Routes </li>
            </ul>
        
            <ul class="breadcrumb-elements">
                <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
               
            </ul>
        </div>
        
    </div>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">All Routes</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
    
        <div class="panel-body">
            <table class="table datatable-basic table-hover">
                <thead>
                    <th></th>
                    <th>Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>price</th>
                   
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($routes as $route)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$route->name}}</td>
                        <td>{{$route->origin}}</td>
                        <td>{{$route->destination}}</td>
                        <td>{{$route->price}}</td>

                    <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.routes.partials.models')
@endsection