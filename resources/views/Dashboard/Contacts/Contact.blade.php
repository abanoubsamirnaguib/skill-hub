@extends('Dashboard.layout')
@section("title",'Message Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Messagess</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/SkillsHub/Dashboard/Messages') }}">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @include('Dashboard.inc.msg')

                {{-- <div class="row"> --}}
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title text-muted text-center">Messages</h3>
                            <div class=" float-right">
                                <!-- Button trigger modal -->
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

                                @if (session('message'))
                                    {{session('message')}}
                                @endif

                                <a href='{{ url("/SkillsHub/Dashboard/Messages/create", []) }}' class="btn
                                btn-primary">
                                add new
                                </a>
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover w-100">
                                <tbody>
                                    <tr>
                                        <th> ID</th>
                                        <th> Name</th>
                                        <th> email </th>
                                        <th> subject </th>
                                        <th> Message body </th>
                                        <th> Action </th>

                                    </tr>
                                    @foreach ($Messages as $Message )
                                    <tr>
                                        {{-- <td>{{$loop->iteration}}</td> --}}
                                        <td>{{$Message->id}}</td>
                                        <td>{{$Message->name}}</td>
                                        <td>{{$Message->email}}</td>
                                        <td>
                                            {{$Message->subject ?? "..."}}
                                        </td>
                                        <td>
                                            {{$Message->body}}
                                        </td>
                                        <td> 
                                            {{-- show --}}
                                           
                                            <a href='{{ url("/SkillsHub/Dashboard/ReplayMessages/$Message->id", []) }}'
                                                class="btn bg-gradient-green ">
                                                <i class="px-2 fa fa-edit"></i></a>
                                                
                                            <a href="{{ url("/SkillsHub/Dashboard/Messages/Delete/$Message->id") }}"
                                                type="button" class="btn bg-purple btn-flat margin">
                                                <i class="px-2t fa fa-trash"></i></a>

                                        </td> 
                                            <td></td>
                                    </tr>
                                    @endforeach ()
                                </tbody>
                            </table>
                        </div>
                        
                        {{ $Messages->links() }}
                        <!-- /.box-body -->
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