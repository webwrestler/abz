@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Table all users</div>
                <a href="{{route('create')}}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Start date</th>
                            <th>Wage</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Start date</th>
                            <th>Wage</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="#"><img src="{{$user->images}}" class="avatar" alt="Avatar"> {{$user->first_name}} {{$user->last_name}} </a></td>
                                <td>{{$user->position}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>${{$user->wage}}</td>
                                <td>
                                    <a href="admin/update/{{$user->id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="admin/delete/{{$user->id}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                        @endforeach
                        {{--{{ $users->links() }}--}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
@endsection