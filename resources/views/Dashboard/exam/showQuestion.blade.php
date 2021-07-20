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
                        <li class="breadcrumb-item "><a
                                href="{{ url("/SkillsHub/Dashboard/Exams/show",[$exam->id]) }}">{{$exam->name}} in
                                {{$exam->skill->name}} </a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{ url()->current() }}"> Questions </a></li>
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

                <div class="box-body col">
                    <table class="table bg-white table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>options</th>
                                <th>right_ans</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($exam->questions as $ques)
                            <tr>
                                <td>{{$ques->id}}</td>
                                <td>{{$ques->title}}</td>
                                <td>
                                     {{$ques->option_1}} 
                                   | {{$ques->option_2}}
                                   | {{$ques->option_3}}
                                   | {{$ques->option_4}}
                                </td>
                                <td>{{$ques->right_ans}}</td>
                                <td>  <a href="{{  url("/SkillsHub/Dashboard/Exams/Edit/Question/$exam->id/$ques->id", []) }}" class="btn btn-info"> <i class="px-2 fa fa-edit"></i> Edit </a> </td>
                            </tr>
                                
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{  url()->previous() }}" class="btn btn-info"> Back </a>
                    <a href="{{  url('/SkillsHub/Dashboard/Exams') }}" class="btn btn-success"> Back to all exams</a>
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