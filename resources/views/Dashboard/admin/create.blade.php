@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create New Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/SkillsHub/Dashboard/Admins') }}">Home</a></li>
                        <li class="breadcrumb-item"><a ">Create Admin </a></li>
                      
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row ">

                <div class="row">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> 
                @endif
                </div>

                <div class="box box-primary col m-5 p-5 bg-white ">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ url('SkillsHub/Dashboard/Admins/store', []) }}" >
                      @csrf
                        <div class="box-body ">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control"  placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email"  name="email" class="form-control"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Password</label>
                          <input type="password"  name="password" class="form-control"  placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Confirmed Password</label>
                          <input type="password"  name="password_confirmation" class="form-control"  placeholder="Enter Confirmed Password">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Role</label>
                            <select class="form-control" name="role_id">
                                @foreach ($AdminRoles as $AdminRole)
                                <option value="{{$AdminRole->id}}">{{$AdminRole->name}}</option>
                                @endforeach
                            </select>
                        </div>

                      
                        </div>

                      
                      <!-- /.box-body -->
        
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </form>
                  </div>

            
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection

@section('script')

@endsection 