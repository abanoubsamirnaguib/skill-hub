@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$exam->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/SkillsHub/Dashboard/Exams">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("/SkillsHub/Dashboard/Exams") }}">Exams </a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{ url()->current() }}">{{$exam->name}} in
                                {{$exam->skill->name}} </a></li>
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

                <div class="box-body">
                    <table class="table bg-white offset-6 table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$exam->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$exam->name}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$exam->desc}}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img src="{{ asset("$exam->img") }}" alt="skill image" width="70" height="50"></td>
                            </tr>
                            <tr>
                                <th>Qestions No.</th>
                                <td>{{$exam->questions_no}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty</th>
                                <td>{{$exam->difficulty}}</td>
                            </tr>
                            <tr>
                                <th>Duration_mins</th>
                                <td>{{$exam->duration_mins}} Mins</td>
                            </tr>
                            <tr>
                                <th>Active</th>
                                <td>
                                    @if ($exam->active)
                                    <a 
                                        class="badge bg-success ">
                                        Active
                                    </a>
                                    @else
                                    <a 
                                        class="badge bg-danger ">
                                        Not Active
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Skill</th>
                                <td>{{$exam->skill->name}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <a href="{{ url("/SkillsHub/Dashboard/Exams/show/$exam->id/Question", []) }}" class="btn btn-success mr-2"> Show Question </a>
                                    <a href="{{  url()->previous() }}" class="btn btn-info"> Back </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
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