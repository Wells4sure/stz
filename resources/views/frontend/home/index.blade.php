@extends('frontend.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection

@section('content')

        <div class="row bgGradient">
            <div class="col-xs-8 widgetSection">

                <h1 class="text-center">Book Bus Ticket Across Zambia.<a href=""> Travelling with a group? Hire a bus.</a></h1>
                <div class="bussw ">
                <div class="bussw_inner">
                    <div class="bussw_inputBox selectHtlCity  ">
                        <label for="fromCity" class="lbl_input makeFlex column latoBold">
                            <span data-cy="fromCity" class="appendBottom5">From</span>
                            <input id="fromCity"  type="text" class="bussw_inputField font30 latoBlack"  value="Lusaka, Lusaka">
                            <p data-cy="fromCountryCode" class="code">Zambia</p>
                        </label>
                    </div>
                    
                    <div class="bussw_inputBox selectHtlCity  ">
                        <label for="toCity" class="lbl_input latoBold makeFlex column">
                            <span data-cy="toCity" class="appendBottom5">To</span>
                            <input id="toCity" data-cy="toCityVal" type="text" class="bussw_inputField font30 latoBlack" value="Copper Belt, Ndola">
                            <p data-cy="toCountryCode" class="code">Zambia</p>
                        </label>
                    </div>
                    <div class="bussw_inputBox dayPickerRailWrap dates  ">
                        <label for="travelDate" class="lbl_input latoBold makeFlex column">
                            <span data-cy="travelDate" class="appendBottom5 downArrow">TRAVEL DATE</span>
                            <input id="travelDate" data-cy="travelDateVal" type="text" class="bussw_inputField font20" readonly="" value="">
                            <p data-cy="departureDate" class="blackText font20 code paddingTB2">
                                <span class="font30 latoBlack ">8</span><span> Nov</span><span class="shortYear">19</span>
                            </p>
                            <p data-cy="departureDay" class="code">Friday</p>
                        </label>
                    </div>
                </div>
            </div>
            
            <p data-cy="submit" class="py-4 text-center">
                <a class="primaryBtn font24 widgetSearchBtn clr-white">Search</a>
            </p>

            </div>
        </div>

@endsection