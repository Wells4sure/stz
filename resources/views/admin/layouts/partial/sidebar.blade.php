<div class="sidebar sidebar-main sidebar-fixed">
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user-material">
                <div class="category-content">
                    <div class="sidebar-user-material-content">
                        <a href="#"><img src=" {{ url('assets/images/placeholder.jpg')}} " class="img-circle img-responsive" alt=""></a>
                        <h6>Wellington Chanda</h6>
                        
                    </div>
                                                
                    <div class="sidebar-user-material-menu">
                        <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                    </div>
                </div>
                
                <div class="navigation-wrapper collapse" id="user-nav">
                    <ul class="navigation">
                        <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                        <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                        <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li class="{{ Route::currentRouteNamed('admin.index') ? 'active' : '' }}"><a href="{{ route('admin.index') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#"><i class="icon-users"></i> <span> Users </span></a>
                            <ul>
                                <li class="{{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">All Users</a></li>
                                <li><a href="#">Business Owners</a></li>
                                <li><a href="#">Travellers</a></li>
                              
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="icon-road"></i> <span>Routes</span></a>
                            <ul>
                                <li class="{{ Route::currentRouteNamed('admin.routes.index') ? 'active' : '' }}"><a href="{{ route('admin.routes.index') }}" id="layout1">View Routes</a></li>
                              
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="icon-store"></i> <span>Operators</span></a>
                            <ul>
                                <li class="{{ Route::currentRouteNamed('admin.operators.index') ? 'active' : '' }}"><a href="{{ route('admin.operators.index') }}" id="layout1">View Operators</a></li>
                              
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="icon-bus"></i> <span>Reports</span></a>
                            <ul>
                                <li class="{{ Route::currentRouteNamed('admin.reports.buses.index') ? 'active' : '' }}"><a href="{{ route('admin.reports.buses.index') }}" id="layout1">View Buses Reports</a></li>
                              
                            </ul>
                        </li>
                     
                   
                        <li><a href=""><i class="icon-list-unordered"></i> <span>Events <span class="label bg-blue-400">comming soon</span></span></a></li>
                        
                        <!-- /main -->

                        <!-- Reviews -->
                        <li class="navigation-header"><span>Reviews</span> <i class="icon-menu" title="Forms"></i></li>
                        <li>
                            <a href="#"><i class="icon-pencil3"></i> <span>Reviews</span></a>
                            <ul>
                                <li><a href="#">All Reviews</a></li>
                                
                            </ul>
                        </li>
                    
                      
                       
                        <!-- /Reviews -->

                    

               


                  
                      
                    </ul>
                </div>
            </div>
            <!-- /main navigation -->

        </div>
    </div>