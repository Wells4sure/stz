@extends('frontend.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection

@section('content')

  
       <div class="col-xs-12 bgGradient">
           <div class="container">
               <div class="row">
                    <div class="col-xs-12 col-md-12 search-box">
                         <h1 class="clr-gray font-15 text-center">Book Bus Ticket Across Zambia.</h1>
                         
                             <form action=""role="form" class="py-4">
                                <div class="row">
                                 <div class="form-group col-xs-12 col-md-4">
                                    <label for="from_city">From</label>
                                    <input type="text " class="form-control" value="Lusaka">
                                 </div>
                                 <div class="form-group col-xs-12 col-md-4">
                                        <label for="from_city">To</label>
                                        <input type="text " class="form-control" value="Copperbelt">
                                 </div>
                                 <div class="form-group col-xs-12 col-md-4">
                                        <label for="from_city">Travel Date</label>
                                        <input type="date" class="form-control">
                                 </div>
                                 <div class="form-group col-xs-12 col-md-12 text-center">
                                     <button type="submit" class="btn-lg primaryBtn clr-white font-24">SEARCH</button>
                                 </div>
                                </div>
                             </form>
                         
                    </div>
                    <div class="col-xs-12 col-md-12 search-results">
                        <h1 class="clr-white">Search Results </h1>
                    </div>
               </div>

           </div>
       </div>


@endsection