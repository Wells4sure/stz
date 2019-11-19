@extends('admin.layouts.master')

@section('head_title')
    Welcome to Smart Ticketing Zambia
@endsection
@section('content')

<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users</span> - All Users</h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" data-toggle="modal" data-target="#modal_theme_primary" class="btn btn-link btn-float text-size-small has-text"><i class="icon-user-plus text-primary"></i><span>Add New User</span></a>
            </div>
        </div>
    </div>

<div class="breadcrumb-line breadcrumb-line-component">
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">All Users </li>
    </ul>

    <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
       
    </ul>
</div>

</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">All Users</h5>
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
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Role</th>
                <th>Status</th>
                <th>Joined date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($users as $user)
               <tr>
               <td>{{$user->first_name}}</td>
               <td>{{$user->last_name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->phone}}</td>
               <td>{{$user->date_of_birth}}</td>
               <td>{{$user->role}}</td>
               <td>{{$user->active}}</td>
               <td>{{ $user->created_at->diffForHumans()}}</td>
               <td class="text-center">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#" class="edit_model" data-toggle="modal" data-target="#modal_theme_edit"
                                                data-id="{{$user->id}}"
                                                data-first_name="{{$user->first_name}}"
                                                data-last_name="{{$user->last_name}}"
                                                data-email="{{$user->email}}"
                                                data-phone="{{$user->phone}}"
                                    >
                                        <i class="icon-spell-check"></i> Edit
                                    </a>
                                </li>
                            <li><a href="#"  data-toggle="modal" data-target="#modal_theme_danger" class="del-model" data-id="{{$user->id}}"><i class="icon-trash"></i> Delete</a></li>
                            
                            </ul>
                        </li>
                    </ul>
                </td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>

@include('admin.users.partials.models')

@endsection
@section('custom_js')
    <script>
        $(function() {
            $(document).on("click", ".edit_model", function () {
                var user_id = $(this).data('id');
                var first_name = $(this).data('first_name');
                var last_name = $(this).data('last_name');
                var email = $(this).data('email');
                var phone = $(this).data('phone');

                $(".modal-body #u_id").val( user_id );
                $(".modal-body #first_name").val( first_name );
                $(".modal-body #last_name").val( last_name );
                $(".modal-body #email").val( email );
                $(".modal-body #phone").val( phone );
            });
            $(document).on("click", ".del-model", function () {
                var user_id = $(this).data('id');
                $(".modal-body #u_id").val( user_id );
            });
        });
    
    </script>
@endsection
