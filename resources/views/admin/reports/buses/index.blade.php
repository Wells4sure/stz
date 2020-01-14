@extends('admin.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection
@section('content')
    <div class="page-header">
        <div class="page-header-content">

            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Reports</span> - All Buses Reports</h4>
            </div>
        
            <div class="heading-elements">
               
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Reports </li>
            </ul>
        
            <ul class="breadcrumb-elements">
                <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
               
            </ul>
        </div>
        
    </div>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">All Buses Bookings</h5>
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
                    <th>Date</th>
                    <th>Phone number</th>
                    <th>Referece</th>
                    <th>number of seats</th>
                    <th>Amount Paid </th>
                    <th>Operater / Bus</th>
                    <th>Route </th>
                    <th>Travel date</th>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($bus_bookings as $bus_booking)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$bus_booking->created_at}}</td>
                        <td>{{$bus_booking->phone_number}}</td>
                        <td>{{$bus_booking->transaction_number}}</td>
                        <td>{{$bus_booking->number_seats}}</td>
                        <td>{{$bus_booking->amount_paid}}</td>
                    <td>{{$bus_booking->bus->operator->name}} / {{$bus_booking->bus->reg}}</td>
                        <td>{{$bus_booking->route->name}}</td>
                        <td>{{$bus_booking->travel_date}}</td>
                    </tr>
                    <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection