@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Students</li>
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
                            <h3 class="box-title text-muted text-center">Students</h3>
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

                                {{-- <a href='{{ url("/SkillsHub/Dashboard/Exams/create", []) }}' class="btn
                                btn-primary">
                                add new
                                </a> --}}
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
                                        <th> email_verified_at </th>
                                        <th> Action </th>

                                    </tr>
                                    @foreach ($students as $Student )
                                    <tr>
                                        {{-- <td>{{$loop->iteration}}</td> --}}
                                        <td>{{$Student->id}}</td>
                                        <td>{{$Student->name}}</td>
                                        <td>{{$Student->email}}</td>

                                        <td>
                                            @if ($Student->email_verified_at != null)
                                            <a href="{{ url('/SkillsHub/Dashboard/Students/ActiveToggleStudent', [$Student->id]) }}"
                                                class="badge bg-success Active">
                                                Active
                                            </a>
                                            @else
                                            <a href="{{ url('/SkillsHub/Dashboard/Students/ActiveToggleStudent', [$Student->id]) }}"
                                                class="badge bg-danger Active">
                                                Not Active
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- show --}}
                                            <a href='{{ url("/SkillsHub/Dashboard/Student/showScore/$Student->id", []) }}'
                                                class="btn bg-gradient-gray margin Edit-btn">
                                                <i class="px-2 fa fa-percent"></i></a>
                                            {{-- <a href="{{ url("/SkillsHub/Dashboard/Students/Delete/$Student->id") }}"
                                                type="button" class="btn bg-purple btn-flat margin">
                                                <i class="px-2t fa fa-trash"></i></a> --}}

                                        </td>
                                            <td></td>
                                    </tr>
                                    @endforeach ()
                                </tbody>
                            </table>
                        </div>
                        
                        {{ $students->links() }}
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