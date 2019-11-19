@extends('admin.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection
@section('content')

<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Operators</span> - All Operators</h4>
        </div>
    
        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" data-toggle="modal" data-target="#modal_theme_primary" class="btn btn-link btn-float text-size-small has-text"><i class="icon-user-plus text-primary"></i><span>Add New Operator</span></a>
            </div>
        </div>
    </div>
    
    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Operators </li>
        </ul>
    
        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
           
        </ul>
    </div>
    
    </div>


    <div class="panel panel-flat">
        <div class="panel-heading">
                <h5 class="panel-title">All Operators</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
        
            <div class="panel-body">
                {{-- Help Text --}}
                
            </div>
            <table class="table datatable-basic table-hover">
                <thead>
                    <th></th>
                    <th>Operator Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Joined </th>
                </thead>
            </table>
    </div>
@endsection
@include('admin.operators.partials.models')