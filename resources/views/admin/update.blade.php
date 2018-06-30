@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Update user</div>
            <div class="card-body">
                <form action="{{$user->id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">First name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$user->first_name}}" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Middle name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$user->middle_name}}" name="middle_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Last name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$user->last_name}}" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="Email" class="form-control" id="exampleFormControlInput1" placeholder="{{$user->email}}"  name="email">

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Chief</label>
                        <select class="form-control" id="exampleFormControlSelect1" name = "chief_id">
                            @foreach($chiefs as $chief)
                                <option value="{{$chief->id}}" {{$chief->id == $user->chief_id ? 'selected' : '' }}> {{$chief->first_name}} {{$chief->middle_name}} {{$chief->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Position</label>
                        <select class="form-control" id="exampleFormControlSelect1" name = "position">
                            <option>Junior</option>
                            <option>Middle</option>
                            <option>Senior</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name = "status">
                            <option value="0" {{$user->status == 0 ? 'selected' : '' }}>User</option>
                            <option value="1" {{$user->status == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Wage</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$user->wage}}" name = "wage">
                    </div>

                    <div class="form-group">
                        <label for="title" style="color: black">Download image</label><br>
                        <input type="file" name="images" id="img_change" >
                        <img src="" id="see-img" width="200px" /><br>
                    </div>

                    <div class="form-group">
                        <input type="submit" id="GO" value="Enter">
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
<!-- /.container-fluid-->
{{--<!-- /.content-wrapper-->--}}
@stop