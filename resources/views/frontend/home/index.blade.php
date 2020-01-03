@extends('frontend.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection

@section('content')

  <div class="py-4"></div>

    <search-engine :routes="{{$routes}}"/>


@endsection
@section('custom_js')
<script>
$(document).ready(function() {
 
});
</script>
@endsection
