@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Respond</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/SkillsHub/Dashboard/Contacts') }}">Home</a></li>
                        <li class="breadcrumb-item"><a ">Responde </a></li>
                      
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class=" content">
                                <div class="container-fluid">


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

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="box box-primary col bg-white">
                                                <div class="box-header">
                                                    <h3 class="box-title p-3">Respond To Email</h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>email</th>
                                                                <th>subject</th>
                                                                <th>body</th>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>{{$Message->id}}</td>
                                                                <td>{{$Message->name}}</td>
                                                                <td>{{$Message->email}}</td>
                                                                <td>{{$Message->subject}}</td>
                                                                <td>{{$Message->body}}</td>
                                                            </tr>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="box box-primary col m-5 p-5 bg-white ">
                                            <!-- /.box-header -->
                                            <!-- form start -->
                                            <form method="POST"
                                                action="{{ url('SkillsHub/Dashboard/Message/Responde', [$Message->id]) }}">
                                                @csrf
                                                <div class="box-body ">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Subject</label>
                                                        <input type="text" name="subject" class="form-control"
                                                            placeholder="Enter Subject">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body">body</label>
                                                        <textarea name="body" class="form-control" rows="5" 
                                                            placeholder="Enter Message"></textarea>
                                                    </div>
            
                                                </div>

                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Send</button>
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