@extends('Dashboard.layout')
@section("title",'Admin Panel')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Exam</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/SkillsHub/Dashboard/Exams/', []) }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("/SkillsHub/Dashboard/Exams/show",[$exam->id]) }}"> {{$exam->name}} </a></li>                      
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <!-- /.content-header -->
    </div>

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
                    <form role="form" method="POST" action="{{ url('SkillsHub/Dashboard/Exams/update', [$exam->id]) }}" enctype="multipart/form-data">
                      @csrf
                        <div class="box-body ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="id" class="form-control" hidden value="{{$exam->id}}">
                            <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{$exam->name}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea type="text"  name="desc" class="form-control"  placeholder="Enter Description" >{{$exam->desc}}</textarea>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">skill</label>
                            <select class="form-control" name="skill">
                                @foreach ($skills as $skill)

                                @if ($skill->id == $exam->skill_id)
                                <option value="{{$skill->id}}" selected>{{$skill->name}}</option>
                                @else
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            
                        </div>
                        {{-- <div class="form-group">

                          <label for="exampleInputPassword1">Question no.</label>
                          <input type="number" name="question_no" min="1" max="10" class="form-control"  placeholder="Question no">
                        </div> --}}
                        <div class="form-group">
                          <label for="exampleInputPassword1">Difficulty</label>
                          <input type="number" name="difficulty" min="1" max="5" class="form-control"  placeholder="Difficulty" value="{{$exam->difficulty}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Duration/mins</label>
                          <input type="number" name="duration_mins" min="1" max="90" class="form-control"  placeholder="Duration/mins" value="{{$exam->duration_mins}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Image</label> <br>
                          <input type="file" name="img" id="exampleInputFile">
                        </div>
                      
                        </div>

                      
                      <!-- /.box-body -->
        
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">update</button>
                        <a href="{{ url()->previous() }}" type="submit" class="btn btn-success">Back</a>
                      </div>
                    </form>
                    <br>
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