@extends('frontend.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection

@section('content')
  <div class="bgGradient py-4">

    <search-engine  :from_cities="{{$from_cities}}" :to_cities="{{$to_cities}}"/>
  </div>


@endsection
@section('custom_js')
<script>
$(document).ready(function() {
 
});
</script>
@endsection
