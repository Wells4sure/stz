@extends('admin.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dashboard</span> </h4>

            <ul class="breadcrumb position-right">
              
                <li class="active">Dashboard</li>
            </ul>
        </div>

       
    </div>
</div>
<div class="content">
    <div class="panel">
        <div class="panel-body">
            <h4 class="text-center content-group-lg">
                Welcome to our Smart Tickets Zambia
                <small class="display-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, hic quae incidunt suscipit ut laudantium exercitationem. </small>
            </h4>

            <form action="#" class="main-search">
                <div class="input-group content-group">
                    <div class="has-feedback has-feedback-left">
                        <input type="text" class="form-control input-xlg" placeholder="Search for Buses">
                        <div class="form-control-feedback">
                            <i class="icon-search4 text-muted text-size-base"></i>
                        </div>
                    </div>

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-xlg">Search</button>
                    </div>
                </div>

                <div class="row search-option-buttons">
                    <div class="col-sm-6">
                        <ul class="list-inline list-inline-condensed no-margin-bottom">
                            <li class="dropdown">
                                <a href="#" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-stack2 position-left"></i> All categories <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon-question7"></i> Getting started</a></li>
                                    <li><a href="#"><i class="icon-accessibility"></i> Registration</a></li>
                                    <li><a href="#"><i class="icon-reading"></i> General info</a></li>
                                    <li><a href="#"><i class="icon-gear"></i> Your settings</a></li>
                                    <li><a href="#"><i class="icon-graduation"></i> Copyrights</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-mail-read"></i> Contacting authors</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="btn btn-link btn-sm"><i class="icon-reload-alt position-left"></i> Refine your search</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-6 text-right">
                        <ul class="list-inline no-margin-bottom">
                            <li><a href="#" class="btn btn-link btn-sm"><i class="icon-make-group position-left"></i> Browse articles</a></li>
                            <li><a href="#" class="btn btn-link btn-sm"><i class="icon-menu7 position-left"></i> Advanced search</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

    	<!-- Info blocks -->
        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-body text-center">
                        <div class="icon-object border-success text-success"><i class="icon-book"></i></div>
                        <h5 class="text-semibold">Knowledge Base</h5>
                        <p class="mb-15">Ouch found swore much dear conductively hid submissively hatchet vexed far inanimately alongside candidly much and jeez</p>
                        <a href="#" class="btn bg-success-400">Browse articles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-body text-center">
                        <div class="icon-object border-warning text-warning"><i class="icon-lifebuoy"></i></div>
                        <h5 class="text-semibold">Support center</h5>
                        <p class="mb-15">Dear spryly growled much far jeepers vigilantly less and far hideous and some mannishly less jeepers less and and crud</p>
                        <a href="#" class="btn bg-warning-400">Open a ticket</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-body text-center">
                        <div class="icon-object border-blue text-blue"><i class="icon-reading"></i></div>
                        <h5 class="text-semibold">Articles and news</h5>
                        <p class="mb-15">Diabolically somberly astride crass one endearingly blatant depending peculiar antelope piquantly popularly adept much</p>
                        <a href="#" class="btn bg-blue">Browse articles</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /info blocks -->

</div>
@endsection