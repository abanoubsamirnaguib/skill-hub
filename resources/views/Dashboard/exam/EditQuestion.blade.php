@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Question </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/SkillsHub/Dashboard/Exams">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ url("/SkillsHub/Dashboard/Exams/show/$exam->id") }}">{{$exam->name}}</a></li>
                        <li class="breadcrumb-item"><a ">Edit Question </a></li>
                        
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class=" content">
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
                                            <form role="form" method="POST"
                                                action="{{ url("SkillsHub/Dashboard/Exams/updateQuestion/$exam->id/$question->id", []) }}">
                                                @csrf

                                                <div class="box-body ">
                                    
                                                    
                                                        <div class="question ">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">title of Question
                                                                    </label>
                                                                <input type="text" name="title" class="form-control"
                                                                    placeholder="Enter title" value="{{$question->title}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">option_1</label>
                                                                <textarea type="text" name="option_1" class="form-control"
                                                                    placeholder="Enter option 1" >{{$question->option_1}} </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">option_2</label>
                                                                <textarea type="text" name="option_2" class="form-control"
                                                                    placeholder="Enter option 2" >{{$question->option_2}} </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">option_3</label>
                                                                <textarea type="text" name="option_3" class="form-control"
                                                                    placeholder="Enter option 3" >{{$question->option_3}} </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">option_4</label>
                                                                <textarea type="text" name="option_4" class="form-control"
                                                                    placeholder="Enter option 4" >{{$question->option_4}} </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">right_answer of Question
                                                                    </label>
                                                                <input type="number" min="1" max="4" name="right_ans"
                                                                    class="form-control"
                                                                    placeholder="Enter right_answer Number" value="{{$question->right_ans}}">
                                                            </div>
                                                            <hr>
                                                        </div>
                                                        <hr>
                                                     

                                                </div>


                                                <!-- /.box-body -->

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <a  href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
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